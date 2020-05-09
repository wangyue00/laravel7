<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
        //guest 用于判断当前用户是否已经通过身份验证
        if(Auth::guard('admin')->guest()){
            return redirect(route('admin.public.login'));
        }
        return $next($request);
    }
}
