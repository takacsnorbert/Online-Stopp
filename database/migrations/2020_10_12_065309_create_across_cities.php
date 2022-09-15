<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcrossCities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('across_cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('city_id');
            $table->integer('ride_id');
            $table->integer('sequence');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('across_cities');
    }
}
