@extends('admin.layouts.master')
@section('content')

	<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Sản phẩm / <span style="color: blue; font-size: 70%">Thêm</span>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Tổng quan</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Sản phẩm
                    </li>
                </ol>
                <!-- Message Error -->
                {{-- @include('admin.blocks.error') --}}
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-6">

                <form method="POST" action="{{ route('product-store') }}" enctype="multipart/form-data">
					@csrf
					@method('POST')
                    
                    <div class="form-group">
                        <label for="cate_parent">Danh mục lớn <span style="color: red">*</span></label>
                        <select class="form-control" name="cate_parent" id="cate_parent">
                            <option value="0" disabled selected>Vui lòng chọn Danh mục</option>
                            @foreach($cate_parent as $cp)
                                <option value="{{ $cp->id }}" {{ old('cate_parent') == $cp->id ? 'selected' : ''}}>{{ $cp->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('cate_parent'))
                            <p class="is-danger">{{ $errors->first('cate_parent') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="category_id">Danh mục <span style="color: red">*</span></label>
                        <select class="form-control" name="category_id" id="category_id">
                            <option value="0" disabled selected>Vui lòng chọn Danh mục</option>
                            @foreach($category_id as $cate)
                                <option value="{{ $cate->id }}" {{ old('category_id') == $cate->id ? 'selected' : ''}}>{{ $cate->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('category_id'))
                            <p class="is-danger">{{ $errors->first('category_id') }}</p>
                        @endif
                    </div>

				    <div class="form-group">
				        <label for="name">Tên sản phẩm <span style="color: red">*</span></label>
				        <input name="name" type="text" class="form-control" placeholder="Nhập tên sản phẩm" value="{{ old('name') }}">
                        @if($errors->has('name'))
                            <p class="is-danger">{{ $errors->first('name') }}</p>
                        @endif
				    </div>
				    <div class="form-group">
				        <label for="status">Trạng thái <span style="color: red">*</span></label>
				        <input name="status" type="text" class="form-control" placeholder="Nhập trạng thái" value="{{ old('status') }}">
                        @if($errors->has('status'))
                            <p class="is-danger">{{ $errors->first('status') }}</p>
                        @endif
				    </div>
                    <div class="form-group">
                        <label for="price">Giá <span style="color: red">*</span></label>
                        <input name="price" type="text" class="form-control" placeholder="Nhập giá" value="{{ old('price') }}">
                        @if($errors->has('price'))
                            <p class="is-danger">{{ $errors->first('price') }}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="Nhập mô tả">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Hình sản phẩm <span style="color: red">*</span></label>
                        <input type="file" class="form-control" name="image">
                        @if($errors->has('image'))
                            <p class="is-danger">{{ $errors->first('image') }}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="image_detail[]">Hình chi tiết</label>
                        <input type="file" class="form-control" name="image_detail[]" multiple>
                    </div>

				    <button type="submit" class="btn btn-primary">Thêm</button>
				</form>

            </div>

        </div>
        <!-- /.row -->

    </div>
	
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $("#cate_parent").change(function() {
                var idCate_parent = $(this).val();
                $.get("admin/products/create/"+idCate_parent, function(data) {
                    $("#category_id").html(data);
                });
            });
        });
    </script>
@endsection
