<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $table = 'tbl_category_product';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'slug',
        'category_desc',
        'category_order',
        'category_status',
        'parent_id'
    ];

    //join 1-n
    public function products(){
        return $this->hasMany(Product::class,'category_id','id');
    }

    public function categoryChildrent()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    //Thêm local Scope
    public function scopeSearch($query)
    {
        if($key=request()->key){
            $query=$query->where('name','like','%'.$key.'%');
        }
        return $query;
    }
}
