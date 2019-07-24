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
                    User <small style="font-size: 60%; color: blue;">Add</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> User
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        

        <div class="row">
            <div class="col-lg-6">
                <!-- Thông báo lỗi -->
                @include('admin.blocks.error')

                <form method="POST" action="{{ route('user-store') }}">
					@csrf
					@method('POST')

                    <div class="form-group">
                        <label for="name">UserName</label>
                        <input name="name" type="text" class="form-control" placeholder="Enter username" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input name="email" type="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control" placeholder="Enter your password">
                    </div>
                    <div class="form-group">
                        <label for="re-password">Confirm - Password</label>
                        <input name="re-password" type="password" class="form-control" placeholder="Enter your re-password">
                    </div>
                    <div class="form-group">
                        <label for="telephone">Telephone</label>
                        <input name="telephone" type="text" class="form-control" placeholder="Enter your telephone" value="{{ old('telephone') }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input name="address" type="text" class="form-control" placeholder="Enter your address" value="{{ old('address') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Level</label>
                        <select class="form-control" name="role_id">
                            <option value="" selected disabled>Please choose level user</option>
                            @foreach($roles as $key => $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Gender :</label>
                        <label for="" class="radio-inline">
                            <input name="gender" value="1" checked type="radio">
                            Nam
                        </label>
                        <label for="" class="radio-inline">
                            <input name="gender" value="2" type="radio">
                            Nữ
                        </label>
                    </div>

				    <button type="submit" class="btn btn-primary">Submit</button>
				</form>

            </div>

        </div>
        <!-- /.row -->

    </div>
	
@endsection
