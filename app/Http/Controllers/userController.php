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

        //echo "<pre>";
        //print_r($request->all());
    }
    public function Users(){

        $users = user::all();  /// user k model ma users table ka jitna b data ha wo $users ma ly ao
        $all_users = compact('users');
        return view('/users')->with($all_users);
    }
    public function delete($user_id){
        
            // $user_id = user::find($user_id);
            $post = user::Where('user_id',$user_id);
            if(!is_null($post)){
                $post->delete();
            }
            return redirect('users');
    }
}
