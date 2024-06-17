<?php

namespace App\Http\Middleware;

use Closure;

class RoleAlumno
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
        if(!auth()->check())
        {
            return redirect('/');
        }
        if(auth()->user()->idRolUsuario === 2)
        {
            return $next($request);
        }
        else
        {
            return redirect('/');
            
        }
    }
}
