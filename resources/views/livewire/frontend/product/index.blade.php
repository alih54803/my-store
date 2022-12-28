<div>
    <div class="row">
        <button wire:click='sort'>click</button>

        <div class="col-md-3">
            <div class="card">   

                <div class="card-header">Filer By Brand</div>
                <div class="card-body">
                    @foreach ($category->brands as $catebrand)
                        <label class="d-block">

                            <input type="checkbox"  wire:model="brandInputs" class="form-check-input level-checked" value="{{$catebrand->name}}"/>{{$catebrand->name}}
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="card mt-3">        
                <div class="card-header">Filter By Price</div>
                <div class="card-body">
                <label class="d-block"><input type="radio" name="priceSort" wire:model="priceInput" value="high-to-low">High to Low
                </label>  

                <label class="d-block"><input type="radio" name="priceSort" wire:model="priceInput" value="low-to-high">Low to High </label>                  
                </div>
            </div>
            <button wire:click='sort'>click</button>
           
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
                    
                    
                    <img src="{{url("uploads/products/".$product->productImages[0]->image)}}" alt="{{$product->name}}">
                </div>
                <div class="product-card-body">
                    <p class="product-brand">{{$product->brand}}</p>
                    <h5 class="product-name">
                        <a href="{{url('/collection/'.$product->category->slug.'/'.$product->slug)}}">lll
                            {{$product->name}} 
                        </a>
                    </h5>
                    <div>
                        <span class="selling-price">{{$product->selling_price}}</span>
                        <span class="original-price">{{$product->original_price}}</span>
                    </div>
                    <div class="mt-2">
                        <a href="" class="btn btn1">Add To Cart</a>
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
        
    </div>
</div>
