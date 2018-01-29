<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUniqueFeaturesToListingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->string('yard')->nullable();
            $table->string('hard_floor')->nullable();
            $table->string('wal_closet')->nullable();
            $table->string('updated_kitchen')->nullable();
            $table->string('close_public')->nullable();
            $table->string('dog_park')->nullable();
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
            $table->dropColumn('yard')->nullable();
            $table->dropColumn('hard_floor')->nullable();
            $table->dropColumn('wal_closet')->nullable();
            $table->dropColumn('updated_kitchen')->nullable();
            $table->dropColumn('close_public')->nullable();
            $table->dropColumn('dog_park')->nullable();
        });
    }
}
