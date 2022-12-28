<?php

namespace App\Http\Livewire\Frontend\Product;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\addToWishlist;
use App\Models\addTocart;
use App\Models\Products;

class View extends Component
{
    public $quantity = 1;
    public $category, $product;
    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function addToWishlist($product_id)
    {
        if (Auth::check()) {
            // dd($product_id);
            // dd(auth()->user()->id);

            if (addToWishlist::where('user_id', auth()->user()->id)->where('product_id', $product_id)->exists()) {
                session()->flash('message', 'Already added to wishlist');
                return false;
            } else {
                addToWishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $product_id
                ]);
                session()->flash('message', 'successfully added to wishlist');
            }
        } else {
            // dd(Auth::check());
            // return redirect()->route('login');
            session()->flash('message', 'please login first');
            return false;
        }
    }

    public function addToCart(int $product_id)
    {
        if (Auth::check()) {

            if (addTocart::where('user_id', auth()->user()->id)->where('product_id', $product_id)->exists()) {
                session()->flash('message', 'Already added to cart');
                return false;
            } elseif ($this->product->where('id', $product_id)->where('status', '0')->exists()) {
                if ($this->product->quantity > 0) {

                    addtoCart::create(
                        [

                            'user_id' => auth()->user()->id,
                            'product_id' => $product_id,
                            'quantity' => $this->quantity
                        ]

                    );
                    $this->emit('cartAddedUpdated');
                    session()->flash('message', 'successfully added to cart');
                }
            }
        } else {
            // session()->flash('mes sage', 'please login first');
            return redirect()->route('login');
            // return false;
        }
    }
    public function increment()
    {
        // $products=Products::all();
        if ($this->quantity < $this->product->quantity) {
            $this->quantity++;
            # code...
        }
    }
    public function decrement()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
            # code...
        }
    }

    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
