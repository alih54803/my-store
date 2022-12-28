@extends('layouts.frontend_inc.master')
@section('title', 'collection')
@section('content')



<div class="py-3 py-md-5 bg-light">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Our Products</h4>
            </div>
            {{-- without livewire --}}


            <div class="card mt-3">
                <div class="card-header">Filter By Price</div>
                <div class="card-body">
                    <span>
                        <a href="{{URL::current()."?sort=price_asc"}}">price low to high</a> <br>
                        <a href="{{URL::current()."?sort=price_desc"}}">price high to low</a>
                    </span>
                    {{-- <label class="d-block"><input type="radio" name="priceSort"
                            value="high-to-low">High to Low
                    </label>

                    <label class="d-block"><input type="radio" name="priceSort"
                            value="low-to-high">Low to High </label> --}}
                </div>
            </div>


            @forelse ($products as $product)
            <div class="col-md-3">
                <div class="product-card">
                    <div class="product-card-img">

                        @if($product->quantity>0)
                        <label class="stock bg-success">In Stock</label>
                        @else
                        <label class="stock bg-danger">Out of Stock</label>
                        @endif


                        <img src="{{url("uploads/products/".$product->productImages[0]->image)}}"
                        alt="{{$product->name}}">
                    </div>
                    <div class="product-card-body">
                        <p class="product-brand">{{$product->brand}}</p>
                        <h5 class="product-name">
                            {{-- <a href="{{url('/collection/'.$product->category->slug.'/'.$product->slug)}}">lll
                                {{$product->name}}
                            </a> --}}
                            <a href="{{url('/collectionss/'.$product->category->slug.'/'.$product->slug)}}">lll
                                {{$product->name}} <h1>with ajax</h1>
                            </a>
                        </h5>
                        <div>
                            <span class="selling-price">{{$product->selling_price}}</span>
                            <span class="original-price">{{$product->original_price}}</span>
                        </div>
                        <div class="mt-2">
                            <a href="add-to-cart-btn" class="btn btn1">Add To Cart</a>
                            <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                            <a href="" class="btn btn1"> View </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <h4 class="m-4">No Products availale for {{$category->name}} </h4>
            </div>
            @endforelse


            {{-- without livewire --}}


            {{--
            <livewire:frontend.wishlist-count /> --}}


            {{-- <livewire:frontend.product.index :category="$category" /> --}}



            {{-- @livewire('frontend.product.index') --}}
            {{--
            <livewire:counter /> --}}
            {{--
            <livewire:counter /> --}}
            {{-- @livewire('counter') --}}
            {{-- <button wire:click='sort'>click</button> --}}

        </div>

    </div>
</div>

@endsection
