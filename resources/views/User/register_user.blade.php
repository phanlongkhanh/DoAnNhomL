<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Đăng Ký</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .register-container {
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

<div class="register-container">
    <h2 class="text-center">Đăng Ký Tài Khoản</h2>
    <form>
        <div class="form-group">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" class="form-control" id="username" placeholder="Nhập tên đăng nhập" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Nhập địa chỉ email" required>
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" required>
        </div>
        <div class="form-group">
            <label for="confirm-password">Xác nhận mật khẩu:</label>
            <input type="password" class="form-control" id="confirm-password" placeholder="Xác nhận mật khẩu" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Đăng Ký</button>
    </form>
    <div class="text-center mt-3">
        <a href="login">Đã có tài khoản? Đăng nhập</a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>