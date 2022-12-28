@extends('layouts.frontend_inc.master')
@section('title', 'collection')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">My Orders</div>
                <div class="card-body">
                    <table class="table table-bordered striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>status</th>
                                <th>action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>name</td>
                                <td>{{$order->total_price}}</td>
                                <td>{{$order->status=='0'?'pending':'completed'}}</td>
                                <td><a href="{{url('/view-order/'.$order->id)}}"  class="btn btn-primary">view</a></td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
