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

    public function ShowUpdatePost()
    {
        return view('Admin.post.update');
    }

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