<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pink Store - Thanh Toán</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive1.css') }}">
    <link rel="shortcut icon" href="{{ asset('homepage-images/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/pay.css') }}">

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
                    <li class="nav-item"><a class="nav-link" href="">Testimonial</a></li>
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

    <div class="container my-5">
        <h2 class="mb-4 text-center">Thanh Toán</h2>

        @if (session('success'))
            <div class="alert alert-success h4 text-center">
                {{ session('success') }}
            </div>
        @endif

        <form action="#" method="POST">
            @csrf
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Thông Tin Giao Hàng</h5>
                    <div class="mb-3">
                        <label for="name" class="form-label">Họ và Tên</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số Điện Thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa Chỉ Giao Hàng</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5>Phương Thức Thanh Toán</h5>
                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Chọn Phương Thức</label>
                        <select class="form-select" id="payment_method" name="payment_method" required>
                            <option value="credit_card">Thẻ Tín Dụng</option>
                            <option value="bank_transfer">Chuyển Khoản Ngân Hàng</option>
                            <option value="cash_on_delivery">Thanh Toán Khi Nhận Hàng</option>
                        </select>
                    </div>

                    <h5>Đơn Vị Vận Chuyển</h5>
                    <div class="mb-3">
                        <label for="shipping_method" class="form-label">Chọn Đơn Vị</label>
                        <select class="form-select" id="shipping_method" name="shipping_method" required>
                            <option value="vnpost">VNPost</option>
                            <option value="ghn">Giao Hàng Nhanh</option>
                            <option value="ghn_express">Giao Hàng Tiết Kiệm</option>
                        </select>
                    </div>
                </div>
            </div>

            <h5 class="mb-4">Thông Tin Đơn Hàng</h5>
            <table class="table table-bordered text-center">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Tên Sản Phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số Lượng</th>
                        <th scope="col">Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $tong = 0;
                    @endphp
                    {{-- @foreach ($carts as $item) --}}
                    <tr>
                        <td class="text-danger h5">Tên Sản Phẩm</td>
                        <td class="price">Giá Tiền VNĐ</td>
                        <td>Số Lượng</td>
                        <td class="total-price">Giá Tiền VNĐ</td>
                        @php

                        @endphp
                    </tr>
                    {{-- @endforeach --}}
                </tbody>
            </table>
            <br>
            <div class="text-center">
                <h5 class="text-success" >Tổng Tiền: <span id="totalPrice">0 VNĐ</span></h5>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success mt-4">Xác Nhận Thanh Toán</button>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <footer class="footer_section bg-dark text-white py-4">
        <div class="container text-center">
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
