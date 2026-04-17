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
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id')->nullable();
            $table->string('insurance_company')->nullable();
            $table->string('insurance_phone')->nullable();
            $table->string('policy_no')->nullable();
            $table->timestamps();
            $table->foreign('booking_id')->references('id')->on('cl_trip_booking');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurances');
    }
};
