<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_see', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('film_id')->unsigned();
            $table->primary(['user_id', 'film_id']);
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('users_see');
    }
}
