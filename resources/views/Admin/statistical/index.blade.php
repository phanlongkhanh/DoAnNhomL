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
        
        const salesByProductData = @json($salesByProduct); 
        const productLabels = salesByProductData.map(item => item.id_product); 
        const productSales = salesByProductData.map(item => item.total_sales); 
        const productQuantities = salesByProductData.map(item => item.total_quantity);

        const ctx = document.getElementById('productSalesChart').getContext('2d');
        const productSalesChart = new Chart(ctx, {
            type: 'line', 
            data: {
                labels: productLabels, 
                datasets: [
                    {
                        label: 'Doanh Thu (VNĐ)',
                        data: productSales, 
                        borderColor: 'rgba(75, 192, 192, 1)', 
                        backgroundColor: 'rgba(75, 192, 192, 0.2)', 
                        fill: false, 
                        tension: 0.4, 
                    },
                    {
                        label: 'Số Lượng Bán',
                        data: productQuantities, 
                        borderColor: 'rgba(255, 99, 132, 1)', 
                        backgroundColor: 'rgba(255, 99, 132, 0.2)', 
                        fill: false, 
                        tension: 0.4, 
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true 
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