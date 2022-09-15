<?php

use Tests\TestCase;
//use Illuminate\Foundation\Testing\DatabaseTransactions;
//use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Foundation\Testing\WithFaker;
use Faker\Factory as Faker;

use App\User;
//use Concerns\InteractsWithDatabase;
use App\Http\Controllers\Auth\RidesController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;

class ridesTest extends TestCase
{
    use InteractsWithExceptionHandling;

    public function test_if_ride_store_in_database()
    {

        $this->withoutExceptionHandling();


        //Login az elso regisztralt szemelyeben
        $user = $this->post("/login",[
            'email' => "asdasd@asd.asd",
            'password' => "asdasdasd"
        ]);

        $user -> assertStatus(302); //HTTP_FOUND
        
        
        // Csak ugy tudok utvonalat letrehozni, ha be vagyok JELENTKEZVE(Azert jelenkezek be)
        $ride = $this->post("/rideStore",[
            'user_id' => DB::table('users')->get()[0]->id,
            'start_date' => date('y-m-d'),
            'places' => 4,
            'price' => 25,
            'start_city' => 5,
            'finish_city' => 15,
            'comment' => "Jobb mint a vonattal"
        ]);
        
        $ride -> assertStatus(200); //

        //Kiirom a letrehozott utvanalat
       error_log("\n\n LETREHOZOTT UTVONAL\n\n".DB::table('rides') 
       -> where("user_id","=",DB::table('users')->get()[0]->id)->get()."\n\n");
        
        
    }
        //Magamnak le szeretnek foglalni egy helyet
    public function test_if_user_can_reserve_ride(){

        $this->withoutExceptionHandling();

        //Mindig beallitom a helyek szamat 4-re, Hogy ahanyszor 
        //tesztelek legyen elerheto a maximalis helyek szama amiket lehet foglalni
        DB::table('rides')->where("id",17)->update(['places' => 4]);

        //Ujra loginolok egy masik szemelykent
        $user = $this->post("/login",[
            'email' => "taki@asd.asd",
            'password' => "asdasdasd"
        ]);

        $user -> assertStatus(302);

        //a fentebb letrehozott utvonalat tesztelem
        //le kerem az az utvonal ID-at amelyik Bukarestbol megy Kolozsvarra   17-es IDtol 2-esIDig
        //URL-ben 17-es ID-u utvonalnal, 2 helyet foglaltam le(/...172)

        error_log("Foglalas elott "     .DB::table('rides') -> where('id',17)->get('places'));
        $reserveRide = $this->get('/reservationRide172');

        $reserveRide -> assertStatus(200);
        error_log("2 hely lefoglalasa utana "     .DB::table('rides') -> where('id',17)->get('places'));

        
    }
}
