@extends('layouts.admin_inc.master')
@section('title', 'Admin Dashboard')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Category
                    <a href="{{url('admin/category/create')}}" class="btn btn-primary btn-sm float-end">Add Category</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>name</th>
                            <th>satuts</th>
                            <th>image</th>


                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            {{-- <td>{{$loop->index+1 }}</td> --}}

                            <td>{{$category->id }}</td>
                            <td>{{$category->name }}</td>
                            <td>{{$category->status=='1'?'hidden':'visible' }}</td>
                            <td><img src="{{url('uploads/category/'.$category->image)  }}"
                                    style='width:100px; , height:100px'></td>

                            {{-- <td><img src="public/image/{{$category->image }}" style='width:100px; , height:100px'>
                            </td> --}}
                            <td>

                                <button type="button" class="btn btn-primary edit" value="{{$category->id}}" >Edit</button>
                                <a class="btn btn-danger" href="#">delete</a>

                            </td>

                            {{-- <td>
                                <form action="{{ route('laptop_route.destroy' ,$category->id) }}" method="POST">

                                    <a class="btn btn-info"
                                        href="{{ route('laptop_route.show' ,$laptop->id) }}">Show</a>

                                    <a class="btn btn-primary"
                                        href="{{ route('laptop_route.edit' ,$laptop->id) }}">Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td> --}}
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
$(document).ready(function(){
    $("button").click(function(){
      $(".test").hide();
    });
  });
<script type="text/javascript" >
    $.(document).ready(function(){
        alert('umer');
        $.('body').click('.edit', function(){
            var edit_id=$(this).val();
            alert(edit_id);
        });
    });
</script>
@endsection
