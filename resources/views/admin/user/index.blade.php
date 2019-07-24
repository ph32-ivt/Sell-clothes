@extends('admin.layouts.master')
@section('content')
    
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center">List Categories</h1>
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
                <a class="btn btn-primary" href="{{ route('user-create') }}">Add New</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>Level</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                     <?php $stt = 0; ?>
                                          
                    @foreach($listUser as $user)
                    <?php $stt = $stt + 1 ?>
                        <tr class="text-center">
                            <td>{{ $stt }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->telephone }}</td>
                            <td>{{ $user->address }}</td>
                            <td>
                                @if ($user->gender == 1)
                                    Nam
                                @else
                                    Nữ
                                @endif
                            </td>
                            <td>
                                 {{-- ?php $role = DB::table('roles')->where('id', $user->role_id)->first(); echo $role->name; ?> --}}
                                @if ($user->role_id == 1 && $user->id == 1)
                                    Supper Admin
                                @elseif ($user->role_id == 1)
                                    Admin
                                @else
                                    Member
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('user-edit', $user->id) }}">Edit</a>
                                <a class="btn btn-danger" onclick="return accessDelete('Bạn có chắc là muốn xóa không ?')" href="{{ route('user-delete', $user->id) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
	
@endsection
