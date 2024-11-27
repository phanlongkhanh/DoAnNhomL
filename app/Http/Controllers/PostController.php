<?php

namespace App\Http\Controllers;

use App\Models\ListPost;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostController extends Controller
{
    public function ShowIndexPost()
    {
        $posts = Post::with('listPost')->get(); 
        return view('Admin.post.index',compact('posts'));
    }

    public function ShowIndexPostHomePage()
    {
        $posts = Post::with('listPost')->get(); 
        return view('User.post.index',compact('posts'));
    }

    public function ShowViewPost()
    {
        return view('User.post.view');
    }

    public function ShowCreatePost()
    {
        $listposts = ListPost::all();
        return view('Admin.post.create',compact('listposts'));
    }
    // Sửa bài viết :
    public function ShowEditPost($id)
    {
        $post = Post::find($id); // Tìm bài viết theo ID
        if (!$post) {
            return redirect()->route('index-post')->with('error', 'Bài viết không tồn tại!');
        }
        $listposts = ListPost::all(); // Lấy danh mục bài viết nếu cần
        return view('Admin.post.update', compact('post', 'listposts')); // Trả về view với bài viết và danh mục
    }
    // Thêm bài viết :
    public function AddPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_list_post' => 'required|exists:list_post,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('index-post')
                ->withErrors($validator)
                ->withInput();
        }

        $post = new Post();
        $post->id_list_post = $request->id_list_post;
        $post->name = $request->name;
        $post->description = $request->description;
        $post->content = $request->content;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('post-images'), $imageName);
            $post->image = $imageName;
        }

        $post->save();

        return redirect()->route('index-post')->with('success', 'Thêm Bài Viết Thành Công!');
    }
    //Sửa bài viết :
    public function UpdatePost(Request $request, $id)
    {
        // Kiểm tra dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'id_list_post' => 'required|exists:list_post,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('edit-post', $id)
                ->withErrors($validator)
                ->withInput();
        }
    
        // Cập nhật bài viết
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('index-post')->with('error', 'Bài viết không tồn tại!');
        }
    
        $post->id_list_post = $request->id_list_post;
        $post->name = $request->name;
        $post->description = $request->description;
        $post->content = $request->content;
    
        // Nếu có ảnh mới, xử lý ảnh
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($post->image) {
                Storage::disk('public')->delete('post-images/' . $post->image);
            }
    
            // Lưu ảnh mới
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('post-images'), $imageName);
            $post->image = $imageName;
        }
    
        $post->save(); // Lưu bài viết đã cập nhật
    
        return redirect()->route('index-post')->with('success', 'Cập Nhật Bài Viết Thành Công!');
    }
    

    //Xóa bài viết :
    public function DeletePost($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('index-post')->with('error', 'Bài viết không tồn tại!');
        }
        if ($post->image) {
            Storage::disk('public')->delete('post-images/' . $post->image);
        }
        $post->delete();
        return redirect()->route('index-post')->with('success', 'Xóa Bài Viết Thành Công!');
    }

}