<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class UserController extends Controller
{

    // Hiển Thị màn hình Mua Hàng
    public function ShowHomePage()
    {
        $users = Auth::check() ? Auth::user()->name : null;
        $products = Product::paginate(8);
        return view('User.crud_user.homepage', compact('users', 'products'));
    }

    public function ShowProductDetails()
    {
        $product = Product::all();
        return view('User.product.details', compact('product'));
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

    public function ShowForgotPassword()
    {
        return view('User.forgot.forgot_user');
    }

    public function ShowUserCategory()
    {
        $products = Product::paginate(9);
        return view('User.category.index', compact('products'));
    }

    public function ShowUserCart()
    {
        $userId = auth()->id();

        $carts = Cart::where('id_user', $userId)->get();

        return view('User.cart.index', compact('carts'));
    }

    public function ShowProductToHomepage()
    {
        $products = Product::all();
        if ($products->isEmpty()) {
            return "Không có sản phẩm nào.";
        }
        return view('User.crud_user.homepage', compact('products'));
    }

}
