<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class redirectBack extends Controller
{
    public function FailCreateRide(){
        $url = url()->previous();
        $url = explode('/',$url);

        return redirect()->route(end($url));
    }

    public function redirectSuccess(){
        return redirect()->route('home');
    }

    public function FailReserveRide(){

        $cities = DB::select('select * from cities');

        return view('pages\searchRides',['cities'=>$cities]);
    }


}
