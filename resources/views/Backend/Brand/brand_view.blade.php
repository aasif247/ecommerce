@extends('admin.admin_master')

@section('admin')

    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Brands</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Brands</li>
                              <li class="breadcrumb-item active" aria-current="page">All Brands</li>
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
                <h3 class="box-title">Brand List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Brand En</th>
                              <th>Brand Bn</th>
                              <th>Image</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($brands as $brand)
                          <tr>
                              <td>{{ $brand->brand_name_en}}</td>
                              <td>{{ $brand->brand_name_bn}}</td>
                              <td><img src="{{ asset($brand->brand_image) }}" style= "width: 100px; height: 70px;">
                              </td>
                              {{-- <td>{{ $brand->action}}</td> --}}
                              <td>
                                <div class="row">
                                    <div>
                                        <a href="{{ route('brand.edit',$brand->id) }}" type="button" class="btn btn-primary m-2">Edit</a>
                                    </div>

                                    <div>
                                        <form action="{{ route('brand.destroy') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" name="submit" value="Delete" class="btn btn-danger m-2">
                                        </form>
                                    </div>
                                </div>
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

{{-- ------------------------------Add Brand ------------------------------------------------- --}}

<div class="col-4">

  <div class="box">
     <div class="box-header with-border">
       <h3 class="box-title">Add Brand</h3>
     </div>
     <!-- /.box-header -->
     <div class="box-body">
         <div class="table-responsive">
          <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <h5>Brand Name English <span class="text-danger">*</span></h5>
              <div class="controls">
              <input type="text" name="brand_name_en" class="form-control"> </div>
              @error('brand_name_en')
                <span class="text-danger">{{ $message }}</span></
              @enderror
            </div>

            <div class="form-group">
              <h5>Brand Name Bangla <span class="text-danger">*</span></h5>
              <div class="controls">
              <input type="text" name="brand_name_bn" class="form-control"> </div>
              @error('brand_name_bn')
                <span class="text-danger">{{ $message }}</span></
              @enderror
            </div>

            <div class="form-group">
              <h5>Brand Image <span class="text-danger">*</span></h5>
              <div class="controls">
              <input type="file" name="brand_image" class="form-control"> </div>
              @error('brand_image')
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