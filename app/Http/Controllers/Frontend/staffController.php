<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class staffController extends Controller
{
    public function viewStaff()
    {
        $staffs=Staff::all();

        return view('frontend.content.viewStaff',compact('staffs'));
    }

}
