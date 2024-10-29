<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryPostController extends Controller
{
    public function ShowIndexCategoryPost() {
        return view('Admin.post_category.index');
    }

    public function ShowCreateCategoryPost() {
        return view('Admin.post_category.create');
    }

    public function ShowUpdateCategoryPost() {
        return view('Admin.post_category.update');
    }
}
