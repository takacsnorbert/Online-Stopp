<?php

namespace Tests\Unit;


use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;
use Illuminate\Foundation\Testing\WithFaker;
use Faker\Factory as Faker;
use DB;
use App\User;
use Concerns\InteractsWithDatabase;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;

class userRegistrationUnvalidDataTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    use DatabaseTransactions;
    use InteractsWithExceptionHandling;

    public function test_if_users_can_register(){
        
        $this->withoutExceptionHandling();
          
        $response = $this->post('/register',[
            'name'=>"janos",
            'email'=>"example2.com",
            'password'=> "password"
        ]);
        $response -> assertStatus(302);     //HTTP_FOUND

        $this -> assertEquals(DB::table('users')
        ->where("name","=","janos")->get()[0]->name,'janos');
        //le ellenorzom, ha a felhasznalo tarolodik az adatbazisban


    }
}




