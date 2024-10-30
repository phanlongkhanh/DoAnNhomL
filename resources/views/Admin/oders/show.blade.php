@extends('ControllerAdmin.dashboard_admin')
@section('content')
<section class="content-header">
    <h1>Order Details</h1>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Order #{{ $order->id }}</h3>
        </div>
        <div class="box-body">
            <ul>
                <li><strong>User ID:</strong> {{ $order->id_user }}</li>
                <li><strong>Product ID:</strong> {{ $order->id_product }}</li>
                <li><strong>Transport ID:</strong> {{ $order->id_transport }}</li>
                <li><strong>Status:</strong> {{ $order->status }}</li>
                <li><strong>Amount:</strong> {{ $order->amount }}</li>
                <li><strong>Total Money:</strong> {{ number_format($order->intomoney, 0, ',', '.') }} VNĐ</li>
                <li><strong>Payment Method ID:</strong> {{ $order->id_pay }}</li>
                <li><strong>Created At:</strong> {{ $order->created_at->format('d/m/Y H:i:s') }}</li>
            </ul>
        </div>
        <div class="box-footer">
            <a href="{{ route('orders.index') }}" class="btn btn-default">Back to Orders</a>
            <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning">Edit Order</a>
            <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this order?')">Delete Order</button>
            </form>
        </div>
    </div>
</section>
@endsection
