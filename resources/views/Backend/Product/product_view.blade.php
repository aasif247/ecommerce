@extends('admin.admin_master')

@section('admin')
<div class="container-full">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Product List</h3>
            </div> 
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product Name English</th>
                            <th>Product Name English</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($products as $product)
                        <tr>
                            <td>
                                <img src="{{ asset($product->product_thumbnail) }}" style="width:60px; height:50px;">
                            </td>
                            <td>{{ $product->product_name_en}}</td>
                            <td>{{ $product->product_name_bn}}</td>
                            <td>{{ $product->product_qty}}</td>
                            <td width="30%">
                              <a href="{{ route('product.edit',$product->id) }}" class="btn btn-info">Edit</a>

                              <a href="{{ route('product.delete',$product->id) }}" class="btn btn-danger" id="delete" >Delete</a>
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

@endsection