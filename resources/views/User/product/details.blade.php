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
        /* Background gradient for entire body */
        body {
            background: linear-gradient(135deg, #f0f4f8, #dff0ea);
            color: #333;
        }
        
        /* Header with soft shadow */
        .header_section {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Footer background color */
        .footer_section {
            background-color: #2c3e50;
            color: #ecf0f1;
        }

        /* Product Detail Card */
        .card {
            border: none;
            background-color: #f8f9fa;
        }

        /* Carousel text and control style */
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
            color: #f1c40f; /* Màu vàng cho các sao */
        }

        .rating .fa.checked {
            color: #f39c12; /* Màu vàng đậm cho các sao đã được chọn */
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header_section py-3">
        <nav class="navbar navbar-expand-lg navbar-light container">
            <a class="navbar-brand text-danger" href="homepage"><h3 style="margin-right: 40px">Pink Store</h3></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="homepage">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="category-user-product">Danh Mục</a></li>
                    <li class="nav-item"><a class="nav-link" href="why.html">Live</a></li>
                    <li class="nav-item"><a class="nav-link" href="testimonial.html">Testimonial</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Fanpage</a></li>
                </ul>
                <div class="d-flex">
                    <a href="{{'cart-user-product'}}" class="btn btn-outline-danger me-2"><i class="fas fa-shopping-bag"></i></a>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search">
                        <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <!-- Product Detail Section -->
    <div class="container my-5">
        <h2 class="mb-4 text-center text-danger">Chi Tiết Sản Phẩm</h2>
        <div class="card mb-3 shadow-lg">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="images/aothun.jpg" style="height: 400px" class="img-fluid rounded-start" alt="Tên Sản Phẩm">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title" id="productName">Tên Sản Phẩm</h5>
                        <p class="card-text"><strong>Giá:</strong> <span id="productPrice">500,000 VNĐ</span></p>
                        <p class="card-text"><strong>Số Lượng:</strong> <span id="productQuantity">10</span></p>

                        <!-- Kích Cỡ và Màu Sắc -->
                        <p class="card-text"><strong>Kích Cỡ:</strong></p>
                        <select class="form-select mb-3" id="productSize">
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>

                        <p class="card-text"><strong>Màu Sắc:</strong></p>
                        <select class="form-select mb-3" id="productColor">
                            <option value="red">Đỏ</option>
                            <option value="blue">Xanh</option>
                            <option value="green">Xanh Lá</option>
                        </select>

                        <p class="card-text"><strong>Mô Tả:</strong> Đây là mô tả chi tiết về sản phẩm.</p>
                        <button class="btn btn-danger">Thêm vào giỏ</button>
                        
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

        <!-- Sản Phẩm Tương Tự -->
        <div class="similar-products mt-5">
            <h4 class="text-secondary">Sản Phẩm Tương Tự</h4>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <img src="images/aothun.jpg" class="card-img-top" alt="Sản Phẩm Tương Tự 1">
                        <div class="card-body">
                            <h5 class="card-title">Sản Phẩm 1</h5>
                            <p class="card-text">Giá: 400,000 VNĐ</p>
                            <button class="btn btn-danger">Thêm vào giỏ</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <img src="images/aothun.jpg" class="card-img-top" alt="Sản Phẩm Tương Tự 2">
                        <div class="card-body">
                            <h5 class="card-title">Sản Phẩm 2</h5>
                            <p class="card-text">Giá: 600,000 VNĐ</p>
                            <button class="btn btn-danger">Thêm vào giỏ</button>
                        </div>
                    </div>
                </div>
                <!-- Thêm các sản phẩm khác ở đây -->
            </div>
        </div>

        <!-- Thông Tin Khác -->
        <div class="mt-4">
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
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </section>

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
