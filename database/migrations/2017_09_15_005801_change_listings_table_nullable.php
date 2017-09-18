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
        Schema::table('listings', function (Blueprint $table) {
            $table->string('address')->nullable()->change();
            $table->string('listing_type')->nullable()->change();
            $table->string('beds_count')->nullable()->change();
            $table->string('baths_count')->nullable()->change();
            $table->string('square_feet')->nullable()->change();
            $table->string('rent')->nullable()->change();
            $table->string('deposit')->nullable()->change();
            $table->string('lease_length')->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->string('loundry_type')->nullable()->change();
            $table->string('parking_type')->nullable()->change();
            $table->string('parking_fee')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->string('address')->nullable(false)->change();
            $table->string('listing_type')->nullable(false)->change();
            $table->string('beds_count')->nullable(false)->change();
            $table->string('baths_count')->nullable(false)->change();
            $table->string('square_feet')->nullable(false)->change();
            $table->string('rent')->nullable(false)->change();
            $table->string('deposit')->nullable(false)->change();
            $table->string('lease_length')->nullable(false)->change();
            $table->text('description')->nullable(false)->change();
            $table->string('loundry_type')->nullable(false)->change();
            $table->string('parking_type')->nullable(false)->change();
            $table->string('parking_fee')->nullable(false)->change();
    }
}
