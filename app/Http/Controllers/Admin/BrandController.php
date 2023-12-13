<?php

namespace App\Http\Controllers\Admin;
use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $imageName,$image,$imageUrl;
    public function createBrand(){
        return view("admin.brand.create");
    }
    public function storeBrand(Request $request){

         $request->validate([
            'image' => 'required|image|max:1024|mimes:jpg,jpeg,png',
            'name' => 'required',
            //  dimensions:max_width=300,max_height=300
        ]);
        if( $image = $request->File("image")){
            $imageName = 'image'.time() .".". $image->getClientOriginalExtension();
            $directory = 'Brand-Image/';
            $image->move($directory, $imageName);
            $imageUrl = $directory.$imageName;
        }
        $brand = new Brand();

        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->image = $imageUrl;
        $brand->status = $request->status;
        $brand->save();
        return redirect()->back()->with('message','Brand Create Successfully');
    }
    public function manageBrand(){
        $brands = Brand::all();
        return view('admin.brand.manage')->with(compact('brands'));
    }
    public function editBrand($id){
        $brand = Brand::find($id);
        return view('admin.brand.edit')->with(compact('brand'));
    }
    public function updateBrand(Request $request){
        $brand = Brand::find($request->brand_id);
        if( $image = $request->File("image")){
            if(file_exists($brand->image))
            unlink($brand->image);
            $imageName = 'image'.time() .".". $image->getClientOriginalExtension();
            $directory = 'Brand-Image/';
            $image->move($directory, $imageName);
            $imageUrl = $directory.$imageName;
        }
        else{
            $imageUrl = $brand->image;
        }
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->image = $imageUrl;
        $brand->status = $request->status;
        $brand->save();
        return redirect()->route('brand.manage')->with('message','Brand Update Successfully');
    }
    public function deleteBrand($id){
        $brand = Brand::find($id);
        if(file_exists($brand->image))
        unlink($brand->image);
        $brand->delete();
        return redirect()->route('brand.manage')->with('message','Delete Successfully');
    }
}
