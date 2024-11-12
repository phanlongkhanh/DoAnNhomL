<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ReviewController extends Controller
{
   public function ShowIndexReview() {
    return view('User.review.index');
   }
}
