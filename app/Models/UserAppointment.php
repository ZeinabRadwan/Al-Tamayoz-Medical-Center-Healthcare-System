<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'clinic_appointment_id', 'name', 'id_number', 'phone', 'nationality', 'dob', 'gender', 'status', 'is_visit',
    ];

public function clinicAppointment()
{
    return $this->belongsTo(ClinicAppointment::class);
}

public function patient()
{
    return $this->belongsTo(Patients::class, 'id_number', 'id_number');
}

}
