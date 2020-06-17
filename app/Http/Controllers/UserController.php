<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Image;
use Storage;
use App\User;

class UserController extends Controller
{
   public function update_user(){
      $user_id = request('user_id');
      $user = User::find($user_id);

      $photo = request('photo');
      $photo_name = '';
      if ($photo != '') {
         $image = Image::make($photo);
         $mime = $image->mime();
         $extension = explode('/', $mime)[1];
         $path = "user_photo/" ;
         if (!is_writable(storage_path('public/'.$path))) {
            Storage::makeDirectory('public/'.$path, true);
         }
         $photo_name = "profile_photo_".substr(time(), 5) . "." . $extension;

         $image->save(storage_path('app/public/'.$path. "/" .$photo_name));
      }else{
         $photo_name = $user->photo;
      }
      $user->update([
         'name' => request('name'),
         'phone' => request('phone'),
         'email' => request('email'),
         'photo' => $photo_name
      ]);

      return response()->json($user);


   }
}
