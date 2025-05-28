<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User_status;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status_name')->unique()->comment('Name of the status');
            $table->timestamps();
        });

       $usersStatuses = [
    ['status_name' => 'Active', 'created_at' => now(), 'updated_at' => now()],
    ['status_name' => 'Pending', 'created_at' => now(), 'updated_at' => now()],
];

        foreach ($usersStatuses as $status) {
            User_status::create($status);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_statuses');
    }
};
