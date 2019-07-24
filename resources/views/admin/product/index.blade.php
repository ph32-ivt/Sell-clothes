@extends('admin.layouts.master')
@section('content')
    
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center">List Products</h1>
    <!-- DataTales Example -->
    <div class="col-lg-12">
        @if (Session::has('flash_message'))
            <div class="alert alert-{{ Session::get('type_message') }}">
                {{ Session::get('flash_message') }}
            </div>
        @endif
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            <div class="row" style="float: right; margin-right: 20px;">
                <a class="btn btn-primary" href="{{ route('product-create') }}">Add New</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Name</th>
                            <th>Category Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  $stt = 0 ?>
                    @foreach($listProduct as $product)
                        <?php $stt = $stt + 1 ?>
                        <tr class="text-center">
                            <td>{{ $stt }}</td>
                            <td>{{ $product->name }}</td>
                            <td>
                                <?php $category = DB::table('categories')->where('id', $product->category_id)->first() ?>
                                @if (!empty($category->name))
                                    {{ $category->name }}
                                @endif
                            </td>
                            <td>{{ number_format($product->price) }}</td>
                            <td>{{ $product->description }}</td>
                            <td><img src="upload/{{ $product->image }}" alt="" height="80px" width="80px"></td>
                            <td>{{ $product->status }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('product-edit', $product->id) }}">Edit</a>
                                <a class="btn btn-danger" onclick="return accessDelete('Do you want to delete this product ?')" href="{{ route('product-delete', $product->id) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
