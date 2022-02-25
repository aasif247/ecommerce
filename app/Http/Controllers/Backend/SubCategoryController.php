<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view ('backend.category.subcategory_view', compact('categories','subcategory'));
    }

    public function SubCategoryStore(Request $request){
        
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_bn' => 'required',
        ],
        [ 
            'category_id.required' => 'Please Select Any Option',
            'subcategory_name_en.required' => 'Input SubCategory Engliash Name',
        ]);

        Subcategory::insert([
            'category_id' => $request -> category_id,
            'subcategory_name_en' => $request -> subcategory_name_en,
            'subcategory_name_bn' => $request -> subcategory_name_bn,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-',$request -> subcategory_name_en)),
            'subcategory_slug_bn' => str_replace(' ', '-',$request -> subcategory_name_bn),
        ]);

        $notification = array(
            'message' => 'SubCategory Inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function SubCategoryEdit($id){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory_edit',compact('subcategory','categories'));
    }
    
    public function SubCategoryUpdate(Request $request){

        $subcat_id = $request->id;
        SubCategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request -> subcategory_name_en,
            'subcategory_name_bn' => $request -> subcategory_name_bn,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-',$request -> subcategory_name_en)),
            'subcategory_slug_bn' => str_replace(' ', '-',$request -> subcategory_name_bn),
        ]);

        $notification = array(
            'message' => 'SubCategory Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('subcategory.all')->with($notification);

    }

    public function SubCategoryDelete($id){

            SubCategory::findOrFail($id)->delete();

            $notification = array(
                'message' => 'SubCategory Deleted successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
    
    }

    // --------------------Sub Sub Category---------------------

    public function SubSubCategoryView(){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subsubcategory = SubSubCategory::latest()->get();
        return view ('backend.category.subsubcategory_view', compact('subsubcategory','categories'));
    }

    public function GetSubCategory($category_id){
        $subcat = Subcategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
    }

    public function GetSubSubCategory($subcategory_id){
        $sub_subcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_en','ASC')->get();
        return json_encode($sub_subcat);
    }


    public function SubSubCategoryStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_bn' => 'required',
        ],
        [ 
            'category_id.required' => 'Please Select Any Option',
            'subsubcategory_name_en.required' => 'Input SubSubCategory Engliash Name',
        ]);

        SubSubCategory::insert([
            'category_id' => $request -> category_id,
            'subcategory_id' => $request -> subcategory_id,
            'subsubcategory_name_en' => $request -> subsubcategory_name_en,
            'subsubcategory_name_bn' => $request -> subsubcategory_name_bn,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-',$request -> subsubcategory_name_en)),
            'subsubcategory_slug_bn' => str_replace(' ', '-',$request -> subsubcategory_name_bn),
        ]);

        $notification = array(
            'message' => 'Sub-SubCategory Inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function SubSubCategoryEdit($id){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategories = Subcategory::orderBy('subcategory_name_en','ASC')->get();
        $subsubcategories = SubSubCategory::findOrFail($id);
        return view('backend.category.subsubcategory_edit',compact('categories','subcategories','subsubcategories'));
    }
    
    public function SubSubCategoryUpdate(Request $request){

        $subsubcat_id = $request->id;

        SubSubCategory::findOrFail($subsubcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request -> subsubcategory_name_en,
            'subsubcategory_name_bn' => $request -> subsubcategory_name_bn,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-',$request -> subsubcategory_name_en)),
            'subsubcategory_slug_bn' => str_replace(' ', '-',$request -> subsubcategory_name_bn),
        ]);

        $notification = array(
            'message' => 'Sub-SubCategory Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('subsubcategory.all')->with($notification);

    }

    public function SubSubCategoryDelete($id){

            SubSubCategory::findOrFail($id)->delete();

            $notification = array(
                'message' => 'Sub-SubCategory Deleted successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
    
    }
}
