<?php

namespace App\Http\Controllers\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
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
}
