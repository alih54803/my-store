<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{
  public function index(){
    $orders=Orders::where('user_id',Auth::user()->id)->get();

    return view('frontend.orders.index',compact('orders'));
  }

  public function view($id){

    $orders=Orders::where('id',$id)->where('user_id',Auth::id())->first();
    // return $orders;
    return view('frontend.orders.view',compact('orders'));
    // echo 'umer';
  }
}
