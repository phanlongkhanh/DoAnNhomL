<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Suppliers;
use App\Models\ProductType;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class SupplierController extends Controller
{
    public function ShowIndexSuppliers()
    {
        $user = auth()->user();

        if (!$user || $user->role_id != 1) {
            return redirect()->route('index-homepage')->with('error', 'Bạn không có quyền truy cập trang này');
        }

        $suppliers = Suppliers::all();
        return view('Admin.suppliers.index', compact('suppliers'));
    }
    public function ShowCreateSuppliers()
    {
        return view('Admin.suppliers.create');
    }
    public function ShowUpdateSuppliers()
    {
        return view('Admin.suppliers.update');
    }

    public function ShowEditSuppliers($encryptedId)
    {

        $suppliers = Suppliers::find($encryptedId);
        try {
            $id = Crypt::decrypt($encryptedId);
        } catch (DecryptException $e) {
            return redirect()->route('index-suppliers', ['id' => $encryptedId])->with('error', 'Không tìm thầy Nhà Cung Cấp phẩm với ID này.');
        }

        $suppliers = Suppliers::find($id);

        if (!$suppliers) {
            return redirect()->route('index-suppliers', ['id' => $encryptedId])->with('error', 'Không tìm thấy Nhà Cung Cấp với ID này.');
        }

        return view('Admin.suppliers.update', compact('suppliers'));
    }

    //Thêm Nhà Cung Cấp
    public function AddSuppliers(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|regex:/\S/',
            'description' => 'required|string|max:255|regex:/\S/',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => [
                'required',
                'string',
                'max:11',
                'regex:/^0[0-9]{9,11}$/',
                'not_regex:/^(0{10,12}|1{10,12}|2{10,12}|3{10,12}|4{10,12}|5{10,12}|6{10,12}|7{10,12}|8{10,12}|9{10,12})$/', // Không phải chuỗi số giống nhau
                'regex:/^\S+$/',
            ],
            'email' => 'nullable|email|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('create-suppliers')
                ->withErrors($validator)
                ->withInput();
        }

        $suppliers = new Suppliers();
        $suppliers->name = $request->name;
        $suppliers->description = $request->description;
        $suppliers->phone = $request->phone;
        $suppliers->email = $request->email;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('suppliers-image'), $imageName);
            $suppliers->image = $imageName;
        }
        $suppliers->save();

        return redirect()->route('index-suppliers')->with('success', 'Thêm Thành Công !!!');
    }

    public function UpdateSuppliers(Request $request, $id)
    {
        $suppliers = Suppliers::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|regex:/\S/',
            'description' => 'required|string|max:255|regex:/\S/',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => [
                'required',
                'string',
                'max:11',
                'regex:/^0[0-9]{9,11}$/',
                'not_regex:/^(0{10,12}|1{10,12}|2{10,12}|3{10,12}|4{10,12}|5{10,12}|6{10,12}|7{10,12}|8{10,12}|9{10,12})$/', // Không phải chuỗi số giống nhau
                'regex:/^\S+$/',
            ],
            'email' => 'nullable|email|max:255',
        ]);

        if ($validator->fails()) {
            $encryptedId = Crypt::encrypt($id);

            return redirect()->route('update-suppliers', ['id' => $encryptedId])
                ->withErrors($validator)
                ->withInput();
        }

        $suppliers->name = $request->name;
        $suppliers->description = $request->description;
        $suppliers->phone = $request->phone;
        $suppliers->email = $request->email;

        if ($request->hasFile('image')) {
            if ($suppliers->image) {
                $oldImagePath = public_path('suppliers-image/' . $suppliers->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            // Lưu hình ảnh mới
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('suppliers-image'), $imageName);
            $suppliers->image = $imageName;
        }
        $suppliers->save();

        return redirect()->route('index-suppliers')->with('success', 'Cập Nhật Thành Công !!!');
    }
    public function RemoveSuppliers($id)
    {
        try {
            $suppliers = Suppliers::findOrFail($id);

            $suppliers->delete();

            return redirect()->route('index-suppliers')->with('success', 'Nhà cung cấp đã được xóa thành công.');

        } catch (ModelNotFoundException $e) {
            return redirect()->route('index-suppliers')->with('error', 'Nhà cung cấp không tồn tại.');
        }
    }

}
