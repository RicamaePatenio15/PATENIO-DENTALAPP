<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role_name');  // NOT nullable
            $table->timestamps();
        });

        // Seed roles right here (optional)
        $roles = [
            ['role_name' => 'Dentist'],
            ['role_name' => 'Dental Staff'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
