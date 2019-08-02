@extends('admin.layouts.master')
@section('content')

	<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Slide <small style="font-size: 60%; color: blue;">Edit</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Slide
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        

        <div class="row">
            <div class="col-lg-6">
                <!-- Thông báo lỗi -->
                {{-- @include('admin.blocks.error') --}}

                <form method="POST" action="{{ route('slide-store') }}" enctype="multipart/form-data">
					@csrf
					@method('POST')

                    <div class="form-group">
                        <label for="title">Tiêu đề <span style="color: red">*</span></label>
                        <input name="title" type="text" class="form-control" placeholder="Enter category name" value="{{ old('title') }}">
                        @if($errors->has('title'))
                            <p class="is-danger">{{ $errors->first('title') }}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="content">Nội dung <span style="color: red">*</span></label>
                        <input name="content" type="text" class="form-control" placeholder="Enter category name" value="{{ old('content') }}">
                        @if($errors->has('content'))
                            <p class="is-danger">{{ $errors->first('content') }}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="link">Link</span></label>
                        <input name="link" type="text" class="form-control" placeholder="Enter category name" value="{{ old('link') }}">
                    </div>

                    <div class="form-group">
                        <label for="name">Hình ảnh <span style="color: red">*</span></label>
                        <input name="name" type="file" class="form-control" placeholder="Enter category name" value="{{ old('name') }}">
                        @if($errors->has('name'))
                            <p class="is-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

				    <button type="submit" class="btn btn-primary">Submit</button>
				</form>

            </div>

        </div>
        <!-- /.row -->

    </div>
	
@endsection
