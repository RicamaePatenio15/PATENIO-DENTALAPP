<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;

class Role extends Model
{
    use HasFactory;

    protected $primaryKey = 'roles_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'roles_name',
    ];

    /**
     * Get the users that belong to the role.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'roles_id');
    }
}