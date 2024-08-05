@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">

            <br>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Create posts</a>
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
                                <th>Title</th>
                                <th>Excerpt</th>


                                <th>Thumnail</th>

                            
                                <th>Created_at</th>
                                <th>Update_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>

                                <th>Excerpt</th>

                                <th>Thumnail</th>

                              

                                <th>Created_at</th>
                                <th>Update_at</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            <?php foreach ($data as $post) : ?>

                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->excerpt }}</td>


                                <td><img src="{{ asset($post->img_thumnail) }}" alt="" width="100px"></td>


                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->updated_at }}</td>


                                <td>
                                    <div class="d-flex justify-content-left">
                                        <a href="{{ route('admin.posts.show', $post->id) }}"
                                            class="btn btn-primary mr-1">Show</a>

                                        <a href="{{ route('admin.posts.edit', $post->id) }}"
                                            class="btn btn-warning mr-1">Edit</a>

                                        <a href="{{ route('admin.posts.destroy', $post->id) }}"
                                            onclick="return confirm('Bạn có chắc chắn xóa không?')"
                                            class="btn btn-danger mr-1">Edit</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.1.2/tinymce.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
            // "order":  false;
        });
        tinymce.init({
            selector: 'textarea#content',
            height: 300,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });
    </script>
@endsection

@section('style-libs')
    <link href="{{ asset('theme/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
@endsection
