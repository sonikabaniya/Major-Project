<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehiclePostController extends Controller
{
   public function postmyvehicle(Request $request)
   {
    $message =[];
    try{
    $pickdate = $request->get('pickupdate', null);
    $dropdate = $request->get('dropoffdate', null);
    $vehicleimage = $request->get('vehicleimage', null);
    $desc = $request->get('vehicledescription', null);
    $city =$request->get('city', null);
    $vehicletype =$request->get('vehicletype', null);
    $price =$request->get('price', null);
    

    $update = DB::table('AvailableVehicle')->insert(
        ['PickUpDate' => $pickdate, 'DropOffDate' => $dropdate,'Image' => $vehicleimage, 'desc' => $desc,
        'City' => $city, 'VehicleType' => $vehicletype, 'Price' => $price]
    );

    if($update ){
        $message = "Your vehicle posted successfully!!";
    }

    return view('vehiclepost', ['messages'=> $message]);
    }

    catch(Exception $e){
        return view('vehiclepost');
    }
   }
}
