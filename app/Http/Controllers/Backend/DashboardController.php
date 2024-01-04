<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FoodItem;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\Staff;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $order=Order::where('status','confirm')
        ->get();

        $totalOrder=$order->count();
        $foodItem=FoodItem::all();
        $totalFoodItem=$foodItem->count();
        $reservation=Reservation::where('status','confirm')
        ->get();
        $totalReservation=$reservation->count();
        $staff=Staff::all();
        $totalStaff=$staff->count();
        $sale = Order::where('status','confirm')->get();


        // dd($sale);
        $totalSale=0;
        foreach($sale as $data)
        {

            $totalSale +=(double)$data->payment_amount;
            // dd($totalSale);
        }

        $total_sale = Order::whereDate('created_at', now()->today())
                        ->where('status','confirm')
                        ->get();
        $todaySale = 0;
        foreach ($total_sale as $data) {
            $todaySale  +=(double)$data->payment_amount;
        }

        return view('backend.content.dashboard',compact('totalOrder','totalFoodItem','totalReservation','totalStaff','totalSale','todaySale'));
    }

}
