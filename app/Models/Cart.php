<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded= [];

    public function foodItem(){

        return $this->belongsTo(FoodItem::class,'food_items_id','id');
    }

    public function Cart_User(){

        return $this->belongsTo(User::class,'user_id','id');
    }
}
