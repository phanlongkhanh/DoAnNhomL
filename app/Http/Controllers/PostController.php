<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function ShowIndexPost() {
        return view('Admin.post.index');
    }

    public function ShowCreatePost() {
        return view('Admin.post.create');
    }

    public function ShowUpdatePost() {
        return view('Admin.post.update');
    }
}