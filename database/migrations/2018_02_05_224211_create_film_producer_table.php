<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmProducerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_producer', function (Blueprint $table) {
            $table->integer('film_id')->unsigned();
            $table->integer('producer_id')->unsigned();

            $table->primary(['film_id', 'producer_id']);

            $table->foreign('film_id')->references('id')->on('films');
            $table->foreign('producer_id')->references('id')->on('producers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('film_producer');
    }
}
