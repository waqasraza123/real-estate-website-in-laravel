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
            $table->string('wq-street_number' , '190')->nullable();
            $table->string('wq-street_address' , '190')->nullable();
            $table->string('wq-intersection' , '190')->nullable();
            $table->string('wq-administrative_area_level_1' , '190')->nullable()->comment = "states in case of usa";
            $table->string('wq-administrative_area_level_2' , '190')->nullable()->comment = "counties in case of usa";
            $table->string('wq-administrative_area_level_3' , '190')->nullable()->comment = "3rd level civil division in case of usa";
            $table->string('wq-administrative_area_level_4' , '190')->nullable()->comment = "4th level civil division in case of usa";
            $table->string('wq-administrative_area_level_5' , '190')->nullable()->comment = "5th level civil division in case of usa";
            $table->string('wq-route' , '190')->nullable();
            $table->string('wq-neighbourhood' , '190')->nullable();
            $table->string('wq-country' , '190')->nullable();
            $table->string('wq-county' , '190')->nullable();
            $table->string('wq-sublocality' , '190')->nullable();
            $table->string('wq-neighborhood' , '190')->nullable();
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
