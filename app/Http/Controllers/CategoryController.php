<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Auth;
use Carbon\Carbon;
use Image;

class CategoryController extends Controller
{
    public function addcategory(){

        $categoris=Category::all();
        $resets=Category::onlyTrashed()->get();


        return view('admin.category.index', compact('categoris','resets'));
    }
    public function addcategorypost(Request $request)
    {
        $request->validate([
        'category_name'=>'required|unique:categories,category_name',
        'category_photo'=>'required|image',
        ],
        [
            'category_name.unique'=>'dggghhhh'
        ]
);


    echo $request->category_name;

    $id=Category::insertGetId([
        'category_name'=> $request->category_name,
        'user_id'=> Auth::user()->id,
        'created_at'=> carbon::now(),

    ]);
    
    $uploded_photo=$request->file('category_photo');
    $new_name= $id . ".".$uploded_photo->getClientOriginalExtension();
    $new_uplode_location = base_path('public/uplodes/category_photos/'.$new_name);
    Image::make($uploded_photo)->save($new_uplode_location, 20);

    // return back()->with('success_massage', 'Your Message is completely successfull');
        
    }

    public function updatecategory($id){
        $category_name= Category::find($id)->category_name;

        return view('admin.category.update', compact('category_name', 'id'));
        // find(id);
    }

    public function updatecategorypost(Request $request){
             Category::find($request->category_id)->update([
            'category_name'=>$request->category_name           
            ]);
        return redirect('add/category')->with('update_status','updata category is success');
    }
    
    public function deletecategory($id){
        Category::find($id)->delete();
        return redirect('add/category')->with('delete_status','delete category is success');
    }

    public function restoreecategory($id){
        
        Category::withTrashed()->find($id)->restore();
        return back()->with('restore-status', 'restore success');
    }
    public function harddelategory($id){
        
        Category::onlyTrashed()->find($id)->forceDelete();
        return back()->with('herddel-status', 'delete success');

    }


}
