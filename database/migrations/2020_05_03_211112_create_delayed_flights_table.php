<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDelayedFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delayed_flights', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('flight_code', 10);
            $table->string('source');
            $table->string('destination');
            $table->string('airline_id');
            $table->date('report_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delayed_flights');
    }
}
