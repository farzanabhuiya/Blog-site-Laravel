<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    function showProfile(){
        return view('backend.Profile');
    }

    function updateProfile(Request $request) {
      $request->validate([
        'name' =>'required|max:20',
        'email' =>'required|email|unique:users,email,'.auth()->user()->id,
        ////pic ay size dila dimensions use korta hobe
       // 'profile_img' =>'nullable|mimes:jpg,png|dimensions:max w:200px'

       'profile_img' =>'nullable|mimes:jpg,png'
      ],[
        'name.required' => "Enter your user name"
      ]);

       //data update
      if($request->hasFile('profile_img')){
       $ext = $request->profile_img->extension();
       $image = auth()->user()->name.'-' . Carbon::now()->format('d-m-y-h-m-s'). '.'.$ext;
        //ay code holo sobai dakhta parba.public-store-user
        $request->profile_img->storeAS('users', $image,'public');
        //ay code holo "local"mani private kora sobai dakhta parbe nah.store-app-user ay pic aca
        //$request->profile_img->storeAS('users', $image,'local');
      }

      
          $user = User::find(auth()->user()->id);
          $user->name =$request->name;
          $user->email =$request->email;
          $user->profile_img =$image??null;
          $user->save();
          return back();

    }


    function updatepassword(Request $request){
                      $request->validate([
                        'old' =>"required|current_password",
                        'password' =>"required|confirmed|different:old",
                        'password_confirmation' =>"required",
                      ]);

                  $user = User::find(auth()->user()->id);
                  $user->password = Hash::make($request->password);
                  $user->save();
                  return back();
                      
    }
}
