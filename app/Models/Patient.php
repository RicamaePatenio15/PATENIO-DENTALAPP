<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    // Table name (optional if it follows Laravel convention)
    protected $table = 'patients';

    // Primary key (optional if 'id', here it's 'patient_id')
    protected $primaryKey = 'patient_id';

    // If your primary key is not an integer or auto-increment, specify these:
    // public $incrementing = true;
    // protected $keyType = 'int';

    // Allow mass assignment on these fields
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone_num',
    ];

    // Relationships

    // If patient belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // If patient has many appointments
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id', 'patient_id');
    }
}
