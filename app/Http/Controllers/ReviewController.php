<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;

class ReviewController extends Controller
{
   public function ShowIndexReview() {
    return view('User.review.index');
   }

   public function storeReview(Request $request)
   {
       // Validate dữ liệu đầu vào
       $request->validate([
           'id_user' => 'required|exists:users,id',
           'id_product' => 'required|exists:products,id',
           'comment' => 'required|string|max:255',
       ]);

       // Tạo review mới
       Review::create([
           'id_user' => $request->id_user,
           'id_product' => $request->id_product,
           'comment' => $request->comment,
       ]);

       // Trả về phản hồi
       return redirect()->back()->with('success', 'Review đã được thêm thành công!');
   }

}
