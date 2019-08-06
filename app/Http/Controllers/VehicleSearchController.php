<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VehicleSearchController extends Controller
{
    public function search(Request $request){
        $dropdate = $request->get('dropoffdate', null);
        $pickdate = $request->get('pickupdate', null);
        $city = $request->get('city', null);
        $vehicletype = $request->get('vehicletype', null);

        $querymatchs = DB::table('AvailableVehicle')->select()->where('City','=',$city)->get();
        return view('vehiclesearch',['querymatchs' => $querymatchs]);
    }
}