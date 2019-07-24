@extends('admin.layouts.master')
@section('content')

	<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Products
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Products
                    </li>
                </ol>
                <!-- Message Error -->
                @include('admin.blocks.error')
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-6">

                <form method="POST" action="{{ route('product-store') }}" enctype="multipart/form-data">
					@csrf
					@method('POST')

                    <div class="form-group">
                        <label for="category_id">Category Name</label>
                        <select class="form-control" name="category_id">
                            <option value="" selected disabled>Please choose Category Name</option>
                            @foreach($listCategory as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

				    <div class="form-group">
				        <label for="name">Product Name</label>
				        <input name="name" type="text" class="form-control" placeholder="Enter product name" value="{{ old('name') }}">
				    </div>
				    <div class="form-group">
				        <label for="status">Status</label>
				        <input name="status" type="text" class="form-control" placeholder="Enter status" value="{{ old('status') }}">
				    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input name="price" type="text" class="form-control" placeholder="Enter price" value="{{ old('price') }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="Enter description here">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Product Image</label>
                        <input type="file" class="form-control-file" name="image">
                    </div>

					@for($i = 1; $i <= 3; $i++)
                    <div class="form-group">
                        <label for="image_detail[]">Product Image Detail {{ $i }}</label>
                        <input type="file" class="form-control-file" name="image_detail[]">
                    </div>
                    @endfor

				    <button type="submit" class="btn btn-primary">Submit</button>
				</form>

            </div>

        </div>
        <!-- /.row -->

    </div>
	
@endsection
