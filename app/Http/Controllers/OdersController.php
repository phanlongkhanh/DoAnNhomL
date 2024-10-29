<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OdersController extends Controller
{
    public function ShowIndexOders(){
        return view('Admin.oders.index');
    }

    public function ShowViewOders(){
        return view('Admin.oders.view');
    }
}
