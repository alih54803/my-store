@extends('layouts.frontend_inc.master')
@section('title', 'collection')
@section('content')

<div class="py-3 py-md-5 bg-light">
    <div class="container">

        @if(session()->has('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
        @endif
        <div class="row product_data">
            <div class="col-md-5 mt-3">
                <div class="bg-white border">
                    <img src="{{url("uploads/products/".$product->productImages[0]->image)}}" class="w-100"
                    alt="Img">
                </div>
            </div>
            <div class="col-md-7 mt-3">
                <div class="product-view">
                    <h4 class="product-name">
                        {{$product->name}}
                        @if($product->quantity>0)
                        <label class="label-stock bg-success">In Stock</label>
                        @else
                        <label class="label-stock bg-danger">Out of Stock</label>
                        @endif
                    </h4>
                    <hr>
                    <p class="product-path">
                        Home / Category / Product / HP Laptop <br>
                        {{-- Home/{{$category->name}}/{{$product->name}}<br> --}}
                        Home/{{$product->category->name}}/{{$product->name}}
                    </p>
                    <div>
                        <span class="selling-price">{{$product->selling_price}}</span>
                        <span class="original-price">{{$product->original_price}}</span>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-3  ">
                            <input type="visible" value="{{$product->id}}" class="product_id">
                            <label for="quantity">quantity</label>
                            <div class="input-group text-center mb-3" style="width: 130px;">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity  " value="1"
                                    class="qty-input form-control text-center" />
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                        </div>
                    </div>

                    <div class="mt-2">
                        @if ($product->quantity>0)
                        <button type="button" class="btn btn-primay  me-3  addtocartbtn"> <i
                                class="fa fa-shopping-cart"></i> Add To Cart</button>
                            </button>
                            @endif
                            <button type="button" class="btn btn1"> <i class="fa fa-heart"></i> Add To Wishlist

                    </div>
                    <div class="row">
                        <div class="col-md-12 col-3">
                            <input type="hidden" class="product_id" value="{{$product->id}}">
                            <input type="number" class="qty-input form-control  " value="1" min="1" max="10">
                        </div>
                        <div class="col-md 6 col-6">
                            <button type="button" class="add-to-cart-btn btn btn-danger">add to card</button>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h5 class="mb-0">Small Description</h5>
                        <p>
                            {{$product->small_description}}
                            <br>
                            {!!$product->small_description!!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header bg-white">
                        <h4>Description</h4>
                    </div>
                    <div class="card-body">
                        <p>
                            {{$product->description}} </p>
                    </div>
                </div>
            </div>

        </div>
        <h2>This is a heading</h2>

        <p>This is a paragraph.</p>
        <p>This is another paragraph.</p>

        <button>Click me to hide paragraphs</button>
    </div>
</div>
@endsection

@section('scripts')

<script>

</script>
@endsection
