<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\DB;
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
                'password_confirmation' => 'required',
                'status' => 'required'
        ]);
        
        
        $user = new user();  // Model Class Object
        $check = DB::table('users')->select('email')->where('email',$request['email'])->get();
        
        $row= count($check);
        if($row == 1){
            $msg=array("msg"=>"<div class='alert alert-success alert-dismissible'>
            Email Already Exists
            <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  </div>");
            return view('home')->with($msg);
        }else{
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = md5($request['password']);
        $user->status = $request['status'];
        $user->save();
        return redirect('/users');
        };

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = md5($request['password']);
        $user->status = $request['status'];
        $user->save();
        
        return redirect('/users');

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
    public function singleUser($id){
        // $user = user::all()->Where('user_id',$id);
        
        $user = DB::table('users')
                    ->select('name','email')
                    ->where('user_id',$id)
                    ->get();
        $rec = compact('user');
        return view('/single-user')->with($rec);
    }
}
