<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // for auth
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // optional, if you use Sanctum
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'role_id',
        'status_id',
        'first_name',
        'last_name',
        'email',
        'phone_num',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relationships

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function status()
    {
        return $this->belongsTo(UserStatus::class, 'status_id');
    }

    public function appointmentsCreated() // dental staff who booked the appointment
    {
        return $this->hasMany(Appointment::class, 'user_id');
    }

    public function dentistAppointments() // user as dentist assigned to appointment
    {
        return $this->hasMany(Appointment::class, 'dentist_id');
    }

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }


}
