<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role == 'user'){
            if (auth()->user()->role == 'admin') {
                return redirect()->route('login')->with('failed', 'Bạn không có quyền truy cập');
            }
    
        }
        return $next($request);
    }
}
