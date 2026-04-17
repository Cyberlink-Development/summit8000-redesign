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
        Schema::create('flight_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id')->nullable();
            $table->string('airline_name')->nullable();
            $table->string('airline_no')->nullable();
            $table->string('arrival_from')->nullable();
            $table->string('arrival_date')->nullable();
            $table->string('arrival_time')->nullable();
            $table->string('departure_airline_name')->nullable();
            $table->string('departure_airline_no')->nullable();
            $table->string('departure_from')->nullable();
            $table->string('departure_date')->nullable();
            $table->string('departure_time')->nullable();
            $table->timestamps();
            $table->foreign('booking_id')->references('id')->on('cl_trip_booking');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flight_details');
    }
};
