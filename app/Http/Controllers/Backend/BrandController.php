<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class BrandController extends Controller
{
    public function BrandView(){
        $brands = Brand::latest()->get();
        return view ('backend.brand.brand_view', compact('brands'));
    }

    public function BrandStore(Request $request){
        
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_bn' => 'required',
            'brand_image' => 'required'
        ],
        [ 
            'brand_name_en.required' => 'Input Brand English Name',
            'brand_name_bn.required' => 'Input Brand Bangla Name'
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;

        Brand::insert([
            'brand_name_en' => $request -> brand_name_en,
            'brand_name_bn' => $request -> brand_name_bn,
            'brand_slug_en' => strtolower(str_replace(' ', '-',$request -> brand_name_en)),
            'brand_slug_bn' => str_replace(' ', '-',$request -> brand_name_bn),
            'brand_image'   => $save_url
        ]);

        $notification = array(
            'message' => 'Brand Inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
