<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ride;
use DB;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\User;
use App\rideTest;
use App\Http\Controllers\Session;
use Illuminate\Support\ViewErrorBag;
use App\Http\Controllers\Carbon;
use App\Http\Controllers\Controller;

class RidesController extends Controller
{


    public function index(Request $request){
        if(Auth::user()){
            
            $rides = DB::table('rides')->get();
            $cities = DB::select("SELECT * FROM cities");
            $users = DB::select("SELECT * FROM users");
            

            $rides = $rides ->where('start_time','>=',date('Y-m-d'))->where('user_id','!=',Auth::user()->id)->sortBy('start_time');
            //dd($rides);
            return view('pages\rides',['rides' => $rides, 'cities' => $cities, 'users'=> $users, 'needPlaces'=> $request->places]);
        }

        return view('pages\logOrreg');
    }

    // Letrehozott utvonal mentese databasebe
    protected function store(Request $request){
        
            if(isset($request->start_city)){
                
                $user_id = DB::table('rides')->where('user_id',Auth::user()->id)->pluck('user_id')->first();
                $start_time = DB::table('rides')->where([['user_id',Auth::user()->id],['start_city_id',$request -> start_city],['finish_city_id',$request -> finish_city], ['start_time',$request -> start_date]])->pluck('start_time')->first();
                $request -> places ? $places = DB::table('rides')->where('user_id',Auth::user()->id)->where('places',$request -> places)->pluck('places')->first() : $request->places = 0;
                $request -> price ? $prices = DB::table('rides')->where('user_id',Auth::user()->id)->where('prices',$request -> price)->pluck('prices')->first() : $prices = 0;
                $request -> comment ? $comment =DB::table('rides')->where('user_id',Auth::user()->id)->where('comment',$request -> comment)->pluck('comment')->first() : $comment = '';
                $start_city_id =DB::table('rides')->where('user_id',Auth::user()->id)->where('start_city_id',$request -> start_city)->pluck('start_city_id')->first();
                $finish_city_id =DB::table('rides')->where('user_id',Auth::user()->id)->where('finish_city_id',$request -> finish_city)->pluck('finish_city_id')->first();
    
                if($user_id === null){
                    
                    $ride = array(
                    
                        'created_at' => now(),
                        'updated_at' =>	 now(),
                        'user_id' => Auth::user()->id,
                        'start_time' =>	$request -> start_date,
                        'places' => $request->places,
                        'prices' => $request -> price,
                        'comment' => $request -> comment,
                        'start_city_id' => $request -> start_city,
                        'finish_city_id' => $request -> finish_city,
                    );
            
                }
                else{
                    if($start_time === null || $places === null || $prices === null || $comment === null || $start_city_id === null || $finish_city_id === null){
                    
                        $ride = array(
                    
                            'created_at' => now(),
                            'updated_at' =>	 now(),
                            'user_id' => Auth::user()->id,
                            'start_time' =>	$request -> start_date,
                            'places' => $request->places,
                            'prices' => $request -> price,
                            'comment' => $request -> comment,
                            'start_city_id' => $request -> start_city,
                            'finish_city_id' => $request -> finish_city,
                        );
    
                    }
                    else{
                        return view('pages/successfulCreatedRide') ->with('msgNotCreate', 'Route already created!');
                        //return redirect()->back()->withErrors('msgNotCreate', 'Route already created!');
                    }
                }
                DB::table('rides') -> insert($ride);
                return view('pages/successfulCreatedRide');
    
            }


            return redirect()->route('create-ride');

            
    }

