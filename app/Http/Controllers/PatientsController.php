<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\InsuranceProvider;
use App\Models\Patients;
use App\Models\UserAppointment;
use App\Models\ClinicAppointment;
use App\Models\Clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Dinushchathurya\NationalityList\Nationality;
use Illuminate\Support\Facades\Auth;
use App\Exports\PatientsExport;
use Maatwebsite\Excel\Facades\Excel;

class PatientsController extends Controller
{
public function index(Request $request)
{
    $search = $request->input('search');
    $perPage = $request->get('perPage', 5);

    // Query for patients based on the search criteria
    $patients = Patients::query();

    if ($search) {
        $patients->where('name', 'like', '%' . $search . '%')
            ->orWhere('id_number', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')
            ->orWhere('blood_type', 'like', '%' . $search . '%')
            ->orWhere('nationality', 'like', '%' . $search . '%');
    }

    // Paginate the results
    $patients = $patients->paginate($perPage);
    $patientCount = Patients::count();

    // If the request is via AJAX, return only the table part
    if ($request->ajax()) {
        return view('patients.partials.table', compact('patients', 'patientCount'));
    }

    return view('patients.index', compact('patients', 'patientCount'));
}



    public function create()
    {
        $insuranceProviders = InsuranceProvider::all();
        $nationalities = Nationality::getNationalities();

        return view('patients.create', compact('insuranceProviders', 'nationalities'));
    }

    public function store(Request  $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'id_number' => 'required|string|unique:patients,id_number',
            'dob' => 'required|date',
            'address' => 'nullable|string',
            'symptoms' => 'nullable|string',
            'blood_type' => 'nullable|string',
            'nationality' => 'required|string',
            'phone' => 'required|string',
            'email' => 'nullable|email|unique:patients,email',
            'insurance_id' => 'nullable|exists:insurance_providers,id|required_if:has_insurance,yes',
            'has_insurance' => 'nullable|string',
                    'gender' => 'nullable|string|in:male,female,other', // example gender validation
        'how_did_you_find_out_about_us' => 'nullable|string|max:255',
        ]);

        $dob = \Carbon\Carbon::parse($request->dob);

        $currentDate = Carbon::now();
        if ($dob->diffInYears($currentDate) < 1) {
            $months = $dob->diffInMonths($currentDate);
            $validated['age'] = ceil($months);
            $validated['age_unit'] = 'شهر';
        } else {
            $years = $dob->diffInYears($currentDate);
            $validated['age'] = $years;
            $validated['age_unit'] = 'سنة';
        }

        $validated['has_insurance'] = $request->has_insurance === 'yes' ? 'yes' : 'no';

        Patients::create($validated);

        return redirect()->route('patients.index')->with('success', 'Patient created successfully');
    }

    public function show(Patients $patient)
    {
        $departments = Department::with('reportTemplates')->get();
        $patient = Patients::find($patient->id);
        $insuranceProviders = InsuranceProvider::all();

        $appointments = UserAppointment::where('user_appointments.id_number', $patient->id_number) 
            ->where('is_visit', 1)
            ->join('clinic_appointments', 'clinic_appointments.id', '=', 'user_appointments.clinic_appointment_id')
            ->join('clinics', 'clinics.id', '=', 'clinic_appointments.clinic_id') 
            ->select(
                'user_appointments.clinic_appointment_id',
                'clinic_appointments.clinic_id',
                'clinic_appointments.date',
                'clinic_appointments.start_time',
                'clinic_appointments.end_time',
                'clinics.name as clinic_name' 
            )
            ->get();


        $user = Auth::user();
        $clinic = $user->clinic;
        $patientId = $patient->id;
        $departments = $clinic && $clinic->department_id ? Department::where('id', $clinic->department_id)->with('reportTemplates')->get() : Department::with('reportTemplates')->get();
        Log::info($departments);
        return view('patients.show', compact('patient', 'insuranceProviders', 'appointments', 'departments', 'patientId'));
    }
    
public function storeDisease(Request $request, $patientId)
{
    // Find the patient
    $patient = Patients::find($patientId);

    // Append the new disease to existing diseases
    $diseases = $patient->diseases ? explode(',', $patient->diseases) : [];
    $diseases[] = $request->input('disease');
    $patient->diseases = implode(',', $diseases);

    // Save the updated patient
    $patient->save();

    // Redirect back with success message
    return redirect()->route('patients.show', $patientId)->with('success', 'تم إضافة المرض بنجاح');
}


    public function edit(Patients $patient)
    {
        $insuranceProviders = InsuranceProvider::all();
        $patient = Patients::find($patient->id);
        $nationalities = Nationality::getNationalities();
        return view('patients.edit', compact('patient', 'insuranceProviders', 'nationalities'));
    }

    public function update(Request $request, Patients $patient)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'id_number' => 'required|string',
            'dob' => 'required|date',
            'address' => 'nullable|string',
            'symptoms' => 'nullable|string',
            'blood_type' => 'nullable|string',
            'nationality' => 'required|string',
            'phone' => 'required|string',
            'email' => 'nullable|email',
            'insurance_id' => 'nullable|exists:insurance_providers,id|required_if:has_insurance,yes',
            'has_insurance' => 'nullable|string',
                    'gender' => 'nullable|string|in:male,female,other', // example gender validation
        'how_did_you_find_out_about_us' => 'nullable|string|max:255',
        ]);


        if (isset($validated['dob'])) {
            $dob = Carbon::parse($validated['dob']);
            if ($dob->isFuture()) {
                return redirect()->back()->withErrors(['dob' => 'Date of birth cannot be in the future.']);
            }

            $currentDate = Carbon::now();
            if ($dob->diffInYears($currentDate) < 1) {
                $months = $dob->diffInMonths($currentDate);
                $validated['age'] = ceil($months);
                $validated['age_unit'] = 'شهر';
            } else {
                $years = $dob->diffInYears($currentDate);
                $validated['age'] = $years;
                $validated['age_unit'] = 'سنة';
            }
        }

        $patient->update($validated);

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully');
    }

    public function destroy(Patients  $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully');
    }

    public function export(Request $request)
    {
        $search = $request->input('search');
        $fileName = 'patients_' . date('Y-m-d_H-i-s') . '.xlsx';
        
        return Excel::download(new PatientsExport($search), $fileName);
    }
}

