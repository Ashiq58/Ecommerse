<?php

namespace App\Http\Controllers\Admin;
use App\Models\Brand;
use App\Models\Product;
use App\Models\SubImage;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $imageName,$image,$imageUrl;
    protected $subCategoriesId,$subImages,$subImageName,$subImageUrl;
    public function createProduct(){
        // $categories = Category::all();
        // return view("admin.product.create")->with(compact("categories"));
        return view("admin.product.create",[
            "categories"=> Category::all(),
            "subCategories"=> SubCategory::all(),
            "brands"=>Brand::all(),
            "units"=>Unit::all(),
        ]);
    }
    public function getSubcategory($id){
        $getSubCategory = SubCategory::where('category_id',$id)->get();
        return  json_encode($getSubCategory);
    }
    public function storeProduct(Request $request){
        $product = new Product();
        if($image = $request->file("image")){
            $imageName = 'image'.time().".". $image->getClientOriginalExtension();
            $directory = 'Product-Image/';
            $image->move($directory, $imageName);
            $imageUrl = $directory.$imageName;
        }
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->brand_id = $request->brand_id;
        $product->unit_id = $request->unit_id;
        $product->name = $request->name;
        $product->regular_price = $request->regular_price;
        $product->selling_price = $request->selling_price;
        $product->code = rand(1,10000);
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->image = $imageUrl;
        $product->save();

        if($request->hasFile('sub_image')){
            foreach($request->file('sub_image') as $image){
                $subImageName = 'subImages'.rand(1,1000).time().".". $image->getClientOriginalExtension();
                $directory = "SubImage-Image/";
                $image->move($directory, $subImageName);
                $subImageUrl =$directory.$subImageName;

                $subImage = new SubImage();
                $subImage->product_id = $product->id;
                $subImage->image = $subImageUrl;
                $subImage->save();
            }
        }
        return redirect()->back()->with("message","Product Create Successfully");

    }
    public function manageProduct(){
        return view("admin.product.manage",["products" => Product::all()]);
    }
    public function editProduct($id){
        return view("admin.product.edit",[
            "product"=> Product::find($id),
            "categorie"=> Category::all(),
            "subCategory"=> SubCategory::all(),
            "brand"=>Brand::all(),
            "unit"=>Unit::all(),
        ]);
    }
    public function updateProduct(Request $request){
        $product = Product::find( $request->product_id );
        if($image = $request->file("image")){
            if(file_exists($product->image))
            unlink($product->image);
            $imageName = 'image'.time().".". $image->getClientOriginalExtension();
            $directory = 'Product-Image/';
            $image->move($directory, $imageName);
            $imageUrl = $directory.$imageName;
        }
        else{
            $imageUrl = $product->image;
        }
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->brand_id = $request->brand_id;
        $product->unit_id = $request->unit_id;
        $product->name = $request->name;
        $product->regular_price = $request->regular_price;
        $product->selling_price = $request->selling_price;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->image = $imageUrl;
        $product->save();
        if($request->hasFile('sub_image')){
            foreach($request->file('sub_image') as $image){
                $subImageName = 'subImages'.rand(1,1000).time().".". $image->getClientOriginalExtension();
                $directory = "SubImage-Image/";
                $image->move($directory, $subImageName);
                $subImageUrl =$directory.$subImageName;

                $subImage = new SubImage();
                $subImage->product_id = $product->id;
                $subImage->image = $subImageUrl;
                $subImage->save();
            }
        }
        return redirect()->route('product.manage')->with("message","Product Update Successfully");

    }
    public function deleteSubImage($id){
        $subImage = SubImage::find($id);
        if(file_exists($subImage->image)){
            unlink($subImage->image);
        }
        $subImage->find($id)->delete();
        return back();
    }
    public function deleteProduct($id){
        $product = Product::find($id);
        if(file_exists($product->image)){
        unlink($product->image);
        }
        $images = SubImage::where('product_id',$product->id)->get();
        foreach($images as $image){
            if(file_exists($image->image)){
                unlink($image->image);
            }
        }
        $product->delete();
        return redirect()->route('product.manage')->with('message','Delete Product Successfully');
    }


}
