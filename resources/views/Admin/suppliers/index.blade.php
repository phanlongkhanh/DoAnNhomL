@extends('ControllerAdmin.dashboard_admin')
@section('content')
    <section class="content-header">

        <section class="content-header">
            <h1>
                Suppliers
                <small>index</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="">Attribute</a></li>
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
                            <h3 class="box-title"><a href="{{ 'create-suppliers' }}" class="btn btn-primary">Thêm
                                    mới </a>
                            </h3>
                            <div class="box-tools">
                                <form action="#">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="key" value="{{ request()->input('key') }}"
                                            class="form-control pull-right" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        @if (Session::has('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                        @endif

                        @if ($errors->has('description'))
                            <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                        @endif
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>STT</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th class="text-center">Description</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                    @php
                                        $count = 0;
                                    @endphp
                                    @if (isset($suppliers))
                                        @foreach ($suppliers as $item)
                                            @php
                                                $count++;
                                            @endphp
                                            <tr>
                                                <td class="h3 text-center" style="line-height: 150px">{{ $count }}</td>
                                                <td><img src="suppliers-image/<?= $item->image ?>" alt=""
                                                        width="150px" height="150px"></td>
                                                <td style="line-height: 150px" class="h4 text-danger">{{ $item->name }}</td>
                                                <td style="line-height: 150px">{{ $item->description }}</td>
                                                <td style="line-height: 150px">{{ $item->email }}</td>
                                                <td style="line-height: 150px">{{ $item->phone }}</td>
                                                <td style="line-height: 150px">{{ $item->created_at }}</td>
                                                <td style="line-height: 150px">
                                                    <a href="{{ url('edit-suppliers', ['id' => Crypt::encrypt($item->id)]) }}"
                                                        class="btn btn-xs btn-primary"
                                                        onclick="return confirm('Bạn chắc chắn là sửa chứ')"><i
                                                            class="fa fa-pencil"></i> Edit
                                                    </a>
                                                    <form action="{{ route('suppliers-remove', ['id' => $item->id]) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-xs btn-danger"
                                                            onclick="return confirm('Bạn chắc chắn là xoá chứ')"><i
                                                                class="fa fa-trash"></i> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <div id="pageNavPosition" class="text-right">
                                <ul class="pagination">
                                    <!-- Hiển thị link đến trang trước (Previous Page) -->
                                    {{-- @if ($suppliers->onFirstPage())
                                        <li class="disabled"><span>&laquo;</span></li>
                                    @else
                                        <li><a href="{{ $suppliers->previousPageUrl() }}" rel="prev">&laquo;</a>
                                        </li>
                                    @endif
                                    <!-- Hiển thị các số trang đã có -->
                                    @for ($i = 1; $i <= $suppliers->lastPage(); $i++)
                                        <li class="{{ $i == $suppliers->currentPage() ? 'active' : '' }}">
                                            <a href="{{ $suppliers->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <!-- Hiển thị link đến trang tiếp theo (Next Page) -->
                                    @if ($suppliers->hasMorePages())
                                        <li><a href="{{ $suppliers->nextPageUrl() }}" rel="next">&raquo;</a></li>
                                    @else
                                        <li class="disabled"><span>&raquo;</span></li>
                                    @endif --}}
                                </ul>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        {{--  {!! $attribute->links() !!}  --}}
                        <div></div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <!-- /.row (main row) -->
        </section>
        <!-- /.content -->
    @endsection
