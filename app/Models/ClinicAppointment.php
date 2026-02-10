<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicAppointment extends Model
{
    use HasFactory;

    protected  $fillable = ['clinic_id', 'date', 'start_time', 'end_time', 'is_booked'];

    public function clinic()
    {
        return  $this->belongsTo(Clinic::class);
    }
    
    public function doctor()
    {
        return $this->belongsTo(User::class, 'user_id'); 
    }

}
