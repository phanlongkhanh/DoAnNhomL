@extends('ControllerAdmin.dashboard_admin')

@section('content')
    <section class="content-header">
        <h1>
            Livestreams
            <small>Create</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Livestreams</a></li>
            <li class="active">Create</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thêm mới Livestream</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{route('add-live')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Tiêu đề <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control" 
                                       placeholder="Nhập tiêu đề livestream" value="{{ old('title') }}" required>
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <textarea name="description" id="description" class="form-control" rows="4"
                                          placeholder="Nhập mô tả">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="video_url">Đường dẫn video (URL) <span class="text-danger">*</span></label>
                                <input type="url" name="video_url" id="video_url" class="form-control" 
                                       placeholder="Nhập URL của video livestream" value="{{ old('video_url') }}" required>
                                @if ($errors->has('video_url'))
                                    <span class="text-danger">{{ $errors->first('video_url') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="creator">Người tạo <span class="text-danger">*</span></label>
                                <input type="text" name="creator" id="creator" class="form-control" 
                                       placeholder="Nhập tên người tạo livestream" value="{{ old('creator') }}" required>
                                @if ($errors->has('creator'))
                                    <span class="text-danger">{{ $errors->first('creator') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="thumbnail">Ảnh đại diện</label>
                                <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                                @if ($errors->has('thumbnail'))
                                    <span class="text-danger">{{ $errors->first('thumbnail') }}</span>
                                @endif
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                            <a href="#" class="btn btn-default">Hủy</a>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection
