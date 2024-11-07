<?php

namespace App\Http\Controllers;
use App\Models\Pay;
use Carbon\Carbon;

use Illuminate\Http\Request;

class StatisticalController extends Controller
{

    public function ShowIndexStatistical()
    {
        // Lấy các thống kê tổng quát
        $totalRevenue = Pay::sum('total_price');
        $totalQuantity = Pay::sum('amount');

        // Lấy thống kê doanh thu theo ngày
        $dailySales = Pay::selectRaw('
            DATE(created_at) as date, 
            SUM(amount) as total_quantity,
            SUM(total_price) as total_sales
        ')
            ->groupBy('date')
            ->orderBy('date', 'asc') // Sắp xếp theo ngày
            ->get();
            
        // Lấy thống kê doanh thu theo phương thức thanh toán
        $salesByPayment = Pay::selectRaw('
        id_payment,
        SUM(amount) as total_quantity,
        SUM(total_price) as total_sales
    ')
            ->groupBy('id_payment')
            ->get();

        // Lấy thống kê doanh thu theo sản phẩm
        $salesByProduct = Pay::selectRaw('
        id_product,
        SUM(amount) as total_quantity,
        SUM(total_price) as total_sales
    ')
            ->groupBy('id_product')
            ->get();

        // Trả về view với dữ liệu cần thiết
        return view('Admin.statistical.index', compact('totalRevenue', 'totalQuantity', 'dailySales', 'salesByPayment', 'salesByProduct'));

    }

}
