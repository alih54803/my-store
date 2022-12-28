<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\addtocart;
use App\Models\{Country,state,City};
use App\Models\orderItems;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;
use App\Models\User;

class CheckoutController extends Controller
{
    public function index()
    {

        $old_cartItems = addtocart::where('user_id', Auth::user()->id)->get();
        // dd($cartItmes);
        $countries=Country::get(['name','id']);
        foreach ($old_cartItems as $cartItem) {
            if (!Products::where('id', $cartItem->product_id)->where('quantity', '>=', $cartItem->quantity)->exists()) {
                $removeCart = addtocart::where('user_id', Auth::user()->id)->where('product_id', $cartItem->product_id)->first();

                // ->select("username")->get()->toArray()

                // $cartItems=addtocart::where('user_id',Auth::user()->id)->where('product_id',$cartItem->product_id)->list();
                // $cartItems=addtocart::where('user_id',Auth::user()->id)->select('product_id',$cartItem->id)->get();
                // $cartItems=addtocart::where('user_id',Auth::user()->id)->list('id',$cartItem->id);

                // $removeCart[]=
                $removeCart->delete();
            }
            # yhan sy delete k bjaye pass hi wo kren jin ki valye zyaada hy
        }
        $cartItems = addtocart::where('user_id', Auth::user()->id)->get();
        return view('frontend.checkout.index', compact('cartItems','countries'));
    }

    public function placeOrder(Request $request)
    {
        // echo 'umer';
        $order = new Orders();
        $order->user_id = Auth::user()->id;
        $order->fname = $request->input('fname');
        $order->lname = $request->lname;
        $order['email'] = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->city = json_encode($request->input('city'));
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');

        $cartProduct=addtocart::where('user_id',Auth::id())->get();
        $total = 0;
        foreach($cartProduct as $cartItem){

            $total = $total + $cartItem->product->selling_price*$cartItem->quantity;
        }

        $order->total_price=$total;
        $order->save();
        $order->id;
        $cartItems = addtocart::where('user_id', Auth::id())->get();
        foreach ($cartItems as $cartItem) {
            orderItems::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'price' => $cartItem->product->selling_price*$cartItem->quantity,
                'quantity' => $cartItem->quantity
            ]);



            $product = Products::where('id', $cartItem->product_id)->first();

            $product->quantity = $product->quantity - $cartItem->quantity;
            $product->update();
        }




        if (Auth::user()->address == null) {
            $user = User::where('id', Auth::id())->first();
            $user->lname = $request->input('lname');
            $user->phone_number = $request->input('phone');
            $user->address = $request->input('address');
            $user['city'] = json_encode($request->input('city'));
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->pincode = $request->input('pincode');
            $user->update();
        }
        $addtocart = addtocart::where('user_id', Auth::user()->id)->get();
        addtocart::destroy($addtocart);
        return redirect('view-order/'.$order->id)->with('success', 'order placed successfully....');
    }

    public function fetchStates(Request $request){
    //     $data['states']=State::where('country_id',$request->country_id)->get('name','id');
    //    return $data;
        $data['states']=State::where('country_id',$request->country_id)->get();
    //    return $data;
    // return $data->id;
        return response()->json($data);
    }

    public function fetchCities(Request $request){
        // dd( $request->state_id);
        $citi['cities']=City::where('state_id', $request->state_id)->get();
        // return $citi;

        return response()->json($citi);
    }
}
