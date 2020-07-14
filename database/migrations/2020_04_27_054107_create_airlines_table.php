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
            $table->id();
            $table->timestamps();
            $table->string('code')->unique();
            $table->string('email')->unique();
            $table->string('official_name');
            $table->string('short_name');
            $table->string('origin_country');
            $table->string('representative');
            $table->string('web_page')->nullable()->default(null);
            $table->string('facebook')->nullable()->default(null);
            $table->string('instagram')->nullable()->default(null);
            $table->string('twitter')->nullable()->default(null);
            $table->string('whatsapp')->nullable()->default(null);
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
