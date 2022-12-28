<div class="modal fade" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Brands</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url('admin/brands')}}" method="post" enctype="multipart/form-data" >
          @csrf   
          <div class="modal-body">
          
            <div class="mb-3">
              <label >Select Category</label>
              <select name="category_id" class="form-control">

              <option value="">--Select Category--</option>
              @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
           
            </div>

            <div class="mb-3">
              <label>Brand name</label>
              <input type="text" name="name" class="form-control">
            </div>
        
            <div class="mb-3">
              <label>Brand slug</label>
              <input type="text" name="slug" class="form-control">
            </div>
            
            <div class="mb-3">
              <label>Brand status</label>
              <input type="checkbox" name="status">
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>