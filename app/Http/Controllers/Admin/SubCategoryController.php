<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    protected $imageName,$image,$imageUrl;
    public function createSubCategory(){
        $categories = Category::all();
        return view("admin.subCategory.create")->with(compact("categories"));
    }
    public function storeSubCategory(Request $request){

         $request->validate([
            'image' => 'required|image|max:1024|mimes:jpg,jpeg,png',
            'name' => 'required',
            //  dimensions:max_width=300,max_height=300
        ]);
        if( $image = $request->File("image")){
            $imageName = 'image'.time() .".". $image->getClientOriginalExtension();
            $directory = 'SubCategory-Image/';
            $image->move($directory, $imageName);
            $imageUrl = $directory.$imageName;
        }
        $subCategory = new SubCategory();

        $subCategory->category_id = $request->category_id;
        $subCategory->name = $request->name;
        $subCategory->description = $request->description;
        $subCategory->image = $imageUrl;
        $subCategory->status = $request->status;
        $subCategory->save();
        return redirect()->back()->with('message','SubCategory Create Successfully');
    }
    public function manageSubCategory(){
        $subCategories = SubCategory::all();

        return view('admin.subCategory.manage')->with(compact('subCategories'));
    }
    public function editSubCategory($id){
        $subCategory = SubCategory::find($id);
        $categories = Category::all();
        return view('admin.subCategory.edit')->with(compact('subCategory','categories'));
    }
    public function updateSubCategory(Request $request){
        $subCategory = SubCategory::find($request->subCategory_id);
        if( $image = $request->File("image")){
            if(file_exists($subCategory->image))
            unlink($subCategory->image);
            $imageName = 'image'.time() .".". $image->getClientOriginalExtension();
            $directory = 'Category-Image/';
            $image->move($directory, $imageName);
            $imageUrl = $directory.$imageName;
        }
        else{
            $imageUrl = $subCategory->image;
        }
        $subCategory->category_id = $request->category_id;
        $subCategory->name = $request->name;
        $subCategory->description = $request->description;
        $subCategory->image = $imageUrl;
        $subCategory->status = $request->status;
        $subCategory->save();
        return redirect()->route('subCategory.manage')->with('message','Category Update Successfully');
    }
    public function deleteSubCategory($id){
        $subCategory = SubCategory::find($id);
        if(file_exists($subCategory->image))
        unlink($subCategory->image);
        $subCategory->delete();
        return redirect()->route('subCategory.manage')->with('message','Delete Successfully');
    }
}
