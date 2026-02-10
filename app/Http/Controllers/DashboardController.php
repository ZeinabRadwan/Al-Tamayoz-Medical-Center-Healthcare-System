<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patients;
use App\Models\Message;
use App\Models\Activity;
use App\Models\Billing;
use App\Models\Clinic;
use App\Models\ClinicAppointment;
use App\Models\Department;
use App\Models\Service;
use App\Models\Vacation;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $lastWeek = Carbon::today()->subWeek();

        $todayAppointments = ClinicAppointment::whereDate('created_at', $today)->count();
        $totalPatients = Patients::count();
        $unreadMessages = Message::where('is_read', false)->count();
        $todayRevenue = Billing::whereDate('created_at', $today)->sum('total_amount');


        $totalDepartments = Department::count();
        $totalClinics = Clinic::count();
        $totalServices = Service::count();
        $pendingVacations = Vacation::where('status', 'pending')->count();

        $weeklyStats = [
            'appointments' => ClinicAppointment::whereBetween('created_at', [$lastWeek, $today])->count(),
            'revenue' => Billing::whereBetween('created_at', [$lastWeek, $today])->sum('total_amount'),
            'newPatients' => Patients::whereBetween('created_at', [$lastWeek, $today])->count(),
        ];

        $appointmentTrends = ClinicAppointment::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('count(*) as count')
        )
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('date', 'DESC')
            ->take(30)
            ->get()
            ->reverse();

        $revenueTrends = Billing::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(total_amount) as amount')
        )
            ->groupBy('date')
            ->orderBy('date', 'DESC')
            ->take(30)
            ->get()
            ->reverse();

        $departmentStats = Department::withCount('clinics')
            ->take(5)
            ->get();



        return view('dashboard', compact(
            'todayAppointments',
            'totalPatients',
            'unreadMessages',
            'todayRevenue',
            'totalDepartments',
            'totalClinics',
            'totalServices',
            'pendingVacations',
            'weeklyStats',
            'appointmentTrends',
            'revenueTrends',
            'departmentStats'
        ));
    }
}

