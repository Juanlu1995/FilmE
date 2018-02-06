<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyNationalityIdToContributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contributes', function (Blueprint $table) {
            $table->integer('nationality_id')->unsigned();
            $table->foreign('nationality_id')->references('id')->on('nationalities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contributes', function (Blueprint $table) {
            $table->dropForeign('contributes_nationality_id_foreign');
            $table->dropColumn('nationalty_id');
        });
    }
}
