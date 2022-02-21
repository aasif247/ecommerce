@extends('admin.admin_master')

@section('admin')

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
                              <li class="breadcrumb-item active" aria-current="page">All Category</li>
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
                <h3 class="box-title">Category List</h3>
              </div> 
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Category Icon</th>
                              <th>Category En</th>
                              <th>Category Bn</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($category as $category)
                          <tr>
                              <td>
                              <span><i class="{{ $category->category_icon }}"> </i> </span>
                              </td>
                              <td>{{ $category->category_name_en}}</td>
                              <td>{{ $category->category_name_bn}}</td>
                              <td>
                                <a href="{{ route('category.edit',$category->id) }}" class="btn btn-info">Edit</a>

                                <a href="{{ route('category.delete',$category->id) }}" class="btn btn-danger" id="delete" >Delete</a>
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
       <h3 class="box-title">Add Category</h3>
     </div>
     <!-- /.box-header -->
     <div class="box-body">
         <div class="table-responsive">
          <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <h5>Category Name English <span class="text-danger">*</span></h5>
              <div class="controls">
              <input type="text" name="category_name_en" class="form-control"> </div>
              @error('category_name_en')
                <span class="text-danger">{{ $message }}</span></
              @enderror
            </div>

            <div class="form-group">
              <h5>Category Name Bangla <span class="text-danger">*</span></h5>
              <div class="controls">
              <input type="text" name="category_name_bn" class="form-control"> </div>
              @error('category_name_bn')
                <span class="text-danger">{{ $message }}</span></
              @enderror
            </div>

            <div class="form-group">
              <h5>Category Icon <span class="text-danger">*</span></h5>
              <div class="controls">
              <input type="text" name="category_icon" class="form-control"> </div>
              @error('category_icon')
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


@endsection