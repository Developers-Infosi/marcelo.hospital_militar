<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Report
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->level != 'report'){
            if(Auth::user()->level != 'admin'){
                return redirect()->route('admin.home')->with('NoAuth', '1');
            }
        }
        return $next($request);
    }
}
