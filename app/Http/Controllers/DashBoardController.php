<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashBoardController extends Controller
{
   public function ShowIndexDashBoard(){
    return view('Admin.dashboard.index');
   }
}
