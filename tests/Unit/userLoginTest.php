<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;
use Illuminate\Foundation\Testing\WithFaker;
use Faker\Factory as Faker;

use App\User;
use Concerns\InteractsWithDatabase;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;

$username;

class userLoginTest extends TestCase
{

    use DatabaseTransactions;
    use InteractsWithExceptionHandling;
    
    /**
     * A basic unit test example.
     *
     * @return void
     */
    

    public function test_if_users_can_login()
    {
        $this->withoutExceptionHandling();
        
        $user = new User;
        $user->name = "tesztelo1";
        $user->email = "teszt@teszt.com";
        $user->password = "password";
        $user->save();

        $response = $this->post("/login",[
            'email' => "teszt@teszt.com",
            'password' => "password"
        ]);

        $response->assertStatus(302);   //HTTP_FOUND
        $GLOBALS['username'] = Auth::user()->name;
        
    }

    public function test_if_login_happend(){
        //megnezem, ha tenyleg sikerult a login
        $this->assertEquals($GLOBALS['username'],"tesztelo1");    
    }
}
