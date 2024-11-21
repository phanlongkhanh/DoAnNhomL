<?php

namespace App\Http\Controllers;
use App\Models\Pay;
use App\Models\Order;
use App\Models\Product;
use App\Models\Suppliers;
use App\Models\ProductType;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OdersController extends Controller
{
    public function ShowIndexOders()
    {
        $user = auth()->user();

        if (!$user || $user->role_id != 1) {
            return redirect()->route('index-homepage')->with('error', 'Bạn không có quyền truy cập trang này');
        }

        $pays = Pay::with(['user', 'transport', 'payment'])->get();
        return view('Admin.orders.index', compact('pays'));
    }

    public function ShowViewOders()
    {
        return view('Admin.orders.view');
    }



    public function DeleteOrders($payId)
    {
        $userId = auth()->id();
        if (!$userId) {
            return redirect('login')->with('error', 'Bạn cần đăng nhập để xóa đơn hàng.');
        }
        $pay = Pay::where('id', $payId)->where('id_user', $userId)->first();
        if (!$pay) {
            return redirect()->back()->with('error', 'Đơn hàng không tồn tại hoặc không thuộc quyền của bạn.');
        }
        try {
            $pay->delete();
            return redirect()->route('index-orders')->with('success', 'Đơn hàng đã được xóa thành công.');
        } catch (\Exception $e) {
            \Log::error('Lỗi khi xóa đơn hàng: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xóa đơn hàng: ' . $e->getMessage());
        }
    }

    public function EditOrders($encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
        } catch (DecryptException $e) {
            return redirect()->route('view-orders', ['id' => $encryptedId])
                ->with('error', 'Không tìm thấy với ID này.');
        }

        $orders = Pay::find($id);
        $pays = Pay::all();
        if (!$orders) {
            return redirect()->route('view-orders', ['id' => $encryptedId])
                ->with('error', 'Không tìm thấy với ID này.');
        }

        return view('Admin.orders.view', compact('orders', 'pays'));
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
