@extends('admin.layouts.master')
@section('content')
    <style>
        .radio-inline {
            margin-left: 25px;
        }
    </style>

	<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Người dùng <small style="font-size: 60%; color: blue;">Sửa</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Tổng quan</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Người dùng
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        

        <div class="row">
            <div class="col-lg-6">

                <form method="POST" action="{{ route('user-update', $user->id) }}">
					@csrf
					@method('POST')

                    <div class="form-group">
                        <label for="name">Tên người dùng</label>
                        <input name="name" type="text" class="form-control" placeholder="Nhập tên người dùng" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input name="email" type="email" class="form-control" placeholder="Nhập email" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input name="password" type="password" class="form-control" placeholder="Nhập mật khẩu">
                        @if($errors->has('password'))
                            <p class="is-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="re-password">Nhập lại mật khẩu</label>
                        <input name="re-password" type="password" class="form-control" placeholder="Nhập lại mật khẩu">
                        @if($errors->has('re-password'))
                            <p class="is-danger">{{ $errors->first('re-password') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="telephone">Số điện thoại</label>
                        <input name="telephone" type="text" class="form-control" placeholder="Nhập số điện thoại" value="{{ $user->telephone }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input name="address" type="text" class="form-control" placeholder="Nhập địa chỉ" value="{{ $user->address }}">
                    </div>
                    @if (Auth::user()->role_id == 1)
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Level</label>
                        <select class="form-control" name="role_id">
                            <option value="" selected disabled>Vui lòng chọn level</option>
                            @foreach($roles as $key => $role)
                            <option {{ $role->id == $user->role_id ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    <div class="form-group">
                        <label>Giới tính :</label>
                        <label for="" class="radio-inline">
                            <input name="gender" value="1" checked type="radio"
                            @if ($user->gender == 1)
                                checked
                            @endif
                            >Nam
                        </label>
                        <label for="" class="radio-inline">
                            <input name="gender" value="2" type="radio" @if($user->gender == 2) checked="checked" @endif>
                            Nữ
                        </label>
                    </div>

				    <button type="submit" class="btn btn-primary">Cập nhật</button>
				</form>

            </div>

        </div>
        <!-- /.row -->

    </div>
	
@endsection
