<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Session;
use Route;
use Request;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if (Auth::check()) {
          $path = 'settings.password.update'.'/'.Auth::user()->id;
        if (Auth::user()->update == '0') {
          Session::flash('password', 'Please update your password');
        }


      if (Auth::user()->role_id == 'Disabled') {
        return redirect()->route('disabled');
      }

       else{
        return $next($request);
      }
    }
      else {
        return redirect()->route('login');
      }
    }
}
