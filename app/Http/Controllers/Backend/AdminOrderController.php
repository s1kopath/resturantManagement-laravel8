<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\OrderCancle;
use App\Mail\OrderConformation;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminOrderController extends Controller
{
    public function adminOrder(Request $request)
    {
        //   dd($request->all());
        $orders = Order::where('status', '!=', 'cancel')->orderBy('id','desc')->paginate(4);

        // dd($orders);

        return view('backend.content.orderManage', compact('orders'));
    }

    // public function orderAccept($id, $status)
    // {
    //     $orders = Order::find($id);

    //     $customer = User::where('id', $orders->user_id)->first();
    //     // dd($customer);
    //     $orders->update([
    //         'status' => $status

    //     ]);

    //     Mail::to($customer->email)->send(new OrderConformation($orders));
    //     return redirect()->back();
    // }


    public function adminOrderView($id)
    {

        $orderViews = Order::find($id);

    //   dd($orderViews);
        $orderList = OrderDetail::where('order_id', $orderViews->id)->get();
        $total = $orderList->sum('sub_total');
        $tax = $total * (5 / 100);
        $grand_total = $total + $tax;
        // $tax = $orderList->sub_total


        //  dd($total);




        return view('backend.content.adminOrderView', compact('orderViews', 'orderList', 'total', 'tax', 'grand_total'));
    }

    public function orderPaid($id, $status)
    {

        $orders = Order::find($id);
        // $reservationViews = Reservation::where('user_id', auth()->user()->id)->orderBy('id','desc')->paginate(3);

        $customer = User::where('id', $orders->user_id)->first();

        // $customer = User::where('id', $orders->user_id)

        // dd($customer);
        // dd($status);


        if($status == 'unpaid'){
            $orders->update([
                'status' => 'cancel',
                'paid_status' => $status
            ]);
            Mail::to($customer->email)->send(new OrderCancle($orders));

        }else{
            $orders->update([
                'status' => 'confirm',
                'paid_status' => $status
            ]);
            Mail::to($customer->email)->send(new OrderConformation($orders));

        }


        // dd($status);
        return redirect()->back();
    }

    public function orderReport()
    {
           $orderViews = Order::all();
            $orderList = OrderDetail::all();
           $total = $orderList->sum('sub_total');
           $tax = $total * (5 / 100);
           $grand_total = $total + $tax;

           if (isset($_GET['from_date'])) {
            $fromDate = date('Y-m-d', strtotime($_GET['from_date']));
            $toDate = date('Y-m-d', strtotime($_GET['to_date']));

            if ($fromDate > $toDate){
                return redirect()->back()->with('error-message','Invalid date selection.');
            }

            // dd($toDate);

            $orderList = OrderDetail::whereBetween('created_at',[$fromDate,$toDate])->get();

            return view('backend.content.orderReport',compact('orderViews','orderList','total','tax','grand_total','fromDate','toDate'));

        }
           // $showOrder = OrderDetail :: where('user_id',auth()->user()->id)->get();
           return view('backend.content.orderReport',compact('orderViews','orderList','total','tax','grand_total'));

        //    dd($orderViews);
       }
}
