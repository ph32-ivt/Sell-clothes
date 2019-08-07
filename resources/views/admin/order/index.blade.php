@extends('admin.layouts.master')
@section('content')
	<!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center">Danh sách Đơn hàng</h1>
    <!-- DataTales Example -->

    <div class="col-lg-12">
        @if (Session::has('flash_message'))
            <div class="alert alert-{{ Session::get('type_message') }}">
                {{ Session::get('flash_message') }}
            </div>
        @endif
    </div>

    <div class="card shadow mb-4">
        <div class="col-md-6">
            <form action="" class="form-inline" style="margin-top: 20px; margin-left: 20px">
                
                <div class="form-group mb-2">
                    <input class="form-control" type="text" placeholder="Nhập từ khóa..." aria-label="Search" name="search" value="{{ \Request::get('name') }}">
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
                            <th>ID</th>
                            <th>Khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Ngày đặt hàng</th>
                            <th>Trạng thái</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>


                                          
                    @foreach($order as $o)
                        <tr class="text-center">
                            <td>{{ $o->id }}</td>
                            <td>{{ $o->name }}</td>
                            <td>{{ $o->telephone }}</td>
                            <td>{{ $o->address }}</td>
                            <td>{{ date('d/m/Y H:i', strtotime($o->created_at)) }}</td>
                            <td>
                            	<span style="padding: 5px; background: #006633; border-radius: 4px; color: white;">	{{ $o->status }}
                            	</span>
                            </td>
                            <td>
                                <a href="{{ route('order-edit', $o->id) }}" style="margin-right: 20px;">Chi tiết</a>
                                <a{{--  onclick="return accessDelete('Bạn có chắc là muốn xóa không ?')" --}} href="{{ route('order-delete', $o->id) }}">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection