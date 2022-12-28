@extends('layouts.frontend_inc.master')
@section('title', 'checkout page')
@section('content')



<div class="container mt-5">

    <form action="{{url('place-order')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h6>basic detail</h6>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">First Name:</label>
                                <input type="text" class="form-control" value="{{Auth::user()->name}}" name="fname"
                                    placeholder="first name">
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name:</label>
                                <input type="text" class="form-control" value="{{Auth::user()->lname}}" name="lname"
                                    placeholder="last name">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Email:</label>
                                <input type="text" class="form-control" value="{{Auth::user()->email}}" name="email"
                                    placeholder="email">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">phone number:</label>
                                <input type="text" class="form-control" value="{{Auth::user()->phone_number}}"
                                    name="phone" placeholder="first name">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address:</label>
                                <input type="text" class="form-control" value="{{Auth::user()->address}}" name="address"
                                    placeholder="first name">
                            </div>


                            <div class="col-md-6 mt-3">
                                <label for="">country:</label>
                                <select name="country" id="country_dd">
                                    <option value="0" selected="true" disabled >Select your country</option>
                                    @foreach ($countries as $country)

                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="text" class="form-control" value="{{Auth::user()->country}}"
                                name="country" placeholder="first name"> --}}
                            </div>
                            <div class="col-md-6 mt-3">
                                {{-- <label for="">state:</label>
                                <input type="text" class="form-control" value="{{Auth::user()->state}}" name="state"
                                    placeholder="first name"> --}}
                                <select name="state" id="state_dd" class="form-control">

                                </select>
                            </div>
                            <div class="col-md-6 mt-3">
                                {{-- <label for="">city:</label>
                                <input type="text" class="form-control" value="{{Auth::user()->city}}" name="city"
                                    placeholder="first name"> --}}
                                <select name="city[]" id="city_dd" multiple='multiple' class="form-control">

                                </select>
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="">pin code:</label>
                                <input type="text" class="form-control" value="{{Auth::user()->pincode}}" name="pincode"
                                    placeholder="first name">
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h6>other detail</h6>
                        <hr>
                        @if ($cartItems->count()>0)
                        <table>
                            <thead>
                                <tr>
                                    <th>name </th>
                                    <th> Qty.</th>
                                    <th> price </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $cartitem)
                                <tr>
                                    <td>{{$cartitem->product->name}}</td>
                                    <td>{{$cartitem->quantity}}</td>
                                    <td>{{$cartitem->product->selling_price}}</td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <hr>
                        <button type="submit" class="btn btn-primary float-end">Place Order</button>

                        @else
                        <div class="card-body">
                            <h3>no product in cart</h3>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </form>

</div>
@endsection
