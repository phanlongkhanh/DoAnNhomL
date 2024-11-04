<?php

namespace App\Http\Controllers;

use App\Models\ListPost;
use Illuminate\Http\Request;

class CategoryPostController extends Controller
{
    public function ShowIndexCategoryPost() {
        $listposts = ListPost::all();
        return view('Admin.post_category.index',compact('listposts'));
    }

    public function ShowCreateCategoryPost() {
        return view('Admin.post_category.create');
    }

    public function ShowUpdateCategoryPost() {
        return view('Admin.post_category.update');
    }
}
