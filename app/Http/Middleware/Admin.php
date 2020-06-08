<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Admin
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
        if(!Auth::check()) {
            return redirect()->back();
        }else{
            $adminRole = Auth::user()->role()->pluck('name');
            if ($adminRole->contains('admin')) {
                return $next($request);
            }
        }
    }
}
