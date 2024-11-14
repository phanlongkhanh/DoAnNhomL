@extends('ControllerAdmin.dashboard_admin')
@section('content')
    <section class="content-header">
        <h1>
            Account
            <small>index</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="">Account</a></li>
            <li class="active">list</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <!-- Thông báo -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><a href="/add-account" class="btn btn-primary">Thêm mới </a>
                        </h3>
                        {{-- <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right ajax-search-table"
                                    placeholder="Search" data-url="">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div> --}}

                        <form action="{{ url('account-index') }}" method="GET" class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control pull-right ajax-search-table" placeholder="Search by ID or Name" data-url="" value="{{ request('search') }}">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover ">
                            <tbody>
                                <tr>
                                    <th>STT</th>
                                    <th>ID</th>
                                    <th>Họ Tên</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Active</th>
                                    <th>Ngày thêm</th>
                                    <th>Ngày cập nhật</th>
                                    <th>Chỉnh sửa</th>
                                </tr>
                                @php
                                    $count = 0;
                                @endphp
                                @if (isset($status))
                                    <tr>
                                        <td>{{ $status }}</td>
                                    </tr>
                                @endif

                                @if (isset($users))
                                    @foreach ($users as $users)
                                        @php
                                            $count++;
                                        @endphp

                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $users->id }}</td>
                                            <td>{{ $users->name }}</td>
                                            <td>{{ $users->email }}</td>
                                            <td>{{ $users->role->name }}</td>

                            
                                            <td>
                                                @if (auth()->user()->role_name === 'admin') <!-- Kiểm tra nếu người dùng là admin -->
                                                    <form action="{{ url('toggle-account/' . Crypt::encrypt($users->id)) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('PATCH') <!-- Sử dụng PATCH cho việc cập nhật trạng thái -->
                                                        <button type="submit" class="label {{ $users->checkactive ? 'label-info' : 'label-default' }} status-active"
                                                                onclick="return confirm('Bạn chắc chắn muốn {{ $users->checkactive ? 'khóa' : 'mở khóa' }} tài khoản này?')">
                                                            {{ $users->checkactive ? 'Lock' : 'Unlock' }} <!-- Hiển thị trạng thái -->
                                                        </button>
                                                    </form>
                                                @else
                                                    <button type="button" class="label label-default status-active"
                                                            onclick="alert('Chỉ có admin mới có quyền này'); return false;">
                                                        {{ $users->checkactive ? 'Lock' : 'Unlock' }}
                                                    </button>
                                                @endif
                                            </td>
                                            
                                            
                                            {{--                                        ngay them --}}
                                            <td>{{ $users->created_at }}</td>
                                            {{--                                        ngay cap nhat --}}
                                            <td>{{ $users->updated_at }}</td>
                                            {{--                                        nguoi them --}}
                                            {{-- <td>{{ $item->admin->name }}</td> --}}
                                            {{--                                        hanh dong --}}
                                            <td>
                                                {{-- <a href="{{ url('edit-account/' . $users->id) }}" --}}

                                                <a href="{{ url('edit-account/' . Crypt::encrypt($users->id)) }}"
                                                    class="btn btn-xs btn-primary"
                                                    onclick="return confirm('Bạn chắc chắn là sửa chứ')">
                                                    <i class="fa fa-pencil"></i> Edit </a>

                                                <form action="{{ url('delete-account/' . $users->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-xs btn-danger"
                                                            onclick="return confirm('Bạn chắc chắn là xoá chứ')"><i
                                                                class="fa fa-trash"></i> Delete</button>
                                                </form>

                                                {{-- <form action="{{ url('delete-account/' . $users->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-xs btn-danger"
                                                        onclick="return confirm('Bạn chắc chắn là xoá chứ')"><i
                                                            class="fa fa-trash"></i> Delete</button>
                                                </form> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                        {{-- {!! $categorys->appends($query ?? [])->links('pagination::bootstrap-4') !!} --}}
                        <!-- Phân trang  bắt đầu-->
                        <div id="pageNavPosition" class="text-right">
                            <ul class="pagination">
                                <!-- Hiển thị link đến trang trước (Previous Page) -->
                                {{-- @if ($category->onFirstPage())
                                    <li class="disabled"><span>&laquo;</span></li>
                                @else
                                    <li><a href="{{ $category->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                                @endif --}}

                                <!-- Hiển thị các số trang đã có -->
                                {{-- @for ($i = 1; $i <= $category->lastPage(); $i++)
                                    <li class="{{ $i == $category->currentPage() ? 'active' : '' }}">
                                        <a href="{{ $category->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor --}}

                                <!-- Hiển thị link đến trang tiếp theo (Next Page) -->
                                {{-- @if ($category->hasMorePages())
                                    <li><a href="{{ $category->nextPageUrl() }}" rel="next">&raquo;</a></li>
                                @else
                                    <li class="disabled"><span>&raquo;</span></li>
                                @endif --}}

                            </ul>

                        </div>

                    </div>


                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
@endsection
{{-- @section('script')

@endsection --}}
