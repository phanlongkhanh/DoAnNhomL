<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function ShowAccount(Request $request)
    {
        $query = User::with('role');
        // Kiểm tra xem có tìm kiếm hay không
        if ($request->has('search')) {
            $searchTerm = $request->input('search');

            // Tìm kiếm theo ID hoặc họ tên
            $query->where(function ($q) use ($searchTerm) {
                $q->where('id', $searchTerm)
                    ->orWhere('name', 'LIKE', '%' . $searchTerm . '%');
            });
        }
        // Lấy danh sách người dùng sau khi tìm kiếm
        $users = $query->get();
        return view('Admin.account.index', compact('users'));
    }



    public function ShowAddAccount()
    {
        if (!Auth::user()->isAdmin()) {
            return back()->with('error', 'Chỉ có admin mới có quyền này.');
        }

        $roles = Role::all();
        return view('Admin.account.create', compact('roles'));
    }

    public function ShowEditAccount($encryptedId)
    {
        if (!Auth::user()->isAdmin()) {
            return back()->with('error', 'Chỉ có admin mới có quyền này.');
        }

        try {
            $id = Crypt::decrypt($encryptedId);
        } catch (DecryptException $e) {
            return redirect('account-index')->with('error', 'Không tìm thấy tài khoản với ID này.');
        }


        $user = User::find($id);

        if (!$user) {
            return redirect('account-index')->with('error', 'User not found.');
        }

        $roles = Role::all();
        return view('Admin.account.edit', compact('user', 'roles'));
    }


    public function AddAccount(Request $request)
    {
        if (!Auth::user()->isAdmin()) {
            return back()->with('error', 'Chỉ có admin mới có quyền này.');
        }

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

        return redirect()->route('index-account')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        if (!Auth::user()->isAdmin()) {
            return back()->with('error', 'Chỉ có admin mới có quyền này.');
        }

        $user = User::findOrFail($id);
        return view('Admin.account.edit', compact('user'));
    }

    public function update(Request $request, $encryptedId)
    {
        // Kiểm tra xem người dùng có phải là admin không
        if (!Auth::user()->isAdmin()) {
            return back()->with('error', 'Chỉ có admin mới có quyền này.');
        }

        // Giải mã ID
        try {
            $id = Crypt::decrypt($encryptedId);
        } catch (DecryptException $e) {
            return redirect('account-index')->with('error', 'Không tìm thấy tài khoản với ID này.');
        }

        // Tìm tài khoản theo ID đã giải mã
        $user = User::find($id);
        if (!$user) {
            return redirect('account-index')->with('error', 'Không tìm thấy tài khoản.');
        }

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

        session()->flash('success', 'Tài khoản đã được cập nhật thành công!');
        return redirect()->route('index-account'); // Đường dẫn đến danh sách tài khoản
    }

    public function destroy($id)
    {
        if (!Auth::user()->isAdmin()) {
            return back()->with('error', 'Chỉ có admin mới có quyền này.');
        }

        // Tìm người dùng theo ID
        $user = User::findOrFail($id);

        // Xóa người dùng
        $user->delete();

        return redirect()->route('index-account')->with('success', 'User deleted successfully.');
    }

    public function toggleAccount($encryptedId)
    {
        // Giải mã ID
        try {
            $id = Crypt::decrypt($encryptedId);
        } catch (DecryptException $e) {
            return redirect()->back()->with('error', 'Không tìm thấy tài khoản với ID này.');
        }   

        // Kiểm tra xem người dùng có quyền admin không
        if (auth()->user()->role_name !== 'admin') {
            return redirect()->back()->with('error', 'Chỉ có admin mới có quyền này.');
        }

        // Tìm tài khoản theo ID
        $user = User::findOrFail($id);

        // Tìm tài khoản theo ID
        $user = User::findOrFail($id);

        // Đảo ngược trạng thái checkactive
        $user->checkactive = !$user->checkactive;
        
        // Cập nhật trạng thái is_locked
        $user->is_locked = !$user->checkactive; // Nếu checkactive là false, khóa tài khoản
        
        $user->save();

        return redirect()->back()->with('success', 'Cập nhật trạng thái tài khoản thành công!');

        // Nếu tài khoản bị khóa, gửi thông báo
        if (!$user->checkactive) {
            return redirect()->back()->with('success', 'Tài khoản đã bị khóa.');
        } else {
            return redirect()->back()->with('success', 'Tài khoản đã được mở khóa.');
        }
    }
    
    protected function authenticated(Request $request, $user)
    {
        if ($user->is_locked) {
            Auth::logout(); // Đăng xuất người dùng
            return redirect()->back()->with('error', 'Tài khoản của bạn đã bị khóa.'); 
        }
    }
}
