<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    // Hiển Thị màn hình Mua Hàng
    public function ShowHomePage()
    {
        return view('User.homepage');
    }

    // Hiển Thị Trang Đăng Nhập
    public function ShowUserLogin()
    {
        return view('User.login_user');
    }

    // Hiển Thị Trang Đăng Ký
    public function ShowUserRegister()
    {
        return view('User.register_user');
    }


}
