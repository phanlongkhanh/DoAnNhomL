<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Đăng Ký</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('images/login.jpg');
            background-size: cover;
            background-position: center;
            color: #333;
        }

        .register-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.9);
            /* Tạo nền trắng nhẹ nhàng */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            margin-top: 100px;
        }

        h2 {
            color: #e74c3c;
            /* Màu chữ tiêu đề */
        }
    </style>
</head>

<body>

    <div class="register-container">
        <h2 style="margin-bottom: 30px" class="text-center">Đăng Ký Tài Khoản</h2>
        <form action="{{ route('register-user') }}" method="POST">
            @csrf

            @if (session('message'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('message') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger text-center" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="name">Tên đăng nhập:</label>
                <input type="text" class="form-control" id="name" name="name"
                    placeholder="Nhập tên đăng nhập" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email"
                    placeholder="Nhập địa chỉ email" required>
            </div>

            <div class="form-group">
                <label for="phone">Số Điện Thoại:</label>
                <input type="text" class="form-control" id="phone" name="phone"
                    placeholder="Nhập Số Điện Thoại" required>
            </div>

            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu"
                    required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Xác nhận mật khẩu:</label>
                <input type="password" class="form-control" id="confirm-password" name="password_confirmation"
                    placeholder="Xác nhận mật khẩu" required>
            </div>
            <button type="submit" class="btn btn-danger btn-block">Đăng Ký</button>
        </form>
        <div class="text-center mt-3">
            <a href="{{ '/' }}">Đã có tài khoản? Đăng nhập</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
