<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class AccountController extends Controller
{
    public function ShowAccount() {
        $users = User::all();
        $roles = Role::all();
        return view('Admin.account.index',compact('users','roles'));
    }
}
