@extends('ControllerAdmin.dashboard_admin')
@section('content')
    <div class="row">
        <!-- Doanh Thu Theo Sản Phẩm -->
        <div class="col-lg-12">
            <canvas id="productSalesChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Dữ liệu thống kê sản phẩm từ controller
        const salesByProductData = @json($salesByProduct); // Lấy dữ liệu từ controller
        const productLabels = salesByProductData.map(item => item.id_product); // Mảng id_product
        const productSales = salesByProductData.map(item => item.total_sales); // Mảng doanh thu
        const productQuantities = salesByProductData.map(item => item.total_quantity); // Mảng số lượng bán

        // Cấu hình biểu đồ đường (Line Chart)
        const ctx = document.getElementById('productSalesChart').getContext('2d');
        const productSalesChart = new Chart(ctx, {
            type: 'line', // Thay bar thành line để vẽ biểu đồ đường
            data: {
                labels: productLabels, // Dữ liệu theo sản phẩm
                datasets: [
                    {
                        label: 'Doanh Thu (VNĐ)',
                        data: productSales, // Dữ liệu doanh thu
                        borderColor: 'rgba(75, 192, 192, 1)', // Màu đường cho doanh thu
                        backgroundColor: 'rgba(75, 192, 192, 0.2)', // Màu nền cho doanh thu
                        fill: false, // Không tô màu phía dưới đường
                        tension: 0.4, // Độ cong của đường
                    },
                    {
                        label: 'Số Lượng Bán',
                        data: productQuantities, // Dữ liệu số lượng bán
                        borderColor: 'rgba(255, 99, 132, 1)', // Màu đường cho số lượng bán
                        backgroundColor: 'rgba(255, 99, 132, 0.2)', // Màu nền cho số lượng bán
                        fill: false, // Không tô màu phía dưới đường
                        tension: 0.4, // Độ cong của đường
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true // Đảm bảo trục Y bắt đầu từ 0
                    }
                },
                plugins: {
                    legend: {
                        display: true, // Hiển thị legend để phân biệt các dataset
                        position: 'top'
                    }
                }
            }
        });
    </script>


 
@endsection