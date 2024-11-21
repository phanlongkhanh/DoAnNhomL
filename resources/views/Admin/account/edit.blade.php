@extends('ControllerAdmin.dashboard_admin')

@section('content')
    <section class="content-header">
        <h1>
            User
            <small>Edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="">User</a></li>
            <li class="active">Edit</li>
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
        <div class="row">
            <div class="box box-primary">
                <form role="form" action="{{ route('update-account', Crypt::encrypt($user->id)) }}" method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="col-sm-8">
                            <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
                                <label for="name">Name <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                                    required>
                                @if ($errors->first('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->first('email') ? 'has-error' : '' }}">
                                <label for="email">Email <span class="text-danger">(*)</span></label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                                    required>
                                @if ($errors->first('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <!-- Trường mật khẩu -->
                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label for="password">Mật khẩu (để trống nếu không thay đổi)</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter new password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Trường xác nhận mật khẩu -->
                            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm new password">
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group {{ $errors->first('phone') ? 'has-error' : '' }}">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                                @if ($errors->first('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->first('role_id') ? 'has-error' : '' }}">
                                <label for="role_id">Role <span class="text-danger">(*)</span></label>
                                <select class="form-control" name="role_id" required>
                                    <option value="1" {{ $user->role_id == 1 ? 'selected' : '' }}>Admin</option>
                                    <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>User</option>
                                </select>
                                @if ($errors->first('role_id'))
                                    <span class="text-danger">{{ $errors->first('role_id') }}</span>
                                @endif
                            </div>
                            
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{{ route('index-account') }}" class="btn btn-danger"><i class="fa fa-undo"></i> Back</a>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
