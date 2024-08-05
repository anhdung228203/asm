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
                    <tr>
                        <th>Trường</th>
                        <th>Dữ Liệu</th>
                    </tr>

                    @foreach ($model->toArray() as $fieldName => $value)
                        <tbody>
                            <tr>
                                <td>{{ ucfirst($fieldName) }}</td>
                                <td>
                                    {{-- {{ $value }} --}}
                                </td>
                            </tr>

                        </tbody>
                    @endforeach;

                </table>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-danger">Black Frist</a>
            </div>
        </div>
    </div>
@endsection
