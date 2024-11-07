@extends('ControllerAdmin.dashboard_admin')
@section('content')
    <section class="content-header">
        <h1>
            View Detai Transaction
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="">Transaction</a></li>
            <li class="active">Edit</li>

        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Thông Tin Khách Hàng</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-striped">

                                <tbody>
                                    <tr>
                                        <th style="width: 30%">Thuộc Tính</th>
                                        <th>Giá Trị</th>
                                    </tr>
                                    <tr>
                                        <td>Tên KH</td>
                                        <td><span>{{ $orders->user->name }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Email KH</td>
                                        <td><span>{{ $orders->user->email }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Phone KH</td>
                                        <td><span>{{ $orders->user->phone }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Địa Chỉ KH</td>
                                        <td><span>{{ $orders->address }}</span></td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box box-danger">
                        <div class="box-header">
                            <h3 class="box-title">Thông Tin Thêm Về Đơn Hàng</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th style="width: 30%">Thuộc Tính</th>
                                        <th>Giá Trị</th>
                                    </tr>
                                    <tr>
                                        <td>Trạng Thái</td>
                                        <td><span>
                                                @if ($orders->active == 1)
                                                    <a href="{{ route('active-orders', $orders->id) }}"
                                                        class="badge bg-light-flo status-active">Chờ Xác Nhận</a>
                                                @else
                                                    <a href="{{ route('active-orders', $orders->id) }}"
                                                        class="badge bg-light-blue status-active">Đang Vận Chuyển</a>
                                                @endif
                                        </span></td>
                                    </tr>
                                    <tr>
                                        <td>Tông Tiền Đơn Hàng</td>
                                        <td><span
                                                class="badge bg-red">{{ number_format($orders->total_price, 0, ',', '.') }}
                                                VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td>Ngày Đặt Đơn Hàng</td>
                                        <td><span>{{ $orders->created_at }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Chức Vụ</td>
                                        <td>
                                            @if ($orders->user->role->id = 1)
                                                <span class="label label-warning">Thành Viên</span>
                                            @else
                                                <span class="label label-default">Khách</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box box-danger">
                        <div class="box-header">
                            <h3 class="box-title">Chi Tiết Về Đơn Hàng</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-condensed">
                                <tbody>
                                    <tr>
                                        <th style="width: 75px;">STT -- ID</th>
                                        <th>Thông Tin Khách Hàng</th>
                                        <th>Thông Tin Sản Phẩm</th>
                                        <th>Phương Thức</th>
                                        <th>Action</th>
                                    </tr>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @if ($pays)
                                        @foreach ($pays as $item)
                                            <tr>
                                                <td>

                                                    {{ ++$i . '--' . $item->id }}

                                                </td>
                                                <td>

                                                    <ul>
                                                        <li>Họ Tên: {{ $item->user->name }} </li>
                                                        <li>Địa Chỉ: {{ $item->address }} </li>
                                                        <li>SĐT: {{ $item->phone }}</li>
                                                    </ul>

                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Tên Sản Phẩm: {{ $item->name }} </li>
                                                        <li>Số Lượng: {{ $item->amount }} </li>
                                                        <li>Giá Tiền: {{ number_format($item->price, 0, ',', '.') }} VNĐ
                                                        </li>
                                                        <li>Tổng Tiền:{{ number_format($item->total_price, 0, ',', '.') }}
                                                            VNĐ
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Phương Thức Thanh Toán: {{ $item->payment->name }} </li>
                                                        <li>Phương Thức Vận Chuyển: {{ $item->transport->name }} </li>
                                                    </ul>
                                                </td>

                                                </td>
                                                <td>
                                                    <a
                                                        href="{{ route('edit-orders', ['id' => Crypt::encrypt($item->id)]) }}"class="btn btn-xs btn-info js-preview-transaction">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6">Không có đơn hàng nào.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box-footer" style="text-align: center;">
                        <a href="{{ route('index-orders') }}" class="btn btn-danger"><i class="fa fa-undo"></i> Trở Lại</a>
                        {{-- <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Sắp Xếp</button> --}}
                    </div>
                </div>
            </form>
        </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js"></script>
@endsection
