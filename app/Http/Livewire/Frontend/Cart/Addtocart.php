<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\addtocart as ModelsAddtocart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Addtocart extends Component
{

    public function removecart(int $cartId)
    {
        ModelsAddtocart::where('user_id',Auth::id())->where('id',$cartId)->delete();
        session()->flash('message','successfully removed from cart');
    }
    public function render()
    {
        $addtocart = ModelsAddtocart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.addtocart', [
            'addtocart' => $addtocart
        ]);
    }
}
