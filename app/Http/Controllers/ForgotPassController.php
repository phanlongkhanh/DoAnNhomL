<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

class ForgotPassController extends Controller
{
    public function ShowIndexForgot()
    {
        return view('User.forgot.index');
    }

    public function ShowCheckMail()
    {
        return view('User.forgot.checkmail');
    }

    //gửi về gmail
    public function sendResetLink(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $response = Password::sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
            ? redirect()->route('CheckMail')->with('status', 'Link reset mật khẩu đã được gửi qua email!')
            // ? back()->with('status', 'Link reset mật khẩu đã được gửi qua email!')
            : back()->withErrors(['email' => 'Không tìm thấy email trong hệ thống.']);
    }

    //update password
    public function ShowUpdatePasswordForgot($token, Request $request)
    {
        $email = $request->email;

        return view('User.forgot.update', [
            'token' => $token,
            'email' => $email, 
        ]);
    }


    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required',
        ]);

        $response = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        return $response == Password::PASSWORD_RESET
            ? redirect('/')->with('status', 'Mật khẩu đã được thay đổi thành công!')
            : back()->with(['email' => 'Đã có lỗi xảy ra khi thay đổi mật khẩu.']);
    }

}
