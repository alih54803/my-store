<?php

namespace App\Http\Livewire\Frontend;

use Illuminate\Support\Facades\Auth;

use App\Models\addToWishlist;
use Livewire\Component;

class WishlistCount extends Component
{

    public $wishlistcount;

    public function wishlistcount()
    {

        if (Auth::check()) {
            // if(auth()->check()){

            return   $this->wishlistcount = addToWishlist::where('user_id', auth()->user()->id)->count();
            // dd($this->wishlistcount);
        } else {
            return $this->wishlistcount = 0;
        }
    }
    // public function mount(){
    //     'wishlistcount'=>10;
    // }
    public function render()
    {
        $this->wishlistcount = $this->wishlistcount();
        // dd($this->wishlistcount);
        return view('livewire.frontend.wishlist-count', [
            'wishlistcount' => $this->wishlistcount
            // 'wishlistcount'=>$this->wishlistcount
        ]);
    }
}
