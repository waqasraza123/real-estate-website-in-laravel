<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ZipCodeController extends Controller
{
    public function insertZipCode(){
        $row = 1;
        if (($handle = fopen ( public_path () . '/zip_codes.csv', 'r' )) !== FALSE) {
            while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
                if($row != 1){
                    if(!DB::table('zip_codes')->where("zip_code", $data[0])->first())
                    \DB::table('zip_codes')->insert(
                        [
                            'zip_code' => $data[0],
                            'zip_code_type' =>$data[1],
                            'zip_code_primary_city' =>$data[2],
                            'zip_code_state' =>$data[3],
                            'zip_code_county' =>$data[4],
                            'zip_code_lattitude' =>$data[5],
                            'zip_code_longitude' =>$data[6],
                            'zip_code_world_region' =>$data[7],
                            'zip_code_country_code' =>$data[8],
                            'zip_code_active_flag' =>$data[9],
                            'zip_code_population' =>$data[10],
                        ]
                    );
                }
                $row ++;

            }
            fclose ( $handle );

        }

    }



}
