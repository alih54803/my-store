@extends('layouts.frontend_inc.master')
@section('title', 'home page')
@section('content')

<form action="{{route('store.dropzone')}}" method="post" enctype="multipart/form-data">
    @csrf
    <label class="col-form-label" for="">name</label>
    <input type="text" name="name" class="form-control">
    <div class="mb-3 col-md-4 fee-me">
        <label class="col-form-label" for="">descrption</label>
        <input type="text" class="form-control " name="description">
    </div>
    <div class="mb-3 col-md-6">
        <label class="col-form-label" for="image">صورة الملف الشخصي</label>
        <div class="mb-3 file-upload-main">
            <div class=" form-control needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}"
                    id="photo-dropzone">
            </div>
        </div>
    </div>
    <button type="submit">save</button>
</form>
@endsection
@section('scripts')

@endsection

