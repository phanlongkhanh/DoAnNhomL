<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    // Hiển thị màn hình Index sản phẩm
    public function ShowIndexProduct()
    {     
        return view('Admin.product.index');
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
