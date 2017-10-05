<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFooterContentsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */


    public function up()
    {
        Schema::create('footer_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->text('text')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
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
        Schema::dropIfExists('footer_contents');
    }
}
