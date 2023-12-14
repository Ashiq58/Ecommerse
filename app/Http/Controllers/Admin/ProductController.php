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
        $subCategoriesId= SubCategory::where('category_id', $id)->get();
        return json_encode($subCategoriesId);
    }
    public function storeProduct(Request $request){
        $product =new Product();
        if( $image = $request->File("image")){
            $imageName = 'image'.time() .".". $image->getClientOriginalExtension();
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


        $sub_image = [];
        if ($request->sub_image){
            foreach($request->sub_image as $key => $image)
            {
                $subImageName = 'subImages'.rand(1,10000).time() .".". $image->getClientOriginalExtension();
                $directory = 'SubImage-Image/';
                $image->move($directory, $subImageName);
                return $directory.$subImageName;
            }
        }
        foreach( $request->sub_image as $image ){
        // if( $subImages){
        //     $subImageName = '$subImages'.rand(1,10000).time() .".". $subImages->getClientOriginalExtension();
        //     $directory = 'SubImage-Image/';
        //     $subImages->move($directory, $subImageName);
        //     return $directory.$subImageName;
        // }

        $subImage = new SubImage();
        $subImage->product_id = $product->id;
        $subImage->image= $image;
        $subImage->save();
        }
        return redirect()->back()->with('message','Product Create Successfully');
    }
}
