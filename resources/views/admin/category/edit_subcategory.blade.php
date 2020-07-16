@extends('admin.admin_layouts')

@section('admin_content')

 <div class="sl-mainpanel">
     

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Edit Sub-Category</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          
          <div class="table-wrapper">
         
   @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
       <form method="post" action="{{ route('update.subcategory', $subcategory->id) }}">
        @csrf
         <div class="modal-body pd-20"> 
        <div class="form-group">
                  <label for="exampleInputEmail1">Sub-Category Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="subcategory" value="{{ $subcategory->subcategory_name }}" name="subcategory_name">

                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Select Category</label>
                  <select class="form-control" name="category_id">
                    @foreach($category as $cat)
                    <option value="{{ $cat->id }}"
                      <?php if ($cat->id == $subcategory->category_id) {
                        echo "selected";
                      } ?>
                      >{{ $cat->category_name }}</option>
                    @endforeach
                  </select>
                </div>
          
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Update</button>
                 
              </div>
                </form>


          </div><!-- table-wrapper -->
        </div><!-- card -->

        

 
    </div><!-- sl-mainpanel -->


 
 

@endsection