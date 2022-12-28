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
                <h3>Products
                    <a href="{{url('admin/products/create')}}" class="btn btn-primary btn-sm float-end">Add Product</a>
                </h3>
            </div>
            <div class="card-body">
               <table class="table table-border table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>category Name</th>
                           <th>brand name</th>
                            <th>product</th>
                            <th>price</th>
                            <th>quantity</th>
                            <th>status</th>
                            <th>action</th>
                            <th>id</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->category->name}}</td>
                              <td>{{$product->brand}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->selling_price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->status=='1'? 'hidden':'visible'}}</td>
                                <td>
                                    <a href="" class="btn btn-success">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>
                                

                            </tr>
                        @empty
                            <tr aria-colspan="7">No products available</tr>
                        @endforelse
                    </tbody>
               </table>
           
            </div>
        </div>
    </div>
</div>
    
@endsection