    public function findRides(Request $request){


        // $tableRide = DB::select("SELECT * FROM rides WHERE
        //     start_city_id = $request->start_city_find
        //     AND
        //     finish_city_id = $request->finish_city_find
        
        // ");

            $array = array(
                'created_at' => now(),
                'updated_at' =>	 now(),
                'user_id' => Auth::user()->id,
                'start_city_id' => $request->start_city_find,
                'finish_city_id' => $request->finish_city_find,
                'start_time' => $request->start_date,
                'places' => $request->places,
            );
    
            DB::table('required_rides')->insert($array);
            
    
            $tableRide = DB::table('rides')->where('start_city_id','=',$request->start_city_find)->where('finish_city_id', '=', $request->finish_city_find)->get();
            
            if($request->start_date != null){
                $tableRide = $tableRide->where('start_time','<=',$request->start_date);
            }
            else
                $tableRide = $tableRide->where('start_time','>=',date('Y-m-d'));
                
            if($request->places != null){
                $tableRide = $tableRide->where('places','>=',$request->places);
            }
    
            $tableRide = $tableRide ->where('user_id','!=',Auth::user()->id)->sortBy('start_time');
            
    
            $cities = DB::select("SELECT * FROM cities");
            $users = DB::select("SELECT * FROM users");
    
            return view('pages\findRides',['rides' => $tableRide,'cities' =>$cities, 'needPlaces'=> $request->places, 'users'=> $users]);


        
    }

    public function reservationRide($rideID, $reservePlaces){
        
        $ride = DB::table('rides')->where('id','=',$rideID)->get();
        

        if($ride[0]->places - $reservePlaces >= 0){
            $ride[0]->places = $ride[0]->places - $reservePlaces;
            DB::table('rides')->where('id','=',$rideID)->update((array)$ride[0]);
            return view('pages\reservationRide',['msgSuccess'=>'Road reservation was successful']);
            
        }
        else{
            return view('pages\reservationRide')->withErrors('Road reservation failed');
            
        }
        
    }


    public function myRides(){
        $user = Auth::user();

        $rides = DB::table('rides')->where('user_id','=',$user->id)->get();
        $rides = $rides ->where('start_time','>=',date('Y-m-d'));


        $cities = DB::select("SELECT * FROM cities");
        $users = DB::select("SELECT * FROM users");
            


        return view('pages\myRides',['rides' =>$rides, 'users'=>$users,'cities'=>$cities]);

    }


    public function deleteRide($id){
        DB::table('rides')->where('id','=',$id)->delete();

        return redirect()->back();
    }

    public function reserveRide(Request $request, $ride_id){

        $ride = DB::table('rides')->where('id','=',$ride_id)->get();

        $places = $ride[0]->places;

        return view('pages\searchRides',['start_city_id' => $request ->start_city_id, 'start_city_name' => $request ->start_city_name,
        'finish_city_id' => $request->finish_city_id, 'finish_city_name' => $request->finish_city_name,
        'start_date' => $request->ride_date, 'maxplaces' => $places])->withErrors('reserve', 'Foglalas');
    }

        // Ride settings bladre dob, change settings
    public function rideSettings($rideID){

        $ride = DB::table('rides')->where('id','=',$rideID)->get();
        $user = DB::table('users')->where('id','=',Auth::user()->id)->get();
        $cities = DB::table('cities')->get();
        $startcity = DB::table('cities')->where('id','=',$ride[0]->start_city_id)->get();
        $finishcity =DB::table('cities')->where('id','=',$ride[0]->finish_city_id)->get();

        return view('pages\rideSettings',['cities'=>$cities,'ride'=>$ride, 'user'=>$user, 'startcity'=>$startcity[0], 'finishcity'=>$finishcity[0]]);
    }

    public $timestamps = false;

    public function rideUpdate(Request $request, $rideID){
        $attributes = ([
            'user_id' => Auth::user()->id,
            'start_time' => $request->date,
            'places' => $request->free_places,
            'prices' => $request->travel_expenses,
            'start_city_id' => $request->start,
            'finish_city_id' => $request->finish,
        ]);


        DB::table('rides')->where('id','=',$rideID)->update($attributes);

        $attributes = ([
            'name' => $request->name,
        ]);

        DB::table('users')->where('id','=',Auth::user()->id)->update($attributes);
        return redirect()->back();
    }

}
