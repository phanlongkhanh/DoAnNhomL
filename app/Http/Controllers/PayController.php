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
use Illuminate\Support\Facades\Validator;


class PayController extends Controller
{
    public function ShowPayIndex()
    {
        $payments = Payment::all();
        $transports = TranSport::all();
        $user = Auth::user();

        return view('User.pay.index', compact('transports', 'payments', 'user'));
    }

    public function ViewPay(){
        return view('User.pay.view');
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

        return view('User.pay.index', compact('carts', 'transports', 'user', 'payments'));
        ;
    }

    public function AddPay(Request $request)
    {
        $userId = auth()->id();
        if (!$userId) {
            return redirect('login')->with('error', 'Bạn cần đăng nhập để thực hiện thanh toán.');
        }

        // Xác thực dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'id_payment' => 'required|exists:payments,id',
            'description' => 'nullable|string',
            'address' => 'required|string|max:255',
            'total_price' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

         // Tính toán tổng giá tiền
         $total_price = $request->amount * $request->price;
        // Tạo một bản ghi mới
        $pay = new Pay();
        $pay->id_user = $userId;
        $pay->id_transport = $request->input('id_transport');
        $pay->id_payment = $request->input('id_payment');
        $pay->name = $request->input('name');
        $pay->phone = $request->input('phone');
        $pay->amount = $request->input('amount');
        $pay->price = $request->input('price');
        $pay->description = $request->input('description');
        $pay->address = $request->input('address');
        $pay->total_price = $total_price;

        $pay->save();

        return redirect('homepage')->with('success', 'Đơn hàng đã được tạo thành công!');
    }

}
