@extends('ControllerAdmin.dashboard_admin')

@section('content')
    <section class="content-header">
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
        
        <h1>
            User
            <small>Create</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="">User</a></li>
            <li class="active">Create</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="box box-primary">
                <form role="form" action="{{ url('add-account') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="col-sm-8">
                            <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
                                <label for="name">Name <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="name" placeholder="Name ......"
                                    required>
                                @if ($errors->first('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->first('email') ? 'has-error' : '' }}">
                                <label for="email">Email <span class="text-danger">(*)</span></label>
                                <input type="email" class="form-control" name="email" placeholder="Email ......"
                                    required>
                                @if ($errors->first('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->first('password') ? 'has-error' : '' }}">
                                <label for="password">Password <span class="text-danger">(*)</span></label>
                                <input type="password" class="form-control" name="password" placeholder="Password ......"
                                    required>
                                @if ($errors->first('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->first('password_confirmation') ? 'has-error' : '' }}">
                                <label for="password_confirmation">Confirm Password <span
                                        class="text-danger">(*)</span></label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="Confirm Password ......" required>
                                @if ($errors->first('password_confirmation'))
                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->first('phone') ? 'has-error' : '' }}">
                                <label for="phone">Phone <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="phone" placeholder="Phone ......"
                                    required>
                                @if ($errors->first('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>

                            {{-- <div class="form-group {{ $errors->first('role_id') ? 'has-error' : '' }}">
                                <label for="role_id">Role ID <span class="text-danger">(*)</span></label>
                                <input type="number" class="form-control" name="role_id" placeholder="Role ID ......"
                                    required>
                                @if ($errors->first('role_id'))
                                    <span class="text-danger">{{ $errors->first('role_id') }}</span>
                                @endif
                            </div> --}}

                            <div class="form-group {{ $errors->first('role_id') ? 'has-error' : '' }}">
                                <label for="role_id">Vai trò <span class="text-danger">(*)</span></label>
                                <select class="form-control" name="role_id" required>
                                    <option value="">Chọn vai trò</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->first('role_id'))
                                    <span class="text-danger">{{ $errors->first('role_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="#" class="btn btn-danger"><i class="fa fa-undo"></i> Trở Lại</a>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(function() {
            $('#fileInput').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#image_preview_container').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection
