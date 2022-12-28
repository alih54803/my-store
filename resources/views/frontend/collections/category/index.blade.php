@extends('layouts.frontend_inc.master')
@section('title', 'collection')
@section('content')


<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Our Categories</h4>
            </div>
            @forelse ($categories as $category)
            <div class="col-6 col-md-3">
                <h5> <a href="{{url('/collectionss/'.$category->slug)}}">with ajax</h5>
                <div class="category-card">
                    <a href="{{url('/collection/'.$category->slug)}}">
                        <div class="category-card-img">
                            <img src="{{url("uploads/category/".$category->image)}}" class="w-100" alt="Laptop">
                        </div>
                        <div class="category-card-body">
                            <h5>{{$category->name}}</h5>
                        </div>
                    </a>
                </div>
            </div>
            @empty
                <h1>No category available now.........</h1>
            @endforelse


        </div>
    </div>
</div>
@endsection
