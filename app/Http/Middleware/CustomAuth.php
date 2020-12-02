<?php

namespace App\Http\Middleware;

use Closure;
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
	    $path=$request->path();
		if($path=='/' && $request->session()->get('user'))
		{
			return redirect('dashboard');
		}
		else if($path!='/' && !$request->session()->get('user'))
		{
			return redirect('/');
		}
        return $next($request);
    }
}
