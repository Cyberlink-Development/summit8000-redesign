<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClTripBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cl_trip_booking', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trip_id');

            
            // Personal Information
            $table->string('title')->nullable();
            $table->string('full_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('nationality')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('passport_expire')->nullable();
            
            // Contact Information
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->string('zip')->nullable();
            
            // Trip Details
            $table->string('trip_start_date')->nullable();
            $table->string('trip_end_date')->nullable();
            $table->string('trip_days')->nullable();
            $table->string('total_travellers')->nullable();

            // Other Information
            $table->string('tshirt_size')->nullable();
            $table->string('medication')->nullable();
            $table->string('restrictions')->nullable();
            $table->string('paid_status')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('hear')->nullable();
            
            // Timestamps and Foreign Key
            $table->timestamps();
            // $table->foreign('trip_id')->references('id')->on('cl_trip_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cl_trip_booking');
    }
}
