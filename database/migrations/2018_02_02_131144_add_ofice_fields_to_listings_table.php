<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOficeFieldsToListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->integer('office')->nullable();
            $table->integer('crimes')->nullable();
            $table->integer('justi')->nullable();
            $table->integer('victim')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->dropColumn('office')->nullable();
            $table->dropColumn('crimes')->nullable();
            $table->dropColumn('justi')->nullable();
            $table->dropColumn('victim')->nullable();
        });
    }
}
