<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;
use Throwable;

class OrderController extends Controller
{
    public function order()

    {
        $carts = Cart::where('user_id',auth()->user()->id)->get();
        $cartQuantity = $carts->sum('quantity');
        $sub_total = 0;

        foreach ($carts as $cart){
            $sub_total += $cart->foodItem->price * $cart->quantity;
        }

        $tax = $sub_total*(5/100);
        $grandtotal = $sub_total+$tax;

        return view('frontend.content.order',compact('carts','sub_total','tax', 'grandtotal'));
    }

    public function orderConfirm(Request $request)
    {

        $request->validate([

            't_id' => 'required|size:10|unique:orders',
            't_phone' => 'required|digits:11|numeric:orders',
            'address' => 'required',
        ]);



        $orderData = [
            'user_id'=>auth()->user()->id,
            't_id'=>$request->t_id,
             't_phone'=>$request->t_phone,
             'payment_amount'=>$request->payment_amount,
             'payment_method'=>$request->payment_method,
             'address'=>$request->address,


        ];

//    dd($orderData);


        $carts = Cart::where('user_id',auth()->user()->id)->get();
        // dd($carts);

        // DB::beginTransaction();
        // try{

         $order = Order::create($orderData);
        //  dd($order);
// dd($orderData);

            foreach($carts as $cart){

                OrderDetail::create([
                    'order_id'=>$order->id,
                    'food_item_id'=>$cart->food_items_id,
                    'quantity'=>$cart->quantity,
                    'sub_total'=>$cart->foodItem->price * $cart->quantity,


                //   't_id'=>$order->id,
                //   't_phone'=>$order->phone,
                //   'payment_method'=>$order->payment_method,
                ]);


            }


            $carts->each(function($item) {
                $item->delete();
            });
            DB::commit();

        // }catch(Throwable $e){
        //     DB::rollback();
        //     return redirect()->back()->with('message','Fill up all information');

        // }

        return redirect()->back()->with('message','Order request create Successfully');


    }
}
