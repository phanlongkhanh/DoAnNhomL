<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Suppliers;
use App\Models\TranSport;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
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
}
