<?php

namespace App\Http\Controllers;

use App\Models\ListPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryPostController extends Controller
{
    // Hiển thị danh sách danh mục bài viết
    public function ShowIndexCategoryPost()
    {
        $listposts = ListPost::all();
        return view('Admin.post_category.index', compact('listposts'));
    }

    // Hiển thị form tạo mới danh mục bài viết
    public function ShowCreateCategoryPost()
    {
        return view('Admin.post_category.create');
    }
    // Hiển thị form sửa danh mục bài viết
    public function showEditForm($id)
    {
        $category = ListPost::findOrFail($id);
        return view('Admin.post_category.update', compact('category'));
    }   
    // Lưu danh mục bài viết
    public function StoreCategoryPost(Request $request)
    {
        // Validate dữ liệu nhập vào
        $validated = $request->validate([
            'category_name' => 'required|string|max:255', // Kiểm tra tên danh mục
            'category_description' => 'required|string', // Kiểm tra mô tả
            'category_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Kiểm tra file ảnh
        ]);
    
        // Kiểm tra nếu có hình ảnh trong request
        if ($request->hasFile('category_image')) {
            // Lưu ảnh vào thư mục public/images và lấy đường dẫn lưu trữ
            $imagePath = $request->file('category_image')->move(public_path('images'), $request->file('category_image')->getClientOriginalName());
        }
    
        // Tạo mới danh mục bài viết
        ListPost::create([
            'name' => $request->category_name,
            'description' => $request->category_description,
            'image' => 'images/' . $request->file('category_image')->getClientOriginalName(),  // Lưu đường dẫn ảnh vào database
            'checkactive' => true,   // Mặc định là active
            'id_user' => auth()->user()->id,  // ID người dùng đăng nhập (người thêm)
        ]);
    
        // Redirect trở lại trang danh sách với thông báo thành công
        return redirect()->route('index-category-post')->with('success', 'Danh mục bài viết đã được thêm thành công!');
    }
    public function updateCategoryPost(Request $request, $id)
{
    // Tìm danh mục theo ID
    $category = ListPost::findOrFail($id);

    // Validate dữ liệu
    $request->validate([
        'category_name' => 'required|string|max:255',
        'category_description' => 'required|string',
        'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Chỉ kiểm tra ảnh khi có thay đổi
    ]);

    // Cập nhật các trường khác
    $category->name = $request->category_name;
    $category->description = $request->category_description;

    // Nếu có ảnh mới, xử lý upload ảnh
    if ($request->hasFile('category_image')) {
        // Xóa ảnh cũ nếu có
        if ($category->image && file_exists(public_path($category->image))) {
            unlink(public_path($category->image)); // Xóa ảnh cũ
        }

        // Lưu ảnh mới
        $image = $request->file('category_image');
        $imageName = 'images/' . Str::uuid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName); // Lưu ảnh vào thư mục public/images

        $category->image = $imageName; // Cập nhật đường dẫn ảnh mới vào DB
    }

    // Lưu thông tin danh mục đã cập nhật
    $category->save();

    // Quay lại danh sách với thông báo thành công
    return redirect()->route('index-category-post')->with('success', 'Danh mục bài viết đã được cập nhật!');
}

    //Hàm xóa danh mục bài viết :
    public function destroy($id)
    {
        // Tìm danh mục bài viết theo ID
        $categoryPost = ListPost::find($id);
    
        // Kiểm tra nếu danh mục không tồn tại
        if (!$categoryPost) {
            return redirect()->route('index-category-post')->with('error', 'Danh mục bài viết không tồn tại!');
        }
    
        // Xóa hình ảnh liên quan nếu có
        if (file_exists(public_path($categoryPost->image))) {
            unlink(public_path($categoryPost->image));  // Xóa ảnh khỏi thư mục public
        }
    
        // Xóa danh mục bài viết
        $categoryPost->delete();
    
        // Quay lại trang danh sách với thông báo thành công
        return redirect()->route('index-category-post')->with('success', 'Danh mục bài viết đã được xóa thành công!');
    }
    
}
