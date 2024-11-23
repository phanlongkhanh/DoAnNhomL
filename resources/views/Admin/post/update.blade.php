@extends('ControllerAdmin.dashboard_admin')
@section('content')
    <section class="content-header">
        <h1>
            Article
            <small>Create</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="">Post</a></li>
            <li class="active">Create</li>

        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
                <form action="{{ route('update-post', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-7">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin cơ bản</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="a_name">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $post->name) }}" placeholder="Name ...."> <!-- Sử dụng old() để giữ giá trị cũ -->
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" rows="3" placeholder="Enter ...">{{ old('description', $post->description) }}</textarea> <!-- Sử dụng old() -->
                            </div>
                            <div class="form-group">
                                <label>Danh mục bài viết</label>
                                <select name="id_list_post" class="form-control">
                                    @foreach ($listposts as $item)
                                        <option value="{{ $item->id }}" @if ($item->id == $post->id_list_post) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ảnh Đại Diện</h3>
                        </div>
                        <div class="box-body">
                            <img src="{{ asset('post-images/' . $post->image) }}" alt="Ảnh hiện tại" height="300px" width="350px">
                            <input type="file" name="image" class="js-upload">
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Nội Dung</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea class="form-control" name="content" rows="3" placeholder="Enter ...">{{ old('content', $post->content) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="box-footer" style="text-align: center;">
                        <a href="{{ route('index-post') }}" class="btn btn-danger"><i class="fa fa-undo"></i> Trở Lại</a>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Cập Nhật</button> <!-- Thay đổi từ "Submit" thành "Cập Nhật" -->
                    </div>
                </div>
            </form>
            <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
            <script type="text/javascript">
                var options = {
                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                };
                CKEDITOR.replace('editor_js', options);
            </script>

        </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
@endsection
