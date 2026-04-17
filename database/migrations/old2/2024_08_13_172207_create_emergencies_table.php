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
        Schema::create('emergencies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id')->nullable();
            $table->string('emergency_fullname')->nullable();
            $table->string('emergency_relation')->nullable();
            $table->string('emergency_phone_no')->nullable();
            $table->string('emergency_email')->nullable();
            $table->string('emergency_address')->nullable();
            $table->string('emergency_zip')->nullable();
            $table->string('emergency_country')->nullable();
            $table->timestamps();
            $table->foreign('booking_id')->references('id')->on('cl_trip_booking');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergencies');
    }
};
