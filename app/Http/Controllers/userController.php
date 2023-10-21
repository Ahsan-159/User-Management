<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class userController extends Controller
{
    public function UserForm(){
        return view('home');
    }
    public function registration(request $request){
        
        $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required | confirmed',
                'password_confirmation' => 'required'
        ]);
        
        $user = new user();

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = md5($request['password']);
        $user->save();
        
        return redirect('/user-registration');


        echo "<pre>";
        print_r($request->all());
    }
}
