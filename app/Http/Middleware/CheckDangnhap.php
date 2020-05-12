<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class CheckDangnhap
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
            return $next($request);
        } else {
            return redirect()->route('dangnhap')->with('thongbao','Xin đăng nhập hoặc đăng ký tài khoản để truy cập !');
        }
        
        
    }
}
