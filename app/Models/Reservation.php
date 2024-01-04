<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $guarded= [];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function table()
    {
        return $this->belongsTo(Table::class,'tables_id','id');
    }

    public function time_slot_name()
    {
        return $this->belongsTo(TimeSlot::class,'time_slots_id','id');
    }
}
