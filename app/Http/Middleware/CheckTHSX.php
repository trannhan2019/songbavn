<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class CheckTHSX
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
            if(Auth::user()->role == 1 || Auth::user()->role == 2)
            {
                return $next($request);
            }
            else
            {
                return redirect()->route('sanxuat');
            }
        } else {
            return redirect()->route('dangnhap')->with('thongbao','Bạn chưa đủ quyền hoặc chưa đăng nhập !');
        }
    }
}
