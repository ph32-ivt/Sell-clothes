@extends('admin.layouts.master')
@section('content')

	<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Danh mục <small style="font-size: 60%; color: blue;">Thêm</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Tổng quan</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Danh mục
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        

        <div class="row">
            <div class="col-lg-6">
                <!-- Thông báo lỗi -->
                {{-- @include('admin.blocks.error') --}}

                <form method="POST" action="{{ route('category-store') }}">
					@csrf
					@method('POST')
				    
				    <div class="form-group">
				        <label for="parent_id">Danh mục lớn</label>
                        <select name="parent_id" class="form-control">
                            <option value="0">Vui lòng chọn danh mục</option>
                            @foreach($cate_parent as $value)
                            <option {{ old('parent_id') == $value->id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
				    </div>

                    <div class="form-group">
                        <label for="name">Tên Danh mục <span style="color: red">*</span></label>
                        <input name="name" type="text" class="form-control" placeholder="Nhập tên Danh mục" value="{{ old('name') }}">
                        @if($errors->has('name'))
                            <p class="is-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

				    <button type="submit" class="btn btn-primary">Thêm</button>
				</form>

            </div>

        </div>
        <!-- /.row -->

    </div>
	
@endsection
