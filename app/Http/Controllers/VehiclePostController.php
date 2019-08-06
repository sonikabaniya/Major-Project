<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehiclePostController extends Controller
{
   public function index(Request $request)
   {

    $pickdate = $request->get('pickupdate', null);
    $dropdate = $request->get('dropoffdate', null);
    $vehicleimage = $request->get('vehicleimage', null);
    $desc = $request->get('vehicledescription', null);
    $city =$request->get('city', null);
    $vehicletype =$request->get('vehicletype', null);

    DB::table('AvailableVehicle')->insert(
        ['PickUpDate' => $pickdate, 'DropOffDate' => $dropdate,'Image' => $vehicleimage, 'desc' => $desc,
        'City' => $city, 'VehicleType' => $vehicletype]
    );

    return view('vehiclepost');
   }
}
