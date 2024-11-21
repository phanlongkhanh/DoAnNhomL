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

    <!-- Hiển thị thông báo thành công -->
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><a href="{{route('create-account')}}" class="btn btn-primary">Thêm mới </a>
                        </h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right ajax-search-table"
                                    placeholder="Search" data-url="">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
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
                                    <th>Trạng thái</th>
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
                                    @foreach ($users as $user)
                                        @php
                                            $count++;
                                        @endphp

                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role->name }}</td>

                                            <td>
                                                <form action="{{ route('toggle-active', $user->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-xs {{ $user->checkactive ? 'btn-danger' : 'btn-success' }}">
                                                        {{ $user->checkactive ? 'Lock' : 'Unlock' }}
                                                    </button>
                                                </form>
                                            </td>

                                            {{--                                        ngay them --}}
                                            <td>{{ $user->created_at }}</td>
                                            {{--                                        ngay cap nhat --}}
                                            <td>{{ $user->updated_at }}</td>
                                            {{--                                        nguoi them --}}
                                            {{-- <td>{{ $item->admin->name }}</td> --}}
                                            {{--                                        hanh dong --}}
                                            <td>
                                               
                                                <a href="{{ route('edit-account', Crypt::encrypt($user->id)) }}"
                                                    class="btn btn-xs btn-primary"
                                                    onclick="return confirm('Bạn chắc chắn là sửa chứ')">
                                                     <i class="fa fa-pencil"></i> Edit
                                                 </a>   

                                                <form action="{{ route('remove-account', Crypt::encrypt($user->id)) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-xs btn-danger"
                                                        onclick="return confirm('Bạn chắc chắn là xoá chứ?')">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                        {{-- {!! $users->appends($query ?? [])->links('pagination::bootstrap-4') !!} --}}
                        {{-- {!! $users->appends(request()->query())->links('pagination::bootstrap-4') !!} --}}

                        <!-- Phân trang  bắt đầu-->
                        <div id="pageNavPosition" class="text-right">
                            <ul class="pagination">
                                <!-- Hiển thị link đến trang trước -->
                                @if ($users->onFirstPage())
                                    <li class="disabled"><span>&laquo;</span></li>
                                @else
                                    <li><a href="{{ $users->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                                @endif
                        
                                <!-- Hiển thị số trang -->
                                @for ($i = 1; $i <= $users->lastPage(); $i++)
                                    <li class="{{ $i == $users->currentPage() ? 'active' : '' }}">
                                        <a href="{{ $users->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                        
                                <!-- Hiển thị link đến trang tiếp theo -->
                                @if ($users->hasMorePages())
                                    <li><a href="{{ $users->nextPageUrl() }}" rel="next">&raquo;</a></li>
                                @else
                                    <li class="disabled"><span>&raquo;</span></li>
                                @endif
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
