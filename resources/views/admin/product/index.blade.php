@extends('admin.layouts.master')
@section('content')
    
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center">Danh sách Sản phẩm</h1>
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
            <div class="row" style="float: right; margin-right: 20px;">
                <a class="btn btn-primary" href="{{ route('product-create') }}">Thêm mới</a>
            </div>
        </div>
        <!-- Search  -->
        <div class="col-md-6">
            <form action="" class="form-inline" style="margin-top: 20px; margin-left: 20px">
                
                <div class="form-group mb-2">
                    <input class="form-control" type="text" placeholder="Nhập từ khóa..." aria-label="Search" name="search" value="{{ \Request::get('name') }}">
                </div>
                <div class="form-group mb-2" style="margin:0 20px; padding: 5px">
                    <select name="cate" id="" class="form-control">
                        <option value="" disabled selected>Danh mục</option>
                        @if(isset($categories))
                            @foreach($categories as $cate)
                            <option value="{{ $cate->id }}" {{ \Request::get('cate') == $cate->id ? 'selected' : '' }}>{{ $cate->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group mb-2">
                    <button class="btn btn-info" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
                
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Tên sản phẩm</th>
                            <th>Tên Danh mục</th>
                            <th>Giá (VND)</th>
                            <th>Mô tả</th>
                            <th>Hình ảnh</th>
                            <th>Trạng thái</th>
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
                                <a class="btn btn-primary" href="{{ route('product-edit', $product->id) }}">Sửa</a>
                                <a class="btn btn-danger" onclick="return accessDelete('Bạn có chắc là muốn xóa sản phẩm này không ?')" href="{{ route('product-delete', $product->id) }}">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row" style="margin-left: 400px;">{{ $listProduct->links() }}</div>
            </div>
        </div>
    </div>

@endsection
