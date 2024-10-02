<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminCategoryProductController extends Controller
{
    // Hiển Thị Màn hình Danh Mục
    // : \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    public function showCategory()
    {
        return view('Admin.category.index');
    }

    //Hiển thị màn hình thêm danh mục
    public function showAddCategory()
    {
        return view('Admin.category.create');
    }

    // Hiển Thị màn hình sửa danh mục
    //show giao diện cập nhật danh mục

    public function showEditCategory()
    {    
        return view('Admin.category.update');
    }
}
