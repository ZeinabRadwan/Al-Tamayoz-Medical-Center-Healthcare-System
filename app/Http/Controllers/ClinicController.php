<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\Clinic;
use App\Models\ClinicAppointment;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClinicController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        if ($user->hasRole('أخصائي')) {
            return redirect()->route('clinics.showstaff', $user->clinic_id);
        }

        $search = $request->get('search');

        $clinics = Clinic::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->paginate(10);

        $totalClinics = Clinic::count();
        $averageVisitPrice = Clinic::average('visit_price');
        $clinicsPerDepartment = Department::withCount('clinics')->get();

        return view('clinics.index', compact('clinics', 'totalClinics', 'averageVisitPrice', 'clinicsPerDepartment'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('clinics.create', compact('departments'));
    }

    public function show(Clinic $clinic)
    {
        $appointments = $clinic->appointments()->orderBy('date')->orderBy('start_time')->get();
        return view('clinics.show', compact('clinic', 'appointments'));
    }

    public function showStaff(Clinic $clinic)
    {
        $user = auth()->user();

        if ($user->hasRole('أخصائي') && $user->clinic_id != $clinic->id) {
            return redirect()->route('clinics.showstaff', $user->clinic_id);
        }

        $doctors = $clinic->users()->get();

        return view('clinics.showstaff', compact('clinic', 'doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'session_duration' => 'required|integer',
            'department_id' => 'required|exists:departments,id',
            'visit_price' => 'required|numeric',
            'work_days' => 'required|array',
            'work_days.*' => 'string|in:السبت,الأحد,الاثنين,الثلاثاء,الأربعاء,الخميس,الجمعة',
        ]);

        $clinicData = $request->all();
        $clinicData['work_days'] = json_encode($request->work_days);

        $clinic = Clinic::create($clinicData);
        return redirect()->route('clinics.show', $clinic->id)->with('success', 'تم إنشاء العيادة بنجاح!');
    }

    public function update(Request $request, Clinic $clinic)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'session_duration' => 'required|integer',
            'department_id' => 'required|exists:departments,id',
            'visit_price' => 'required|numeric',
            'work_days' => 'required|array',
            'work_days.*' => 'string|in:السبت,الأحد,الاثنين,الثلاثاء,الأربعاء,الخميس,الجمعة',
        ]);

        $clinicData = $request->all();
        $clinicData['work_days'] = json_encode($request->work_days);
        $clinic->update($clinicData);

        return redirect()->route('clinics.index')->with('success', 'تم تحديث العيادة بنجاح!');
    }

    public function destroy(Clinic $clinic)
    {
        $clinic->delete();
        return redirect()->route('clinics.index')->with('success', 'تم حذف العيادة بنجاح!');
    }

    public function generateAppointments(Request $request, Clinic $clinic)
    {
        $request->validate([
            'periods' => 'required|array|min:1',
        ]);

        ClinicAppointment::where('clinic_id', $clinic->id)->delete();
        $clinic->update([
            'gap_duration' => $request->input('gap_duration', 0),
        ]);

        $sessionDuration = $clinic->session_duration;
        $workDays = json_decode($clinic->work_days, true);

        if (empty($workDays)) {
            return redirect()->back()->withErrors('لم يتم تعريف أيام العمل لهذه العيادة.');
        }

        $dayMap = [
            'السبت' => 'Saturday',
            'الأحد' => 'Sunday',
            'الاثنين' => 'Monday',
            'الثلاثاء' => 'Tuesday',
            'الأربعاء' => 'Wednesday',
            'الخميس' => 'Thursday',
            'الجمعة' => 'Friday',
        ];

        $workingDays = array_map(fn($day) => $dayMap[$day], $workDays);
        $startDate = Carbon::now();
        $endDate = $startDate->copy()->addYear();
        $appointments = [];
        $datePeriod = CarbonPeriod::create($startDate, '1 day', $endDate);

        foreach ($datePeriod as $date) {
            if (in_array($date->englishDayOfWeek, $workingDays)) {
                foreach ($request->input('periods') as $period) {
                    $fromTime = Carbon::createFromFormat('H:i', $period['from']);
                    $toTime = Carbon::createFromFormat('H:i', $period['to']);
                    $gapDuration = $period['gap_duration'] ?? 0;  // Use custom gap duration for this period

                    $current = $fromTime->copy();
                    while ($current->lt($toTime)) {
                        $end = $current->copy()->addMinutes($sessionDuration);
                        if ($end->lte($toTime)) {
                            $appointments[] = [
                                'clinic_id' => $clinic->id,
                                'date' => $date->format('Y-m-d'),
                                'start_time' => $current->format('h:i A'),
                                'end_time' => $end->format('h:i A'),
                                'created_at' => now(),
                                'updated_at' => now(),
                            ];
                        }
                        $current->addMinutes($sessionDuration + $gapDuration);
                    }
                }
            }
        }

        ClinicAppointment::insertOrIgnore($appointments);

        return redirect()->route('clinics.show', $clinic)->with('success', 'تم إنشاء المواعيد بنجاح!');
    }

    public function edit(Clinic $clinic)
    {
        $departments = Department::all();
        return view('clinics.edit', compact('clinic', 'departments'));
    }

    public function appointmentsIndex(Request $request)
    {
        $clinics = Clinic::all();
        $query = ClinicAppointment::with('clinic');

        if ($request->has('clinic_id') && $request->clinic_id != '') {
            $query->where('clinic_id', $request->clinic_id);
        }

        if ($request->has('status') && $request->status != '') {
            $isBooked = $request->status == 'booked';
            $query->where('is_booked', $isBooked);
        }

        $appointments = $query->orderBy('date')->orderBy('start_time')->get();

        $appointmentsByMonth = $appointments->groupBy(function ($appointment) {
            return \Carbon\Carbon::parse($appointment->date)->format('F Y');
        });

        return view('appointments.index', compact('appointmentsByMonth', 'clinics'));
    }
}

