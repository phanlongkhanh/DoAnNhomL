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
@yield('tilte')
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