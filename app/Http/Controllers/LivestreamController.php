<?php

namespace App\Http\Controllers;

use App\Models\Livestream;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LivestreamController extends Controller
{
    public function index()
    {
        $livestreams = Livestream::all();
        return view('Admin.live.index', compact('livestreams'));
    }

    public function create()
    {
        return view('Admin.live.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'video_url' => 'required|url',
        ]);

        Livestream::create($request->all());
        return redirect()->route('index-live')->with('success', 'Livestream đã được tạo!');
    }

    public function destroy($id)
    {
        try {
            $livestream = Livestream::findOrFail($id);
            $livestream->delete();
            return redirect()->route('index-live')->with('success', 'Livestream đã được xóa!');
        } catch (\Exception $e) {
            return redirect()->route('index-live')->with('error', 'Có lỗi xảy ra khi xóa livestream!');
        }
    }

    public function detail($id)
    {
        $livestreams = Livestream::findOrFail($id);
        $messages = Message::where('id_livestreams', $id)->get();
        $products = Product::take(5)->get();

        return view('User.live.view', compact('livestreams', 'messages', 'products', 'id'));
    }

    public function AddToCartLiveStreams(Request $request)
    {
        $userId = auth()->id();

        if (!$userId) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }

        // Xác thực dữ liệu
        $validator = Validator::make($request->all(), [
            'id_product' => 'required|integer|exists:products,id',
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

        $total_price = $request->amount * $request->price;

        Cart::create([
            'id_user' => $userId,
            'id_product' => $request->id_product,
            'name' => $request->name,
            'amount' => $request->amount,
            'image' => $request->image,
            'price' => $request->price,
            'total_price' => $total_price,
        ]);

        return redirect()->route('detail-livestreams', ['id' => $request->id_product])->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }

}
