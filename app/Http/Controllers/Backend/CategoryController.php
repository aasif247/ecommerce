<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function CategoryView(){
        $category = Category::latest()->get();
        return view ('backend.category.category_view', compact('category'));
    }

    public function CategoryStore(Request $request){
        
        $request->validate([
            'category_name_en' => 'required',
            'category_name_bn' => 'required',
            'category_icon' => 'required'
        ],
        [ 
            'category_name_en.required' => 'Input Category English Name',
            'category_name_bn.required' => 'Input Category Bangla Name'
        ]);

        category::insert([
            'category_name_en' => $request -> category_name_en,
            'category_name_bn' => $request -> category_name_bn,
            'category_slug_en' => strtolower(str_replace(' ', '-',$request -> category_name_en)),
            'category_slug_bn' => str_replace(' ', '-',$request -> category_name_bn),
            'category_icon'   => $request->category_icon
        ]);

        $notification = array(
            'message' => 'category Inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function categoryEdit($id){
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit',compact('category'));
    }
    
    public function categoryUpdate(Request $request, $id){

        Category::findOrFail($id)->update([
            'category_name_en' => $request -> category_name_en,
            'category_name_bn' => $request -> category_name_bn,
            'category_slug_en' => strtolower(str_replace(' ', '-',$request -> category_name_en)),
            'category_slug_bn' => str_replace(' ', '-',$request -> category_name_bn),
            'category_icon'   => $request->category_icon
        ]);

        $notification = array(
            'message' => 'Category Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('category.all')->with($notification);

    }

    public function CategoryDelete($id){

            Category::findOrFail($id)->delete();

            $notification = array(
                'message' => 'Category Deleted successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
    
    }
}
