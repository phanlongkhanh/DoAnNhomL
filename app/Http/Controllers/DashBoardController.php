<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashBoardController extends Controller
{
   public function ShowIndexDashBoard(){
    return view('Admin.dashboard.index');
   }
<<<<<<< HEAD
=======

   
   public function ShowDashBoard(){
      return view('Admin.dashboard.dashboard');
     }

     
   public function ShowViewDashBoard(){
      return view('Admin.dashboard.view');
     }
>>>>>>> add_dashboard
}
