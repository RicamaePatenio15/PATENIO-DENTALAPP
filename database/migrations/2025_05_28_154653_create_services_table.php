<?php

use App\Models\Service;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name');
            $table->timestamps();
        });

        $services = [
            ['service_name' => 'Consultation'],
            ['service_name' => 'Teeth Cleaning'],
            ['service_name' => 'X-Ray'],
            ['service_name' => 'Fillings'],
            ['service_name' => 'Root Canal Treatment'],
            ['service_name' => 'Tooth Extraction'],
            ['service_name' => 'Orthodontics'],
            ['service_name' => 'Cosmetic Dentistry'],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
