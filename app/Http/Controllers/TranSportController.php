<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Suppliers;
use App\Models\TranSport;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TranSportController extends Controller
{
    public function ShowIndexTranSport()
    {
        $transports = TranSport::all();
        return view('Admin.transport.index', compact('transports'));
    }
    public function ShowCreateTranSport()
    {
        return view('Admin.transport.create');
    }
    public function ShowUpdateTranSport()
    {
        return view('Admin.transport.update');
    }

    // mã hóa và edit
    public function EditTranSport($encryptedId)
    {
        $transports = TranSport::find($encryptedId);
        try {
            $id = Crypt::decrypt($encryptedId);
        } catch (DecryptException $e) {
            return redirect('index-transport')->with('error', 'Không tìm thấy loại sản phẩm với ID này.');
        }

        $transports = TranSport::find($id);

        if (!$transports) {
            return redirect('index-transport')->with('error', 'Không tìm thấy loại sản phẩm với ID này.');
        }

        return view('Admin.transport.update', compact('transports'));
    }
    //Thêm Đơn Vị Vận Chuyển
    public function AddProductType(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect('index-transport')
                ->withErrors($validator)
                ->withInput();
        }


        $transports = new TranSport();
        $transports->name = $request->name;
        $transports->description = $request->description;

        // Lưu hình ảnh vào thư mục public/images
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('transport-image'), $imageName);
            $transports->image = $imageName;
        }

        $transports->save();


        return redirect('index-transport')->with('success', 'Thêm Thành Công !!!');
    }

    public function UpdateTranSport(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $transports = TranSport::findOrFail($id);
        $transports->name = $request->name;
        $transports->description = $request->description;
        $transports->created_at = now();

        // Cập nhật hình ảnh
        if ($request->hasFile('image')) {
            // Xóa hình ảnh cũ nếu có
            if ($transports->image) {
                Storage::disk('public')->delete($transports->image);
            }

            // Lưu hình ảnh mới
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('transport-image'), $imageName);
            $transports->image = $imageName;
        }

        $transports->save();

        return redirect('index-transport')->with('success', 'Cập Nhật Thành Công !!!');
    }

    // Xóa Loại Sản Phẩm
    public function RemoveTranSport($id)
    {
        try {
            $transports = TranSport::findOrFail($id);

            $transports->delete();

            return redirect('index-transport')->with('success', 'Đơn vị vận chuyển đã được xóa thành công.');

        } catch (ModelNotFoundException $e) {
            return redirect('index-transport')->with('error', 'Đơn vị vận chuyển không tồn tại.');
        }
    }



    // Kiểm Tra Trạng Thái
    public function ActiveTranSport($id)
    {
        $transports = TranSport::findOrFail($id);
        $transports->checkactive = !$transports->checkactive;
        $transports->save();

        return redirect('index-transport')->with('success', 'Trạng thái đã được cập nhật thành công.');
    }
}
