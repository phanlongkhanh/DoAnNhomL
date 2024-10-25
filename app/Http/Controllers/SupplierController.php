<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Suppliers;
use App\Models\ProductType;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;


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
