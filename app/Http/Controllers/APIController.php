<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class APIController extends Controller
{
    public function updatelocation($lat, $long){

        $location = [
                'lat'=> $lat,
                'long'=> $long
            ];
        
    return $location;
    }
}