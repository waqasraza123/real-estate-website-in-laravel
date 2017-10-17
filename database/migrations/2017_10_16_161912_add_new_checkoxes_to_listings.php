<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewCheckoxesToListings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->string('broken_lease')->nullable();
            $table->string('eviction')->nullable();
            $table->string('misdemeanor')->nullable();
            $table->string('falonies')->nullable();
            $table->string('section_8')->nullable();
            $table->string('hud')->nullable();
            $table->string('income_r')->nullable();
            $table->string('bankruptcy')->nullable();
            $table->string('foreclosure')->nullable();
            $table->string('credit')->nullable();
            $table->string('move_in')->nullable();
            $table->string('possession')->nullable();
            $table->string('possession_w')->nullable();
            $table->string('assault')->nullable();
            $table->string('herassment')->nullable();
            $table->string('theft_of')->nullable();
            $table->string('dwi')->nullable();
            $table->string('dui')->nullable();
            $table->string('disorderly')->nullable();
            $table->string('theft')->nullable();
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
            $table->dropColumn('broken_lease')->nullable();
            $table->dropColumn('eviction')->nullable();
            $table->dropColumn('misdemeanor')->nullable();
            $table->dropColumn('falonies')->nullable();
            $table->dropColumn('section_8')->nullable();
            $table->dropColumn('hud')->nullable();
            $table->dropColumn('income_r')->nullable();
            $table->dropColumn('bankruptcy')->nullable();
            $table->dropColumn('foreclosure')->nullable();
            $table->dropColumn('credit')->nullable();
            $table->dropColumn('move_in')->nullable();
            $table->dropColumn('possession')->nullable();
            $table->dropColumn('possession_w')->nullable();
            $table->dropColumn('assault')->nullable();
            $table->dropColumn('herassment')->nullable();
            $table->dropColumn('theft_of')->nullable();
            $table->dropColumn('dwi')->nullable();
            $table->dropColumn('dui')->nullable();
            $table->dropColumn('disorderly')->nullable();
            $table->dropColumn('theft')->nullable();
        });
    }
}
