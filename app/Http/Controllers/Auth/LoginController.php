<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;

class LoginController extends Controller
{
   /*
   |--------------------------------------------------------------------------
   | Login Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles authenticating users for the application and
   | redirecting them to your home screen. The controller uses a trait
   | to conveniently provide its functionality to your applications.
   |
   */
   use AuthenticatesUsers {
     logout as performLogout;
   }


   /**
   * Where to redirect users after login.
   *
   * @var string
   */
   protected $redirectTo = RouteServiceProvider::HOME;

   /**
   * Create a new controller instance.
   *
   * @return void
   */
   public function __construct()
   {
      $this->middleware('guest')->except('logout');
   }

   protected function authenticated(Request $request)
   {
      return response()->json(Auth::user());
   }


   public function register(Request $request)
   {
      // $this->validator($request->all())->validate();
      // event(new Registered($user = $this->create($request->all())));
      // $this->guard()->login($user);
      // // assign  endcustomer role
      // return $user;
   }


   public function logout(Request $request)
   {
      $this->performLogout($request);
      // return redirect('/');
   }

}
