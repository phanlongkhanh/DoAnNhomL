<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class AccountController extends Controller
{
    public function ShowAccount() {
        // $users = User::with('role')->get();
        $users = User::with('role')->paginate(10); // Hiển thị 10 tài khoản mỗi trang
        return view('Admin.account.index', compact('users'));
    }

    public function ShowAddAccount() {
        return view('Admin.account.create');
    }

    public function ShowEditAccount($id)
    {
        // Tìm tài khoản theo id
        $user = User::find($id);

        // Kiểm tra nếu không tìm thấy user
        if (!$user) {
            return redirect()->route('index-account')->with('error', 'User not found.');
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
            'password' => [
                'required',
                'string',
                'min:8',
                'max:20',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/',
                'not_regex:/\s/', // Không chứa khoảng trắng
                'confirmed',
            ],
            'phone' => 'required|digits:10',
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
        
        return redirect()->route('index-account')->with('success', 'Tài khoản đã được thêm thành công!');
    }

    public function edit($encryptedId)
    {
        // $user = User::findOrFail($id);
        // return view('Admin.account.edit', compact('user'));

        try {
            // Giải mã ID
            $decodedId = Crypt::decrypt($encryptedId);
        } catch (\Exception $e) {
            return redirect()->route('index-account')->with('error', 'ID không hợp lệ.');
        }
    
        $user = User::findOrFail($decodedId);
        return view('Admin.account.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        try {
            // Giải mã ID
            $decodedId = Crypt::decrypt($id);
        } catch (\Exception $e) {
            return redirect()->route('index-account')->with('error', 'ID không hợp lệ.');
        }

        // Kiểm tra xem email có thay đổi hay không
        $emailRule = 'required|string|email|max:255';
        if ($request->email != User::find($decodedId)->email) {
            $emailRule .= '|unique:users,email';
        }

        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'email' => $emailRule . ','.$decodedId,
            'phone' => 'nullable|digits:10',  // Số điện thoại phải là 10 chữ số
            'role_id' => 'required|in:1,2', // Role phải là 1 hoặc 2
        ]);

        // Cập nhật người dùng
        // $user = User::findOrFail($id);
        $user = User::findOrFail($decodedId);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role_id = $request->role_id;

        // Nếu người dùng nhập mật khẩu mới thì cập nhật mật khẩu
    if ($request->filled('password')) {
        // Validate mật khẩu nếu có thay đổi
        $request->validate([
            'password' => [
                'required',
                'string',
                'min:8',                      // Độ dài tối thiểu 8 ký tự
                'max:20',                     // Độ dài tối đa 20 ký tự
                'confirmed',                  // Xác nhận mật khẩu
                'regex:/[a-z]/',              // Phải có ít nhất 1 chữ cái viết thường
                'regex:/[A-Z]/',              // Phải có ít nhất 1 chữ cái viết hoa
                'regex:/[0-9]/',              // Phải có ít nhất 1 chữ số
                'regex:/[@$!%*?&]/',          // Phải có ít nhất 1 ký tự đặc biệt
                'regex:/^\S*$/',              // Không có khoảng trắng
            ],
        ]);

        // Cập nhật mật khẩu nếu có
        $user->password = Hash::make($request->password);
    }
        
        $user->save();

        return redirect()->route('index-account')->with('success', 'Tài khoản đã được cập nhật thành công!');
    }

    public function destroy($id)
    {
        try {
            // Giải mã ID
            $decodedId = Crypt::decrypt($id);
        } catch (\Exception $e) {
            return redirect()->route('index-account')->with('error', 'ID không hợp lệ.');
        }

        // // Tìm người dùng theo ID
        // $user = User::findOrFail($id);

        // Kiểm tra xem tài khoản có tồn tại không
        $user = User::find($decodedId);
        if (!$user) {
            return redirect()->route('index-account')->with('error', 'Tài khoản không tồn tại hoặc đã bị xóa!');
        }

        // Xóa người dùng
        $user->delete();

        return redirect()->route('index-account')->with('success', 'Tài khoản đã được xóa thành công!');
    }

    // Phương thức cập nhật trạng thái
    public function toggleActive($id)
    {
        try {
            $user = User::findOrFail($id);

            // Chỉ admin mới có quyền thực hiện
            if (auth()->user()->role_id != 1) {
                return redirect()->back()->with('error', 'Chỉ admin mới có quyền này.');
            }

            // Đổi trạng thái tài khoản
            $user->checkactive = !$user->checkactive;
            $user->save();

            // Đăng xuất người dùng nếu tài khoản bị khóa
            if (!$user->checkactive) {
                \DB::table('sessions')
                    ->where('user_id', $user->id)
                    ->delete(); // Xóa session hiện tại của user
            }

            $status = $user->checkactive ? 'kích hoạt' : 'khóa';
            return redirect()->route('index-account')->with('success', "Tài khoản đã được $status!");
        } catch (\Exception $e) {
            return redirect()->route('index-account')->with('error', 'Tài khoản đã bị khóa!');
        }
    }
}
