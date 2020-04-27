<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('arrival_date');
            $table->time('arrival_time');
            $table->date('departure_date');
            $table->time('departure_time');
            $table->string('origin');
            $table->string('destination');
            $table->string('code');
            $table->decimal('cost', 10, 2);
            $table->decimal('price', 10, 2);
            $table->decimal('distance_miles', 10, 2);
            $table->integer('flight_miles');
            $table->string('status');
            $table->decimal('duration', 10, 2);
            $table->unsignedBigInteger('landing_gateway_id');
            $table->unsignedBigInteger('arrival_gateway_id');

            $table->foreign('landing_gateway_id')->references('id')->on('gateways');
            $table->foreign('arrival_gateway_id')->references('id')->on('gateways');
            $table->foreignId('airplane_id')->constrained();
            $table->foreignId('itinerary_id')->constrained();
            $table->foreignId('airline_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
}
