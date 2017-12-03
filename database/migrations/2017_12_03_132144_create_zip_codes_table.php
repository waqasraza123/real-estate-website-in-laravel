<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateZipCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('create table zip_codes(
              zip_code                  VARCHAR(5)         NOT NULL,
              zip_code_type             VARCHAR(16)        NOT NULL,
              zip_code_primary_city     VARCHAR(255)       NOT NULL,
              zip_code_state            VARCHAR(2)         NOT NULL,
              zip_code_county           VARCHAR(64)                ,
              zip_code_lattitude        DOUBLE             NOT NULL,
              zip_code_longitude        DOUBLE             NOT NULL,
              zip_code_world_region     VARCHAR(64)        NOT NULL,
              zip_code_country_code     VARCHAR(2)         NOT NULL,
              zip_code_active_flag      SMALLINT UNSIGNED  NOT NULL,
              zip_code_population       MEDIUMINT UNSIGNED NOT NULL,
              PRIMARY KEY ( zip_code )
            )');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zip_codes');
    }
}
