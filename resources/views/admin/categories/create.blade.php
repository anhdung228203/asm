@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">
            Thêm Mới
        </h1>


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
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an categories!</h1>
                            </div>
                            <form action="{{ route('admin.categories.store') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label for="name" class="form-label">Name:</label>
                                        <input type="text" class="form-control " id="name" name="name"
                                            placeholder="Name" value="">
                                    </div>
                                </div>


                                <div class="text-center form-group">
                                    <button type="submit" class="btn btn-primary btn-user col-3">Submit</button>
                                    <a href="{{ route('admin.categories.index') }}"
                                        class="btn btn-danger btn-user col-3 ">Black Frist</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
