@extends('ControllerAdmin.dashboard_admin')
@section('content')
    <div class="row">
        <!-- Doanh Thu Theo Sản Phẩm -->
        <div class="col-lg-12">
            <canvas id="productSalesChart"></canvas>
        </div>
        <div class="col-lg-12 mb-3">
            <h4 class="text-danger">Tổng Doanh Thu: {{ number_format($totalRevenue, 0, ',', '.') }} VNĐ</h4>
            <h4 class="text-primary">Doanh Thu Hôm Nay: {{ number_format($todayRevenue, 0, ',', '.') }} VNĐ</h4>
            {{-- <h4 class="text-sucsses">Tổng Doanh Thu + Doanh Thu Hôm Nay: {{ number_format($combinedRevenue, 0, ',', '.') }} VNĐ</h4> --}}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Sales data for products, passed from the controller
        const salesByProductData = @json($salesByProduct);
        const productLabels = salesByProductData.map(item => item.id_product); // Product IDs as labels
        const productSales = salesByProductData.map(item => item.total_sales); // Sales revenue data
        const productQuantities = salesByProductData.map(item => item.total_quantity); // Sales quantities data

        // Initializing the chart
        const ctx = document.getElementById('productSalesChart').getContext('2d');
        const productSalesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: productLabels, // Labels for products
                datasets: [{
                        label: 'Doanh Thu (VNĐ)', // Revenue label
                        data: productSales,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        fill: true,
                        tension: 0.4,
                        yAxisID: 'y1' // Specify which axis for sales revenue
                    },
                    {
                        label: 'Số Lượng Bán', // Quantity label
                        data: productQuantities,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        fill: true,
                        tension: 0.4,
                        yAxisID: 'y2' // Specify which axis for quantity
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y1: {
                        beginAtZero: true,
                        position: 'left',
                        title: {
                            display: true,
                            text: 'Doanh Thu (VNĐ)'
                        }
                    },
                    y2: {
                        beginAtZero: true,
                        position: 'right',
                        title: {
                            display: true,
                            text: 'Số Lượng Bán'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                }
            }
        });
    </script>
@endsection
