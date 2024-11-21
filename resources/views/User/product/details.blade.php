<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pink Store - Chi Tiết Sản Phẩm</title>

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
            background: linear-gradient(135deg, #f0f4f8, #dff0ea);
            color: #333;
        }

        .header_section {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .footer_section {
            background-color: #2c3e50;
            color: #ecf0f1;
        }

        .card {
            border: none;
            background-color: #f8f9fa;
        }

        .carousel-item p {
            color: #555;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: #333;
            border-radius: 50%;
        }

        .rating .fa {
            font-size: 20px;
            color: #f1c40f;
        }

        .rating .fa.checked {
            color: #f39c12;
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

    <!-- Product Detail Section -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (isset($products))
        <div class="container my-5">
            <h2 class="mb-4 text-center text-danger">Chi Tiết Sản Phẩm</h2>
            <hr>
            <div class="card mb-3 shadow-lg">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('images/' . $products->image) }}" style="height: 400px"
                            class="img-fluid rounded-start" alt="Tên Sản Phẩm">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title h2 text-primary mb-4" id="productName">{{ $products->name }}</h5>
                            <p class="card-text"><strong>Giá: </strong>
                                <span>{{ number_format($products->price, 0, ',', '.') }}</span> VNĐ
                            </p>
                            <p class="card-text"><strong>Số Lượng Tồn Kho:</strong>
                                <span>{{ $products->amount }}</span>
                            </p>

                            <form action="{{ route('add.to.cart') }}" method="POST">
                                @csrf
                                <p class="card-text"><strong>Kích Cỡ:</strong></p>
                                <select class="form-select mb-3" name="size" id="productSize">
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>

                                <p class="card-text"><strong>Số Lượng:</strong></p>
                                <input id="amount" name="amount" type="number" class="form-control mb-3"
                                    min="1" max="100" value="1" placeholder="Nhập số lượng" required />

                                <p class="card-text"><strong>Màu Sắc:</strong></p>
                                <select class="form-select mb-3" name="color" id="productColor">
                                    <option value="red">Đỏ</option>
                                    <option value="blue">Xanh</option>
                                    <option value="green">Xanh Lá</option>
                                </select>

                                <input type="hidden" id="id_product" name="id_product"
                                    value="{{ $products->id_product }}">
                                <input type="hidden" id="name" name="name" value="{{ $products->name }}">
                                <input type="hidden" id="price" name="price" value="{{ $products->price }}">
                                <input type="hidden" id="image" name="image" value="{{ $products->image }}">
                                <button class="btn btn-danger" type="submit">Thêm vào giỏ</button>
                            </form>

                            <!-- Đánh Giá -->
                            <div class="mt-4">
                                <h5>Đánh Giá:</h5>
                                <div class="rating">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <textarea class="form-control mt-2" rows="3" placeholder="Viết nhận xét của bạn ở đây..."></textarea>
                                <button class="btn btn-primary mt-2">Gửi Nhận Xét</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <hr>

    <!-- Sản Phẩm Tương Tự -->

    <div class="similar-products mt-5">
        <h4 class="text-secondary">Sẩn Phẩm Tương Tự</h4>
        <div class="row">
            @if (isset($product) && $product->count() > 0)
                @foreach ($product as $item)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img src="{{ asset('images/' . $item->image) }}" class="card-img-top"
                                alt="Sản Phẩm Tương Tự">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <p class="card-text">Giá: {{ number_format($item->price, 0, ',', '.') }} VNĐ</p>
                                <button class="btn btn-danger">Thêm vào giỏ</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <p class="text-center">Không có sản phẩm tương tự nào.</p>
                </div>
            @endif
        </div>
    </div>
    <hr>
    <br>

    <!-- Thông Tin Khác -->
    <div class="mt-4 text-center">
        <h5>Chính Sách Bảo Hành</h5>
        <p>Chúng tôi cung cấp chính sách bảo hành 1 năm cho tất cả sản phẩm.</p>
        <h5>Chính Sách Đổi Trả</h5>
        <p>Bạn có thể đổi hoặc trả hàng trong vòng 30 ngày.</p>
    </div>
    </div>

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
            <a href="{{route('index-profile')}}" class="text-white text-center">
                <i class="fas fa-user"></i>
                <p style="margin: 0; font-size: 12px;">Profile</p>
            </a>
        </div>
    </nav>

    <!-- Footer -->
    <footer class="footer_section text-center py-4">
        <div class="container">
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
        document.querySelector('.btn-danger').addEventListener('click', function() {
            alert("Sản phẩm đã được thêm vào giỏ hàng!");
        });
    </script>
</body>

</html>
