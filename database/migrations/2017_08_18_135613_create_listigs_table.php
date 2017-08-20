<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('address');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('unit')->nullable();
            $table->string('listing_type');
            $table->string('beds_count');
            $table->string('baths_count');
            $table->string('square_feet');
            $table->string('rent');
            $table->string('deposit');
            $table->timestamp('available_date');
            $table->string('lease_length');
            $table->text('description');
            $table->integer('dogs')->nullable();
            $table->integer('cats')->nullable();
            $table->integer('no_pets')->nullable();
            $table->integer('furnished')->nullable();
            $table->integer('no_smocking')->nullable();
            $table->integer('wheelchair')->nullable();
            $table->string('loundry_type');
            $table->string('parking_type');
            $table->string('parking_fee');
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
        Schema::dropIfExists('listings');
    }
}
