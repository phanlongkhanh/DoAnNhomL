<?php

namespace App\Http\Controllers;
use App\Models\Favorite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Product;

class FavoriteController extends Controller
{
    public function ShowIndexFavorite()
    {
        $favorites = Favorite::paginate(6);
        return view('User.favorite.index', compact('favorites'));
    }

    public function AddToFavorite(Request $request)
    {
        // Xác thực dữ liệu
        $validator = Validator::make($request->all(), [
            'id_product' => 'required|integer|exists:products,id_product',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Favorite::create([
            'id_product' => $request->id_product,
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image,
        ]);

        return redirect('homepage')->with('success', 'Sản phẩm đã được thêm vào danh sách yêu thích!');
    }

    public function DeleteFavorite($id)
    {
        $favorites = Favorite::find($id);
        if (!$favorites) {
            return redirect('favorite-index')->with('error', 'Sản phẩm yêu thích không tồn tại!');
        }
        $favorites->delete();
        return redirect('favorite-index')->with('success', 'Sản phẩm đã được xóa khỏi danh sách yêu thích!');
    }
}
