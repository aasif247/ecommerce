@extends('admin.admin_master')

@section('admin')

<!-- Edit Category -->
<section class="content">
 <div class="row">
    <div class="col-4">

    <div class="box">
        <div class="box-header with-border">
        <h3 class="box-title">Edit Category</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
            <form method="post" action="{{ route('category.update',$category->id) }}" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" name="id" value="{{ $category->id }}">

                    <div class="form-group">
                    <h5>Category Icon <span class="text-danger">*</span></h5>
                    <div class="controls">
                    <input type="text" name="category_icon" class="form-control" value="{{ $category->category_icon }}"> </div>
                    </div>

                    <div class="form-group">
                    <h5>Category Name English <span class="text-danger">*</span></h5>
                    <div class="controls">
                    <input type="text" name="category_name_en" class="form-control" value="{{ $category->category_name_en }}"> </div>
                    </div>
    
                    <div class="form-group">
                    <h5>Category Name Bangla <span class="text-danger">*</span></h5>
                    <div class="controls">
                    <input type="text" name="category_name_bn" class="form-control" value="{{ $category->category_name_bn }}"> </div>
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