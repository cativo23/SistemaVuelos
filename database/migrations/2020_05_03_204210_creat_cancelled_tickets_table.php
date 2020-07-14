<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatCancelledTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancelled_tickets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->decimal('surcharge', 10, 2);
            $table->unsignedBigInteger('cancelled_ticket');

            $table->foreign('cancelled_ticket')->references('id')->on('tickets')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cancelled_tickets');
    }
}
