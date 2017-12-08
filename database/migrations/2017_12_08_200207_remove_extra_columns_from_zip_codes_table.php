<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveExtraColumnsFromZipCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('zip_codes', function (Blueprint $table) {
            $table->dropColumn(['zip_code_type', 'zip_code_lattitude', 'zip_code_longitude', 'zip_code_world_region', 'zip_code_country_code', 'zip_code_active_flag', 'zip_code_population']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('zip_codess', function (Blueprint $table) {
            //
        });
    }
}
