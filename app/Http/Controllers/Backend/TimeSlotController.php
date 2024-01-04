<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TimeSlot;
use Illuminate\Http\Request;
use Throwable;

class TimeSlotController extends Controller
{
    public function timeSlot()
    {
        $timeSlot=TimeSlot::all();

        return view('backend.content.adminTimeslotManage',compact('timeSlot'));
    }

    public function timeSlotCreate(Request $request)
    {
    //  dd($request->all());
    // step:1 check req has file

    [
        'reservation_time_from'=>'required|date_format:h:i:s',
        'reservation_time_to' =>'required|date_format:h:i:s',
    ];

    TimeSlot::create([

            'name'=>$request->name,
            // 'reservation_time_from'=>$request->from_time,
            'reservation_time_from'=> \Carbon\Carbon::parse( $request->from_time )->format('h:i A'),
            'reservation_time_to'=>\Carbon\Carbon::parse( $request->to_time )->format('h:i A'),
            ]);

            // dd($request);
            return redirect()->back();
    }

    public function timeSlotDelete($id)
    {
    //  dd($id);

        $timeSlotDelete = TimeSlot::find($id);
       //then delete it


        try {
            $timeSlotDelete->delete();



            return redirect()->route('timeSlot')->with('error-message', ' deleted successfully.');
        }

 catch (Throwable $e) {
            if ($e->getCode() == '23000') {
                return redirect()->back()->with('error-message', 'This slot already taken ');
            }
            return back();
        }
    }
 }


