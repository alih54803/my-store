@extends('layouts.admin_inc.master')
@section('title', 'Admin Dashboard')
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>sliders
                    <a href="{{route('slider.create')}}" class="btn btn-primary btn-sm float-end">Add sdlider</a>
                </h3>
                {{-- <button type="button" class="btn btn-primary btn-sm float-end" data-toggle="modal" data-target="admin.brands.create">
                    Launch demo modal
                  </button> --}}
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>title</th>
                            <th>description</th>
                            <th>image</th>
                             <th>image</th>
                            <th>status</th>                       
                            <th>actions</th>                       
                            </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $slider)
                        <tr>
                            {{-- <td>{{$loop->index+1 }}</td> --}}
                            
                            <td>{{$slider->id }}</td>
                            <td>{{$slider->title }}</td>

                            <td>{{$slider->description }}</td>

                            <td>{{$slider->image }}</td>
                            <td>
                           <img src="{{url('uploads/slider/'.$slider->image)  }}" style='width:70px; , height:100px'>
                                
                            </td>
                            <td>{{$slider->status=='1'?'hidden':'visible' }}</td>
                           
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