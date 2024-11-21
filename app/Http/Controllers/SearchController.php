<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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
            ->paginate(6);

        $users = Auth::check() ? Auth::user()->name : null;
        return view('User.category.index', compact('products','users'));
    }

    public function SearchSelective(Request $request)
    {

        $query = $request->input('query');
        $category = $request->input('category');

        $products = Product::query();

        // Tìm kiếm sản phẩm theo từ khóa
        if ($query) {
            $products = $products->where('name', 'LIKE', '%' . $query . '%');
        }

        // Lọc theo danh mục
        if ($category && $category !== 'all') {
            $products = $products->where('category', 'LIKE', '%' . $category . '%');
        }

        $products = $products->paginate(6);
        $users = Auth::check() ? Auth::user()->name : null;
        return view('User.category.index', compact('products','users'));
    }
}
