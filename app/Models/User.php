<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected  $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'id_number',
        'dob',
        'age',
        'address',
        'qualification',
        'major',
        'job_title',
        'start_date',
        'phone',
        'salary_rate',
        'department_id',
        'clinic_id',
        'is_active',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected  $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function department()
    {
        return  $this->belongsTo(Department::class);
    }

    public function clinic()
    {
        return  $this->belongsTo(Clinic::class);
    }
    
    public function appointments()
    {
        return $this->hasManyThrough(UserAppointment::class, ClinicAppointment::class, 'doctor_id', 'clinic_appointment_id');
    }
}
