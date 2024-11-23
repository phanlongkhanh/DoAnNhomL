<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductDetailController extends Controller
{
    public function ShowProductDetails($encryptedId)
    {

        $products = Product::find($encryptedId);
        try {
            $id = Crypt::decrypt($encryptedId);
        } catch (DecryptException $e) {
            return redirect()->route('index-homepage')->with('error', 'Không tìm thấy sản phẩm với ID này.');
        }

        $products = Product::find($id);
        $reviews = Review::all();

        if (!$products) {
            return redirect()->route('index-homepage')->with('error', 'Không tìm thấy sản phẩm với ID này.');
        }

        return view('User.product.details', compact('products','reviews'));
    }
}
