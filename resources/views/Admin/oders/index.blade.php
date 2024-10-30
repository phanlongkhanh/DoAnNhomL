@extends('ControllerAdmin.dashboard_admin')
@section('content')
<section class="content-header">
    <h1>
        Quản lý đơn hàng
        <small>index</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="">transaction</a></li>
        <li class="active">list</li>
    </ol>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    @if(session('error'))
        <p>{{ session('error') }}</p>
    @endif
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        <a href="{{ route('orders.create') }}" class="btn btn-primary">Thêm mới</a>
                        <form action="" method="GET" class="form-inline">
                            <input type="text" value="{{ Request::get('id') }}" class="form-control" name="id"
                                placeholder="ID">
                            <input type="text" value="{{ Request::get('email') }}" class="form-control" name="email"
                                placeholder="Email ...">
                            <select name="status" class="form-control">
                                <option value="0">__Trạng Thái__</option>
                                <option value="1" {{ Request::get('status') == 1 ? "selected" : "" }}>Đã tiếp nhận
                                </option>
                                <option value="2" {{ Request::get('status') == 2 ? "selected" : "" }}>Đang giao</option>
                                <option value="3" {{ Request::get('status') == 3 ? "selected" : "" }}>Đã giao</option>
                                <option value="-1" {{ Request::get('status') == -1 ? "selected" : "" }}>Đã hủy</option>
                            </select>
                            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
                        </form>
                    </div>
                </div>

                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Info</th>
                                <th>Money</th>
                                <th>Status</th>
                                <th>Phương thức TT</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($orders) && $orders->count())
                                @foreach ($orders as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            <ul>
                                                <li>Name: {{ $item->user->name }}</li>
                                                <li>Email: {{ $item->user->email }}</li>
                                                <li>Phone: {{ $item->user->phone }}</li>
                                                <li>Address: {{ $item->user->address }}</li>
                                            </ul>
                                        </td>
                                        <td>{{ number_format($item->intomoney, 0, ',', '.') }} VNĐ</td>
                                        <td>
                                            <span class="label label-{{ $item->getStatus($item->status)['class'] }}">
                                                {{ $item->getStatus($item->status)['name'] }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="label label-{{ $item->id_pay == 1 ? 'info' : 'success' }}">
                                                {{ $item->id_pay == 1 ? 'Thường' : 'Online' }}
                                            </span>
                                        </td>
                                        <td>{{ $item->created_at->format('d/m/Y H:i:s') }}</td>
                                        <td>
                                            <a href="{{ route('orders.show', $item) }}"
                                                class="btn btn-xs btn-info js-preview-transaction"><i class="fa fa-eye"></i>
                                                View</a>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success btn-xs">Action</button>
                                                <button type="button" class="btn btn-success btn-xs dropdown-toggle"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="#"><i class="fa fa-trash"></i> Delete</a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a href="#"><i class="fa fa-exchange"> Đang Vận Chuyển</i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><i class="fa fa-check"> Đã Giao Hàng</i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><i class="fa fa-ban"> Hủy</i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center">Không có đơn hàng nào.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="box-footer">
                    {{-- Pagination (uncomment if needed) --}}
                    {{-- {!! $order->appends(request()->query())->links() !!} --}}
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->
</section>

{{-- Modal for viewing transaction details (uncomment if needed)
<div class="modal fade" id="modal-preview-transaction">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Chi Tiết Đơn hàng <b></b></h4>
            </div>
            <div class="modal-body">
                <div class="content"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
--}}

@endsection

{{-- Uncomment to include script section if necessary
@section('script')
<script>
    $('.js-preview-transaction').click(function (e) {
        e.preventDefault();
        let $this = $(this);
        let URL = $this.attr('href');
        $.ajax({
            url: URL,
            success: function (results) {
                $('#modal-preview-transaction .content').html(results.html);
                $('#modal-preview-transaction').modal('show');
            },
            error: function (e) {
                console.log(e.message);
            }
        });
    });

    $('body').on('click', '.js-delete-order-item', function (event) {
        event.preventDefault();
        let URL = $(this).attr('href');
        let $this = $(this);
        $.ajax({
            url: URL,
            success: function (results) {
                if (results.code == 200) {
                    $this.parents('tr').remove();
                }
            },
            error: function (e) {
                console.log(e.message);
            }
        });
    });
</script>
@endsection
--}}