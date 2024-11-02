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
            <a class="navbar-brand text-danger" href="homepage">
                <h3 style="margin-right: 40px">Pink Store</h3>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="homepage">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="category-user-product">Danh Mục</a></li>
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

    @yield('content')

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
 @yield('content')
</body>