<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Đăng Nhập</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 400px;
            margin: auto;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 100px;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2 class="text-center">Đăng Nhập</h2>
        <form action="{{url('login/loginrun')}}" method="POST">
            @csrf 
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <!-- CSRF Token (Laravel bảo mật yêu cầu) -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
            </div>

            @error('email')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror

            @error('password')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror

            <button type="submit" class="btn btn-primary btn-block">Đăng Nhập</button>
        </form>
        <div class="text-center mt-3">
            <a href="/register">Bạn chưa có tài khoản? Đăng ký</a>
        </div>
        <div class="text-center mt-3">
            <a href="#">Quên mật khẩu?</a>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>