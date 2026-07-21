<?php

namespace Tests\Feature;

use App\Models\Clinic;
use App\Models\Department;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class IntegrationServicesApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_returns_a_unified_services_payload(): void
    {
        $department = Department::create([
            'name' => 'Rehabilitation',
        ]);

        $clinic = Clinic::create([
            'name' => 'General Internal Medicine',
            'session_duration' => 30,
            'department_id' => $department->id,
            'visit_price' => 300,
            'work_days' => json_encode(['monday', 'wednesday']),
            'from' => '09:00:00',
            'to' => '17:00:00',
            'gap_duration' => 15,
        ]);

        DB::table('clinic_appointments')->insert([
            'clinic_id' => $clinic->id,
            'date' => now()->toDateString(),
            'start_time' => '09:00:00',
            'end_time' => '09:30:00',
            'is_booked' => false,
            'name' => 'Available Slot',
            'id_number' => '1234567890',
            'phone' => '0500000000',
            'nationality' => 'SA',
            'dob' => '1990-01-01',
            'gender' => 'male',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Service::create([
            'name' => 'CBC Lab Test',
            'price' => 120,
            'department_id' => $department->id,
        ]);

        $response = $this->getJson('/api/v1/integrations/services');

        $response->assertOk()
            ->assertJson([
                'success' => true,
            ])
            ->assertJsonCount(3, 'data')
            ->assertJsonFragment([
                'sku' => sprintf('DEP-%04d', $department->id),
                'category' => 'Department',
                'unit' => 'Service',
                'active' => true,
            ])
            ->assertJsonFragment([
                'sku' => sprintf('CLN-%04d', $clinic->id),
                'category' => 'Clinic',
                'price' => 300.0,
                'available' => true,
            ])
            ->assertJsonFragment([
                'category' => 'Laboratory',
                'price' => 120.0,
            ]);
    }

    public function test_it_supports_pagination_and_filters(): void
    {
        $department = Department::create([
            'name' => 'Diagnostics',
        ]);

        $firstClinic = Clinic::create([
            'name' => 'Neurology Clinic',
            'session_duration' => 30,
            'department_id' => $department->id,
            'visit_price' => 400,
            'work_days' => json_encode(['sunday']),
            'from' => '10:00:00',
            'to' => '13:00:00',
            'gap_duration' => 10,
        ]);

        $secondClinic = Clinic::create([
            'name' => 'Cardiology Clinic',
            'session_duration' => 30,
            'department_id' => $department->id,
            'visit_price' => 500,
            'work_days' => json_encode(['monday']),
            'from' => '10:00:00',
            'to' => '13:00:00',
            'gap_duration' => 10,
        ]);

        DB::table('clinic_appointments')->insert([
            [
                'clinic_id' => $firstClinic->id,
                'date' => now()->toDateString(),
                'start_time' => '10:00:00',
                'end_time' => '10:30:00',
                'is_booked' => false,
                'name' => 'Open Slot',
                'id_number' => '1111111111',
                'phone' => '0500000001',
                'nationality' => 'SA',
                'dob' => '1990-01-01',
                'gender' => 'female',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'clinic_id' => $secondClinic->id,
                'date' => now()->toDateString(),
                'start_time' => '11:00:00',
                'end_time' => '11:30:00',
                'is_booked' => true,
                'name' => 'Booked Slot',
                'id_number' => '2222222222',
                'phone' => '0500000002',
                'nationality' => 'SA',
                'dob' => '1991-01-01',
                'gender' => 'male',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $response = $this->getJson('/api/v1/integrations/services?category=Clinic&available=true&search=Neuro&paginate=true&per_page=1');

        $response->assertOk()
            ->assertJson([
                'success' => true,
                'meta' => [
                    'current_page' => 1,
                    'last_page' => 1,
                    'per_page' => 1,
                    'total' => 1,
                ],
            ])
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment([
                'sku' => sprintf('CLN-%04d', $firstClinic->id),
                'name_en' => 'Neurology Clinic',
                'available' => true,
            ])
            ->assertJsonMissing([
                'sku' => sprintf('CLN-%04d', $secondClinic->id),
            ]);
    }
}
