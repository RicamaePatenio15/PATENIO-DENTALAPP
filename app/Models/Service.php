<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // Table name (optional if follows Laravel conventions)
    protected $table = 'services';

    // Mass assignable fields
    protected $fillable = [
        'service_name',
    ];

    // If you want, you can add relationships, e.g., appointments using this service
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
