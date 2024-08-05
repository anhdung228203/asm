@extends('admin.layouts.master')


@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"></h1>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Update
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
                                <h1 class="h4 text-gray-900 mb-4">Update an Users!</h1>
                            </div>
                            <form class="user" action="{{ route('admin.users.update', $model->id) }}" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label for="name" class="form-label">Name:</label>
                                        <input type="text" class="form-control " id="name"
                                            value="{{ $model->name }}" name="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" class="form-control " id="email" name="email"
                                        value="{{ $model->email }}" placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label for="password" class="form-label">Password:</label>
                                        <input type="text" class="form-control " id="password" name="password"
                                            value="{{ $model->password }}" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label for="type" class="form-label">Type:</label>
                                        <select name="type" id="type" class="form-control "
                                            value="{{ $model->type }}">
                                            <option {{ $model->type ? 'selected' : null }} value="0">Member</option>
                                            <option {{ $model->type ? 'selected' : null }} value="1">Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-center form-group">
                                    <button class="btn btn-primary btn-user col-3">Submit</button>
                                    <a href="{{ route('admin.users.index') }}" class="btn btn-danger btn-user col-3 ">Black
                                        Frist</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
