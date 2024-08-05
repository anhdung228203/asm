@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"></h1>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Creates
                </h6>
            </div>
            <div class="card-body">

                @if (session('msg'))
                    <div class="alert alert-success">{{ session('msg') }}</div>
                @endif

                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Create an authors!</h1>
                </div>
                <!-- Nested Row within Card Body -->
                <form class="user" action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-6">
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <label for="title" class="form-label">Title:</label>
                                    <input type="text" class="form-control " id="title" name="title"
                                        placeholder="title" value="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <label for="excerpt" class="form-label">Excerpt:</label>
                                    <textarea class="form-control" id="" rows="8" name="excerpt" id="excerpt"><?= isset($_SESSION['data']) ? $_SESSION['data']['excerpt'] : null ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <label for="img_thumnail" class="form-label">Img_Thummail:</label>
                                    <input type="file" class="form-control" id="img_thumnail" name="img_thumnail">
                                </div>
                            </div>

                       
                        </div>


                    </div>

            </div>


            <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <label for="content" class="form-label">Content:</label>
                    <textarea id="content" name="content">
                        
                        </textarea>
                </div>
            </div>
            <div class=" form-group">
                <button class="btn btn-primary btn-user ">Submit</button>
                <a href="{{ route('admin.posts.index') }}"
                    class="btn btn-danger btn-user  ">Black Frist</a>
            </div>
            </form>
        </div>
    </div>

    </div>
@endsection
