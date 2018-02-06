<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectorFilmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('director_film', function (Blueprint $table) {
            $table->integer('director_id')->unsigned();
            $table->integer('film_id')->unsigned();

            $table->primary(['director_id', 'film_id']);

            $table->foreign('director_id')->references('id')->on('contributes');
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
