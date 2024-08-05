@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">
            
            <br>
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Create Users</a>
        </h1>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    DataTables
                </h6>
            </div>
            <div class="card-body">

                @if (session('msg'))
                    <div class="alert alert-success">{{ session('msg') }}</div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>


                            <?php foreach ($data as $user) : ?>
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->password }}</td>
                                <td>
                                    @if ($user->type)
                                        <span class="badge badge-success">Admin</span>
                                    @else
                                        <span class="badge badge-warning">Member</span>
                                    @endif
                                </td>
                                
                                <td>
                                    <div class="d-flex justify-content-left">
                                        <a href="{{ route('admin.users.show', $user->id) }}"
                                            class="btn btn-primary mr-1">Show</a>

                                        <a href="{{ route('admin.users.edit', $user->id) }}"
                                            class="btn btn-warning mr-1">Edit</a>

                                        <a href="{{ route('admin.users.destroy', $user->id) }}"
                                            onclick="return confirm('Bạn có chắc chắn xóa không?')"
                                            class="btn btn-danger mr-1">Edit</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('theme/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
@endsection

@section('script-libs')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
            // "order":  false;
        });
    </script>
@endsection

@section('style-libs')
    <link href="{{ asset('theme/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
@endsection
