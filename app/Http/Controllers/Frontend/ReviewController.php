<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FoodItem;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
// Write review section
  {

        public function writeReview($id)

        {


            $food_review =FoodItem::find($id);
            // dd($food_review);


            return view('frontend.content.writeReview',compact('food_review'));
        }

        public function submitReview(Request $request)
        {
            // dd($request)

            Review::create([

                'user_id'=>auth()->user()->id,
                'food_items_id'=>$request->food_item_id,
                'rate'=>$request->input('rate'),
                 'message'=>$request->input('message'),
            ]);
            return redirect()->back()->with('message','Review create Successfully');


        }

        public function  allReviewView()

        {
            $all_review =Review::paginate(9);
            // dd($food_review);


            return view('frontend.content.ReviewView',compact('all_review'));
        }







    }







