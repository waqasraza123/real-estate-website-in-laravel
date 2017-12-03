<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoreAddressColumnsInListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->string('wq-street_number')->nullable();
            $table->string('wq-street_address')->nullable();
            $table->string('wq-intersection')->nullable();
            $table->string('wq-administrative_area_level_1')->nullable()->comment = "states in case of usa";
            $table->string('wq-administrative_area_level_2')->nullable()->comment = "counties in case of usa";
            $table->string('wq-administrative_area_level_3')->nullable()->comment = "3rd level civil division in case of usa";
            $table->string('wq-administrative_area_level_4')->nullable()->comment = "4th level civil division in case of usa";
            $table->string('wq-administrative_area_level_5')->nullable()->comment = "5th level civil division in case of usa";
            $table->string('wq-route')->nullable();
            $table->string('wq-neighbourhood')->nullable();
            $table->string('wq-country')->nullable();
            $table->string('wq-county')->nullable();
            $table->string('wq-sublocality')->nullable();
            $table->string('wq-neighborhood')->nullable();
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
            //
        });
    }
}
