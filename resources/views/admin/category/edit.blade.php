@extends('admin.layouts.master')
@section('content')

	<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Danh mục
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Danh mục</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Sửa
                    </li>
                </ol>

            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-6">

                <form method="POST" action="{{ route('category-update', $category['id']) }}">
					@csrf
					@method('POST')
                    <div class="form-group">
                        <label for="parent_id">Danh mục lớn</label>
                        <select name="parent_id" class="form-control">
                            <option value="0" disabled="disabled">Vui lòng chọn Danh mục</option>
                            <?php edit_category_parent($cate_parent, 0, "--", $category['parent_id']) ?>
                        </select>
                    </div>
				    <div class="form-group">
				        <label for="name">Tên danh mục </label>
				        <input name="name" type="text" class="form-control" placeholder="Nhập tên danh mục" value="{{ $category['name'] }}">
                        @if($errors->has('name'))
                            <p class="is-danger">{{ $errors->first('name') }}</p>
                        @endif
				    </div>

				    <button type="submit" class="btn btn-primary">Cập nhật</button>
				</form>

            </div>

        </div>
        <!-- /.row -->

    </div>
	
@endsection
