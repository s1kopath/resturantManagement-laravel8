<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $guarded= [];


    public function food(){

        return $this->belongsTo(FoodItem::class,'food_item_id','id');
    }

    public function orderForDetails(){

        return $this->belongsTo(Order::class,'order_id','id');

    }

}
