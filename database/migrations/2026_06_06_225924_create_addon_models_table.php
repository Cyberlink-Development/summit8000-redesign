<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cl_trip_addons', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('description')->nullable();

            $table->string('thumbnail')->nullable();
            $table->string('thumbnail_alt')->nullable();

            $table->string('price')->nullable();

            $table->tinyInteger('status')->default(1);

            $table->integer('ordering')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cl_trip_addons');
    }
};
