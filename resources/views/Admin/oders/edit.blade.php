@extends('ControllerAdmin.dashboard_admin')
@section('content')
<section class="content-header">
    <h1>Edit Order</h1>
</section>

<section class="content">
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Specify that this is a PUT request for updating -->
        <div class="form-group">
            <label for="id_user">User ID</label>
            <input type="number" name="id_user" class="form-control" value="{{ old('id_user', $order->id_user) }}" required>
        </div>
        <div class="form-group">
            <label for="id_product">Product ID</label>
            <input type="number" name="id_product" class="form-control" value="{{ old('id_product', $order->id_product) }}" required>
        </div>
        <div class="form-group">
            <label for="id_transport">Transport ID</label>
            <input type="number" name="id_transport" class="form-control" value="{{ old('id_transport', $order->id_transport) }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" name="status" class="form-control" value="{{ old('status', $order->status) }}" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" class="form-control" value="{{ old('amount', $order->amount) }}" required>
        </div>
        <div class="form-group">
            <label for="intomoney">Total Money</label>
            <input type="number" name="intomoney" class="form-control" value="{{ old('intomoney', $order->intomoney) }}" required>
        </div>
        <div class="form-group">
            <label for="id_pay">Payment Method ID</label>
            <input type="number" name="id_pay" class="form-control" value="{{ old('id_pay', $order->id_pay) }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Order</button>
        <a href="{{ route('orders.index') }}" class="btn btn-default">Cancel</a>
    </form>
</section>
@endsection
