<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\Suppliers;
use App\Models\User;
use App\Models\Pay;
use App\Models\Product;
use App\Models\TranSport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;


class PayController extends Controller
{
    public function ShowPayIndex()
    {
        $payments = Payment::all();
        $transports = TranSport::all();
        $user = Auth::user();

        return view('User.pay.index', compact('transports', 'payments', 'user'));
    }

    public function EditPay($encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
        } catch (DecryptException $e) {
            return redirect('cart-user-product')->with('error', 'ID không hợp lệ.');
        }
    
        $userId = auth()->id();
    
        if (!$userId) {
            return redirect('login')->with('error', 'Bạn cần đăng nhập để xem giỏ hàng của mình.');
        }
    
        $carts = Cart::where('id_user', $userId)->get();
    
        if ($carts->isEmpty()) {
            return redirect('cart-user-product')->with('error', 'Giỏ hàng của bạn hiện tại trống.');
        }
    
        $user = Auth::user();
        $transports = TranSport::all();
        $payments = Payment::all();
    
        return view('User.pay.index', compact('carts', 'transports', 'user', 'payments'));;
    }

}
