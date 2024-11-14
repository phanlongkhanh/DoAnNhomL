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
    <!-- Main content -->
    <section class="content">
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
            <div class="box box-primary">
                <form role="form" action="{{ url('update-account/' . Crypt::encrypt($user->id)) }}" method="POST" enctype="multipart/form-data">
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

                            <div class="form-group">
                                <label for="password">Password (leave blank if not changing)</label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="Enter new password">
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="Confirm new password">
                            </div>

                            <div class="form-group {{ $errors->first('phone') ? 'has-error' : '' }}">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                                @if ($errors->first('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>

                            {{-- <div class="form-group {{ $errors->first('role_id') ? 'has-error' : '' }}">
                                <label for="role_id">Role ID <span class="text-danger">(*)</span></label>
                                <input type="number" class="form-control" name="role_id" value="{{ $user->role_id }}"
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
                                        <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->first('role_id'))
                                    <span class="text-danger">{{ $errors->first('role_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{{ url('account-index') }}" class="btn btn-danger"><i class="fa fa-undo"></i> Back</a>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
