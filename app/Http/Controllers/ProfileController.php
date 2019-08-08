<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\BookedVehicle;

class ProfileController extends Controller
{
    public function myprofile(){
        $vehicle = BookedVehicle::with('vehicle')->get();
        $myvehicles = $datas= DB::table('AvailableVehicle')->select()->where('postedby','=', Auth::user()->name )->get();
        $mybookedvehicles = $datas= DB::table('BookedVehicle')->select()->where('bookedby','=', Auth::user()->name )->get();
        
        return view('myprofile', ['myvehicles' => $myvehicles, 'mybookedvehicles' => $mybookedvehicles]);
    }
}