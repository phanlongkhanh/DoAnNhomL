<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class AccountController extends Controller
{
    public function ShowAccount() {
        $users = User::all();
        return view('Admin.account.index',compact('users'));
    }

    public function ShowAddAccount() {
        return view('Admin.account.create');
    }

    // public function ShowEditAccount() {
    //     $users = User::all();
    //     return view('Admin.account.create');
    // }

    public function ShowEditAccount($id)
    {
        // Tìm tài khoản theo id
        $user = User::find($id);

        // Kiểm tra nếu không tìm thấy user
        if (!$user) {
            return redirect('account-index')->with('error', 'User not found.');
        }

        // Trả về view edit với thông tin của user
        return view('Admin.account.edit', compact('user'));
    }   


    public function AddAccount(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'role_id' => 'required|integer',
        ]);

        // Tạo người dùng mới
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role_id' => $request->role_id,
        ]);

        return redirect('account-index')->with('success', 'User created successfully.');
    }



        // Chỉnh sửa người dùng
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('Admin.account.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'phone' => 'nullable|string|max:20',
            'role_id' => 'required|integer',
        ]);

        // Cập nhật người dùng
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role_id = $request->role_id;

        // Nếu người dùng nhập mật khẩu mới thì cập nhật mật khẩu
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'required|string|min:8|confirmed',
            ]);
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect('account-index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        // Tìm người dùng theo ID
        $user = User::findOrFail($id);

        // Xóa người dùng
        $user->delete();

        return redirect('account-index')->with('success', 'User deleted successfully.');
    }

}
