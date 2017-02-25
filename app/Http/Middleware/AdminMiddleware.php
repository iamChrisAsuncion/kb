<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Auth;
use Route;

class AdminMiddleware
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
        if (Auth::user()->update == '0') {
          Session::flash('password', 'Please update your password');
        }
        if (Auth::user()->role_id == 'Disabled') {
          return redirect()->route('disabled');
        }
        if (Auth::user()->role_id == 'Admin') {
          return $next($request);
        }

      }
      else {
        return redirect('/home');
      }

    }
}
