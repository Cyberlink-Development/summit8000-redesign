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
            $table->bigIncrements('id');
            $table->integer('trip_id');
            $table->string('title')->nullable();
            $table->string('full_name')->nullable();
            $table->string('country')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('arrival_date')->nullable();
            $table->string('depature_date')->nullable();
            $table->string('reference')->nullable();
            $table->text('comments')->nullable();
            $table->boolean('terms_conditions')->default(1)->nullable();
            $table->boolean('status')->default(1)->nullable();
            $table->timestamps();
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
