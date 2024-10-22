<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class AdminCategoryProductController extends Controller
{
    // Hiển Thị Màn hình Danh Mục
    // : \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    public function showCategory()
    {
        $categories = Category::all();
        return view('Admin.category.index', compact('categories'));
    }

    
    //Hiển thị màn hình thêm danh mục
    public function showAddCategory()
    {
        return view('Admin.category.create');
    }

    // Thêm phương thức lưu danh mục mới
    public function storeCategory(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_description' => 'required|string',
            'category_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        

        // Lưu danh mục vào cơ sở dữ liệu
        $category = new Category();
        $category->name = $request->category_name;
        $category->description = $request->category_description;



        // Lưu hình ảnh
        if ($request->hasFile('category_image')) {
            $imagePath = $request->file('category_image')->store('images/categories', 'public');
            $category->image = $imagePath; // Cập nhật đường dẫn hình ảnh

        }

        // Gán user_id
        $category->user_id = auth()->id(); // Thêm ID admin
        
        $category->save(); // Lưu vào cơ sở dữ liệu

        return redirect()->route('indexcategory')->with('success', 'Category created successfully.'); // Thông báo thành công
    }

    // Trạng thái danh mục
    public function toggleActiveCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->checkactive = !$category->checkactive; // Chuyển đổi trạng thái
        $category->save();

        return redirect()->route('indexcategory')->with('success', 'Trạng thái danh mục đã được cập nhật thành công.');
    }

    // Hiển thị màn hình chỉnh sửa danh mục
    public function showEditCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('Admin.category.update', compact('category'));
    }

    // Lưu cập nhật danh mục
    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_description' => 'required|string',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->category_name;
        $category->description = $request->category_description;

        // Cập nhật hình ảnh
        if ($request->hasFile('category_image')) {
            // Xóa hình ảnh cũ nếu có
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            
            $imagePath = $request->file('category_image')->store('images/categories', 'public');
            $category->image = $imagePath; // Cập nhật đường dẫn hình ảnh
        }

        $category->save(); // **Lưu vào cơ sở dữ liệu**

        return redirect()->route('indexcategory')->with('success', 'Category updated successfully.'); // Thông báo thành công
    }

    public function destroyCategory($id)
    {
        $category = Category::findOrFail($id); // Tìm danh mục theo ID
        $category->delete(); // Xóa danh mục

        return redirect()->route('indexcategory')->with('success', 'Category deleted successfully.'); // Thông báo thành công
    }


}