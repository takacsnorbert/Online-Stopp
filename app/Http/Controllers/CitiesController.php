<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Date;
use Illuminate\Support\Facades\Auth;
use App\City;
use Excel;
use DB;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class CitiesController extends Controller
{
    
  public function list(){
    $cities = DB::select('select * from cities');
    return view('pages\rides',['cities' => $cities]);
  }

  public function import(){

    $file = file('D:\XAMPP\htdocs\StoppUj\ro.csv');

    $data = array_slice($file,1);

    if(count($data) > 0){

      foreach($data as $key => $value){
        $value = preg_split("/[,]/",$value);
        
        $insert_data[] = array(
          'name_ro' => $value[0],
          'name_hu' => '',
          'created_at' => now(),
          'updated_at' => now(),
          'county' => $value[3],
        );

      }

      if(!empty($insert_data)){
        DB::table('cities') -> delete();
        DB::table('cities') -> insert($insert_data);
      }

    }

  }
}
