@extends('layouts.frontend_inc.master')
@section('title', 'order view')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">My Orders
                    <a href="{{url('my-orders')}}" class="btn btn-warning text-white float-end">Back</a>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <label for="">First name</label>
                            <div class="border p-2">{{$orders->fname}}</div>
                            <label for="">last name</label>
                            <div class="border p-2">{{$orders->lname}}</div>
                            <label for="">email</label>
                            <div class="border p-2">{{$orders->email}}</div>
                            <label for="">contact no.</label>
                            <div class="border p-2">{{$orders->phone}}</div>
                            <label for="">Address</label>
                            <div class="border p-2">{{$orders->address}}
                                ,{{$orders->city}}
                                ,{{$orders->state}}
                                ,{{$orders->country}}
                            </div>
                            <label for="">pin code</label>
                            <div class="border p-2">{{$orders->pincode}}</div>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Qty.</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($orders->orderItems as $order)
                                    <tr>
                                        <td>{{$order->product->name}}</td>
                                        <td>{{$order->quantity}}</td>
                                        <td>{{$order->price}}</td>
                                        <td>
                                            <img src="{{url('uploads/products/'.$order->product->productImages[0]->image)}}" style='width:70px; , height:70px' alt="{{$order->product->name}}"></td>

                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>

                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Grand Total::{{$orders->total_price}}</h4>

                                </div>
                                <div class="col-md-6">
                                    <h5>Order Status:: {{$orders->status=='0'?'pending':'completed'}}</h5>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
