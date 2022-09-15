<?php

namespace Tests\Unit;


use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;
use Illuminate\Foundation\Testing\WithFaker;
use Faker\Factory as Faker;
use DB;
use App\User;
use Concerns\InteractsWithDatabase;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\DatabaseTransactions;
$username;

class userRegistrationValidDataTest extends TestCase
{

    use DatabaseTransactions;
    use InteractsWithExceptionHandling;

    public function test_if_users_can_register(){
        
        $this->withoutExceptionHandling();
          
        $response = $this->post('/register',[
            'name'=>"Pal Janos",
            'email'=>"example2@gmail.com",
            'password'=> "password"
        ]);
        $response -> assertStatus(302);     //HTTP_FOUND

        //Azert tarolom egy globalis valtozoba,
        //mert ez a fuggveny utan, a felhasnzalo torlodik az 
        //adatbazisbol a "" use DatabaseTransactions "" miatt;
        
        $GLOBALS['username']= DB::table('users')->where("name","=","Pal Janos")->get()[0]->name;   

        error_log("\n\n         Jelenlegi user neve:  ".$GLOBALS['username']);
    }

    public function test_if_user_are_registered(){
        //le ellenorzom, ha a felhasznalo tarolodik az adatbazisban
        $this->assertEquals($GLOBALS['username'],"Pal Janos"); 
    }
}

