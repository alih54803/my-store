@extends('layouts.frontend_inc.master')
@section('title', 'home page')
@section('content')

<div class="col-md-12">
    <h2 class="m-2 text-center">Wishlists</h2>
</div>
<div><livewire:frontend.wishlist/></div>

@endsection

