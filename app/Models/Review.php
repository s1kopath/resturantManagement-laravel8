<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $guarded= [];


public function reviewUser(){

    return $this->belongsTo(User::class,'user_id','id');
}
public function food_item(){

    return $this->belongsTo(FoodItem::class,'food_items_id','id');
}
}
