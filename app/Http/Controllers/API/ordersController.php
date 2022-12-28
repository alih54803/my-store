<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ordersController extends Controller
{
    public function viewAllOrders()
    {

        $orderss = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')->where('status', '0')->get();

        // $orders=orders::where('user_id',Auth::user()->id)->where('status','0')->first();
        // $orders=orders::orderItems()->where('user_id',Auth::user()->id)->where('status','0')->first();
        // $orderItmes=$orders->orderItems()->where('order_id',$orders->id)->get();
        // return $orders;
        // return $orderItmes;
        // return response($orders)->json($orders);
        return response($orderss);
    }
    
}
