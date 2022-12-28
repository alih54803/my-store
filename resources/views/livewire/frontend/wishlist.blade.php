<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Quantity</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>
                        @foreach($wishlists as $wishlist)
                        <div class="cart-item">
                            <div class="row">
                                <div class="col-md-6 my-auto">
                                    <a href="">
                                        <label class="product-name">
                                            <img src="{{url('uploads/products/'.$wishlist->product->productImages[0]->image)}}"
                                                style="width: 50px; height: 50px" alt="">
                                            {{$wishlist->product->name}}
                                        </label>
                                    </a>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <label class="price">{{$wishlist->product->selling_price}} </label>
                                </div>
                                <div class="col-md-2 col-7 my-auto">
                                    <div class="quantity">
                                        <div class="input-group">
                                            <button class="btn btn1" wire:click="decrement({{$wishlist->id}})"><i class="fa fa-minus"></i></button>
                                            <input type="text" wire:model="quantity" value="{{$quantity}}" class="input-quantity" />
                                            <button class="btn btn1" wire:click="increment({{$wishlist->id}})"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-5 my-auto">
                                    <div class="remove">
                                        <button wire:click="removewishlist({{$wishlist->id}})"
                                            class="btn btn-danger btn-sm">

                                            <span wire:loading.remove wire:target="removewishlist({{$wishlist->id}})"><i
                                                    class="fa fa-trash"></i> Remove</span>
                                            <span wire:loading wire:target="removewishlist({{$wishlist->id}})"><i
                                                    class="fa fa-trash"></i> Removing</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach



                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
