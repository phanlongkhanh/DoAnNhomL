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
            return redirect()->route('index-orders')->with('error', 'Trạng thái không hợp lệ.');
        }

        $pays = Pay::find($id);

        if (!$pays) {
            return redirect()->route('index-orders')->with('error', 'Đơn hàng không tồn tại.');
        }

        $pays->status = $newStatus;
        $pays->save();

        return redirect()->route('index-orders')->with('success', 'Cập nhật tình trạng đơn hàng thành công.');
    }

    public function ActiveOrders($id)
    {
        $pays = Pay::findOrFail($id);
        $pays->active = !$pays->active;
        $pays->save();

        return redirect()->route('index-orders')->with('success', 'Trạng thái đã được cập nhật thành công.');
    }
}
