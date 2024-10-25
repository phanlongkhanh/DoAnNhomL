<?php

namespace App\Http\Controllers;
use App\Models\ProductType;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function ShowProductType(){
        $productTypes = ProductType::all();
        return view('Admin.producttype.index',compact('productTypes'));
    }

    public function ShowCreateTypeProduct(){
        return view('Admin.producttype.create');
    }

    public function ShowUpdateTypeProduct(){
        return view('Admin.producttype.update');
    }

    // Thêm Loại Sản Phẩm
    public function AddProductType(Request $request){
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255', 
        ]);
    
        if ($validator->fails()) {
            return redirect('product-type-index')
                        ->withErrors($validator)
                        ->withInput();
        }

           ProductType::create([
            'name' => $request->name,
            'description' => $request->description,
          
        ]);
    
        return redirect('product-type-index')->with('success', 'Registration successful. Please log in.');
    }

    // Kiểm Tra Trạng Thái
    public function ActiveProductType($id)
    {
        $producttypes = ProductType::findOrFail($id);
        $producttypes->checkactive = !$producttypes->checkactive; // Chuyển đổi trạng thái
        $producttypes->save();

        return redirect()->route('product-type-index')->with('success', 'Trạng thái danh mục đã được cập nhật thành công.');
    }
}
