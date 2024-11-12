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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive1.css') }}">

    <style>
        body {
            background-color: #cdd4db;
            /* Nền sáng cho toàn trang */
        }

        /* Header */
        .header_section {
            background-color: #ee699e;
        }

        .navbar-brand h3 {
            color: #ff66b2;
        }

        .navbar-nav .nav-link {
            color: #ff4d88;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #e60073;

        }

        .navbar-toggler {
            border-color: #ff4d88;
        }

        h2 {
            color: #ff3399;

        }

        .card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            border: none;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 20px rgba(255, 102, 153, 0.2);

        }


        .card-img-top {
            transition: transform 0.3s ease;
        }

        .card:hover .card-img-top {
            transform: scale(1.05);
        }


        .btn-danger {
            background-color: #ff66b2;
            border-color: #ff66b2;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #ff3385;

            color: #fff;
        }


        .card-title {
            font-weight: bold;
            color: #ff4d88;

        }

        .card-text {
            color: #ff66b2;

        }

        .footer_section {
            background-color: #f471b2;
            color: #8c1a56;
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

    @if (session('success'))
        <div class="alert alert-success h4 text-center">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger h4 text-center">
            {{ session('error') }}
        </div>
    @endif

    <!-- Favorite Products Section -->
    <div class="container my-5">
        <h2 class="mb-4 text-center">Danh Sách Yêu Thích</h2>
        <h3>
            <hr>
        </h3>
        <div class="row">
            @if (isset($favorites))
                @foreach ($favorites as $item)
                    <div class="col-md-4 mb-4">
                        <a href="{{ route('details-products', ['id' => Crypt::encrypt($item->id_product)]) }}">
                            <div class="card shadow-sm">
                                <img src="{{ asset('images/' . $item->image) }}" width="300px" height="300px"
                                    class="card-img-top" alt="Sản Phẩm 1">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <p class="card-text">Giá: {{ number_format($item->price, 0, ',', '.') }} VNĐ</p>
                                    <form action="{{ route('delete-favorites', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Xóa khỏi yêu thích</button>
                                    </form>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="pagination justify-content-center mt-4">
            {{ $favorites->links('pagination::bootstrap-4') }}
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
