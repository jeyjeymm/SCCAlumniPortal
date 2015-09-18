<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckIfAdminOrEditor
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
        
        if(Auth::check()) {

            if(Auth::user()->role->name === 'admin' || Auth::user()->role->name === 'editor') {
                
                return $next($request);

            } else {

                return response('Unauthorized.', 401);

            }

        } else {

            return redirect('auth/login');

        }

    }
}
