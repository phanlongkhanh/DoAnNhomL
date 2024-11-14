<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkAccountStatus
{
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra nếu người dùng đã đăng nhập và tài khoản bị khóa
        if (Auth::check() && !Auth::user()->checkactive) {
            Auth::logout(); // Đăng xuất người dùng
            return redirect()->route('login')->withErrors(['account_locked' => 'Tài khoản của bạn đã bị khóa.']);
        }

        return $next($request);
    }
}
