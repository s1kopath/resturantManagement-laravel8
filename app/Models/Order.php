<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime',
    ];

    protected $guarded= [];


    public function orderDetails(){

        return $this->hasMany(OrderDetail::class,'order_id','id');

    }
    public function orderTODetails(){

        return $this->hasOne(OrderDetail::class,'order_id','id');

    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function payment(){
        return $this->belongsTo(User::class,'payment_id','id');
    }

}
