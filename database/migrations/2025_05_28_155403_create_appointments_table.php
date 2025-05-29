<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id('appointment_id');

            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('dentist_id');  // references users.id where role = dentist
            $table->unsignedBigInteger('user_id');     // references users.id (dental staff who booked)
            $table->unsignedBigInteger('service_id');
            $table->date('date');
            $table->time('time');
            $table->timestamps();

            $table->foreign('patient_id')->references('patient_id')->on('patients')->onDelete('cascade');

            // dentist_id references users.id (dentists)
            $table->foreign('dentist_id')->references('id')->on('users')->onDelete('cascade');

            // user_id references users.id (dental staff)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
