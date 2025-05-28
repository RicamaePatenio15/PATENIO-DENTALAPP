<?php

use App\Models\Patient;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id('patient_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone_num');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        $patients = [
            [
                'user_id' => null,
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'phone_num' => '1234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => null,
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'email' => 'jane.smith@example.com',
                'phone_num' => '9876543210',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        foreach ($patients as $patient) {
            Patient::create($patient);
        }
    }

    public function down(): void { 
        Schema::dropIfExists('patients'); 
    } 
};
