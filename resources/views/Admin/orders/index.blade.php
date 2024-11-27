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
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="box-title">
                            <form action="" method="GET" class="form-inline">
                                <input type="text" value="{{ Request::get('id') }}" class="form-control" name="id"
                                    placeholder="ID">
                                <input type="text" value="{{ Request::get('email') }}" class="form-control"
                                    name="email" placeholder="Email ...">
                                {{-- <select name="type" class="form-control">
                                <option value="0">__Phân Loại Khách__</option>
                                <option value="1" {{ Request::get('type') == 1 ? "selected='selected'" : "" }}>Thành Viên</option>
                                <option value="2" {{ Request::get('type') == 2 ? "selected='selected'" : "" }}>Khách</option>
                            </select> --}}
                                <select name="status" class="form-control">
                                    <option value="0">__Trạng Thái__</option>
                                    <option value="1" {{ Request::get('status') == 1 ? "selected='selected'" : '' }}>
                                        Tiếp Nhận</option>
                                    <option value="2" {{ Request::get('status') == 2 ? "selected='selected'" : '' }}>
                                        Đang Vận Chuyển</option>
                                    <option value="3" {{ Request::get('status') == 3 ? "selected='selected'" : '' }}>Đã
                                        Bàn Giao</option>
                                    <option value="-1" {{ Request::get('status') == -1 ? "selected='selected'" : '' }}>
                                        Hủy Bỏ</option>
                                </select>
                                <button type="submit" class="btn btn-success"><i class="fa fa-search"> </i> Search</button>
                            </form>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Thông tin khách hàng</th>
                                    <th>Thông tin Sản Phẩm</th>
                                    <th>Phương thức</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                                @if (isset($pays))
                                    @foreach ($pays as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
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
                                                    <li>Giá Tiền: {{ number_format($item->price, 0, ',', '.') }} VNĐ</li>
                                                    <li>Tổng Tiền:{{ number_format($item->total_price, 0, ',', '.') }} VNĐ
                                                    </li>
                                                </ul>
                                            </td>

                                            <td>
                                                <ul>
                                                    <li>Phương Thức Thanh Toán: {{ $item->payment->name }} </li>
                                                    <li>Phương Thức Vận Chuyển: {{ $item->transport->name }} </li>
                                                </ul>
                                            </td>


                                            <td style="line-height: 50px">
                                                @if ($item->active == 1)
                                                    <a href="{{ route('active-orders', $item->id) }}"
                                                        class="label label-default status-active">Chờ Xác Nhận</a>
                                                @else
                                                    <a href="{{ route('active-orders', $item->id) }}"
                                                        class="label label-info status-active">Đã Xác Nhận</a>
                                                @endif
                                            </td>


                                            <td style="line-height: 50px">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success btn-xs">Action</button>
                                                    <button type="button" class="btn btn-success btn-xs dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <form action="{{ route('delete-orders', $item->id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="js-delete-confirm"
                                                                    onclick="return confirm('Bạn chắc chắn là xoá chứ')"><i
                                                                        class="fa fa-trash"></i> Delete</button>
                                                            </form>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li>
                                                            <a href="{{ route('pays.updateStatus', ['id' => $item->id, 'status' => 'Đang vận chuyển']) }}"
                                                                class="text-warning">
                                                                <i class="fa fa-hourglass-start"></i> Đang Vận Chuyển
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('pays.updateStatus', ['id' => $item->id, 'status' => 'Đã bàn giao']) }}"
                                                                class="text-success">
                                                                <i class="fa fa-check"></i> Đã Bàn Giao
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('pays.updateStatus', ['id' => $item->id, 'status' => 'Hủy']) }}"
                                                                class="text-danger">
                                                                <i class="fa fa-ban"></i> Hủy
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <a href="{{ route('edit-orders', ['id' => Crypt::encrypt($item->id)]) }}"
                                                    class="btn btn-xs btn-info js-preview-transaction"><i
                                                        class="fa fa-eye"></i>View</a>
                                            </td>

                                        </tr>
                                    @endforeach
                                @else
                                    <p>không có sản phẩm</p>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    {{-- {!! $transactions->appends($query)->links() !!} --}}
                    <div></div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->



    </section>
    {{--  <div class="modal fade fade" id="modal-preview-transaction" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Chi Tiết Đơn hàng <b></b></h4>
                </div>
                <div class="modal-body">
                    <div class="content">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>  --}}
    <!-- /.content -->
@endsection
{{--  @section('script')
    <script>
        $('.js-preview-transaction').click(function(e){
            e.preventDefault();
            let $this=$(this);
            let URL=$this.attr('href');
            $.ajax({
                url:URL,
                success:function(results){
                    $('#modal-preview-transaction .content').html(results.html)
                    $('#modal-preview-transaction').modal({
                        show:true
                    });
                },
                error:function(e){
                    console.log(e.message);
                }
            });
        });
        $('body').on('click','.js-delete-order-item',function(event){
            event.preventDefault();
            let URL=$(this).attr('href');
            let $this=$(this);
            $.ajax({
                url:URL,
                success:function(results){
                    if(results.code==200){
                        $this.parents('tr').remove();
                    }
                },
                error:function(e){
                    console.log(e.message);
                }
            })
        });
    </script>
@endsection  --}}
