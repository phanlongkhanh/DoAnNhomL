<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductType;
use App\Models\Suppliers;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    // Hiển thị danh sách các sản phẩm.
    public function ShowIndexProduct()
    {
        $products = Product::with('category', 'productType', 'supplier')->get();
        return view('Admin.product.index', compact('products'));
    }

    // Hiển thị màn hình thêm sản phẩm
    public function ShowCreateProduct()
    {
        $categories = Category::all();
        $productTypes = ProductType::all();
        $suppliers = Suppliers::all();
        return view('Admin.product.create', compact('categories', 'productTypes', 'suppliers'));
    }

    // Lưu trữ một sản phẩm mới được tạo trong
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:1000',
            'discount' => 'nullable|numeric|min:0|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'typeproduct_id' => 'required|exists:product_types,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'amount' => 'required|integer|min:1',
        ]);

        // Xử lý lưu hình ảnh
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Tạo tên file duy nhất
            $image->move(public_path('images'), $imageName); // Lưu ảnh vào thư mục public/images
        } else {
            $imageName = 'default.jpg'; // Nếu không có ảnh, đặt một ảnh mặc định
        }

        // Create the product
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'discount' => $request->discount,
            'image' => $imageName,
            'id_category' => $request->category_id,
            'id_producttype' => $request->typeproduct_id,
            'id_suppliers' => $request->supplier_id,
            'amount' => $request->amount,
            'id' => $request->user()->id // Giả sử đây là ID của người bán hàng
        ]);

        // Redirect with success message
        return redirect('product')->with('success', 'Product created successfully.');
    }

    // Hiển thị màn hình chỉnh sửa sản phẩm
    public function ShowUpdateProduct($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $productTypes = ProductType::all();
        $suppliers = Suppliers::all();
        return view('Admin.product.update', compact('product', 'categories', 'productTypes', 'suppliers'));
    }

    // Hàm cập nhật sản phẩm
    public function update(Request $request, $id)
    {
        try {
            // Validate the input
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'description' => 'nullable|string|max:1000',
                'discount' => 'nullable|numeric|min:0|max:100',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'category_id' => 'required|exists:categories,id',
                'typeproduct_id' => 'required|exists:product_types,id',
                'supplier_id' => 'required|exists:suppliers,id',
                'amount' => 'required|integer|min:1',
            ]);

            $product = Product::findOrFail($id);

            // Xử lý upload ảnh nếu có
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);

                // Xóa ảnh cũ nếu có
                if ($product->image && $product->image !== 'default.jpg') {
                    $oldImagePath = public_path('images/') . $product->image;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            } else {
                $imageName = $product->image; // Giữ nguyên ảnh cũ nếu không upload ảnh mới
            }

            // Cập nhật thông tin sản phẩm
            $product->update([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'discount' => $request->discount,
                'image' => $imageName,
                'id_category' => $request->category_id,
                'id_producttype' => $request->typeproduct_id,
                'id_suppliers' => $request->supplier_id,
                'amount' => $request->amount,
            ]);

            return redirect('product')
                ->with('success', 'Product updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error updating product: ' . $e->getMessage())
                ->withInput();
        }
    }

    // Hàm xóa sản phẩm
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Xóa ảnh nếu có
        if ($product->image && $product->image !== 'default.jpg') {
            $imagePath = public_path('images/') . $product->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $product->delete();

        return redirect('product')->with('success', 'Product deleted successfully.');
    }
}
