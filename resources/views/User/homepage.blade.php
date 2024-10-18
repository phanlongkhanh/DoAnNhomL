


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="homepage">Tên hoặc Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item m-3">
                        <a class="nav-link active" aria-current="page" href="homepage">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link m-3" href="#">Sản Phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link m-3" href="#">Giỏ Hàng</a>
                    </li>
                    <div class="d-inline-flex align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="admin-login"><button class="dropdown-item" type="button">Login Admin</button></a>  
                            </div>
                        </div>
                        
                    </div>
                </ul>
            </div>
        </div>
    </nav>

   

     <!-- Sản phẩm -->
     <div class="container my-5">
        <h2 class="text-center text-danger mb-4">Danh sách sản phẩm</h2>
        <div class="row">
            <!-- Sản phẩm 1 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Sản phẩm 1">
                    <div class="card-body">
                        <h5 class="card-title">Sản phẩm 1</h5>
                        <p class="card-text">Giá: 500,000 VND</p>
                        <a href="#" class="btn btn-primary">Thêm vào giỏ</a>
                    </div>
                </div>
            </div>

            <!-- Sản phẩm 2 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Sản phẩm 2">
                    <div class="card-body">
                        <h5 class="card-title">Sản phẩm 2</h5>
                        <p class="card-text">Giá: 1,000,000 VND</p>
                        <a href="#" class="btn btn-primary">Thêm vào giỏ</a>
                    </div>
                </div>
            </div>

            <!-- Sản phẩm 3 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Sản phẩm 3">
                    <div class="card-body">
                        <h5 class="card-title">Sản phẩm 3</h5>
                        <p class="card-text">Giá: 750,000 VND</p>
                        <a href="#" class="btn btn-primary">Thêm vào giỏ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS and dependencies (Popper and JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>