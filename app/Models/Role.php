<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Table name is 'roles' by default, so no need to specify unless different

    // Mass assignable attributes
    protected $fillable = [
        'role_name',
    ];

    // Relationships (if needed)
    // A Role has many Users
    public function users()
    {
        return $this->hasMany(User::class);
    }
}

