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
        // $categories = Category::all();
        $categories = Category::paginate(10); // Hiển thị 10 danh mục mỗi trang
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
    ], [
        'category_image.image' => 'File tải lên phải là một hình ảnh.',
        'category_image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif.',
    ]);

    // Lưu danh mục vào cơ sở dữ liệu
    $category = new Category();
    $category->name = $request->category_name;
    $category->description = $request->category_description;

    // Lưu hình ảnh vào thư mục public/images
    if ($request->hasFile('category_image')) {
        $image = $request->file('category_image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $category->image = $imageName; // Lưu tên file vào cơ sở dữ liệu
    }

    // Gán user_id
    $category->user_id = auth()->id(); // Thêm ID admin
    
    $category->save(); // Lưu vào cơ sở dữ liệu

    // return redirect()->route('indexcategory')->with('success', 'Category created successfully.'); // Thông báo thành công
    return redirect()->route('indexcategory')->with('success', 'Danh mục đã được thêm thành công!');
    }

    // Trạng thái danh mục
    public function toggleActiveCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->checkactive = !$category->checkactive; // Chuyển đổi trạng thái
        $category->save();

        // return redirect()->route('indexcategory')->with('success', 'Trạng thái danh mục đã được cập nhật thành công.');
        // Tạo thông báo dựa trên trạng thái mới
        $status = $category->checkactive ? 'hiển thị' : 'ẩn';
        return redirect()->route('indexcategory')->with('success', "Trạng thái danh mục đã được cập nhật thành công. Danh mục hiện đang $status.");
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
        ], [
            'category_image.image' => 'File tải lên phải là một hình ảnh.',
            'category_image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif.',
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
    
            // Lưu hình ảnh mới
            $image = $request->file('category_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $category->image = $imageName; 
        }
    
        $category->save();
    
        // return redirect()->route('indexcategory')->with('success', 'Category updated successfully.'); // Thông báo thành công
        return redirect()->route('indexcategory')->with('success', 'Danh mục đã được cập nhật thành công!');
    }

    public function destroyCategory($id)
    {
        $category = Category::find($id);

        if (!$category) {
            // Nếu danh mục không tồn tại, chuyển hướng với thông báo lỗi
            return redirect()->route('indexcategory')->with('error', 'Danh mục không tồn tại hoặc đã bị xóa.');
        }
        $category->delete(); // Xóa danh mục

        // return redirect()->route('indexcategory')->with('success', 'Category deleted successfully.'); // Thông báo thành công
        return redirect()->route('indexcategory')->with('success', 'Danh mục đã được xóa thành công!');
    }


}