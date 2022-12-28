<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders['orders']=orders::get();
        return view('admin.orders.index', $orders);
    }

    public function orderView($id){

        $orders['orders']=orders::where('id',$id)->first();
        return view('admin.orders.view',$orders);
        // echo 'umer';
    }


    public function updateOrder(Request $request, $id){
        $order=Orders::find($id);
        $order->status=$request->order_status;
        $order->update();
        return redirect('admin/orders')->with('success','successfuly updated');
// echo 'umer';
    }

    public function orderHistory(){
        $orders=Orders::where('status','1')->get();
        return view('admin.orders.order-history', compact('orders'));
    }
}
