<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
            $table->foreignId('status_id')->constrained('user_statuses')->onDelete('cascade');
            $table->foreignId('dentist_id')->nullable()->constrained('dentists')->onDelete('set null');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->nullable();
            $table->string('phone_num');
            $table->timestamps();
        });

        // Insert default users
        $users = [
            [
                'dentist_id' => null,
                'role_id' => 1, // admin
                'status_id' => 1, // active
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'phone_num' => '1234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dentist_id' => null,
                'role_id' => 2, // dentist
                'status_id' => 1, // active
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'email' => 'jane.smith@example.com',
                'phone_num' => '9876543210',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};