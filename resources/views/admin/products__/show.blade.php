@extends('layouts.app2')
@section('content')
    <div class="card">
        <div class="card-header pb-0">                    <div class="pull-left">
            <h2> Show Product</h2>
        </div></div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">

                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('laptop_route.index') }}"> Back</a>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 20px;text-align: center;">
                @method('put')
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong><br>
                        {{ $laptopModel->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 20px;">
                    <div class="form-group">
                        <strong>Details:</strong><br>
                        {{ $laptopModel->detail }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 20px;">
                    <div class="form-group">
                        <strong>Image:</strong><br>
                        <img src="public/image/{{ $laptopModel->image }}" width="200px">
                        <img src="{{url('public/image/'.$laptopModel->image)  }}" style='width:100px; , height:100px'>
                        <img src="{{asset('public/image/' .$laptopModel->image)}}" style='width:100px; , height:100px'alt="" class="card-view__img">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
