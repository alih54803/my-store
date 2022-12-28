<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\addtocart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cartcount extends Component
{
    public $cartcount;

    public $listeners=['cartAddedUpdated'=>'checkcartcount'];
    public function checkcartcount(){
        if(Auth::check()){
            return $this->cartcount=addtocart::where('user_id',auth()->user()->id)->count();
        }
        else{
            return $this->cartcount=0;
        }
    }

    public function render()
    {
        $this->cartcount=$this->checkcartcount();;
        return view('livewire.frontend.cart.cartcount',[
            'cartcount'=>$this->cartcount
        ]);
    }
}
