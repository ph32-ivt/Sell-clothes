@extends('admin.layouts.master')
@section('content')

	<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Slide <small style="font-size: 60%; color: blue;">Sửa</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Tổng quan</a>
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

                <form method="POST" action="{{ route('slide-update', $slide->id) }}" enctype="multipart/form-data">
					@csrf
					@method('POST')

                    <div class="form-group">
                        <label for="title">Tiêu đề <span style="color: red">*</span></label>
                        <input name="title" type="text" class="form-control" placeholder="Nhập tiêu đề" value="{{ $slide->title }}">
                        @if($errors->has('title'))
                            <p class="is-danger">{{ $errors->first('title') }}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="content">Nội dung <span style="color: red">*</span></label>
                        <input name="content" type="text" class="form-control" placeholder="Nhập nội dung" value="{{ $slide->content }}">
                        @if($errors->has('content'))
                            <p class="is-danger">{{ $errors->first('content') }}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="link">Link</span></label>
                        <input name="link" type="text" class="form-control" placeholder="Nhập link" value="{{ $slide->link }}">
                    </div>

                    <div class="form-group">
                        <label for="image_current">Hình ảnh hiện tại :</label><br>
                        <img name="image_current" src="upload/slides/{{ $slide->name }}" alt="" width="500px">
                    </div>
                    <div class="form-group">
                        <label for="image">Thêm ảnh mới</label>
                        <input type="file" class="form-control" name="name">
                        <input type="hidden" name="img_current" value="{{ $slide->name }}">
                    </div>

				    <button type="submit" class="btn btn-primary">Cập nhật</button>
				</form>

            </div>

        </div>
        <!-- /.row -->

    </div>
	
@endsection
