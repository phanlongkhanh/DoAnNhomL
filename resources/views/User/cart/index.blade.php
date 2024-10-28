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
                <tr>
                    <td><img src="https://via.placeholder.com/100" alt="Tên Sản Phẩm" class="img-fluid"></td>
                    <td>Tên Sản Phẩm 1</td>
                    <td>500,000 VNĐ</td>
                    <td>
                        <div class="d-flex align-items-center justify-content-center">
                            <button class="btn btn-outline-danger btn-sm" onclick="decrementQuantity(this)">-</button>
                            <span class="mx-2" id="quantity">1</span>
                            <button class="btn btn-outline-success btn-sm" onclick="incrementQuantity(this)">+</button>
                        </div>
                    </td>
                    <td>500,000 VNĐ</td>
                    <td><button class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
                </tr>
                <tr>
                    <td><img src="https://via.placeholder.com/100" alt="Tên Sản Phẩm" class="img-fluid"></td>
                    <td>Tên Sản Phẩm 2</td>
                    <td>300,000 VNĐ</td>
                    <td>
                        <div class="d-flex align-items-center justify-content-center">
                            <button class="btn btn-outline-danger btn-sm" onclick="decrementQuantity(this)">-</button>
                            <span class="mx-2" id="quantity">1</span>
                            <button class="btn btn-outline-success btn-sm" onclick="incrementQuantity(this)">+</button>
                        </div>
                    </td>
                    <td>300,000 VNĐ</td>
                    <td><button class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
                </tr>
                <!-- Add more products as needed -->
            </tbody>
        </table>
        <div class="text-center">
            <h5 class="me-3">Tổng Tiền: <span id="totalPrice">800,000 VNĐ</span></h5>
            <button class="btn btn-success">Tiến Hành Thanh Toán</button>
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
</body>

</html>
