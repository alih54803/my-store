@extends('layouts.frontend_inc.master')
@section('title', 'home page')
@section('content')

<div class="card-body">
    <form action="{{ route('currency.convert') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="currency_from" class="form-control">
        <input type="text" name="currency_to" class="form-control">
        <input type="text" name="amount" class="form-control">
        <br>
        <button type="submit" class="btn btn-success">convert</button>
    </form>
</div>
@endsection
