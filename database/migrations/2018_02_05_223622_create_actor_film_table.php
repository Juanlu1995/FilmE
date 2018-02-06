<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActorFilmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor_film', function (Blueprint $table) {
            $table->integer('actor_id')->unsigned();
            $table->integer('film_id')->unsigned();

            $table->primary(['actor_id', 'film_id']);

            $table->foreign('actor_id')->references('id')->on('contributes');
            $table->foreign('film_id')->references('id')->on('films');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actor_film');
    }
}
