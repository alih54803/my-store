@extends('layouts.admin_inc.master')
@section('title', 'Admin Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Orders
                    <a href="{{url('admin/order-history')}}" class="btn btn-primary btn-sm float-end">order history</a>
                </h3>
            </div>
            <div class="card-body">
               <table class="table table-border table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>user Name</th>

                            <th>price</th>
                            {{-- <th>quantity</th> --}}
                            <th>status</th>
                            <th>action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->fname.' '.$order->lname}}</td>

                                {{-- <td>{{$order->product->name}}</td> --}}
                              <td>{{$order->total_price}}</td>
                                {{-- <td>{{$order->orderItems->quantity}}</td> --}}
                                <td>{{$order->status=='0'?'pending':'completed'}}</td>

                                <td>
                                    <a href="{{url('admin/view-order/'.$order->id)}}" class="btn btn-success">view</a>

                                </td>


                            </tr>
                        @empty
                            <tr aria-colspan="7">No orders available</tr>
                        @endforelse
                    </tbody>
               </table>

            </div>
        </div>
    </div>
</div>

@endsection
