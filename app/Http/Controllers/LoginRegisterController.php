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
            $user = Auth::user();

            if ($user->banned == 0) {
                Auth::logout();
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['error' => 'Tài khoản của bạn đã bị khóa. Vui lòng liên hệ quản trị viên.']);
            }

            if ($user->isAdmin()) {
                return redirect('/admin-controller')->with('message', 'Đăng Nhập Thành Công !!!');
            } else {
                return redirect()->route('index-homepage')->with('message', 'Đăng Nhập Thành Công !!!');
            }
        }

        return redirect()->back()->withInput()->withErrors(['email' => 'Email hoặc mật khẩu không chính xác']);
    }

    function RegisterPage(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:15',
        ]);

        $roleId = $request->input('role_id', 2);

        if ($validator->fails()) {
            return redirect()->route('register')
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role_id' => $roleId,
        ]);

        return redirect('/')->with('success', 'Registration successful. Please log in.');
    }

    //viết hàm logout
    public function LogOutUser()
    {
        try {
            Auth::logout();
            return redirect('/')->with('message', 'Đăng Xuất Thành Công !');
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có
            return redirect('/')->with('error', 'Có lỗi xảy ra trong quá trình đăng xuất!');
        }
    }
}
