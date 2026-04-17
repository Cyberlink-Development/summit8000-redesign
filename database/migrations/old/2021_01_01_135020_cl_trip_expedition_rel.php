<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClTripExpeditionRel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cl_trip_expedition_rel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('trip_id');
            $table->integer('expedition_id');    
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
        Schema::dropIfExists('cl_trip_expedition_rel');
    }
}
