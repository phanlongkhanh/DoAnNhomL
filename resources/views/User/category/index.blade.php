<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pink Store - Danh Mục Sản Phẩm</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive1.css') }}">
    <link rel="shortcut icon" href="{{ asset('homepage-images/favicon.png') }}" type="image/x-icon">
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

    <!-- Product Category Section -->
    <div class="container my-5">
        <h2 class="mb-4 text-center">Danh Mục Sản Phẩm</h2>
        <div class="text-center mb-4">
            <button class="btn btn-outline-primary category-btn" onclick="filterProducts('all')">Tất Cả</button>
            <button class="btn btn-outline-primary category-btn" onclick="filterProducts('quần')">Quần</button>
            <button class="btn btn-outline-primary category-btn" onclick="filterProducts('áo')">Áo</button>
            <button class="btn btn-outline-primary category-btn" onclick="filterProducts('áo jane')">Áo Jane</button>
            <button class="btn btn-outline-primary category-btn" onclick="filterProducts('quần jane')">Quần
                Jane</button>
        </div>

        <div class="d-flex justify-content-center mb-4">
            <input type="text" class="form-control w-50" placeholder="Tìm Kiếm Sản Phẩm" id="searchInput">
            <button class="btn btn-outline-success ms-2" onclick="searchProducts()">Tìm</button>
        </div>



        <div class="row">
            @if (isset($products))
                @if ($products->isEmpty())
                    <p>Không tìm thấy sản phẩm nào phù hợp.</p>
                @else
                    @foreach ($products as $item)
                        <div class="col-md-4 mb-4">
                            <a href="{{ route('details-products', ['id' => Crypt::encrypt($item->id_product)]) }}">
                                @csrf
                                @method('post')
                                <div class="card shadow">
                                    <img src="{{ asset('images/' . $item->image) }}" width="300px" height="300px"
                                        class="card-img-top" alt="Sản Phẩm 1">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $item->name }}</h5>
                                        <p class="card-text">Giá: {{ number_format($item->price, 0, ',', '.') }} VNĐ
                                        </p>
                                        <form action="{{ route('add.to.cart') }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="id_product" value="{{ $item->id_product }}">
                                            <input type="hidden" name="name" value="{{ $item->name }}">
                                            <input type="hidden" name="amount" value="1">
                                            <input type="hidden" name="price" value="{{ $item->price }}">
                                            <input type="hidden" name="image" value="{{ $item->image }}">
                                            <button type="submit" class="btn btn-danger"
                                                style="margin-top: 5px;">Add to cart</button>
                                        </form>
                                        <form action="{{ route('add-favorites') }}" method="post"
                                            style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="id_product" value="{{ $item->id_product }}">
                                            <input type="hidden" name="name" value="{{ $item->name }}">
                                            <input type="hidden" name="amount" value="1">
                                            <input type="hidden" name="price" value="{{ $item->price }}">
                                            <input type="hidden" name="image" value="{{ $item->image }}">
                                            <button type="submit" class="btn btn-danger"
                                                style="margin-top: 5px; margin-left: 10px;">
                                                <p class="fa fa-heart" style="margin: 0;"></p>
                                        </form>
                                        <form action="{{route('index-review')}}" method="get" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger"
                                                style="margin-top: 5px; margin-left: 10px;">
                                                <p class="fa-solid fa-pen-to-square" style="margin: 0;"></p>
                                        </form>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            @else
                <p>Không Có Sản Phẩm</p>
            @endif
        </div>
        <div class="pagination justify-content-center mt-4">
            {{ $products->links('pagination::bootstrap-4') }}
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
            <a href="{{route('live-index')}}" class="text-white text-center">
                <i class="fas fa-shopping-cart"></i>
                <p style="margin: 0; font-size: 12px;">Live</p>
            </a>
            <a href="{{route('index-profile')}}" class="text-white text-center">
                <i class="fas fa-user"></i>
                <p style="margin: 0; font-size: 12px;">Profile</p>
            </a>
        </div>
    </nav>


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
        function searchProducts() {
            var query = document.getElementById('searchInput').value;

            // Chuyển hướng đến route tìm kiếm với tham số truy vấn
            window.location.href = `{{ route('category-products.search') }}?query=` + encodeURIComponent(query) +
                `&category=all`;
        }
    </script>


    <script>
        function filterProducts(category) {
            var query = document.getElementById('searchInput').value;
            // Chuyển hướng đến route với danh mục được chọn
            window.location.href = `{{ route('category-products.search-selective') }}?query=` + encodeURIComponent(query) +
                `&category=` + encodeURIComponent(category);
        }
    </script>
</body>

</html>
