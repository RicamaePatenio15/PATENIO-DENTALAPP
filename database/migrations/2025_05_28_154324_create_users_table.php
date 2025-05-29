<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
            $table->foreignId('status_id')->constrained('user_statuses')->onDelete('cascade');
            // Removed dentist_id
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique()->nullable();
            $table->string('phone_num');
            $table->string('password'); // NOT nullable
            $table->rememberToken();
            $table->timestamps();
        });

        // Insert default users
        $users = [
            [
                'role_id' => 1, // Dentist (verify role IDs in your roles table)
                'status_id' => 1, // Active
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'phone_num' => '1234567890',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_id' => 2, // Dental Staff
                'status_id' => 1, // Active
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'email' => 'jane.smith@example.com',
                'phone_num' => '9876543210',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
