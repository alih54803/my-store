<?php

namespace App\Http\Livewire\Frontend;
use App\Models\addToWishlist;
use Livewire\Component;

class Wishlist extends Component
{
    public $quantity=1;

    public function removewishlist(int $wishlistId){
        // dd($wishlistId);
        addToWishlist::where('user_id', auth()->user()->id)->where('id',$wishlistId)->delete();
        session()->flash('message','successfully removed from wishlist');

    }

    public function increment(int $wishlistId){
        // $products=Products::all();
        $wishlist=addToWishlist::where('user_id',auth()->user()->id)->where('id',$wishlistId)->first();
//  $wishlist_product=$wishlist->product()->quantity;
// dd($wishlist->product->quantity);
        if ($this->quantity<$wishlist->product->quantity) {
            $this->quantity++;
            # code...
        }
    }
    public function decrement(){
        if ($this->quantity>1) {
            $this->quantity--;
            # code...
        }
    }

    public function render()
    {

        $wishlists=addToWishlist::where('user_id',auth()->user()->id)->get();
        return view('livewire.frontend.wishlist',[
            'wishlists'=>$wishlists
        ]);
    }
}
