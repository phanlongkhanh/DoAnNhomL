<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Product;

class CartController extends Controller
{
    public function AddToCart(Request $request)
    {
        // Xác thực dữ liệu
        $validator = Validator::make($request->all(), [
            'id_product' => 'required|integer|exists:products,id_product',
            'name' => 'required|string|max:255',
            'amount' => 'required|integer|min:1',
            'image' => 'required|string|max:255',
            'price' => 'required|numeric|min:0', 
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Tính toán tổng giá tiền
        $total_price = $request->amount * $request->price;

        // Thêm sản phẩm vào giỏ hàng
        Cart::create([
            'id_product' => $request->id_product,
            'name' => $request->name,
            'amount' => $request->amount,
            'image' => $request->image,
            'price' => $request->price, // Đảm bảo đây là giá trị decimal
            'total_price' => $total_price,
        ]);

        return redirect('homepage')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }
}