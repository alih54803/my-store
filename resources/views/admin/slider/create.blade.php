@extends('layouts.admin_inc.master')
@section('title', 'Admin Dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>add slider
                    <a href="{{route('slider.index')}}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf   
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>title</label>
                        <input type="text" name="title" class="form-control">
                        @error('name')<small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    
                    <div class="col-md-12 mb-3">
                        <label>descrption</label>
                        <textarea name="description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>status</label><br/>
                        <input type="checkbox" name="status" >
                    </div>
                    
                    
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary float-end">save</button>
                    </div>
                </div>
                
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection