<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class LoginRegisterController extends Controller
{
    public function LoginPage(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Kiểm tra vai trò của người dùng
            if (Auth::user()->isAdmin()) {
                // Nếu là admin, chuyển hướng đến trang admin
                return redirect('/admin-controller');
            } else {
                // Nếu là user, chuyển hướng đến trang người dùng
                return redirect('/homepage');
            }
        }
    
        // Đăng nhập thất bại, hiển thị form đăng nhập lại với thông báo lỗi
        return redirect()->back()->withInput()->withErrors(['email' => 'Email hoặc mật khẩu không chính xác']);
    }

    function RegisterPage(Request $request)
    {
           // Hàm kiểm tra dữ liệu nhập vào
      $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'phone' => 'required|string|max:15',
    ]);

    $roleId = $request->input('role_id', 2);
    // Kiểm tra nếu lỗi trả về lỗi 
    if ($validator->fails()) {
        return redirect('/register')
                    ->withErrors($validator)
                    ->withInput();
    }
    // Tạo mới người dùng
        User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'phone' => $request->phone,
        'role_id' => $roleId,
    ]);

    // Trả về trang login
    return redirect('login')->with('success', 'Registration successful. Please log in.');
    }

    //viết hàm logout
    public function logoutUser()
    {
        Auth::logout();
        return redirect('login')->with('message', 'Đăng Xuất Thành Công !');
    }
}
