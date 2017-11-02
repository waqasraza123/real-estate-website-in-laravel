<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddListingNewFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->string('city')->nullable();
            $table->string('br_le_ye')->nullable();
            $table->string('ev_ye')->nullable();
            $table->string('ba_ye')->nullable();
            $table->string('fo_ye')->nullable();
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
            $table->dropColumn('name')->nullable();
            $table->dropColumn('city')->nullable();
            $table->dropColumn('br_le_ye')->nullable();
            $table->dropColumn('ev_ye')->nullable();
            $table->dropColumn('ba_ye')->nullable();
            $table->dropColumn('fo_ye')->nullable();
        });
    }
}
