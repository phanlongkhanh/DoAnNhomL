<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{

    // Hiển Thị màn hình Mua Hàng
    public function ShowHomePage()
    {
        $users = Auth::check() ? Auth::user()->name : null;
        return view('User.crud_user.homepage',compact('users'));
    }

    public function ShowProductDetails()
    {
        $users = Auth::check() ? Auth::user()->name : null;
        return view('User.product.details',compact('users'));
    }

    // Hiển Thị Trang Đăng Nhập
    public function ShowUserLogin()
    {
        return view('User.crud_user.login_user');
    }

    // Hiển Thị Trang Đăng Ký
    public function ShowUserRegister()
    {
        return view('User.crud_user.register_user');
    }

    public function ShowForgotPassword(){
        return view('User.forgot.forgot_user');
    }

    public function ShowUserCategory(){
        return view('User.category.index');
    }

    public function ShowUserCart(){
        return view('User.cart.index');
    }

 
}
