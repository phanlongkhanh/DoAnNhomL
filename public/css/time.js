
window.onload = function () {
    let currentIndex = 0;
    const products = document.querySelectorAll('.product-item'); // Lấy tất cả các sản phẩm

    // Hàm để hiển thị một sản phẩm
    function showProduct() {
        if (currentIndex < products.length) {
            products[currentIndex].style.display = 'block'; // Hiển thị sản phẩm
            currentIndex++; // Tăng index để chọn sản phẩm tiếp theo
        }
    }

    // Hiển thị sản phẩm đầu tiên ngay lập tức
    showProduct();

    // Sau mỗi 5 giây, hiển thị thêm một sản phẩm
    setInterval(showProduct, 15000);
};

