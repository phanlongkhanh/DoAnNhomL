<?php

namespace App\Http\Controllers;
use App\Models\Pay;
use App\Models\Order;
use Illuminate\Http\Request;

class OdersController extends Controller
{
    public function ShowIndexOders()
    {
        $pays = Pay::with(['user', 'transport', 'payment'])->get();
        return view('Admin.oders.index', compact('pays'));
    }

    public function ShowViewOders()
    {
        $pays = Pay::with(['user', 'transport', 'payment'])->get();
        return view('Admin.oders.view', compact('pays'));
    }

    public function updateStatus(Request $request, $id)
    {

        $validStatuses = ['Đang vận chuyển', 'Đã bàn giao', 'Hủy'];

        $newStatus = $request->input('status');

        if (!in_array($newStatus, $validStatuses)) {
            return redirect('oders-index')->with('error', 'Trạng thái không hợp lệ.');
        }

        $pay = Pay::find($id);

        if (!$pay) {
            return redirect('oders-index')->with('error', 'Đơn hàng không tồn tại.');
        }

        $pay->status = $newStatus;
        $pay->save();

        return redirect('oders-index')->with('success', 'Cập nhật tình trạng đơn hàng thành công.');
    }
}
