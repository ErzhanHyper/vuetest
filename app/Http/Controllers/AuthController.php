<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use DB;
use Image;
use Storage;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{

   public function login(Request $request){
      $credentials = $request->only('email', 'password');

      if (Auth::attempt($credentials)) {
         return response()->json(Auth::user());
      }

   }


   public function register(Request $request){

      $this->validate($request, [
         'name' => 'required|string|max:255',
         'email' => 'required|string|email|max:255|unique:users',
         'password' => 'required|string|min:2|confirmed',
      ]);
      $user = User::create([
         'name' => request('name'),
         'email' => request('email'),
         'password' => bcrypt(request('password'))
      ]);


      Auth::login($user, true);

      return response()->json(Auth::user());
   }


   public function logout(Request $request){
      // Auth::logout();
      $this->performLogout($request);
   }


   public function getUser(){
      return auth()->user();
   }

}
