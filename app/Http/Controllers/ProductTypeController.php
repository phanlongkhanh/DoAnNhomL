<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function ShowProductType(){
        return view('Admin.producttype.index');
    }

    public function ShowCreateTypeProduct(){
        return view('Admin.producttype.create');
    }

    public function ShowUpdateTypeProduct(){
        return view('Admin.producttype.update');
    }
}
