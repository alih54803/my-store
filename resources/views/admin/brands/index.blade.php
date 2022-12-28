@extends('layouts.admin_inc.master')
@section('title', 'Admin Dashboard')
@section('content')

@include('admin.brands.create-model')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>brands
                    <a href="#" data-bs-toggle="modal" data-bs-target="#addBrandModal"
                        class="btn btn-primary btn-sm float-end">Add brand</a>
                </h3>
                {{-- <button type="button" class="btn btn-primary btn-sm float-end" data-toggle="modal"
                    data-target="admin.brands.create">
                    Launch demo modal
                </button> --}}
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>brand</th>
                            <th>category</th>
                            <th>slug</th>
                            <th>status</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brands as $brand)
                        <tr>
                            {{-- <td>{{$loop->index+1 }}</td> --}}

                            <td>{{$brand->id }}</td>
                            <td>{{$brand->name }}</td>
                            <td>{{$brand->category_id}}</td>
                            <td>{{$brand->slug }}</td>
                            <td>{{$brand->status=='1'?'hidden':'visible' }}</td>

                            <td>

                                <a class="btn btn-primary" href="#">Edit</a>
                                <a class="btn btn-danger" href="#">delete</a>

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
