<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function showprofile($id){
        $datas= DB::table('AvailableVehicle')->select()->where('productid','=',$id)->first();
        return view('individualpost',["querymatchs" => $datas]);
    }
}