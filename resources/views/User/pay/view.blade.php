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
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .footer_section {
            margin-top: auto;
            /* Đẩy footer xuống cuối */
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header_section bg-light py-3">
        <nav class="navbar navbar-expand-lg navbar-light container">
            <a class="navbar-brand text-danger" href="homepage">
                <h3 style="margin-right: 40px">Pink Store</h3>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="homepage">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="category-user-product">Danh Mục</a></li>
                    <li class="nav-item"><a class="nav-link" href="favorite-index">Favorite</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Post</a></li>
                    <li class="nav-item"><a class="nav-link" href="pay-view">Giao Hàng</a></li>
                </ul>
                <div class="d-flex">
                    <a href="{{ 'cart-user-product' }}" class="btn btn-outline-danger me-2"><i
                            class="fas fa-shopping-bag"></i></a>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search">
                        <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                    </form>
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
                        <th>Thông Tin Khách Hàng</th>
                        <th>Thông Tin Sản Phẩm</th>
                        <th>Phương Thức Vận Chuyển</th>
                        <th>Ngày Đặt Hàng</th>
                        <th>Tổng Tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($pays))
                        @foreach ($pays as $item)
                       
                            <tr>
                                <td>{{ $item->id }}357AB</td>
                                <td>
                                    <ul>
                                        <li>Họ Tên: {{ $item->user->name }} </li>
                                        <li>Địa Chỉ: {{ $item->address }} </li>
                                        <li>SĐT: {{ $item->phone }}</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li>Tên Sản Phẩm: {{ $item->name }}</li>
                                        <li>Số Lượng: {{ $item->amount }} </li>
                                        <li>Giá Tiền: {{ number_format($item->price, 0, ',', '.') }} VNĐ </li>
                                    </ul>
                                </td>
                                <td>{{ $item->transport->name }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ number_format($item->total_price, 0, ',', '.') }} VNĐ</td>
                            </tr>
                        @endforeach
                    @endif
                    <!-- Có thể thêm nhiều đơn hàng khác tại đây -->
                </tbody>
            </table>
        </div>
    </div>

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
