<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Http\Controllers;



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

Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@index') -> name('/');


//Home oldal
Route::get('/home', 'App\Http\Controllers\HomeController@index') -> name('home');

Route::get('/welcome', function () {
    if($id = Auth::user()){
        return view('welcome',['name' => $id->name]);
    }
    return view('welcome');
}) -> name('welcome');


Route::get('/login', 'App\Http\Controllers\Auth\LoginController@index') -> name('login');
Route::get('/loginFromRegister', 'App\Http\Controllers\Auth\LoginController@authenticate') -> name('loginFromRegister');
Route::get('/logout', 'App\Http\Controllers\Auth\LogoutController@index') -> name('logout');


Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@index') -> name('register');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register') -> name('registerStore');

//Varosok listazasa
Route::get('/rides', 'App\Http\Controllers\RidesController@index')->name('rides');
Route::post('rideStore', 'App\Http\Controllers\RidesController@store')->name('rideStore');
Route::get('rideStore', 'App\Http\Controllers\RidesController@store')->name('rideStore');

//Varosok listazasa + varosok adatbazis tarolasara van megirva
Route::get('cities', 'App\Http\Controllers\CitiesController@list');
Route::get('/citiesStore', 'App\Http\Controllers\CitiesController@import');

//A mar bejelentkezett USER
Route::get('user',function(){
    return view('pages\user');
})->name('user');


//Create Ride bladre dob
Route::get('createRide',function(){

        $cities = DB::select('select * from cities');
        return view('pages\createRides',['cities' => $cities]);

})->name('create-ride');

//Search Ride bladre dob
Route::get("searchRide",function(){

    $cities = DB::select('select * from cities');
    return view('pages\searchRides')->with('cities',$cities);

})->name('search-ride');

// Elmenti a keresett ut adatait, es ha talal ra mar letrejott utvonalat, kimutassa azt
Route::post('findRides','App\Http\Controllers\RidesController@findRides')->name('findRides');

// Lefoglalja a user altal kivalasztott utvonalat(ha maradnak helyek, tovabbra is foglalhato lesz az ut
// mas userok altal is) 
Route::get('reservationRide{rideID}{reservePlaces}','App\Http\Controllers\RidesController@reservationRide')->name('reservationRide');
Route::post('reservationRideTest','App\Http\Controllers\RidesController@reservationRideTest')->name('reservationRideTest');

    //SIKERTELEN utvonal letrehozasa  
Route::get('redirectFailCreate', 'App\Http\Controllers\redirectBack@FailCreateRide')->name('redirectFailCreate');

    //SIKERES utvonal letrehozasa - Home oldalra kuld
Route::get('redirectSuccess', 'App\Http\Controllers\redirectBack@redirectSuccess')->name('redirectSuccess');

    //SIKERTELEN utvonal foglalasa!
Route::get('redirectFailReserve', 'App\Http\Controllers\redirectBack@FailReserveRide')->name('redirectFailReserve');


    //Sajat letrehozott utvonalak
Route::get('myRides','App\Http\Controllers\RidesController@myRides')->name('myRides');

    //User Profile
Route::get('userProfile','App\Http\Controllers\UserController@userProfile')->name('profile');

    //User Update
Route::patch('userUpdate', 'App\Http\Controllers\UserController@userUpdate')->name('userUpdate');

Route::redirect('','home')->name('redirect');
Route::get('deleteRide{id}', 'App\Http\Controllers\RidesController@deleteRide')->name('deleteRide');


//Ride bladerol Reserve gomb nyomasa
Route::get('reserveRide{ride_id}','App\Http\Controllers\RidesController@reserveRide')->name('reserveRide');

    //Ride settings
Route::get('rideSettings{ride_id}','App\Http\Controllers\RidesController@rideSettings')->name('rideSettings');
Route::patch('rideUpdate{ride_id}', 'App\Http\Controllers\RidesController@rideUpdate')->name('rideUpdate');


//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
