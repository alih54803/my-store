<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\addtocart;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class addtoCartController extends Controller
{
    public function addtocart(Request $request){

        // $validator =Validator::make($request->all(),[
        //     'cartKey'
        // ]);
      $product_id= $request->product_id;
      $product_qty=$request->quantity;
      if(Auth::check()){
        $product=Products::where('id',$product_id)->first();
        if($product){
            if(addtocart::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){
                return response()->json(['status'=>$product->name.'already exists']);
            }else{
                $cart=new addtocart();
                $cart->user_id=Auth::id();
                $cart->product_id=$product->id;
                $cart->quantity=$product_qty;
                $cart->save();
                return response()->json($cart);
            }
        }
        else{
            return response()->json(['status'=>'please loging first']);
        }
      }
    }
}
