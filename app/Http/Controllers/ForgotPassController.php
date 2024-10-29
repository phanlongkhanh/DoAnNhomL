<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ForgotPassController extends Controller
{
    public function sendResetLinkEmail(Request $request)
    {
    // Xác thực yêu cầu
    $request->validate([
        'email' => 'required|email|exists:users,email',
    ]);

    // Gửi liên kết đặt lại mật khẩu
    $status = Password::sendResetLink($request->only('email'));

    // Kiểm tra trạng thái và trả về thông báo
    if ($status === Password::RESET_LINK_SENT) {
        // Thông báo thành công
        return redirect()->route('checkmail')->with('status', __($status));
    }

    // Thông báo lỗi nếu không thành công
    return back()->withErrors(['email' => __($status)]);
    }
    public function showNotificationEmail()
    {
        return view('User.forgot.checkmail');
    }
}
