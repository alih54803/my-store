@extends('layouts.admin_inc.master')
@section('title', 'Admin Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Product
                    <a href="{{url('admin/products')}}" class="btn btn-primary btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
              @if ($errors->any())
              <div class="alert alert-warning">
               @foreach ($errors->all() as $error)
                   <div>{{$error}}</div>
               @endforeach
              </div>
              @endif
              <form action="{{url('admin/product')}}" method="post" enctype="multipart/form-data">
              @csrf
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag" type="button" role="tab" aria-controls="seotag" aria-selected="false">SEO Tags</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="false">Details</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image" type="button" role="tab" aria-controls="image" aria-selected="false">Details</button>
                </li>
              
              </ul>
        
                <!-- Tab panes -->
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="mb-3">
                    <label >select category</label>
                    <select name="category_id" class="form-control">
                      @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                    </select>
                    </div>
                  
                    <div class="mb-3">
                      <label >product name</label>
                      <input type="text" name="name" class="form-control">
                    </div>
                  
                    <div class="mb-3">
                      <label >product slug</label>
                      <input type="text" name="slug" class="form-control">
                    </div>

                    <div class="mb-3">
                      <label >select brand</label>
                      <select name="brand" class="form-control">
                        @foreach ($brands as $brand)
                          <option value="{{$brand->name }}">{{$brand->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    
                    <div class="mb-3">
                      <label >small description</label>
                      <textarea name="small_description" class="form-control" rows="4"></textarea>
                    </div>

                    <div class="mb-3">
                      <label > description</label>
                      <textarea name="description" class="form-control" rows="4"></textarea>
                    </div>

                </div>
                <div class="tab-pane" id="seotag" role="tabpanel" aria-labelledby="seotag-tab">
                  <div class="mb-3">
                    <label > meta title</label>
                    <textarea name="meta_title" class="form-control" rows="4"></textarea>
                  </div>
                  <div class="mb-3">
                    <label > meta keyword</label>
                    <textarea name="meta_keyword" class="form-control" rows="4"></textarea>
                  </div>
                  <div class="mb-3">
                    <label >  meata description</label>
                    <textarea name="meta_description" class="form-control" rows="4"></textarea>
                  </div>
                </div>
                <div class="tab-pane" id="details" role="tabpanel" aria-labelledby="details-tab">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="mb-3">
                        <label >original price</label>
                        <input type="text" name="original_price" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="mb-3">
                        <label >selling price</label>
                        <input type="text" name="selling_price" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="mb-3">
                        <label >quantity</label>
                        <input type="number" name="quantity" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="mb-3">
                        <label >trending</label>
                        <input type="checkbox" name="trending" style="width:50px; height:50px">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="mb-3">
                        <label >status</label>
                        <input type="checkbox" name="status" style="width:50px; height:50px">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane" id="image" role="tabpanel" aria-labelledby="image-tab">
                  <div class="row">
                    <div class="mb-3">
                      <label >upload product images</label>
                      <input type="file" name="image[]" multiple class="form-control">
                    </div>
                    
                  </div>
                </div>
              </div>

              <div>
                <button type="submit" class="btn btn-primar">save</button>
              </div>
              </form>
          </div>
        </div>
    </div>
</div>
    
@endsection