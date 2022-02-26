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
               @error('brand_id')
                <span class="text-danger">{{ $message }}</span></
               @enderror
              </div>
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
                  <input type="text" name="product_name_en" class="form-control"> 
                  @error('product_name_en')
                  <span class="text-danger">{{ $message }}</span></
                  @enderror
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <h5>Product Name Bangla<span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="text" name="product_name_bn" class="form-control" > 
                  @error('product_name_bn')
                  <span class="text-danger">{{ $message }}</span></
                  @enderror
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <h5>Product Code<span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="text" name="product_code" class="form-control" > 
                  @error('product_code')
                  <span class="text-danger">{{ $message }}</span></
                  @enderror
                </div>
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
                <h5>Product Quantity<span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="text" name="product_qty" class="form-control" > 
                  @error('product_qty')
                  <span class="text-danger">{{ $message }}</span></
                  @enderror
                </div>
              </div>
            </div>
            
            <div class="col-md-4">
              <div class="form-group">
                <h5>Product Size English<span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="text" name="product_size_en" class="form-control" value="Large,Medium,Small" data-role="tagsinput"> 
                  @error('product_size_en')
                  <span class="text-danger">{{ $message }}</span></
                  @enderror
                </div>
              </div>
            </div> 

            <div class="col-md-4">
              <div class="form-group">
                <h5>Product Size Bangla<span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="text" name="product_size_bn" class="form-control" value="বড়,মাঝারি,ছোট" data-role="tagsinput"> 
                  @error('product_size_bn')
                  <span class="text-danger">{{ $message }}</span></
                  @enderror
                </div>
              </div>     
            </div>
            

          </div>

          <div class="row">
            <!-- start 3rd row  -->
            <div class="col-md-4">
              <div class="form-group">
                <h5>Product Color English<span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="text" name="product_color_en" class="form-control" value="Red,Green,Blue" data-role="tagsinput"> 
                  @error('product_color_en')
                  <span class="text-danger">{{ $message }}</span></
                  @enderror
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <h5>Product Color Bangla <span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="text" name="product_color_bn" class="form-control" value="লাল,সবুজ,নীল" data-role="tagsinput"> 
                  @error('product_color_bn')
                  <span class="text-danger">{{ $message }}</span></
                  @enderror
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <h5>Product Tags English<span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="text" name="product_tags_en" class="form-control" value="Mobile ,Laptop,Pc" data-role="tagsinput"> 
                  @error('product_tags_en')
                  <span class="text-danger">{{ $message }}</span></
                  @enderror
                </div>
              </div>
            </div>

          </div>


          <div class="row">
            <!-- start 4th row  -->
            <div class="col-md-4">
              <div class="form-group">
                <h5>Product Tags Bangla<span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="text" name="product_tags_bn" class="form-control" value="মোবাইল,ল্যাপটপ,পিসি" data-role="tagsinput"> 
                  @error('product_tags_bn')
                  <span class="text-danger">{{ $message }}</span></
                  @enderror
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <h5>Product Selling Price<span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="text" name="selling_price" class="form-control" > 
                  @error('selling_price')
                  <span class="text-danger">{{ $message }}</span></
                  @enderror
                </div>
                </div>     
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <h5>Product Discount Price<span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="text" name="discount_price" class="form-control"> 
                  @error('discount_price')
                  <span class="text-danger">{{ $message }}</span></
                  @enderror
                </div>
              </div>
            </div>

    
          </div>

          <div class="row">
            <!-- start 5th row  -->
            <div class="col-md-6">
            <div class="form-group">
              <h5>Main Thumbnail<span class="text-danger">*</span></h5>
              <div class="controls">
                <input type="text" name="product_thumbnail" class="form-control" > </div>
                @error('product_thumbnail')
                  <span class="text-danger">{{ $message }}</span></
                @enderror
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <h5>Multiple Image<span class="text-danger">*</span></h5>
              <div class="controls">
                <input type="file" name="" class="form-control" required> 
                @error('')
                  <span class="text-danger">{{ $message }}</span></
                @enderror
              </div>
            </div>
          </div>

          </div>

        <div class="row">
            <!-- start 6th row  -->
            <div class="col-md-6">
              <div class="form-group">
                <h5>Product Short Description English<span class="text-danger">*</span></h5>
                <div class="controls">
                  <textarea name="short_des_en" id="textarea" class="form-control" required placeholder="Textarea text">
                  </textarea>
                </div>
              </div>
            </div> 

           <div class="col-md-6">
            <div class="form-group">
              <h5>Product Short Description Bangla<span class="text-danger">*</span></h5>
              <div class="controls">
                <textarea name="short_des_bn" id="textarea" class="form-control" required placeholder="Textarea text">
                </textarea>
              </div>
            </div>
           </div>   

        </div>

        <div class="row">
          <!-- start 6th row  -->
          <div class="col-md-6">
            <div class="form-group">
              <h5>Product Long Description English<span class="text-danger">*</span></h5>
              <div class="controls">
                <textarea name="textarea" id="textarea" class="form-control" required placeholder="Textarea text">
                </textarea>
              </div>
            </div>
          </div> 

         <div class="col-md-6">
          <div class="form-group">
            <h5>Product Long Description Bangla<span class="text-danger">*</span></h5>
            <div class="controls">
              <textarea name="textarea" id="textarea" class="form-control" required placeholder="Textarea text">
              </textarea>
            </div>
          </div>
         </div>   

      </div>

      <hr>

      <div class="row"> 
        <div class="col-md-6">
            <div class="form-group">
              <div class="controls">
                <fieldset>
                  <input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
                  <label for="checkbox_2">Hot Deals</label>
                </fieldset>

                <fieldset>
                  <input type="checkbox" id="checkbox_3" name="featured" value="1">
                  <label for="checkbox_3">Featured</label>
                </fieldset>
              </div>
            </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <div class="controls">
              <fieldset>
                <input type="checkbox" id="checkbox_4" name="special_offer" value="1">
                <label for="checkbox_4">Special Offer</label>
              </fieldset>

              <fieldset>
                <input type="checkbox" id="checkbox_5" name="special_deals" value="1">
                <label for="checkbox_5">Special Deals</label>
              </fieldset>
            </div>
          </div>
      </div>
      </div>

      {{-- <div class="col-md-6"> --}}
        <div class="form-group">
            <h5>Digital Product <span class="text-danger">pdf,xlx,csv*</span></h5>
          <div class="controls">
          <input type="file" name="file" class="form-control" > 
          </div>
        </div>
      {{-- </div> --}}
      <br>
      <br>


           
          
          <div  class="d-flex justify-content-center">
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