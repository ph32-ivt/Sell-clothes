@extends('admin.layouts.master')
@section('content')
    
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center">Danh sách Slide</h1>
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
                <a class="btn btn-primary" href="{{ route('slide-create') }}">Thêm</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                            <th>Hình ảnh</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($slides as $slide)
                            <tr class="text-center">
                                <td>{{ $slide->id }}</td>
                                <td>{{ $slide->title }}</td>
                                <td>{{ $slide->content }}</td>
                                <td><img src="upload/slides/{{ $slide->name }}" width="400" height="150" alt=""></td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('slide-edit', $slide->id) }}">Sửa</a>
                                    <a class="btn btn-danger" onclick="return accessDelete('Bạn có chắc là muốn xóa không ?')" href="{{ route('slide-delete', $slide->id) }}">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
	
@endsection
