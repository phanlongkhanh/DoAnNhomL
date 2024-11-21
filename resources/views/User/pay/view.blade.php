<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pink Store - Theo Dõi Đơn Hàng</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive1.css') }}">
    <link rel="shortcut icon" href="{{ asset('homepage-images/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/order-tracking.css') }}">
    <style>
        body {
            background-color: #f0f8ff;
            /* Nền sáng cho toàn trang */
        }

        .header_section {
            background-color: #ffffff;
            /* Màu nền trắng cho header */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* Đổ bóng cho header */
        }

        .card {
            transition: transform 0.2s;
            /* Hiệu ứng chuyển động cho thẻ sản phẩm */
        }

        .card:hover {
            transform: scale(1.05);
            /* Phóng to thẻ khi hover */
        }

        .category-btn {
            margin: 0 5px;
            /* Khoảng cách giữa các nút lọc */
        }

        .footer_section {
            background-color: #212529;
            /* Màu nền xám đậm cho footer */
        }

        .footer_section a {
            color: #ffffff;
            /* Màu chữ cho các liên kết trong footer */
        }

        .footer_section a:hover {
            color: #d1d1d1;
            /* Màu chữ khi hover trên các liên kết */
        }

        .btn-outline-primary {
            border-color: #007bff;
            /* Màu viền cho nút */
            color: #007bff;
            /* Màu chữ cho nút */
        }

        .btn-outline-primary:hover {
            background-color: #007bff;
            /* Màu nền khi hover */
            color: #ffffff;
            /* Màu chữ khi hover */
        }
    </style>
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
                    <li class="nav-item"><a class="nav-link active" href="{{ route('category-product') }}">Danh Mục</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('index-favorites') }}">Favorite</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Post</a></li>
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
                        <span>{{ $users }}</span>
                    @else
                        <a href="{{ route('login') }}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>Login</span>
                        </a>
                    @endif
                </div>

                <div style="margin-left: 30px;">
                    @if ($users)
                        <a href="{{ route('logout-user') }}">
                            <span>LogOut</span>
                        </a>
                    @else
                        <a href="#">

                            <span></span>
                        </a>
                    @endif
                </div>
            </div>
        </nav>
    </header>

    <!-- Order Tracking Section -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Theo Dõi Đơn Hàng</h2>
        <form class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Nhập mã đơn hàng của bạn" aria-label="Order ID">
                <button class="btn btn-outline-success" type="submit">Theo Dõi</button>
            </div>
        </form>

        <div class="order-details">
            <h4>Thông Tin Đơn Hàng</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mã Đơn Hàng</th>
                        <th>Tên Khách Hàng</th>
                        <th>Thông Tin Sản Phẩm</th>
                        <th>Ngày Đặt Hàng</th>
                        <th>Tổng Tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($pays))
                        @foreach ($pays as $item)
                            @if ($item->active == 0)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>
                                        <ul>Sản Phẩm: {{ $item->name }}</ul>
                                        <ul>Số Lượng: {{ $item->amount }}</ul>
                                        <ul>Giá Tiền: {{ number_format($item->price, 0, ',', '.') ?? '0' }} VNĐ</ul>
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ number_format($item->total_price, 0, ',', '.') ?? '0' }} VNĐ</td>
                                </tr>
                            @endif
                        @endforeach
                    @endif
                    @php
                        $tong = 0;
                    @endphp
                    @foreach ($pays as $item)
                        @if ($item->active == 0)
                            @php
                                $tong += $item->total_price;
                            @endphp
                        @endif
                    @endforeach
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Tổng Tiền Thanh Toán</td>
                    <td>{{ number_format($tong, 0, ',', '.') ?? '0' }} VNĐ</td>
                    <!-- Có thể thêm nhiều đơn hàng khác tại đây -->
                </tbody>
            </table>
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
            <a href="#profile" class="text-white text-center">
                <i class="fas fa-user"></i>
                <p style="margin: 0; font-size: 12px;">Profile</p>
            </a>
        </div>
    </nav>

    <!-- Footer -->
    <footer class="footer_section bg-dark text-white py-4">
        <div class="text-center">
            <div class="social-icons mb-3">
                <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-youtube"></i></a>
            </div>
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
