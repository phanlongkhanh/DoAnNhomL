<?php

namespace App\Http\Controllers;
use App\Models\Pay;
use App\Models\Order;
use App\Models\Product;
use App\Models\Suppliers;
use App\Models\ProductType;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;

class DashBoardController extends Controller
{
   public function ShowIndexDashBoard()
   {

      $user = auth()->user();

      if (!$user || $user->role_id != 1) {
         return redirect()->route('index-homepage')->with('error', 'Bạn không có quyền truy cập trang này');
      }

      $pays = Pay::with(['user', 'transport', 'payment'])->get();
      return view('Admin.dashboard.index', compact('pays'));
   }

   public function ShowDashBoard()
   {

      $user = auth()->user();

        if (!$user || $user->role_id != 1) {
            return redirect()->route('index-homepage')->with('error', 'Bạn không có quyền truy cập trang này');
        }

      $pays = Pay::with(['user', 'transport', 'payment'])->get();
      $orderCount = Pay::count();
      $productCount = Product::count();
      $acountCount = User::count();
      return view('Admin.dashboard.dashboard', compact('pays', 'orderCount', 'productCount', 'acountCount'));
   }

   public function ShowViewDashBoard()
   {
      return view('Admin.dashboard.view');
   }

}
