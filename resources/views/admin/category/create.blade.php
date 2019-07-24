@extends('admin.layouts.master')
@section('content')

	<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Category <small style="font-size: 60%; color: blue;">Add</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Forms
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        

        <div class="row">
            <div class="col-lg-6">
                <!-- Thông báo lỗi -->
                @include('admin.blocks.error')

                <form method="POST" action="{{ route('category-store') }}">
					@csrf
					@method('POST')
				    
				    <div class="form-group">
				        <label for="parent_id">Category Parent</label>
                        <select name="parent_id" class="form-control">
                            <option value="0">Please Choose Category</option>
                            <?php category_parent($cate_parent); ?>
                        </select>
				    </div>

                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input name="name" type="text" class="form-control" placeholder="Enter category name">
                    </div>

					{{-- <div class="form-group">
					    <label for="paren_id[]">Parent_Id</label>
					    <select class="form-control" name="paren_id[]">
					    	@foreach($listCategory as $category)
					        	<option value="{{ $category->id }}">{{ $category->paren_id }}</option>
							@endforeach
					    </select>
					</div> --}}

				    <button type="submit" class="btn btn-primary">Submit</button>
				</form>

            </div>

        </div>
        <!-- /.row -->

    </div>
	
@endsection
