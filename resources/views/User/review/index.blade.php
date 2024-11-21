Review Ở đây

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