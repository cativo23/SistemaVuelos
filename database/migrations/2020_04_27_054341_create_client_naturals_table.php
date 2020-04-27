<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientNaturalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_naturals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('direction');
            $table->string('document_typ');
            $table->string('document_num');
            $table->date('birthday');
            $table->string('gender');
            $table->string('marital_status');


            $table->foreign('id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_naturals');
    }
}
