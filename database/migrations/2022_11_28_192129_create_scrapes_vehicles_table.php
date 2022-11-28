<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scrape_vehicle', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scrape_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->timestamps();

            $table->foreign('scrape_id')->references('id')->on('scrapes');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scrape_vehicle');
    }
};
