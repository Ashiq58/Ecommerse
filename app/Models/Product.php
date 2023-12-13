<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','sub_category_id','brand_id','unit_id','name','code','regular_price',
   'selling_price','short_description','long_description','image','hit_count','sells_count','status'];

}
