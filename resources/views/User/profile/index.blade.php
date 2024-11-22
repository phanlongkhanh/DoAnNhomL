<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pink Store - Hồ Sơ</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive1.css') }}">
    <link rel="shortcut icon" href="{{ asset('homepage-images/favicon.png') }}" type="image/x-icon">
</head>

<body>
    <!-- Header -->
    <header class="header_section bg-light py-3">
        <nav class="navbar navbar-expand-lg navbar-light container">
            <a class="navbar-brand text-danger" href="{{ route('index-homepage') }}">
                <h3 style="margin-right: 40px">Pink Store</h3>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('index-homepage') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('category-product') }}">Danh Mục</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('index-favorites') }}">Favorite</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('index-post-user') }}">Post</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('view-pays') }}">Giao Hàng</a></li>
                </ul>
                <div class="d-flex">
                    <a href="{{ route('index-cart') }}" class="btn btn-outline-danger me-2"><i
                            class="fas fa-shopping-bag"></i></a>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search">
                        <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div style="margin-left: 80px;">
                    @if ($users)
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>{{ $users->name }}</span>
                    @else
                        <a href="{{ route('login') }}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>Login</span>
                        </a>
                    @endif
                </div>
            </div>
        </nav>
    </header>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- Profile Section -->
    <div class="container my-5">
        <h2 class="mb-4 text-center">Thông Tin Hồ Sơ</h2>
        <div class="row">
            @if ($users)
                <div class="col-md-4 text-center">
                    <img src="{{ asset('user-image/' . $users->image) }}" alt="Bạn Chưa Có Ảnh Đại Diện !!!!"
                        class="img-fluid rounded-circle mb-3" style="width: 200px;">
                    <h4 class="text-danger">{{ $users->name }}</h4>
                    <p>Email: {{ $users->email }}</p>
                </div>
            @endif

            <div class="col-md-8">
                @if ($users)
                    <form action="{{ route('update-profile', ['id' => $users->id]) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ Tên</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $users->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $users->email }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số Điện Thoại</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ $users->phone }}">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa Chỉ</label>
                            <input type="text" class="form-control" id="address" name="address"
                                value="{{ $users->address }}">
                        </div>
                        <button type="submit" class="btn btn-danger">Cập Nhật</button>
                @endif
                </form>
            </div>
            <div class="col-md-4 ">
                <!-- Form tải ảnh đại diện -->
                <h3 class="mt-5">Tải Ảnh Đại Diện</h3>
                <form action="{{ route('update-image', ['id' => $users->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label">Tải ảnh đại diện</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Tải lên</button>
                </form>
            </div>
            <div class="col-md-8">
                <!-- Form đổi mật khẩu -->
                <h3 class="mt-5">Đổi Mật Khẩu</h3>
                <form action="{{ route('update-password', ['id' => $users->id]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Mật khẩu hiện tại</label>
                        <input type="password" class="form-control" id="current_password" name="current_password"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">Mật khẩu mới</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label">Xác nhận mật khẩu mới</label>
                        <input type="password" class="form-control" id="new_password_confirmation"
                            name="new_password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Thay đổi mật khẩu</button>
                </form>
                </form>
            </div>

        </div>
    </div>

    <!-- Bottom Navbar -->
    <nav class="navbar navbar-dark bg-dark fixed-bottom">
        <div class="container-fluid d-flex justify-content-around">
            <a href="{{ route('index-homepage') }}" class="text-white text-center">
                <i class="fas fa-home"></i>
                <p style="margin: 0; font-size: 12px;">Home</p>
            </a>
            <a href="{{ route('category-product') }}" class="text-white text-center">
                <i class="fas fa-th"></i>
                <p style="margin: 0; font-size: 12px;">Categories</p>
            </a>
            <a href="{{ route('index-cart') }}" class="text-white text-center">
                <i class="fas fa-shopping-cart"></i>
                <p style="margin: 0; font-size: 12px;">Cart</p>
            </a>
            <a href="{{ route('index-profile') }}" class="text-white text-center">
                <i class="fas fa-user"></i>
                <p style="margin: 0; font-size: 12px;">Profile</p>
            </a>
        </div>
    </nav>

    <!-- Footer -->
    <footer class="footer_section bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; <span id="displayYear"></span> Pink Store. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('displayYear').textContent = new Date().getFullYear();
    </script>
</body>

</html>
