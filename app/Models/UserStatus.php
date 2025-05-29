<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UserStatus extends Model
{
    use HasFactory;

    protected $fillable = ['status_name'];

    // A UserStatus has many users
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
