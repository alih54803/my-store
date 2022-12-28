<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">

            @if(session()->has('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            <div class="row">
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
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrement"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantity" value="{{$this->quantity}}" class="input-quantity" />
                                <span class="btn btn1" wire:click="increment"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click="addToCart({{$product->id}})" class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</button>
                            <button type="button" wire:click="addToWishlist({{$product->id}})" class="btn btn1"> <i
                                    class="fa fa-heart"></i> Add To Wishlist
                            </button>

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
        </div>
    </div>
</div>
