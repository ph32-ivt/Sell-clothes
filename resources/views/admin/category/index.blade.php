@extends('admin.layouts.master')
@section('content')
    {{-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> --}}
    
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center">Danh sách Danh mục</h1>
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
                <a class="btn btn-primary" href="{{ route('category-create') }}">Thêm</a>
            </div>
        </div>
        <!-- Search  -->
        <div class="col-md-4">
            <form action="">
                <div class="input-group" style="margin: 10px 20px 0 700px;">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Nhập từ khóa..." id="search" name="search" value="{{ \Request::get('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-info" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Tên Danh mục</th>
                            <th class="text-center">Danh mục lớn</th>
                            <th class="text-center">Ngày tạo</th>
                            <th class="text-center">Ngày sửa</th>
                            <th class="text-center" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($listCategory)
                        @foreach($listCategory as $category)
                            <tr class="text-center">
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>

                                <td>
                                    @if($category->parent_id == 0)
                                        {{ "None" }}
                                    @else
                                        <?php
                                            $parent = DB::table('categories')->where('id', $category->parent_id)->first();
                                            echo $parent->name;
                                        ?>
                                    @endif                               
                                </td>

                                <td>
                                    <?php
                                        echo \Carbon\Carbon::createFromTimeStamp(strtotime($category->created_at))->diffForHumans(); 
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        echo \Carbon\Carbon::createFromTimeStamp(strtotime($category->updated_at))->diffForHumans(); 
                                    ?>
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('category-edit', $category->id) }}">Sửa</a>
                                    <a class="btn btn-danger" onclick="return accessDelete('Bạn có chắc là muốn xóa không ?')" href="{{ route('category-delete', $category->id) }}">Xóa</a>
                                </td>
                            </tr>
                        @endforeach                     
                        @endif
                    </tbody>
                </table>
                <div class="row" style="margin-left: 400px;">{{ $listCategory->links() }}</div>
            </div>
        </div>
    </div>

	
@endsection
