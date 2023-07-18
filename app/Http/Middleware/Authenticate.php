<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
//use Illuminate\Auth\Middleware\Authenticate as Middleware;
class Authenticate 
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
   /* protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
	*/
	  public function handle(Request $request, Closure $next)
    {
        if(!session()->has('auth'))
        {
            return redirect('admin/login')->with('fail','you must be logged in');
      
        }
        return $next($request);
	}
}
