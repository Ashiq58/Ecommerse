<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
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
        return view('front.subCategory.subCategory')->with(compact('products'));
    }

}
