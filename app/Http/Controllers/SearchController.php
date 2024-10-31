<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $category = $request->input('category');

        $products = Product::whereRaw("MATCH(name, description) AGAINST(? IN BOOLEAN MODE)", [$query])
            ->when($category && $category !== 'all', function ($query) use ($category) {
                return $query->where('category_column', $category); 
            })
            ->paginate(9);

        return view('User.category.index', compact('products'));
    }

    public function SearchSelective(Request $request)
    {
        $query = $request->input('query');
        $category = $request->input('category');

        $products = Product::query();

        if ($query) {
            $products = $products->search($query);
        }

        // Nếu có danh mục được chọn
        if ($category && $category !== 'all') {
            $products = $products->where('id_category', $category);
        }

        $products = $products->paginate(9);

        return view('User.category.index', compact('products'));
    }
}
