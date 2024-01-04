<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class ViewUserController extends Controller
{
    public function viewLoginRegistration()
    {

        return view('frontend.content.loginRegistration');
    }
    public function userRegistration()
    {

        return view('frontend.content.registration');
    }
    public function registration(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required|digits:11|numeric|unique:users',
            'address' => 'required',

        ]);
        //  dd($request->all());
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'password' => bcrypt($request->password)
        ]);
        return redirect()->route('login.registration.from')->with('success', 'User Registration Successful.');
    }

    public function userLogin(Request $request)
    {
        //        dd($request->all());
        //validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',


        ]);

        //authenticate
        $credentials = $request->only('email', 'password');
        //   dd($credentials);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('homepage');
        }
        return back()->withErrors([
            'email' => 'Invalid Credentials.',
        ]);
    }
    public function goUserLogin()
    {

        return view('frontend.content.loginRegistration');
    }

    public function userLogout()
    {
        // cart delete

        $item_cart = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($item_cart as $data) {
            $data->delete();
        }

        Auth::logout();

        return redirect()->route('login.registration.from');
    }
    public function profile()
    {
        return view('frontend.content.profile');
    }

// user order profile
    public function userProfile($id)
    {


        $orderViews = Order::where('user_id', auth()->user()->id)->orderBy('id','desc')->paginate(6);

        return view('frontend.content.userProfile', compact('orderViews'));
    }


//user profile reservation blade

    public function reservationProfile($id)
    {
        $reservationViews = Reservation::where('user_id', auth()->user()->id)->orderBy('id','desc')->paginate(3);
        $now = Carbon::now();
        // dd($reservationViews);
        return view('frontend.content.reservationProfile', compact('reservationViews','now'));
    }
    public function reservationCancelRequest($id)
    {
        $reservationViews = Reservation::find($id);
        $reservationViews->update([
            'status' => 'Requested for cancellation'
        ]);
        return redirect()->back()->with('success','Successfully requested for cancellation');
    }

    // order profile blade

    public function customerOrderView($id)
    {
        $orderViews = Order::find($id);
        $orderList = OrderDetail::where('order_id', $orderViews->id)->get();
        $total = $orderList->sum('sub_total');
        $tax = $total * (5 / 100);
        $grand_total = $total + $tax;
        // $showOrder = OrderDetail :: where('user_id',auth()->user()->id)->get();
        return view('frontend.content.customerOrderView', compact('orderViews', 'orderList', 'total', 'tax', 'grand_total'));

        // dd($orderViews);
    }
}
