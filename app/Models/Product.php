<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;  
    protected $table = 'tbl_product';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'slug',
        'category_id',
        'product_content',
        'product_price',
        'product_price_sale',
        'product_image',
        'product_image_list',
        'product_tag',
        'product_desc',
        'product_meta_keyword',
        'product_meta_title',
        'product_meta_description',
        'product_status'
    ];

     public function category(){
         return $this->hasOne(Category::class,'id','category_id');
     }

      //join 1-n
    // public function details(){
    //     return $this->hasMany(OrderDetail::class,'product_id','id');
    // }

    //Thêm local Scope
    public function scopeSearch($query)
    {
        if($search=request()->search){
            $query=$query->where('name','like','%'.$search.'%');
        }
        return $query;
    }
}
