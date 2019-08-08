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

// Route::get('/mapview', function () {
//     return view('mapview');
// })->middleware('auth');

Route::get('/vehiclesearch',function () {
    return view('vehiclesearch',['querymatchs' =>[]] );
})->name('vehiclesearch')->middleware('auth');

Route::post('/vehiclesearch','VehicleSearchController@search')->middleware('auth');

Route::get('/postvehicle',function(){
    return view('vehiclepost',['messages'=>[]]);
})->name('vehiclepost')->middleware('auth');

Route::post('/postvehicle','VehiclePostController@postmyvehicle')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/khaltitest', 'KhaltiController@index')->name('khaltitest')->middleware('auth');

Route::get('/individualpost/{id?}', 'PostController@showprofile')->name('individualpostroute')->middleware('auth');

Route::get('/myprofile','ProfileController@myprofile')->name('myprofile')->middleware('auth');

Route::get('/postandsearch', function () {
    return view('postandsearch');
})->name('postandsearch')->middleware('auth');

Route::middleware(['auth.superAdmin'])->prefix('admin')->group(function () {
    Route::get('/mapview', 'AdminController@index');
});