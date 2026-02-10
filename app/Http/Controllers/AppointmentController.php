<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Models\Department;
use App\Models\Clinic;
use App\Models\ClinicAppointment;
use App\Models\UserAppointment;
use App\Models\Patients;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function getClinics(Request $request)
    {
        $clinics = Clinic::where('department_id', $request->department_id)->get();
        return response()->json($clinics);
    }

    public function getAvailableAppointments(Request $request)
    {
        $appointments = ClinicAppointment::where('clinic_id', $request->clinic_id)
            ->where('date', $request->date)
            ->where('is_booked', false)
            ->get();
        return response()->json($appointments);
    }
    
    public function create($patient_id)
    {
        $patient = Patients::find($patient_id);
        
        if (!$patient) {
            return redirect()->route('patients.index')->with('error', 'Patient not found');
        }
    
        $departments = Department::all();  
    
        return view('appointments.create_for_user', compact('patient', 'departments'));
    }
    
    public function createForClient()
    {
        $departments = Department::all();

        return view('appointments.create_for_client', compact('departments'));
    }
    
    public function createFromDashboard()
    {
        $departments = Department::all();
    
        return view('appointments.appointment_from_dashboard', compact('departments'));
    }

    public function store(Request $request)
    {
        Log::info('Incoming appointment request data:', $request->all());
    
        try {
            $validated = $request->validate([
                'name' => 'required|string',
                'id_number' => 'required|string',
                'phone' => 'required|string',
                'nationality' => 'required|string',
                'dob' => 'required|date',
                'gender' => 'nullable|string',
                'department_id' => 'required|exists:departments,id',
                'clinic_id' => 'required|exists:clinics,id',
                'appointments' => 'required|array|min:1',
                'appointments.*' => 'exists:clinic_appointments,id',
                'previous_form' => 'required|string|in:yes,no',
            ]);
            
            $validated['gender'] = $validated['gender'] ?? 'male';
    
            Log::info('Validated appointment data:', $validated);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation errors:', $e->errors());
            return response()->json(['error' => 'Validation failed', 'details' => $e->errors()], 400);
        }
    
        try {
            $userAppointments = [];
    
            foreach ($validated['appointments'] as $appointmentId) {
                try {
                    $appointment = ClinicAppointment::find($appointmentId);
    
                    if (!$appointment) {
                        Log::warning('Appointment not found:', ['appointment_id' => $appointmentId]);
                        continue;
                    }
    
                    if ($appointment->is_booked) {
                        Log::warning('Appointment already booked:', ['appointment_id' => $appointment->id]);
                        return response()->json([
                            'error' => "The appointment ID {$appointment->id} is already booked."
                        ], 400);
                    }
    
                    $appointment->is_booked = true;
                    $appointment->save();
    
                    Log::info('Appointment successfully booked:', ['appointment_id' => $appointment->id]);
    
                    $userAppointment = UserAppointment::create([
                        'clinic_appointment_id' => $appointment->id,
                        'name' => $validated['name'],
                        'id_number' => $validated['id_number'],
                        'phone' => $validated['phone'],
                        'nationality' => $validated['nationality'],
                        'dob' => $validated['dob'],
                        'gender' => $validated['gender'],
                        'status' => 'pending',
                    ]);
    
                    Log::info('User Appointment created successfully', ['user_appointment_id' => $userAppointment->id]);
    
                    $userAppointments[] = $userAppointment;
                } catch (\Exception $e) {
                    Log::error('Error processing individual appointment:', [
                        'appointment_id' => $appointmentId,
                        'error' => $e->getMessage()
                    ]);
                }
            }
    
            if (empty($userAppointments)) {
                return response()->json(['error' => 'No valid appointments were booked.'], 400);
            }
    
            if (auth()->check()) {
                return redirect('/appointments/booked')->with('success', 'تم الحجز بنجاح');
            } else {
            return redirect()->route('success')->with('success', 'تم الحجز بنجاح');
            }
        } catch (\Exception $e) {
            Log::error('Error booking appointments:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'An error occurred while booking appointments.'], 500);
        }
    }
    
    public function checkPatient(Request $request)
    {
        try {
            $patient = Patients::where('id_number', $request->id_number)->first();
    
            if ($patient) {
                return response()->json(['found' => true, 'patient' => $patient]);
            } else {
                return response()->json(['found' => false]);
            }
        } catch (\Exception $e) {
            Log::error('Error checking patient:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'An error occurred while checking patient.'], 500);
        }
    }

    public function bookedAppointments()
    {
        $clinics = Clinic::all();
        $perPage = request('perPage', 5); 
        
        $appointments = UserAppointment::with('clinicAppointment')
            ->when(request('status'), function ($query) {
                return $query->where('status', request('status'));
            })
            ->when(request('clinic'), function ($query) {
                return $query->whereHas('clinicAppointment.clinic', function ($query) {
                    $query->where('name', request('clinic'));
                });
            })
            ->when(request('start_date') && request('end_date'), function ($query) {
                return $query->whereHas('clinicAppointment', function ($query) {
                    $query->whereBetween('date', [request('start_date'), request('end_date')]);
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    
        return view('appointments.booked', compact('appointments', 'clinics'));
    }

    public function updateStatus(Request $request, $appointmentId)
    {
        $appointment = UserAppointment::findOrFail($appointmentId);
        if ($request->status == 'confirmed') {
            $patientExists = Patients::where('id_number', $appointment->id_number)->first();

            if (!$patientExists) {
                $patientData = [
                    'name' => $appointment->name,
                    'id_number' => $appointment->id_number,
                    'dob' => $appointment->dob,
                    'age' => Carbon::parse($appointment->dob)->age,
                    'nationality' => $appointment->nationality,
                    'phone' => $appointment->phone,
                    'email' => '',
                    'insurance_id' => null,
                    'has_insurance' => 'no',
                    'specialization_id' => null,
                    'address' => '',
                ];

                Patients::create($patientData);
            }
        }

        $appointment->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'تم تحديث الحالة بنجاح');
    }
    
    public function doctorAppointments(User $doctor)
    {
        $appointments = UserAppointment::whereHas('clinicAppointment', function ($query) use ($doctor) {
            $query->where('clinic_id', $doctor->clinic_id);
        })
        ->where('status', 'confirmed')
        ->with('clinicAppointment')
        ->orderBy('created_at', 'desc')
        ->get();
    
        return view('clinics.doctor', compact('doctor', 'appointments'));
    }

    public function doctorAppointmentsToday(User $doctor)
    {
        $todayDate = now()->format('Y-m-d');
    
        $appointments = UserAppointment::whereHas('clinicAppointment', function ($query) use ($doctor) {
            $query->where('clinic_id', $doctor->clinic_id);
        })
        ->where('status', 'confirmed')
        ->whereHas('clinicAppointment', function ($query) use ($todayDate) {
            $query->whereDate('date', $todayDate);
        })
        ->with('clinicAppointment')
        ->orderBy('created_at', 'desc')
        ->get();
    
        return view('clinics.today', compact('doctor', 'appointments'));
    }

    public function updateVisit(Request $request, UserAppointment $appointment)
    {
        $request->validate([
            'is_visit' => 'required|boolean',
        ]);
    
        $appointment->update(['is_visit' => $request->is_visit]);
    
        return back()->with('success', 'Visit status updated successfully.');
    }
    
public function patientAppointments(Request $request, User $doctor)
{
    // Retrieve the search input, if any
    $search = $request->input('search'); // This could be an array

    // Base query to fetch patients with their related appointments
    $patientsQuery = Patients::whereHas('userAppointments', function ($query) use ($doctor) {
        // Ensure the appointments belong to the correct doctor/clinic
        $query->whereHas('clinicAppointment', function ($query) use ($doctor) {
            $query->where('clinic_id', $doctor->clinic_id);
        })
        ->where('status', 'confirmed');
    });

    // Apply search filters if search parameters are provided
    if ($search) {
        $patientsQuery->where(function ($query) use ($search) {
            // Handle multiple search fields (name, id_number, etc.) if they are provided
            if (isset($search['name']) && !empty($search['name'])) {
                $query->where('name', 'like', '%' . $search['name'] . '%');
            }

            if (isset($search['id_number']) && !empty($search['id_number'])) {
                $query->orWhere('id_number', 'like', '%' . $search['id_number'] . '%');
            }

            if (isset($search['phone']) && !empty($search['phone'])) {
                $query->orWhere('phone', 'like', '%' . $search['phone'] . '%');
            }

            if (isset($search['blood_type']) && !empty($search['blood_type'])) {
                $query->orWhere('blood_type', 'like', '%' . $search['blood_type'] . '%');
            }

            if (isset($search['nationality']) && !empty($search['nationality'])) {
                $query->orWhere('nationality', 'like', '%' . $search['nationality'] . '%');
            }
        });
    }

    // Get paginated results (10 per page)
    $patients = $patientsQuery->paginate(10);

    // Count the total number of patients
    $patientCount = $patientsQuery->count(); // Get the total count without pagination

    // Return the view with the patients data
    return view('clinics.patient', compact('doctor', 'patients', 'patientCount'));
}

}