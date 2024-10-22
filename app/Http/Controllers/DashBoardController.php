<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashBoardController extends Controller
{
   public function ShowIndexDashBoard(){
    return view('Admin.dashboard.index');
   }

   
   public function ShowDashBoard(){
      return view('Admin.dashboard.dashboard');
     }

     
   public function ShowViewDashBoard(){
      return view('Admin.dashboard.view');
     }
}
