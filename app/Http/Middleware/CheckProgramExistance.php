<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Program;

class CheckProgramExistance
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
        if(Program::all()->count() > 0) {
            return $next($request);
        } else {
            return response(view('errors.no-program'));
        }
    }
}
