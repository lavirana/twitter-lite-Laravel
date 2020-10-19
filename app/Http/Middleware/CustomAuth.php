<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class CustomAuth
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
        
        $path = $request->path();
        if(($path == "admin/login") && Session::get('users')){
            return redirect('admin/home');
        }
        elseif(($path != "admin/login") && !Session::get('users')){
            return redirect('admin/login');
        }
        return $next($request);
    }
}
