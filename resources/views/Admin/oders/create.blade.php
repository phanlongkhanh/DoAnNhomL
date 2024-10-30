@extends('ControllerAdmin.dashboard_admin')
@section('content')
<section class="content-header">
    <h1>Create Order</h1>
</section>

<section class="content">
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_user">User ID</label>
            <input type="number" name="id_user" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="id_product">Product ID</label>
            <input type="number" name="id_product" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="id_transport">Transport ID</label>
            <input type="number" name="id_transport" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" name="status" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="intomoney">Total Money</label>
            <input type="number" name="intomoney" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="id_pay">Payment Method ID</label>
            <input type="number" name="id_pay" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Create Order</button>
    </form>
</section>
@endsection
