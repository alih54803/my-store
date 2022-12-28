@extends('layouts.frontend_inc.master')
@section('title', 'collection')
@section('content')

{{-- @livewire('') --}}
{{-- <livewire:frontend.product.index/> --}}
<h1 class="justify-text-center">product detail page</h1>
<livewire:frontend.product.view :product="$product" :category="$category"/>
@endsection

