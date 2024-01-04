<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {

        return view('backend.login.login');
    }

    //login
    public function doLogin(Request $request)
    {



        $request->validate([

            'email' => 'required|email',
            'password' => 'required|min:6'

        ]);



        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->role == 'admin') {
                return redirect()->route('dashboard');
            }

            elseif (auth()->user()->role == 'user') {
                auth()->logout();

                return back()->withErrors([
                    'email' => 'Invalid Credentials.'
                    ]);


            }
        }
        return back()->withErrors([
            'email' => 'Invalid Credentials.'
        ]);
    }

    //logout
    public function logout()
    {
        Auth::logout();



        return redirect()->route('admin.login')->with('success', 'Logout Successful.');
    }
}
