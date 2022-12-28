@extends('layouts.frontend_inc.master')
@section('title', 'home page')
@section('content')

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
    @foreach ($sliders as $key=> $slider)
        <div class="carousel-item {{$key==0? 'active':''}}">
        <img src="{{url("uploads/slider/".$slider->image)}}" style="width:60%; height:60%;" alt="...">
        <div class="carousel-caption d-none d-md-block">
         <div class="custom-carousel-content">
            <h1>{{$slider->title}}</h1>
            <p>{{$slider->description}}</p>
            <div>
                <a href="#" class="btn btn-slider"></a>
            </div>
         </div>
        </div>
      </div>
    @endforeach




    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <div class="card-body">
    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" class="form-control">
        <br>
        <button class="btn btn-success">Import User Data</button>
        <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a>
    </form>
</div>
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
<div class="form-group">
    <strong>ReCaptcha:</strong>
    <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
    @if ($errors->has('g-recaptcha-response'))
        <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
    @endif
</div> 
@endsection
