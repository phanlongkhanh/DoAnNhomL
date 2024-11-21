<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductTypeController extends Controller
{
    public function ShowProductType()
    {

        $user = auth()->user();

        if (!$user || $user->role_id != 1) {
            return redirect()->route('index-homepage')->with('error', 'Bạn không có quyền truy cập trang này');
        }

        $productTypes = ProductType::all();
        return view('Admin.producttype.index', compact('productTypes'));
    }

    public function ShowCreateTypeProduct()
    {
        return view('Admin.producttype.create');
    }

    public function ShowUpdateTypeProduct()
    {
        return view('Admin.producttype.update');
    }

    public function EditProductType($encryptedId)
    {
        $producttypes = ProductType::find($encryptedId);
        try {
            $id = Crypt::decrypt($encryptedId);
        } catch (DecryptException $e) {
            return redirect()->route('update-producttypes', ['id' => $encryptedId])->with('error', 'Không tìm thấy loại sản phẩm với ID này.');
        }

        $producttypes = ProductType::find($id);

        if (!$producttypes) {
            return redirect()->route('update-producttypes', ['id' => $encryptedId])->with('error', 'Không tìm thấy loại sản phẩm với ID này.');
        }

        return view('Admin.producttype.update', compact('producttypes'));
    }

    // Thêm Loại Sản Phẩm
    public function AddProductType(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|regex:/\S/',
            'description' => 'required|string|max:255|regex:/\S/',
        ]);

        if ($validator->fails()) {
            return redirect()->route('create-producttypes')
                ->withErrors($validator)
                ->withInput();
        }

        ProductType::create([
            'name' => $request->name,
            'description' => $request->description,

        ]);

        return redirect()->route('index-producttypes')->with('success', 'Thêm Thành Công !!!');
    }

    // Cập Nhật Sản Phẩm
    public function UpdateProductType(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|regex:/\S/',
            'description' => 'required|string|max:255|regex:/\S/',
        ]);

        if ($validator->fails()) {
            $encryptedId = Crypt::encrypt($id);

            return redirect()->route('update-producttypes', ['id' => $encryptedId])
                ->withErrors($validator)
                ->withInput();
        }

        // Tìm loại sản phẩm cần cập nhật
        $productType = ProductType::findOrFail($id);

        // Cập nhật thông tin
        $productType->name = $request->name;
        $productType->description = $request->description;
        $productType->updated_at = now();
        $productType->save();

        return redirect()->route('index-producttypes')->with('success', 'Cập Nhật Thành Công !!!');
    }

    // Xóa Loại Sản Phẩm
    public function RemoveProductType($id)
    {
        try {
            $productType = ProductType::findOrFail($id);

            $productType->delete();

            return redirect()->route('index-producttypes')->with('success', 'Loại sản phẩm đã được xóa thành công.');

        } catch (ModelNotFoundException $e) {
            return redirect()->route('index-producttypes')->with('error', 'Loại sản phẩm không tồn tại.');
        }
    }



    // Kiểm Tra Trạng Thái
    public function ActiveProductType($id)
    {
        $productType = ProductType::findOrFail($id);
        $productType->checkactive = !$productType->checkactive;
        $productType->save();

        return redirect()->route('index-producttypes')->with('success', 'Trạng thái đã được cập nhật thành công.');
    }
}
