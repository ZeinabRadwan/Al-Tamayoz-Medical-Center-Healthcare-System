<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowUpReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id', 'report_title', 'current_day', 'current_date', 'session_proceedings'
    ];

    protected $casts = [
        'current_day' => 'datetime',
    ];

    public function patient()
    {
        return  $this->belongsTo(Patients::class);
    }
}
