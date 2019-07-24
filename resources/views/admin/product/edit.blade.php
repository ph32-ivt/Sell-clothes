@extends('admin.layouts.master')
@section('content')
    
    <style>
        .icon-del {
            position: relative;
            top: -90px;
            left: -20px;
        }
        #insert, #addImages {
            margin-top: 20px;
        }
        .clear {
            clear: both;
        }
        .btn-circle {
          width: 30px;
          height: 30px;
          text-align: center;
          padding: 6px 0;
          font-size: 12px;
          line-height: 1.42;
          border-radius: 15px;
        }
    </style>

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

                <form method="POST" action="{{ route('product-update', $product->id) }}" enctype="multipart/form-data" name="formEditProduct">
					@csrf
					@method('POST')

                    <div class="form-group">
                        <label for="category_id">Category Name</label>
                        <select class="form-control" name="category_id">
                            <option value="" selected disabled>Please choose Category Name</option>
                            {{ category_parent($listCategory, 0, "--", $product->category_id) }}
                            {{-- @foreach($listCategory as $category)
                                <option {{ $category->id == ($product->category_id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach --}}
                        </select>
                    </div>

				    <div class="form-group">
				        <label for="name">Product Name</label>
				        <input name="name" type="text" class="form-control" placeholder="Enter product name" value="{{ $product->name }}">
				    </div>
				    <div class="form-group">
				        <label for="status">Status</label>
				        <input name="status" type="text" class="form-control" placeholder="Enter status" value="{{ $product->status }}">
				    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input name="price" type="text" class="form-control" placeholder="Enter price" value="{{ $product->price }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="Enter description here">{{ $product->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="image_current">Image Current :</label><br>
                        <img name="image_current" src="upload/{{ $product->image }}" alt="" width="150px">
                    </div>
                    <div class="form-group">
                        <label for="image">Product Image</label>
                        <input type="file" class="form-control-file" name="image" value="{{ $product->image }}">
                        <input type="hidden" name="img_current" value="{{ $product->image }}">
                    </div>
                    <div class="form-group">
                        <label for="img_detail">Image Detail Current :</label><br>
                        @foreach($product_img as $key => $item)
                        <div id="{{ $key }}" style="float: left; margin-top: 10px;">
                            <img class="img_detail" src="upload/detail/{{ $item->name }}" alt="" width="150px" height="200px" idHinh="{{ $item->id }}" id="{!! $key !!}">
                            <a href="javascript:void(0)" type="button" id="del_img" class="btn btn-danger btn-circle icon-del"><i class="fa fa-times"></i></a>
                        </div>                          
                        @endforeach
                        <div class="clear"></div>
                        <button type="button" class="btn btn-warning" id="addImages">Add Images</button>
                        <div id="insert"></div> 
                    </div>

				    <button type="submit" class="btn btn-primary">Submit</button>
				</form>

            </div>

        </div>
        <!-- /.row -->

    </div>
	
@endsection
