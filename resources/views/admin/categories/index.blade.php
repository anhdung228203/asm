@extends('admin.layouts.master')

@section('title')
    Danh Mục
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 card-header d-flex justify-content-between">
            Danh Sách Người Dùng
            <br>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mtt-4">Thêm Mới</a>
        </h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Thông tin
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
                                <th>Tên</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Hành Động</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($data as $category)
                                <tr>
                                    <td>{{ $category->id }} </td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <div class="d-flex justify-content-left">
                                            <a href="{{ route('admin.categories.show', $category->id) }}"
                                                class="btn btn-primary mr-1">Show</a>

                                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                class="btn btn-warning mr-1">Edit</a>

                                                <a href="{{ route('admin.categories.destroy', $category->id) }}"
                                                    onclick="return confirm('Bạn có chắc chắn xóa không?')"
                                                     class="btn btn-danger mr-1">Edit</a>
    

                                            {{-- <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')

                                                <a onclick="return confirm('Bạn có chắc chắn xóa không?')"
                                                    class="btn btn-danger">Delete</a>
                                            </form> --}}
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
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
