<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TranSportController extends Controller
{
    public function ShowIndexTranSport()
    {
        return view('Admin.transport.index');
    }
    public function ShowCreateTranSport()
    {
        return view('Admin.transport.create');
    }
    public function ShowUpdateTranSport()
    {
        return view('Admin.transport.update');
    }
}
