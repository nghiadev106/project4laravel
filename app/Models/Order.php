<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

     //join 1-n
    // public function details(){
    //     return $this->hasMany(OrderDetail::class,'order_id','id');
    // }
    protected $table='tbl_order';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orderDetail(){
        return $this->hasMany(OrderDetail::class);
    }

    public function shipping(){
        return $this->hasOne(Shipping::class);
    }

    public function transaction(){
        return $this->hasOne(Transaction::class);
    }
}
