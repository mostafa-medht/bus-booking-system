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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('start_station_id');
            $table->unsignedBigInteger('end_station_id');

            $table->timestamps();

            $table->foreign('start_station_id')->references('id')->on('stations');
            $table->foreign('end_station_id')->references('id')->on('stations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
