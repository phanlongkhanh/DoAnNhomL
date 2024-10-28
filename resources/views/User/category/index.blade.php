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
                    <li class="nav-item"><a class="nav-link" href="">Shop</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Why Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Testimonial</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Contact Us</a></li>
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
            <!-- Example Product Card 1 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Sản Phẩm 1">
                    <div class="card-body text-center">
                        <h5 class="card-title">Sản Phẩm 1</h5>
                        <p class="card-text">Giá: 500,000 VNĐ</p>
                        <button class="btn btn-danger">Thêm vào giỏ</button>
                    </div>
                </div>
            </div>

            <!-- Example Product Card 2 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Sản Phẩm 2">
                    <div class="card-body text-center">
                        <h5 class="card-title">Sản Phẩm 2</h5>
                        <p class="card-text">Giá: 300,000 VNĐ</p>
                        <button class="btn btn-danger">Thêm vào giỏ</button>
                    </div>
                </div>
            </div>

            <!-- Add more product cards as needed -->
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

        function filterProducts(category) {
            // Logic to filter products based on the category
            console.log("Filtering products by:", category);
        }

        function searchProducts() {
            const query = document.getElementById('searchInput').value;
            // Logic to search for products based on the query
            console.log("Searching for products:", query);
        }
    </script>
</body>

</html>
