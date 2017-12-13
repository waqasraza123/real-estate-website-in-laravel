<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ZipCodeController extends Controller
{
    public function insertZipCode(){
        $row = 1;
        if (($handle = fopen ( public_path () . '/zip_codes.csv', 'r' )) !== FALSE) {
            while ( ($data = fgetcsv( $handle, 2000, ',' )) !== FALSE ) {
                if($row != 1){
                    $acceptableCities = explode(',', $data[4]);
                    foreach ($acceptableCities as $acceptableCity){
                        $acceptableCity = trim($acceptableCity);
                        if (!DB::table('zip_codes')->where("zip_code", $data[0])->where('acceptable_city', $acceptableCity)->first()) {
                            DB::table('zip_codes')->insert(
                                [
                                    'zip_code' => $data[0],
                                    'zip_code_primary_city' => $data[3],
                                    'acceptable_city' => $acceptableCity,
                                    'zip_code_state' => $data[6],
                                    'zip_code_county' => $data[7],
                                ]
                            );
                        }
                    }
                }
                $row ++;

            }
            fclose ( $handle );

        }

    }



}
