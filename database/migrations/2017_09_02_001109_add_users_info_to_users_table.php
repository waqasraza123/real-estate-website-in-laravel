<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersInfoToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('state')->nullable();
            $table->integer('dogs')->nullable();
            $table->integer('cats')->nullable();
            $table->integer('other')->nullable();
            $table->string('city')->nullable();
            $table->timestamp('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->string('status')->nullable();
            $table->string('range')->nullable();
            $table->string('children')->nullable();
            $table->string('avatar')->nullable();
            $table->string('google_link')->nullable();
            $table->string('facebook_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('state');
            $table->dropColumn('dogs');
            $table->dropColumn('cats');
            $table->dropColumn('other');
            $table->dropColumn('city');
            $table->dropColumn('birthday');
            $table->dropColumn('gender');
            $table->dropColumn('status');
            $table->dropColumn('range');
            $table->dropColumn('children');
        });
    }
}
