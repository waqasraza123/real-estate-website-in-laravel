<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddListingsOptionsToListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->string('washer_dryer')->nullable();
            $table->string('washer_dryer_hockups')->nullable();
            $table->string('onsite_laundry')->nullable();
            $table->string(' fitness_center')->nullable();
            $table->string(' pool')->nullable();
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
            $table->dropColumn('washer_dryer');
            $table->dropColumn('washer_dryer_hockups');
            $table->dropColumn('onsite_laundry');
            $table->dropColumn(' fitness_center');
            $table->dropColumn(' pool');
        });
    }
}
