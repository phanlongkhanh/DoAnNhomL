<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Hiển Thị màn hình quản lý
    public function ShowDashBoardAdmin()
    {
        return view('ControllerAdmin.dashboard_admin');
    }


}
