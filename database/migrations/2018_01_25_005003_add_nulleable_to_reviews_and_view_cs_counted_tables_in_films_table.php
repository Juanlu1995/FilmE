<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNulleableToReviewsAndViewCsCountedTablesInFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('films', function (Blueprint $table) {
            $table->integer('reviews_counted')->nullable()->change();
            $table->integer('views_counted')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('films', function (Blueprint $table) {
            $table->integer('reviews_counted')->nullable(false)->change();
            $table->integer('views_counted')->nullable(false)->change();
        });
    }
}
