@extends('admin.admin_master')

@section('admin')

<!-- Edit Category -->
<section class="content">
 <div class="row">
    <div class="col-4">

    <div class="box">
        <div class="box-header with-border">
        <h3 class="box-title">Edit SubCategory</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">

            <form method="post" action="{{ route('subcategory.update') }}">
                @csrf
                    <input type="hidden" name="id" value="{{ $subcategory->id }}">

                    <div class="form-group">
                        <h5>Category Select <span class="text-danger">*</span></h5>
                        <div class="controls">
                        
                        <select name="category_id"class="form-control">
                          <option value="" selected="" disabled="" >Select Category</option>
                          @foreach ($categories as $category)
                          <option value="{{ $category->id }}"{{ $category->id == $subcategory->category_id ? 'selected': '' }} > {{ $category->category_name_en }}</option>
                          @endforeach
                        </select>
                        @error('category_id')
                          <span class="text-danger">{{ $message }}</span></
                        @enderror
                        </div>
                      </div>
          
                      <div class="form-group">
                        <h5>Sub Category Name English <span class="text-danger">*</span></h5>
                        <div class="controls">
                        <input type="text" name="subcategory_name_en" class="form-control" value="{{ $subcategory->subcategory_name_en }}"> </div>
                        @error('subcategory_name_en')
                          <span class="text-danger">{{ $message }}</span></
                        @enderror
                      </div>
          
                      <div class="form-group">
                        <h5>Sub Category Name Bangla <span class="text-danger">*</span></h5>
                        <div class="controls">
                        <input type="text" name="subcategory_name_bn" class="form-control" value="{{ $subcategory->subcategory_name_bn }}"> </div>
                        @error('subcategory_name_bn')
                          <span class="text-danger">{{ $message }}</span></
                        @enderror
                      </div>
          
                      <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                      </div>
            </form>
            
            </div>
        </div>
        <!-- /.box-body -->
    </div>
                
    </div>
            </div>
            <!-- /.row -->
</section>

@endsection