@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Categoriess</h3>
                    <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Category</li>
                              <li class="breadcrumb-item active" aria-current="page">All SubSubCategory</li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <div class="col-8">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">SubCategory List</h3>
              </div> 
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                            <th>Category </th>
                            <th>SubCategory Name</th>
                            <th>Sub-Subcategory English </th>
                            <th>Sub-Subcategory Bangla </th>
                            <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($subsubcategory as $category)
                          <tr>
                              <td>{{ $category['category']['category_name_en']}} </td>
                              <td>{{ $category['subcategory']['subcategory_name_en']}} </td>
                              <td>{{ $category->subsubcategory_name_en}}</td>
                              <td>{{ $category->subsubcategory_name_bn}}</td>
                              <td width="30%">
                                <a href="{{ route('subsubcategory.edit',$category->id) }}" class="btn btn-info" title="Edit Data">Edit</a>

                                <a href="{{ route('subsubcategory.delete',$category->id) }}" class="btn btn-danger" id="delete" title="Delete Data">Delete</a>
                              </td>
                          </tr>
                         @endforeach 
                      </tbody>
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
                     
          </div>
          <!-- /.col -->

{{-- ------------------------------Add Category ------------------------------------------------- --}}

<div class="col-4">

  <div class="box">
     <div class="box-header with-border">
       <h3 class="box-title">Add Sub-SubCategory</h3>
     </div>
     <!-- /.box-header -->
     <div class="box-body">
         <div class="table-responsive">
          <form method="post" action="{{ route('subsubcategory.store') }}" >
            @csrf

            <div class="form-group">
              <h5>Category Select<span class="text-danger">*</span></h5>
              <div class="controls">
              
              <select name="category_id"class="form-control">
                <option value="" selected="" disabled="" >Select Category</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                @endforeach
              </select>
              @error('category_id')
                <span class="text-danger">{{ $message }}</span></
              @enderror
              </div>
            </div>

            <div class="form-group">
              <h5>SubCategory Select<span class="text-danger">*</span></h5>
              <div class="controls">
              
              <select name="subcategory_id"class="form-control">
                <option value="" selected="" disabled="" 
                
                >Select SubCategory</option>
              </select>
              @error('subcategory_id')
                <span class="text-danger">{{ $message }}</span></
              @enderror
              </div>
            </div>

            <div class="form-group">
              <h5>Sub SubCategory Name English <span class="text-danger">*</span></h5>
              <div class="controls">
              <input type="text" name="subsubcategory_name_en" class="form-control"> </div>
              @error('subsubcategory_name_en')
                <span class="text-danger">{{ $message }}</span></
              @enderror
            </div>

            <div class="form-group">
              <h5>Sub SubCategory Name Bangla <span class="text-danger">*</span></h5>
              <div class="controls">
              <input type="text" name="subsubcategory_name_bn" class="form-control"> </div>
              @error('subsubcategory_name_bn')
                <span class="text-danger">{{ $message }}</span></
              @enderror
            </div>

            <div class="text-xs-right">
              <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
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
      <!-- /.content -->
    
    </div>

<script type="text/javascript"> 
  $(document).ready(function(){
    $('select[name="category_id"]').on('change',function(){
      var category_id = $(this).val();
      if(category_id) {
        $.ajax({
          url: "{{ url('/category/subcategory/ajax') }}/"+category_id,
          type:"GET",
          dataType:"json",
          success:function(data){
            var e =$('select[name="subcategory_id"]').empty();
            $.each(data,function(key,value){
              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
            });
          },
        });
      }else{
        alert('danger');
      }
    });
  });
</script>
@endsection