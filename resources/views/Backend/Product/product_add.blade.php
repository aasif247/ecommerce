@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
  <!-- Content Header (Page header) -->
  
  <!-- Main content -->
  <section class="content">

   <!-- Basic Forms -->
    <div class="box">
    <div class="box-header with-border">
      <h4 class="box-title">Add Product</h4>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
      <div class="col">
        <form novalidate>
          <div class="row">
          <div class="col-12">			

            <div class="row">
              <!-- start 1st row  -->
             <div class="col-md-3">
               <div class="form-group">
               <h5>Brand Select<span class="text-danger">*</span></h5>
               <div class="controls">
                 <select name="brand_id" class="form-control">
                   <option value="" selected="" disabled="">Select Brand</option>
                   @foreach ($brands as $brand)
                   <option value="{{ $brand->id}}">{{$brand->brand_name_en }}</option> </option>
                   @endforeach
                 </select>
               </div>
               @error('brand_id')
                <span class="text-danger">{{ $message }}</span></
               @enderror
             </div>
             </div>
 
             <div class="col-md-3">
              <div class="form-group">
                <h5>Category Select<span class="text-danger">*</span></h5>
                <div class="controls">
                  <select name="category_id" class="form-control">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                    @endforeach
                  </select>
                  @error('category_id')
                  <span class="text-danger">{{ $message }}</span></
                  @enderror
                </div>  
              </div>
             </div>
             
             <div class="col-md-3">
              <div class="form-group">
                <h5>SubCategory Select<span class="text-danger">*</span></h5>
                <div class="controls">
                  <select name="subcategory_id" class="form-control">
                    <option value="">Select SubCategory</option>
                  </select>
                  @error('subcategory_id')
                  <span class="text-danger">{{ $message }}</span></
                  @enderror
                </div>
              </div>
             </div> 

             <div class="col-md-3">
              <div class="form-group">
                <h5>Sub-SubCategory Select<span class="text-danger">*</span></h5>
                <div class="controls">
                  <select name="subsubcategory_id" class="form-control">
                    <option value="">Select Sub-SubCategory</option>
                  </select>
                  @error('subsubcategory_id')
                  <span class="text-danger">{{ $message }}</span></
                  @enderror
                </div>
              </div>
             </div> 
 
          </div>
          <div class="row">
             <!-- start 1st row  -->
            <div class="col-md-4">
              <div class="form-group">
                <h5>Product Name English <span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <h5>Product Name Bangla<span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <h5>Prodcut Code<span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
              </div>
            </div>    

          </div>

          {{-- <div class="row">
            <div class="col-md-4">

            </div>
          </div> --}}
            
  
          <div class="row">
            <!-- start 2nd row  -->

            <div class="col-md-4">
              <div class="form-group">
                <h5>Prodcut Quantity<span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
              </div>
            </div>
            
            <div class="col-md-4">
              <div class="form-group">
                <h5>Prodcut Size English<span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="email" name="email" class="form-control"> </div>
              </div>
            </div> 

            <div class="col-md-4">
              <div class="form-group">
                <h5>Prodcut Size Bangla<span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="email" name="email" class="form-control"> </div>
              </div>     
            </div>
            

          </div>

          <div class="row">
            <!-- start 3rd row  -->
            <div class="col-md-4">
              <div class="form-group">
                <h5>Prodcut Color English<span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <h5>Prodcut Color Bangla <span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <h5>Prodcut Tags Engliash<span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
              </div>
            </div>

             

          </div>


          <div class="row">
            <!-- start 4th row  -->
            <div class="col-md-4">
              <div class="form-group">
                <h5>Prodcut Tags Bangla<span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <h5>Product Selling Price<span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
                </div>     
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <h5>Product Discount Price<span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="email" name="email" class="form-control"> </div>
              </div>
            </div>

    
          </div>

          <div class="row">
            <!-- start 5th row  -->
            <div class="col-md-6">
            <div class="form-group">
              <h5>Main Thumbnail<span class="text-danger">*</span></h5>
              <div class="controls">
                <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <h5>Multiple Image<span class="text-danger">*</span></h5>
              <div class="controls">
                <input type="file" name="file" class="form-control" required> </div>
            </div>
          </div>

          </div>

        <div class="row">
            <!-- start 6th row  -->
            <div class="col-md-6">
              <div class="form-group">
                <h5>Prodcut Short Description English<span class="text-danger">*</span></h5>
                <div class="controls">
                  <textarea name="textarea" id="textarea" class="form-control" required placeholder="Textarea text">
                  </textarea>
                </div>
              </div>
            </div> 

           <div class="col-md-6">
            <div class="form-group">
              <h5>Prodcut Short Description Bangla<span class="text-danger">*</span></h5>
              <div class="controls">
                <textarea name="textarea" id="textarea" class="form-control" required placeholder="Textarea text">
                </textarea>
              </div>
            </div>
           </div>   

        </div>

        <div class="row">
          <!-- start 6th row  -->
          <div class="col-md-6">
            <div class="form-group">
              <h5>Prodcut Long Description English<span class="text-danger">*</span></h5>
              <div class="controls">
                <textarea name="textarea" id="textarea" class="form-control" required placeholder="Textarea text">
                </textarea>
              </div>
            </div>
          </div> 

         <div class="col-md-6">
          <div class="form-group">
            <h5>Prodcut Long Description Bangla<span class="text-danger">*</span></h5>
            <div class="controls">
              <textarea name="textarea" id="textarea" class="form-control" required placeholder="Textarea text">
              </textarea>
            </div>
          </div>
         </div>   

      </div>

            

            <div class="form-group">
              <h5>Featured<span class="text-danger">*</span></h5>
              <div class="controls">
                <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
            </div>
            <div class="form-group">
              <h5>Special Offer<span class="text-danger">*</span></h5>
              <div class="controls">
                <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
            </div>
            <div class="form-group">
              <h5>Special Deal<span class="text-danger">*</span></h5>
              <div class="controls">
                <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
            </div>
            <div class="form-group">
              <h5>Status<span class="text-danger">*</span></h5>
              <div class="controls">
                <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
            </div>
            <div class="form-group">
              <h5>Prodcut Slug Bangla <span class="text-danger">*</span></h5>
              <div class="controls">
                <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
            </div>
            <div class="form-group">
              <h5>Prodcut Slug Bangla <span class="text-danger">*</span></h5>
              <div class="controls">
                <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
            </div>
            
          </div>

          

          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <h5>Checkbox <span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="checkbox" id="checkbox_1" required value="single">
                  <label for="checkbox_1">Check this custom checkbox</label>
                </div>								
              </div>
            </div>
          </div>
          
          <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Product">
          </div>
          
        </form>

      </div>
      <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->

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



      $('select[name="subcategory_id"]').on('change',function(){
      var subcategory_id = $(this).val();
      if(subcategory_id) {
        $.ajax({
          url: "{{ url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
          type:"GET",
          dataType:"json",
          success:function(data){
            var e =$('select[name="subsubcategory_id"]').empty();
            $.each(data,function(key,value){
              $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
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