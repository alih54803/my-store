<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            <div class="row ">
                <div class="col-md-12">

                    @if ($addtocart->count()>0)




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
                        @php
                        $total=0;
                        @endphp
                        @foreach($addtocart as $addtocartItem)
                        <div class="cart-item">
                            <div class="row  product_data">
                                <div class="col-md-6 my-auto">
                                    <a href="">
                                        <label class="product-name">
                                            {{-- <img
                                                src="{{url('uploads/products/'.$addtocart->product->productImages[0]->image)}}"
                                                --}} <img
                                                src="{{url('uploads/products/'.$addtocartItem->product->productImages[0]->image)}}"
                                                alt="" style="width: 50px; height: 50px" alt="">
                                            {{$addtocartItem->product->name}}
                                        </label>
                                    </a>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <label class="price">{{$addtocartItem->product->selling_price}} </label>
                                </div>

                                <div class="col-md-2 col-7 my-auto">
                                    {{-- {{$addtocartItem->quantity}} --}}

                                    @if ($addtocartItem->product->quantity>=$addtocartItem->quantity)
                                    <input type="visible" value="{{$addtocartItem->product->id}}"
                                        class="product_id form-control ">
                                    <div class="input-group text-center mb-3" style="width: 130px;">
                                        <button class="input-group-text decrement-btn changeQty">-</button>
                                        <input type="text" name="quantity" value="{{$addtocartItem->quantity}}"
                                            class="qty-input form-control text-center" />
                                        <button class="input-group-text changeQty increment-btn ">+</button>
                                    </div>
                                    @else
                                    <h5>no product available</h5>
                                    @endif



                                </div>
                                <div class="col-md-2 col-5 my-auto">
                                    <div class="remove">
                                        <button wire:click="removecart({{$addtocartItem->id}})"
                                            class="btn btn-danger btn-sm">

                                            <span wire:loading.remove
                                                wire:target="removecart({{$addtocartItem->id}})"><i
                                                    class="fa fa-trash"></i> Remove</span>
                                            <span wire:loading wire:target="removecart({{$addtocartItem->id}})"><i
                                                    class="fa fa-trash"></i> Removing</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                        $total=$total+$addtocartItem->product->selling_price*$addtocartItem->quantity;
                        @endphp
                        @endforeach
                    </div>
                    <div class="card-footer">
                        Total Price: {{$total}}
                        <a href="{{url('/checkout')}}" type="button" class="btn btn-success float-end">proceed to
                            checkout</a>
                    </div>
                    @else
                    <div class="card-body text-center">
                        <h3>your shopping cart is empty</h3>
                        <a href="{{url('collection')}}" class="btn btn-outline-primary float-end">continue shopping</a>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
