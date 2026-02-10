<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'session_duration',
        'department_id',
        'visit_price',
        'work_days',
        'from',           
        'to',             
        'gap_duration',   
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function users()
    {
        return $this->hasMany(User::class, 'clinic_id');  
    }

    public function appointments()
    {
        return $this->hasMany(ClinicAppointment::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
