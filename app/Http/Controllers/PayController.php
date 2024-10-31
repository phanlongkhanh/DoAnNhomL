<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayController extends Controller
{
    public function ShowPayIndex(){
        return view('User.pay.index');
    }
}
