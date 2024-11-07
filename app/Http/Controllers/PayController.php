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

    public function ViewPay()
    {
        $userId = auth()->id();

        if (!$userId) {
            return redirect('User.pay.view')->with('error', 'Bạn cần đăng nhập để xem.');
        }

        $pays = Pay::with(['user', 'transport', 'payment'])
            ->where('id_user', $userId)
            ->paginate(6);

        return view('User.pay.view', compact('pays'));
    }

    public function EditPay($encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
        } catch (DecryptException $e) {
            return redirect()->route('index-pays')->with('error', 'ID không hợp lệ.');
        }

        $userId = auth()->id();

        if (!$userId) {
            return redirect('/')->with('error', 'Bạn cần đăng nhập để xem giỏ hàng của mình.');
        }

        $carts = Cart::where('id_user', $userId)->get();

        if ($carts->isEmpty()) {
            return redirect()->route('index-pays')->with('error', 'Giỏ hàng của bạn hiện tại trống.');
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

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100|regex:/\S/',
            'id_payment' => 'required|exists:payments,id',
            'phone' => [
                'required',
                'string',
                'max:11',
                'regex:/^0[0-9]{9,11}$/',
                'not_regex:/^(0{10,12}|1{10,12}|2{10,12}|3{10,12}|4{10,12}|5{10,12}|6{10,12}|7{10,12}|8{10,12}|9{10,12})$/', // Không phải chuỗi số giống nhau
                'regex:/^\S+$/',
            ],
            'description' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $carts = Cart::where('id_user', $userId)->get();

        if ($carts->isEmpty()) {
            return redirect()->back()->with('error', 'Giỏ hàng của bạn trống.');
        }

        foreach ($carts as $cart) {
            $pay = new Pay();
            $pay->id_user = $userId;
            $pay->id_transport = $request->input('id_transport');
            $pay->id_cart = $cart->id;
            $pay->id_product = $request->input('id_product');
            $pay->id_payment = $request->input('id_payment');
            $pay->name = $cart->name;
            $pay->phone = $request->input('phone');
            $pay->amount = $cart->amount;
            $pay->price = $cart->price;
            $pay->description = $request->input('description');
            $pay->address = $request->input('address');
            $pay->total_price = $cart->total_price;

            try {
                $pay->save();
            } catch (\Exception $e) {
                \Log::error('Lỗi lưu đơn hàng: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
            }
        }

        Cart::where('id_user', $userId)->delete();

        return redirect()->route('index-homepage')->with('success', 'Đơn hàng đã được tạo thành công!');
    }

}
