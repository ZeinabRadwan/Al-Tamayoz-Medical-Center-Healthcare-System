<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Clinic;
use App\Models\ClinicAppointment;
use Carbon\Carbon;

class GenerateClinicAppointments extends Command
{
    protected $signature = 'generate:clinic-appointments';
    protected $description = 'Generate monthly clinic appointments based on work_days';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $startDate = Carbon::now()->startOfMonth(); 
        $endDate = Carbon::now()->endOfMonth(); 

        // Fetch all clinics
        $clinics = Clinic::all();

        foreach ($clinics as $clinic) {
            $workDays = json_decode($clinic->work_days, true); 
            $sessionDuration = $clinic->session_duration;

            // Get the earliest start time and latest end time from ClinicAppointment table for this clinic
            $clinicStartTime = ClinicAppointment::where('clinic_id', $clinic->id)->min('start_time');
            $clinicEndTime = ClinicAppointment::where('clinic_id', $clinic->id)->max('end_time');

            // Ensure valid start and end times exist
            if (!$clinicStartTime || !$clinicEndTime) {
                $this->warn("No start or end time found for Clinic ID: {$clinic->id}. Skipping.");
                continue;
            }

            $clinicStartTime = Carbon::parse($clinicStartTime);
            $clinicEndTime = Carbon::parse($clinicEndTime);

            // Loop through each day in the month
            for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
                // Check if the current day is a clinic's workday
                if (in_array($date->locale('ar')->isoFormat('dddd'), $workDays)) {
                    $fromTime = $clinicStartTime->copy(); 

                    // Generate time slots dynamically
                    while ($fromTime->lt($clinicEndTime)) {
                        $endTime = $fromTime->copy()->addMinutes($sessionDuration);

                        if ($endTime->lte($clinicEndTime)) {
                            ClinicAppointment::updateOrCreate([
                                'clinic_id' => $clinic->id,
                                'date' => $date->toDateString(),
                                'start_time' => $fromTime->format('H:i:s'),
                                'end_time' => $endTime->format('H:i:s'),
                            ], [
                                'is_booked' => false,
                            ]);
                        }

                        $fromTime->addMinutes($sessionDuration);
                    }
                }
            }
        }

        $this->info('Clinic appointments generated successfully!');
    }

}
