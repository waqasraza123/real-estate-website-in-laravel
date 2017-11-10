<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingPropertisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing_properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('listing_id');
            $table->string('listing_type')->nullable();
            $table->string('beds_count')->nullable();
            $table->string('baths_count')->nullable();
            $table->string('square_feet')->nullable();
            $table->string('rent')->nullable();
            $table->string('deposit')->nullable();
            $table->timestamp('available_date')->nullable();
            $table->string('lease_length')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listing_properties');
    }
}
