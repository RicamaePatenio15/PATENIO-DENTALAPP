<?php

use App\Models\Dentist;
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
        Schema::create('dentists', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->timestamps();
        });

       $dentists = [
    ['first_name' => 'Rica', 'last_name' => 'Patenio', 'created_at' => now(), 'updated_at' => now()],
    ['first_name' => 'Emmanuel', 'last_name' => 'Bas', 'created_at' => now(), 'updated_at' => now()],
    ['first_name' => 'Emmy', 'last_name' => 'Smith', 'created_at' => now(), 'updated_at' => now()],
];

        foreach ($dentists as $key => $dentist) {
            Dentist::create($dentist);
    }
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dentists');
    }
};
