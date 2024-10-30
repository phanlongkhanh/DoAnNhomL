<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OdersController extends Controller
{
    public function index()

    {
        $orders = Order::all();
        return view('Admin.oders.index', compact('orders'));
    }

    public function create()
    {
        return view('Admin.oders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|integer',
            'id_product' => 'required|integer',
            'id_transport' => 'required|integer',
            'status' => 'required|string',
            'amount' => 'required|integer',
            'intomoney' => 'required|integer',
            'id_pay' => 'required|integer',
        ]);

        Order::create($request->all());
        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        return view('Admin.oders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('Admin.oders.edit', compact('order'));
    }

    public function update(Request $request, Order $order){
        $request->validate([
            'id_user' => 'required|integer',
            'id_product' => 'required|integer',
            'id_transport' => 'required|integer',
            'status' => 'required|string',
            'amount' => 'required|integer',
            'intomoney' => 'required|integer',
            'id_pay' => 'required|integer',
        ]);

        $order->update($request->all());
        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
