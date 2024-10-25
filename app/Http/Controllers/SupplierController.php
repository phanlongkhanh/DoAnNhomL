<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function ShowIndexSuppliers()
    {
        return view('Admin.suppliers.index');
    }
    public function ShowCreateSuppliers()
    {
        return view('Admin.suppliers.create');
    }
    public function ShowUpdateSuppliers()
    {
        return view('Admin.suppliers.update');
    }
}
