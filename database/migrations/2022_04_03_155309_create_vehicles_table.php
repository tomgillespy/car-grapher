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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('make_id');
            $table->unsignedInteger('model_id');
            $table->string('service_id');
            $table->string('image_url');
            $table->string('summary')->nullable();
            $table->string('headline')->nullable();
            $table->integer('year')->nullable();
            $table->integer('mileage')->nullable();
            $table->integer('fuel_type')->nullable();
            $table->string('capacity')->nullable();
            $table->string('power')->nullable();
            $table->string('transmission')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
};
