<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pink Store - Livestream</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <script src="{{ asset('css/time.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive1.css') }}">
    <link rel="shortcut icon" href="{{ asset('homepage-images/favicon.png') }}" type="image/x-icon">

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
                    <li class="nav-item"><a class="nav-link" href="{{ route('category-product') }}">Danh Mục</a></li>
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


    <!-- Livestream Section -->
    <div class="container my-5">
        <h2 class="mb-4 text-center">Livestream - Pink Store</h2>
        <div class="row">
            @if (isset($livestreams))
                <div class="col-md-8">
                    <div class="video-container mb-4">
                        <iframe width="100%" height="500" src="{{ $livestreams->video_url }}" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                    <h4>{{ $livestreams->title }}</h4>
                    <p>{{ $livestreams->description }}</p>
                </div>


                <div class="col-md-4">
                    <h4 class="mb-4">Sản Phẩm Đang Bán</h4>
                    <div id="product-container">
                        @foreach ($products as $key => $item)
                            <ul class="list-group product-item" style="display: none;"
                                id="product-{{ $key }}">
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between">
                                        <span>{{ $item->name }}</span>
                                        <span class="text-danger">{{ number_format($item->price, 0, ',', '.') }}
                                            VND</span>
                                    </div>
                                    <form action="{{ route('add-livestreams') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_product" value="{{ $item->id }}">
                                        <input type="hidden" name="name" value="{{ $item->name }}">  
                                        <input type="hidden" name="price" value="{{ $item->price }}">  
                                        <input type="hidden" name="image" value="{{ $item->image }}"> 
                                        <input class="btn btn-outline-primary btn-sm mt-2" style="width:50px ; " type="number" name="amount" value="1" min="1"> 
                                        <button type="submit" class="btn btn-outline-danger btn-sm mt-2">Thêm vào giỏ</button>
                                    </form>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>



            @endif
        </div>
    </div>

    <!-- Chat Section -->
    <div class="container chat-section">
        <div class="chat-container">
            <h4 class="text-center mb-4">Chat Trực Tiếp</h4>
            <div class="chat-box" style="height: 300px; overflow-y: scroll; border: 1px solid #ddd; padding: 10px;">
                @foreach ($messages as $message)
                    @if ($message->user->role_id == 1)
                        <p style="color: red;"><strong>{{ $message->user->name }}:</strong> {{ $message->message }}
                        </p>
                    @else
                        <p><strong>{{ $message->user->name }}:</strong> {{ $message->message }}</p>
                    @endif
                @endforeach
            </div>
            <form action="{{ route('chat.send', ['id' => $livestreams->id]) }}" method="POST">
                @csrf
                <div class="input-group mt-3">
                    <input type="text" name="message" class="form-control" placeholder="Nhập tin nhắn" required>
                    <button type="submit" class="btn btn-danger">Gửi</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer_section bg-dark text-white py-4">
        <div class="container text-center">
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
