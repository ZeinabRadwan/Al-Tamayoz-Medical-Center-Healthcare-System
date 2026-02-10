<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $fillable = [
        'name',
        'id_number',
        'dob',
        'age',
        'age_unit',
        'address',
        'symptoms',
        'blood_type',
        'nationality',
        'phone',
        'email',
        'insurance_id',
        'has_insurance',
        'specialization_id',
        'diseases', 
        'gender',
        'how_did_you_find_out_about_us',
    ];

    public function feeScoreReports()
    {
        return $this->hasMany(FeeScoreReport::class);
    }

    public function dldReports()
    {
        return $this->hasMany(DldReport::class);
    }

    public function billings()
    {
        return $this->hasMany(Billing::class, 'patient_id');
    }
    
    public function userAppointments()
    {
        return $this->hasMany(UserAppointment::class, 'id_number', 'id_number');
    }

    // Accessor for the 'diseases' attribute
    public function getDiseasesAttribute($value)
    {
        return $value ? explode(',', $value) : [];
    }
    
    public function followUpReports()
    {
        return $this->hasMany(FollowUpReport::class);
    }
}
