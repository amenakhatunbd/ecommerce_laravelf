<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Hash;

class ProfileController extends Controller
{
    function index(){
        return view('admin.profile.index');
    }

    function profilepost(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        $old = Auth::user()->name;
            User::find(Auth::id())->update([
                'name'=>$request->name
            ]);
            return back()->with('profile-update', 'profile update successfully ' .  $old . 'to' . $request->name);
    }
    function profilepassword(Request $request){
      
        $request->validate([
            'old_password'=>'required',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required'

        ]);        
       if($request->old_password == $request->password){
        return back()->withErrors('yore password does not match');
    }
     $old_password_from_user= $request->old_password;
    
     $password_from_user_db= Auth::user()->password;
    if(Hash::check($old_password_from_user, $password_from_user_db)){
User::find(Auth::id())->update ([
    'password'=> Hash::make($request->password)
]);
 }else{
        return back()->withErrors('yore password does not match db password');
    }
    return back()->with('password_change_status', 'Your Password changed successfully');
        // print_r($request->all());
        
        // print-r($request->all());
    }
}
