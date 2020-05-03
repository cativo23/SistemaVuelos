<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airlines', function (Blueprint $table) {
            $table->timestamps();
            $table->string('code', 3)->primary();
            $table->string('email')->unique();
            $table->string('official_name', 100);
            $table->string('short_name', 20);
            $table->string('representative', 150);
            $table->string('web_page')->nullable()->default(null);
            $table->string('facebook')->nullable()->default(null);
            $table->string('instagram')->nullable()->default(null);
            $table->string('twitter')->nullable()->default(null);
            $table->string('whatsapp')->nullable()->default(null);
            $table->string('origin_country');

            $table->foreign('origin_country')->references('name')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airlines');
    }
}
