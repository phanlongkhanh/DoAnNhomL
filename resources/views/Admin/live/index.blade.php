@extends('ControllerAdmin.dashboard_admin')

@section('content')
    <section class="content-header">
        <h1>
            Livestreams
            <small>Index</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="">Livestreams</a></li>
            <li class="active">List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><a href="{{ route('create-live') }}" class="btn btn-primary">Thêm mới</a></h3>
                        <div class="box-tools">
                            <form action="#">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="key" value="{{ request()->input('key') }}"
                                        class="form-control pull-right" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
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
                                    <th>Video</th>
                                    <th>Title</th>
                                    <th class="text-center">Description</th>
                                    <th>Creator</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                                @php
                                    $count = 0;
                                @endphp
                                @if (isset($livestreams))
                                    @foreach ($livestreams as $item)
                                        @php
                                            $count++;
                                        @endphp
                                        <tr>
                                            <td class="h3 text-center" style="line-height: 150px">{{ $count }}</td>
                                            <td>
                                                <iframe width="150" height="100" src="{{ $item->video_url }}"
                                                    frameborder="0" allowfullscreen></iframe>
                                            </td>
                                            <td style="line-height: 150px" class="h4 text-danger">{{ $item->title }}</td>
                                            <td style="line-height: 150px">{{ $item->description }}</td>
                                            <td style="line-height: 150px">{{ $item->creator }}</td>
                                            <td style="line-height: 150px">{{ $item->created_at }}</td>
                                            <td style="line-height: 150px">
                                                <a href="#" class="btn btn-xs btn-primary"
                                                    onclick="return confirm('Bạn chắc chắn là sửa chứ')"><i
                                                        class="fa fa-pencil"></i> Edit</a>
                                                <form action="{{ route('destroy-live', $item->id) }}" method="POST"
                                                    style="display:inline;">
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
                            </ul>
                        </div>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
