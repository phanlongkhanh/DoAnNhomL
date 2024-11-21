<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pink Store - Danh Sách Yêu Thích</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive1.css') }}">

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

        .category-btn {
            margin: 0 5px;
            /* Khoảng cách giữa các nút lọc */
        }

        .post-card {
            transition: transform 0.2s, box-shadow 0.2s;
            /* Hiệu ứng chuyển động cho thẻ sản phẩm */
            border: 1px solid #ddd;
            /* Viền cho thẻ */
            border-radius: 10px;
            /* Bo tròn góc cho thẻ */
            overflow: hidden;
            /* Ẩn phần thừa */
            background-color: #fff;
            /* Màu nền cho thẻ */
        }

        .post-card img {
            border-bottom: 1px solid #ddd;
            /* Viền dưới cho hình ảnh */
        }

        .post-card:hover {
            transform: translateY(-5px);
            /* Nâng thẻ lên khi hover */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            /* Đổ bóng khi hover */
        }

        .footer_section {
            background-color: #212529;
            /* Màu nền xám đậm cho footer */
            color: #ffffff;
            /* Màu chữ cho footer */
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
            </div>
        </nav>
    </header>

    <div class="container my-5">
        <h2 class="mb-4 text-center">Danh Mục Bài Viết</h2>
        <div class="text-center mb-4">
            <button class="btn btn-outline-primary category-btn" onclick="filterProducts('all')">Tất Cả</button>
            <button class="btn btn-outline-primary category-btn" onclick="filterProducts('quần')">Sở Thích</button>
            <button class="btn btn-outline-primary category-btn" onclick="filterProducts('áo')">Lưu Niệm</button>
            <button class="btn btn-outline-primary category-btn" onclick="filterProducts('áo jane')">Bí Quyết</button>
            <button class="btn btn-outline-primary category-btn" onclick="filterProducts('quần jane')">Khó Khăn</button>
        </div>

        <div class="d-flex justify-content-center mb-4">
            <input type="text" class="form-control w-50" placeholder="Tìm Kiếm Bài Viết" id="searchInput">
            <button class="btn btn-outline-success ms-2" onclick="searchProducts()">Tìm</button>
        </div>

        <div class="row">
            @if (isset($posts))
                @if ($posts->isEmpty())
                    <p class="text-center">Không tìm thấy sản phẩm nào phù hợp.</p>
                @else
                    @foreach ($posts as $item)
                        <div class="col-md-4 mb-4">
                            <a href="#">
                                <div class="post-card shadow">
                                    <img src="{{ asset('images/' . $item->image) }}" class="card-img-top"
                                        alt="{{ $item->name }}">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $item->name }}</h5>
                                        <p class="card-text">{{ $item->description }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            @else
                <p class="text-center">Không Có Sản Phẩm</p>
            @endif
        </div>
        <div class="pagination justify-content-center mt-4">
            {{-- {{ $products->links('pagination::bootstrap-4') }} --}}
        </div>
    </div>

    <h3>
        <hr>
    </h3>
    <!-- Thông Tin Khác -->
    <div class="mt-4 text-center">
        <h5>Chính Sách Bảo Hành</h5>
        <p>Chúng tôi cung cấp chính sách bảo hành 1 năm cho tất cả sản phẩm.</p>
        <h5>Chính Sách Đổi Trả</h5>
        <p>Bạn có thể đổi hoặc trả hàng trong vòng 30 ngày.</p>
    </div>
    <h3>
        <hr>
    </h3>

    <!-- Testimonial Section -->
    <section class="client_section py-5" style="background-color: #f0f4f8;">
        <div class="container text-center">
            <h2 class="mb-4 text-secondary">Testimonial</h2>
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <p class="lead">"Sản phẩm tại Pink Store rất đa dạng và chất lượng."</p>
                        <small>- Khách hàng A</small>
                    </div>
                    <div class="carousel-item">
                        <p class="lead">"Dịch vụ khách hàng tuyệt vời!"</p>
                        <small>- Khách hàng B</small>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </section>

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
    <footer class="footer_section text-center py-4">
        <p>&copy; <span id="displayYear"></span> Pink Store. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('displayYear').textContent = new Date().getFullYear();
    </script>
</body>

</html>
