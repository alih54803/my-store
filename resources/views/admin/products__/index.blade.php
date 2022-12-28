@extends('layouts.admin_inc.master')
@section('title', 'Admin Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Crud Example</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('laptop_route.create') }}"> Create New Product</a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($pass_laptop_model as $laptop)
            <tr>
                <td>{{$loop->index+1 }}</td>
                <td><img src="{{url('public/image/'.$laptop->image)  }}" style='width:100px; , height:100px'></td>

                <td><img src="public/image/{{$laptop->image }}" style='width:100px; , height:100px'></td>

                <td>{{ $laptop->name }}</td>
            <td>{{ $laptop->detail }}</td>
            <td>
                <form action="{{ route('laptop_route.destroy' ,$laptop->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('laptop_route.show' ,$laptop->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('laptop_route.edit' ,$laptop->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
            </tr>
        @endforeach
    </table>

@endsection
