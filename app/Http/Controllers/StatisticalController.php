<?php

namespace App\Http\Controllers;
use App\Models\Pay;
use Carbon\Carbon;

use Illuminate\Http\Request;

class StatisticalController extends Controller
{

    public function ShowIndexStatistical()
    {

        $user = auth()->user();

        if (!$user || $user->role_id != 1) {
            return redirect()->route('index-homepage')->with('error', 'Bạn không có quyền truy cập trang này');
        }

        // Tổng doanh thu và tổng số lượng sản phẩm
        $totalRevenue = Pay::sum('total_price');
        $totalQuantity = Pay::sum('amount');

        // Doanh thu hôm nay
        $today = Carbon::today();
        $todayRevenue = Pay::whereDate('created_at', $today)->sum('total_price');

        // Doanh thu theo ngày
        $dailySales = Pay::selectRaw('
                DATE(created_at) as date, 
                SUM(amount) as total_quantity,
                SUM(total_price) as total_sales
            ')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // Doanh thu theo phương thức thanh toán
        $salesByPayment = Pay::selectRaw('
                id_payment,
                SUM(amount) as total_quantity,
                SUM(total_price) as total_sales
            ')
            ->groupBy('id_payment')
            ->orderBy('id_payment', 'asc')
            ->get();

        // Doanh thu theo sản phẩm
        $salesByProduct = Pay::selectRaw('
                id_product,
                SUM(amount) as total_quantity,
                SUM(total_price) as total_sales
            ')
            ->groupBy('id_product')
            ->orderBy('id_product', 'asc')
            ->get();

        // Tổng doanh thu cộng với doanh thu hôm nay
        $combinedRevenue = $totalRevenue + $todayRevenue;

        // Trả về view với dữ liệu cần thiết
        return view('Admin.statistical.index', compact(
            'totalRevenue',
            'totalQuantity',
            'dailySales',
            'salesByPayment',
            'salesByProduct',
            'todayRevenue',
            'combinedRevenue'
        ));
    }


}
