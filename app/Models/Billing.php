<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'doctor_id2',
        'doctor_id3',
        'doctor_id4',
        'clinic_services',
        'total_amount',
        'paid_amount',
        'payment_method',
        'payments',
        'qr',
        'hash',
        'zatca_status',
        'type_tax',
        'type_code',
        'uuid',
        'zatca_errors',
        'returned_id',
        'is_returned',
    ];

    protected $casts = [
        'clinic_services' => 'array',
        'payments' => 'array',
        'zatca_errors' => 'array',
    ];

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function doctor2()
    {
        return $this->belongsTo(User::class, 'doctor_id2');
    }

    public function doctor3()
    {
        return $this->belongsTo(User::class, 'doctor_id3');
    }

    public function doctor4()
    {
        return $this->belongsTo(User::class, 'doctor_id4');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function clinic_services()
    {
        return $this->hasMany(ClinicService::class);
    }
}
