<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckIfUserHasSurvey
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

            if (!Auth::user()->educational_attainments()->first() && Auth::user()->isRole('user')) {

                return redirect('survey');

            }

        }

        return $next($request);
    }
}
