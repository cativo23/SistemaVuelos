<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_companies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('company_name');
            $table->string('contact_name');
            $table->string('nic');
            $table->string('nit');

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
        Schema::dropIfExists('client_companies');
    }
}
