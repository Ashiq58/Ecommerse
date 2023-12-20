<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view("front.home");
    }
    public function shopPage(){
            return view('front.shop.shop');
    }
    public function category(){
        return view('front.category.category');
    }
    public function subCategory($id){
        $products = Product::where('sub_category_id',$id)->get();
        $subCategory = SubCategory::find($id);
        return view('front.subCategory.subCategory')->with(compact('products','subCategory'));
    }
    public function subCategoryProductDetails($id){
        $products = Product::find($id);
        return view('front.subCategory.details')->with(compact('products'));
    }

}
