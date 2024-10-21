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
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><a href="#" class="btn btn-primary">Thêm mới </a>
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
                                <th>Hình Ảnh</th>
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
                            @if(isset($status))
                                <tr>
                                    <td>{{$status}}</td>
                                </tr>
                            @endif



                            @if(isset($users))
                                @foreach ($users as $users)
                                    @php
                                        $count ++;
                                    @endphp

                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $users->id }}</td>
                                        {{--                                        hinh anh--}}
                                        <td><img src="{{ parse_url($users->image)['path'] }}" alt="" width="150px"
                                                 height="100px"></td>
                                        <td>{{ $users->name}}</td>
                                        <td>{{ $users->email }}</td>
                                        <td>{{ $users->role_id }}</td>
                                        
                                        {{--                                        check ative--}}
                                        <td>
                                            @if ($users->checkactive==1)
                                                <a href="#"
                                                   class="label label-info status-active">Show</a>
                                            @else
                                                <a href="#}"
                                                   class="label label-default status-active">Hide</a>
                                            @endif
                                        </td>
                                        {{--                                        ngay them--}}
                                        <td>{{ $users->created_at }}</td>
                                        {{--                                        ngay cap nhat--}}
                                        <td>{{ $users->updated_at }}</td>
                                        {{--                                        nguoi them--}}
                                         {{-- <td>{{ $item->admin->name }}</td> --}}
                                        {{--                                        hanh dong--}}
                                        <td>
                                            <a href="#"
                                               class="btn btn-xs btn-primary"
                                               onclick="return confirm('Bạn chắc chắn là sửa chứ')"><i
                                                    class="fa fa-pencil"></i> Edit</a>
                                            <a href="#"
                                               class="btn btn-xs btn-danger js-delete-confirm"
                                               onclick="return confirm('Bạn chắc chắn là xoá chứ')"><i
                                                    class="fa fa-trash"></i> Delete</a>
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
