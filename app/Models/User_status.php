<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;

class User_status extends Model
{
    use HasFactory;

    protected $primaryKey = 'status_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status_name',
    ];

    /**
     * Get the users that belong to the status.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'status_id');
    }
}