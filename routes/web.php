<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/mapview', function () {
    return view('mapview');
});

Route::match(['GET','POST'],'/vehiclesearch','VehicleSearchController@search')->name('vehiclesearch');

Route::get('/postvehicle',function(){
    return view('vehiclepost',['messages'=>[]]);
})->name('vehiclepost');

Route::post('/postvehicle','VehiclePostController@postmyvehicle');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/khaltitest', 'KhaltiController@index')->name('khaltitest');

Route::get('/individualpost/{id?}', 'PostController@showprofile')->name('individualpostroute');



