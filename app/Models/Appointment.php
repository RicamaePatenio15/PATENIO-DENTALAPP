<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'patient_id',
        'dentist_id',
        'service_id',
        'appointment_date',
        'appointment_time',
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}

?>