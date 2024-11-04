<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pink Store - Giỏ Hàng</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive1.css') }}">
    <link rel="shortcut icon" href="{{ asset('homepage-images/favicon.png') }}" type="image/x-icon">

    <style>
        .table th,
        .table td {
            vertical-align: middle;
            /* Căn giữa theo chiều dọc */
            line-height: 1.5;
            /* Đặt chiều cao dòng cho các ô */
        }

        .text-center {
            text-align: center;
            /* Căn giữa nội dung */
        }
    </style>
</head>

<body>
    <!-- Header -->
       <header class="header_section bg-light py-3">
        <nav class="navbar navbar-expand-lg navbar-light container">
            <a class="navbar-brand text-danger" href="{{route('index-homepage')}}">
                <h3 style="margin-right: 40px">Pink Store</h3>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{route('index-homepage')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{route('category-product')}}">Danh Mục</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('index-favorites')}}">Favorite</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Post</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('view-pays')}}">Giao Hàng</a></li>
                </ul>
                <div class="d-flex">
                    <a href="{{route('index-cart')}}" class="btn btn-outline-danger me-2"><i
                            class="fas fa-shopping-bag"></i></a>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search">
                        <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    @if (session('success'))
        <div class="alert alert-success h4 text-center">
            {{ session('success') }}
        </div>
    @endif

    @if(Session::has('error'))
    <div class="alert alert-danger h3 text-center">
        {{ Session::get('error') }}
    </div>
@endif

    <!-- Cart Section -->
    <div class="container my-5">
        <h2 class="mb-4 text-center">Giỏ Hàng</h2>
        <table class="table table-bordered text-center">
            <thead class="table-light">
                <tr>
                    <th scope="col">Hình Ảnh</th>
                    <th scope="col">Tên Sản Phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Tổng</th>
                    <th scope="col">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($carts))
                    @foreach ($carts as $item)
                        <tr>
                            <td>
                                <img src="{{ asset('images/' . $item->image) }}" style="height: 200px"
                                    alt="Tên Sản Phẩm" class="img-fluid">
                            </td>
                            <td class="text-danger h5">{{ $item->name }}</td>
                            <td class="price">{{ number_format($item->price, 0, ',', '.') }} VNĐ</td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <button class="btn btn-outline-danger btn-sm"
                                        onclick="updateQuantity(this, -1)">-</button>
                                    <span class="mx-2 quantity">{{ $item->amount }}</span>
                                    <button class="btn btn-outline-success btn-sm"
                                        onclick="updateQuantity(this, 1)">+</button>
                                </div>
                            </td>
                            <td class="total-price">{{ number_format($item->total_price, 0, ',', '.') }} VNĐ</td>
                            <td>
                                <form action="{{ route('carts-remove', $item->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-xs btn-danger"
                                        onclick="return confirm('Bạn chắc chắn là xoá chứ')"><i class="fa fa-trash"></i>
                                        Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        @php
            $tong = 0;
        @endphp
        @foreach ($carts as $item)
            @php
                $tong += $item->total_price;
            @endphp
        @endforeach
        <div class="text-center">
            <h5 class="me-3">Tổng Tiền: <span id="totalPrice">{{ number_format($tong, 0, ',', '.') }} VNĐ</span></h5>
            @if (isset($carts) && count($carts) > 0)
                <a href="{{ route('edit-pays', ['id' => Crypt::encrypt($carts[0]->id)]) }}">
                    <button class="btn btn-success">Thanh Toán</button>
                </a>
            @else
                <button class="btn btn-success" disabled>Thanh Toán</button>
            @endif
        </div>
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

    <script>
        function updateQuantity(button, change) {
            // Lấy các phần tử cần thiết
            const row = button.closest('tr');
            const quantityElement = row.querySelector('.quantity');
            const priceElement = row.querySelector('.price');
            const totalPriceElement = row.querySelector('.total-price');
            const totalPriceDisplay = document.getElementById('totalPrice');

            let quantity = parseInt(quantityElement.innerText);
            quantity += change;

            if (quantity < 1) {
                quantity = 1;
            }
            quantityElement.innerText = quantity;

            const price = parseFloat(priceElement.innerText.replace(/ VNĐ/g, '').replace(/,/g, ''));
            const totalPrice = quantity * price;

            totalPriceElement.innerText = (totalPrice * 1000).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, '.') +
                ' VNĐ';

            updateTotalPrice();
        }

        function updateTotalPrice() {
            const totalPriceElements = document.querySelectorAll('.total-price');
            let total = 0;

            totalPriceElements.forEach(element => {
                const priceText = element.innerText.replace(/ VNĐ/g, '').replace(/,/g, '');
                total += (parseFloat(priceText) || 0) * 1000;
            });

            document.getElementById('totalPrice').innerText = total.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ',') +
                ' VNĐ';
        }
    </script>
</body>

</html>
