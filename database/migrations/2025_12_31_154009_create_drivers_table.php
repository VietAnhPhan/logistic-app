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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();

            // 1. Driver Personal Information
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->date('date_of_birth')->nullable();
            $table->string('address')->nullable();
            $table->string('photo')->nullable();
            $table->string('national_id_number')->unique();

            // 2. Driver License and Vehicle Information
            $table->string('license_number')->unique();
            $table->date('license_expiry_date');
            $table->string('vehicle_type');
            $table->string('vehicle_plate_number')->unique();

            $table->foreignId('role_id')->constrained('roles')->default(2); // Default to 'driver' role
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
