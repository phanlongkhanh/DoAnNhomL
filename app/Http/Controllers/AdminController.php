<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Hiển Thị màn hình quản lý
    public function ShowDashBoardAdmin()
    { 
    if (Auth::check()) {
        $user = Auth::user(); 
        return view('ControllerAdmin.dashboard_admin', compact('user')); 
    } else {
        return redirect()->route('login');
    }
    }


}
