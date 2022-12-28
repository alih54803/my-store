<?php

namespace App\Http\Controllers\frontend;

use App\Models\Products;
use App\Http\Controllers\Controller;
use App\Models\addtocart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class addtocartcontroller extends Controller
{
    public function addtocart()
    {
        return view('frontend.addtocart.addtocart');
    }
    public function addToCartt(Request  $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        // dd('umer');
        if (Auth::check()) {
            $product = Products::where('id', $product_id)->first();
            if ($product) {

                if (addtocart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => $product->name . 'already exists in cart']);
                } else {

                    $cart = new addtocart();
                    $cart->user_id = Auth::id();
                    $cart->product_id = $product_id;
                    $cart->quantity = $product_qty;
                    $cart->save();
                    return response()->json(['status' => $product->name . 'successfully add to cart']);
                }
            }
        } else {
            // dd('umer');

            return response()->json(['status' => 'please login first']);
        }
    }

    public function updateToCartt(Request $request)
    {
        $prod_id = $request->input('product_idd');
        // $prod_qty = $request->input('product_qty');
        // dd($prod_id);
        // dd($request->input());
        if (Auth::check()) {

            if (addtocart::where('user_id', Auth::user()->id)->where('product_id', $prod_id)->exists()) {
                $cart = addtocart::where('user_id', Auth::user()->id)->where('product_id', $prod_id)->first();
                $cart->quantity = $request->input('product_qty');
                $cart->update();
                return response()->json(['status' => $cart->quantity . 'successfully updated to cart']);
                // return response()->json(['status' => 'card   updated']);
            }
        }
    }
}
