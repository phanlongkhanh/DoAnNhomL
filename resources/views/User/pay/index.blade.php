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

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('add-pays') }}" method="POST">
            @csrf
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Thông Tin Giao Hàng</h5>
                    @if ($user)
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên người dùng</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số Điện Thoại</label>
                            <input type="tel" class="form-control" id="phone" value="{{ $user->phone }}"
                                name="phone" pattern="[0-9]{10}" required>
                            <small class="form-text text-muted">Nhập số điện thoại 10 chữ số.</small>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa Chỉ Giao Hàng</label>
                            <input type="text" class="form-control" placeholder="Nhập vào địa chỉ giao hàng"
                                id="address" name="address" required>
                        </div>
                    @else
                        <p>Không có thông tin người dùng.</p>
                    @endif
                </div>

                <div class="col-md-6">
                    <h5>Phương Thức Thanh Toán</h5>
                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Chọn Phương Thức</label>
                        <select class="form-select" id="id_payment" name="id_payment" required>
                            @foreach ($payments as $payment)
                                <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <h5>Đơn Vị Vận Chuyển</h5>
                    <div class="mb-3">
                        <select class="form-select" id="id_transport" name="id_transport" required>
                            @foreach ($transports as $transport)
                                <option value="{{ $transport->id }}">{{ $transport->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <br>
                    <div class="mb-3">
                        <label for="description" class="form-label">Mong Muốn</label>
                        <input type="text" class="form-control" placeholder="Nhập vào mong muốn ?"
                            id="description" name="description" required>
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
                        $id_cart = []; // Khởi tạo mảng để lưu id_cart
                    @endphp
                    @if (isset($carts) && count($carts) > 0)
                        @foreach ($carts as $item)
                            @php
                                $tong += $item->total_price; // Tính tổng tiền
                            @endphp
                            <tr>
                                <td class="text-danger h5">{{ $item->product->name ?? 'Tên sản phẩm không có' }}</td>
                                <td class="price">{{ number_format($item->price, 0, ',', '.') ?? '0' }} VNĐ</td>
                                <td>{{ $item->amount }}</td>
                                <td class="total-price">{{ number_format($item->total_price, 0, ',', '.') ?? '0' }}
                                    VNĐ</td>
                            </tr>
                            <input type="hidden" name="id_product" value="{{ $item->id_product }}">
                            <input type="hidden" name="id_cart" value="{{ $item->id }}">
                            <input type="hidden" id="name" name="name" value="{{ $item->name }}">
                            <input type="hidden" id="amount" name="amount" value="{{ $item->amount }}">
                            <input type="hidden" id="price" name="price" value="{{ $item->price }}">
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center">Giỏ hàng trống.</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            <br>
            <div class="text-center">
                <h5 class="text-success">Tổng Tiền: <span id="total_price">{{ number_format($tong, 0, ',', '.') }}
                        VNĐ</span></h5>
                <input type="hidden" name="total_price" value="{{ $tong }}">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success mt-4">Xác Nhận Mua Hàng</button>
            </div>
        </form>
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
