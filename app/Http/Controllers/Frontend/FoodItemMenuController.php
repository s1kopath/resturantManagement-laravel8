<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FoodItem;
use Illuminate\Http\Request;

class FoodItemMenuController extends Controller
{

    public function foodItemMenu()
    {
        $foodItems=FoodItem::where('status','=','Published')->paginate(5);


        return view('frontend.content.foodItemMenu',compact('foodItems'));
    }

//     public function  allFoodItem()
// {

//     $foodItems=FoodItem::where('status','=','Published')->get();

//   return view('frontend.content.foodItemMenu',compact('foodItems'));


// }

}
