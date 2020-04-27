<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirlineAirplaneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airline_airplane', function (Blueprint $table) {
            $table->id();
            $table->timestamps();


            $table->foreignId('airplane_id')->constrained();
            $table->foreignId('airline')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airline_airplane');
    }
}
