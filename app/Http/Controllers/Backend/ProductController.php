<?php

namespace App\Http\Controllers\Backend;

use Image;
use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Multiimg;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function AddProduct(){
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product_add',compact('categories','brands'));
    }

    public function ProductStore(Request $request){
        
        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/products/thumbnail/'.$name_gen);
        $save_url = 'upload/products/thumbnail/'.$name_gen;

    $product_id = Product::insertGetId([
        'brand_id' => $request->brand_id,
      	'category_id' => $request->category_id,
      	'subcategory_id' => $request->subcategory_id,
      	'subsubcategory_id' => $request->subsubcategory_id,
      	'product_name_en' => $request->product_name_en,
      	'product_name_bn' => $request->product_name_bn,
      	'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
      	'product_slug_bn' => str_replace(' ', '-', $request->product_name_bn),
      	'product_code' => $request->product_code,

      	'product_qty' => $request->product_qty,
      	'product_tags_en' => $request->product_tags_en,
      	'product_tags_bn' => $request->product_tags_bn,
      	'product_size_en' => $request->product_size_en,
      	'product_size_bn' => $request->product_size_bn,
      	'product_color_en' => $request->product_color_en,
      	'product_color_bn' => $request->product_color_bn,

      	'selling_price' => $request->selling_price,
      	'discount_price' => $request->discount_price,
      	'short_des_en' => $request->short_des_en,
      	'short_des_bn' => $request->short_des_bn,
      	'long_des_en' => $request->long_des_en,
      	'long_des_bn' => $request->long_des_bn,

      	'hot_deals' => $request->hot_deals,
      	'featured' => $request->featured,
      	'special_offer' => $request->special_offer,
      	'special_deals' => $request->special_deals,

      	'product_thumbnail' => $save_url,
      	'status' => 1,
      	'created_at' => Carbon::now(),
    ]);

    // Multiple Image Upload Start

    $images = $request->file('multi_img');
    foreach ($images as $img){
        $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
        $uploadPath = 'upload/products/multi-image/'.$make_name;

        Multiimg::insert([
            'product_id' => $product_id,
            'photo_name' => $uploadPath,
            'created_at' => Carbon::now(),
        ]);
    }

        $notification = array(
            'message' => 'Product Inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product.manage')->with($notification);
    }


    public function ProductManage(){
        $products = Product::all();
        return view('backend.product.product_view',compact('products'));
    }

    public function ProductEdit($id){

        $multiimgs = Multiimg::where('product_id',$id)->get();

        $categories = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory= SubSubCategory::latest()->get();
        $brands = Brand::latest()->get();
        $products = Product::findOrFail($id);
        return view('backend.product.product_edit',compact('products','brands','categories','subcategory','subsubcategory','multiimgs'));
    }

    public function ProductDataUpdate(Request $request){
        $product_id = $request->id;

             Product::findOrfail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_bn' => $request->product_name_bn,
            'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_bn' => str_replace(' ', '-', $request->product_name_bn),
            'product_code' => $request->product_code,

            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_bn' => $request->product_tags_bn,
            'product_size_en' => $request->product_size_en,
            'product_size_bn' => $request->product_size_bn,
            'product_color_en' => $request->product_color_en,
            'product_color_bn' => $request->product_color_bn,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_des_en' => $request->short_des_en,
            'short_des_bn' => $request->short_des_bn,
            'long_des_en' => $request->long_des_en,
            'long_des_bn' => $request->long_des_bn,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product updated without image successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product.manage')->with($notification);
    }  // end method

    public function ProductMultiImageUpdate(Request $request){
            $images = $request->multi_img;

            foreach($images as $id => $img) {
                $imageDel = Multiimg::findOrFail($id);
                unlink($imageDel->photo_name);

                $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$name_gen);
                $uploadPath = 'upload/products/multi-image/'.$name_gen;

                Multiimg::where('id',$id)->update([
                    'photo_name' => $uploadPath,
                    'updated_at' => Carbon::now(),
                ]);

                $notification = array(
                    'message' => 'Product Image Updated Successfully',
                    'alert-type' => 'info'
                );
        
                return redirect()->back()->with($notification);
            }
    }// end method

    public function ProductThumbnailUpdate(Request $request){
        $product_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);

        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/products/thumbnail'.$name_gen);
        $save_url = 'upload/products/thumbnail'.$name_gen;
    
        Product::findOrfail($product_id)->update([
            'product_thumbnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
			'message' => 'Product Thumbnail Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
    }
}
