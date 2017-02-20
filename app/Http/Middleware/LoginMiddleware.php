<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

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
