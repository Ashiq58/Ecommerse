<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','sub_category_id','brand_id','unit_id','name','code','regular_price',
   'selling_price','short_description','long_description','image','hit_count','sells_count','status'];


   public function Category()
   {
    return $this->belongsTo(Category::class);
   }
   public function subCategory()
   {
    return $this->belongsTo(SubCategory::class);
   }
   public function Brand()
   {
    return $this->belongsTo(Brand::class);
   }
   public function Unit()
   {
    return $this->belongsTo(Unit::class);
   }
   public function subImages()
   {
    return $this->hasMany(SubImage::class);
   }
}
