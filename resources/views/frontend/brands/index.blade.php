@extends('layouts.frontend_inc.master')
@section('title', 'collection')
@section('content')


<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">All Brands here</h4>
            </div>
            @forelse ($brands as $brand)
            <div class="col-6 col-md-3">

                <div class="category-card-body">
                    <h1>{{$brand->name}}</h1>
                </div>
                {{-- <div class="category-card">
                    <a href="{{url('/collection/'.$category->slug)}}">
                        <div class="category-card-img">
                            <img src="{{url("uploads/category/".$category->image)}}" class="w-100" alt="Laptop">
                        </div>
                        <div class="category-card-body">
                            <h5>{{$brand->name}}</h5>
                        </div>
                    </a>
                </div> --}}
            </div>
            @empty
                <h1>No Brand available now.........</h1>
            @endforelse


        </div>
    </div>
</div>
@endsection
