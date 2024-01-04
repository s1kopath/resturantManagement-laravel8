<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FoodItem;
use App\Models\Gallery;
use App\Models\Review;
use App\Models\Staff;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $gallerys=Gallery::take(8)->get();

        $foodItems=FoodItem::where('status','=','Published')->take(6)->get();

         $staffs=Staff::take(3)->get();

         $review=Review::take(3)->get();

        // $slider=Gallery::take(6)->get();


        return view('frontend.content.home',compact('foodItems','staffs','gallerys','review'));
    }

    public function allStaffView()
    {

        $staffs=Staff::all();
        return view('frontend.content.viewStaff',compact('staffs'));

    }


public function  viewMoreGallery()
{

    $gallerys=Gallery::all();
    return view('frontend.content.ViewGallery',compact('gallerys'));

}

public function  allFoodItemMenu()
{

    $foodItems=FoodItem::where('status','=','Published')->get();

  return view('frontend.content.foodItemMenu',compact('foodItems'));


}
public function  viewFood($id)
{


    $viewFood=FoodItem::where('status','=','Published')->where('id',$id)->first();
    $foodItems=FoodItem::where('status','=','Published')->where('id',$id)->first();

    // dd($viewFood);

  return view('frontend.content.foodView',compact('viewFood','foodItems'));


}

}



//Staf::where('type','shpae')
