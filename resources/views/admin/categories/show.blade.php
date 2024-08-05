@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"></h1>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Detail
                </h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Field Name</th>
                            <th>Value</th>
                        </tr>
                    </thead>

                    @foreach ($model->toArray() as $key => $value)
                        <tr>
                            <td>{{ $key}}</td>
                            <td>{{ $value }}</td>
                        </tr>
                    @endforeach
                </table>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-danger btn-user col-3 ">Black Frist</a>
            </div>
        </div>
    </div>
@endsection
