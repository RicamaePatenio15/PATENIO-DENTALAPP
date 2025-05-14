<?php

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dentist_id')->nullable()->constrained('dentists')->onDelete('cascade');
            $table->foreignId('roles_id')->constrained('roles')->onDelete('cascade');
            $table->foreignId('status_id')->nullable();
            $table->string('first_name', 150);
            $table->string('last_name', 150);
            $table->string('email', 200)->unique();
            $table->string('phone_num', 15)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
