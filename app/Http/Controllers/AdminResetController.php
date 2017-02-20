<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Session;
use App\User;
use Redirect;
class AdminResetController extends Controller
{

    public function sendReset(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        $message = 'Password Token has been successfully sent to '.$request->email;
        Session::flash('Success', $message);
        return Redirect::back();
    }
    public function broker()
    {
        return Password::broker();
    }
    public function __construct()
    {
      $this->middleware('admin');
    }
  }
