<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Image;
use Storage;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

  public function __construct()
  {
    $this->middleware('login');
  }
    public function account()    {
          return view('change.account');
        }
    public function accountUpdate(Request $request){
      $profile = Auth::user();
      $id = Auth::user()->id;
      if (Hash::check($request->password, $profile->password))
    {
    $this->validate($request, [
      'phone' => "required|unique:users,id_number,$id",
      'email' => "required|email|max:191|unique:users,id_number,$id",

    ]);
      $profile = Auth::user();
      $profile->phone = $request->input('phone');
      $profile->email = $request->input('email');


      $profile->save();
      Session::flash('Success', 'Profile has been successfully updated');
        return redirect()->route('settings.account');
    }
    else {
      Session::flash('Failed', 'The password does not match the record');
      return redirect()->route('settings.account');
    }
    }

  public function password()
  {
    return view('change.password');
  }
  public function passwordUpdate(Request $request)
  {

    if (Hash::check($request->old_password, Auth::user()->password))
        {
              $this->validate($request, [
                'password' => 'required|confirmed|min:6',

              ]);
    Auth::user()->password = bcrypt($request->input('password'));
    Auth::user()->update = 1;

    Auth::user()->save();
    $request->session()->forget('password');
    Session::flash('Success', 'Password has been successfully updated');
    return redirect()->route('home');
  }
  else {
    Session::flash('Failed', 'The password does not match the record');
    return redirect()->route('settings.password');
  }
  }
}
