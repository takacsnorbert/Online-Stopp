<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function userUpdate(Request $request){

    //     $userUpdate = [
    //         'name'          =>  $request->name,
    //         'email'         =>  $request->email,
    //         'password'      => $request->password,
    //     ];
    //     // return dd($userUpdate);
    //     DB::table('users')->where('id',Auth::user()->id)->update($userUpdate);
    //     return redirect()->back()->with('userUpdate','.');
    // 
        $user = Auth::user();

        if($request->password == $request->password_confirmation){
            if($user->email != $request->email){
                $attributes = request()->validate([
    
                    'name' => ['string', 'required', 'max:255'],
                    'email' => ['string','required','email','max:255','unique:users,email'],
                    'password' => ['string','required','min:6','max:255','confirmed'],
                ]);
                
            }
            else{
                $attributes = request()->validate([
    
                    'name' => ['string', 'required', 'max:255'],
                    'email' => ['string','required','email','max:255'],
                    'password' => ['string','required','min:6','max:255','confirmed'],
                ]);
            }
    
                
        }
        else{
            
            return redirect()->back()->withErrors('Passwords do not match!');
        }

        $attributes['password'] = bcrypt($request->password);
        
        DB::table('users')->where('id',Auth::user()->id)->update($attributes);
        
        return redirect()->back();
}


    public function userProfile(){

        $user = DB::table('users')->where('id','=',Auth::user()->id)->first();

        return view('pages\user',['user'=>$user]);
    }

}
