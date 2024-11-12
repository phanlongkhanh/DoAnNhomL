<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pink Store - Đăng Nhập</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-image: url('images/login.jpg'); /* Thay đổi đường dẫn tới hình ảnh của bạn */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center; 
            justify-content: center; 
            margin: 0; 
        }
        .login-container {
            max-width: 400px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 1); 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .text-danger {
            color: #e74c3c; 
        }
        .social-login {
            margin-top: 20px;
        }
        .social-login a {
            margin-right: 10px; 
        }
    </style>
</head>
<body>
    <?php if(session('message')): ?>
    <div class="alert alert-success h1 text-center" role="alert">
        <?php echo e(session('message')); ?>

    </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
    <div class="alert alert-danger h1 text-center" role="alert">
        <?php echo e(session('error')); ?>

    </div>
    <?php endif; ?>

    <?php if($errors->has('account_locked')): ?>
    <div class="alert alert-danger">
        <?php echo e($errors->first('account_locked')); ?>

    </div>
    <?php endif; ?>
    
    <div class="login-container">
        <h2 class="text-center text-danger">Pink Store - Đăng Nhập</h2>
        <form action="<?php echo e(url('login/loginrun')); ?>" method="POST">
            <?php echo csrf_field(); ?> 
            <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
            <?php endif; ?>

            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
            </div>

            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger">
                <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger">
                <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <button type="submit" class="btn btn-danger btn-block">Đăng Nhập</button>
        </form>

        <div class="text-center social-login">
            <p>Hoặc đăng nhập bằng:</p>
            <a href="#" class="btn btn-outline-danger">
                <i class="fab fa-google" style="margin-right: 5px;"></i> Google
            </a>
            <a href="#" class="btn btn-outline-primary">
                <i class="fab fa-facebook" style="margin-right: 5px;"></i> Facebook
            </a>
            <a href="#" class="btn btn-outline-dark">
                <i class="fab fa-twitch" style="margin-right: 5px;"></i> Twitch
            </a>
        </div>

        <div class="text-center mt-3">
            <a href="/register">Bạn chưa có tài khoản? Đăng ký</a>
        </div>
        <div class="text-center mt-3">
            <a href="/forgot_password">Quên mật khẩu?</a>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php /**PATH D:\doan\DoAnNhomL\resources\views/User/crud_user/login_user.blade.php ENDPATH**/ ?>