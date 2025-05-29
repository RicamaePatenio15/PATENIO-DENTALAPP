<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\UserStatus;  // Make sure model class name matches

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status_name')->unique()->comment('Name of the status');
            $table->timestamps();
        });

        $userStatuses = [
            ['status_name' => 'Active', 'created_at' => now(), 'updated_at' => now()],
            ['status_name' => 'Pending', 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($userStatuses as $status) {
            UserStatus::create($status);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('user_statuses');
    }
};

