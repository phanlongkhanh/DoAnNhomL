<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    // Hiển thị màn hình Index sản phẩm
    public function ShowIndexProduct()
    {    
        $users = User::all();
        return view('Admin.product.index',compact('users'));
    }

    // Hiển thị màn hình thêm sản phẩm
    public function ShowCreateProduct()
    {
        return view('Admin.product.create');
    }

    // Hiển thị màn hình chỉnh sửa sản phẩm
    public function ShowUpdateProduct()
    {
        return view('Admin.product.update');
    }

    
}
