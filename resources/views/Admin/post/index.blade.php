@extends('ControllerAdmin.dashboard_admin')
@section('content')
    <section class="content-header">
        <h1>
            Article
            <small>index</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="">Article</a></li>
            <li class="active">list</li>

        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

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
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><a href="{{ route('create-post') }}" class="btn btn-primary">Thêm mới </a>
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
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>STT</th>
                                    <th>Tiêu đề</th>
                                    <th>hình ảnh</th>
                                    <th>description</th>
                                    <th>Times</th>
                                    <th>Action</th>
                                </tr>@php
                                    $count = 0;
                                @endphp
                                @if (isset($posts))
                                    @foreach ($posts as $item)
                                        @php
                                            $count++;
                                        @endphp
                                        <tr>
                                            <td> {{ $count }} </td>
                                            <td> {{ $item->name }} </td>
                                            <td><img src="post-images/<?= $item->image ?>" alt="" height="80px"></td>
                                            <td> {{ $item->description }} </td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                <a href="{{ route('edit-post', ['id' => $item->id]) }}" class="btn btn-xs btn-primary">
                                                    <i class="fa fa-pencil"></i> Edit
                                                </a>                                                                                                
                                                <form action="{{ route('delete-posts', ['id' => $item->id]) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-xs btn-danger js-delete-confirm"
                                                        onclick="return confirm('Bạn chắc chắn là xóa chứ?')">Delete<i>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
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
