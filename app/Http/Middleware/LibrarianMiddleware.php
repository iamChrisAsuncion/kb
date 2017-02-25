<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Route;
use Session;
class LibrarianMiddleware
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
         if (Auth::user()->role_id == 'Librarian') {
           return $next($request);
         }
       }

       else {
         return redirect('/home');
       }

     }
}
