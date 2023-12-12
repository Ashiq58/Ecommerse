<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $imageName,$image,$imageUrl;
    public function createCategory(){
        return view("admin.category.create");
    }
    public function storeCategory(Request $request){

         $request->validate([
            'image' => 'required|image|max:1024|mimes:jpg,jpeg,png',
            'name' => 'required',
            //  dimensions:max_width=300,max_height=300
        ]);
        if( $image = $request->File("image")){
            $imageName = 'image'.time() .".". $image->getClientOriginalExtension();
            $directory = 'Category-Image/';
            $image->move($directory, $imageName);
            $imageUrl = $directory.$imageName;
        }
        $category = new Category();

        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $imageUrl;
        $category->status = $request->status;
        $category->save();
        return redirect()->back()->with('message','Category Create Successfully');
    }
    public function manageCategory(){
        $categories = Category::all();
        return view('admin.category.manage')->with(compact('categories'));
    }
    public function editCategory($id){
        $category = Category::find($id);
        return view('admin.category.edit')->with(compact('category'));
    }
    public function updateCategory(Request $request){
        $category = Category::find($request->category_id);
        if( $image = $request->File("image")){
            if(file_exists($category->image))
            unlink($category->image);
            $imageName = 'image'.time() .".". $image->getClientOriginalExtension();
            $directory = 'Category-Image/';
            $image->move($directory, $imageName);
            $imageUrl = $directory.$imageName;
        }
        else{
            $imageUrl = $category->image;
        }
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $imageUrl;
        $category->status = $request->status;
        $category->save();
        return redirect()->route('category.manage')->with('message','Category Update Successfully');
    }
    public function deleteCategory($id){
        $category = Category::find($id);
        if(file_exists($category->image))
        unlink($category->image);
        $category->delete();
        return redirect()->route('category.manage')->with('message','Delete Successfully');
    }
}
