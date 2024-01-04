<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\Models\FoodItem;
use Throwable;

class manageFoodController extends Controller
{
    public function foodItemManage()
    {
        $foodItems=FoodItem::orderBy('id','desc')->paginate(4);
        return view('backend.content.foodItemManage',compact('foodItems'));
    }

    public function foodItemCreate(Request $request)
    {
        // dd($request->all());
    $file_name='';
    // step:1 check req has file

    if($request->hasFile('picture'))
    {
        // file is valid?

        $file=$request->file('picture');
        if($file->isvalid());
        {
            // generate unique file name

            $file_name=date('Ymdhms').'.'.$file->getClientOriginalExtension();

            // store image local directory

            $file->storeAs('photo',$file_name);
        }
    }
    FoodItem::create([
            'file' => $file_name,
            'name'=>$request->name,
            'description' => $request->description,
            'price'=>(double)$request->price]);



            return redirect()->back();
    }
    public function foodItemDelete($id)
   {
    // dd($id);
       //first get the product
       $foodItems = FoodItem::find($id);


       //then delete it

       try{
        $foodItems->delete();

        return redirect()->back()->with('error-message', 'Food-Item deleted Successfully');

    }
    catch(Throwable $e){
        if($e->getCode() == '23000')
        {
        return redirect()->back()->with('error-message', 'This item already have order;');
        }
        return back();
    }


       return redirect()->back();
   }

   public function foodItemUpdate( $id, $status)
    {
        $foodItems=FoodItem :: find($id);

        try{
            $foodItems->update(['status'=>$status]);

            return redirect()->back();

        }
        catch(Throwable $e){
            if($e->getCode() == '23000')
            {
            return redirect()->back()->with('error-message', 'This item already have order;');
            }
            return back();
        }

    }
    public function foodItemEdit($id)
    {

     $foodItem = FoodItem::find($id);
     // dd($user);
     return view('backend.content.foodItemEdit',compact('foodItem'));

    }
    public function foodItemEditUpdate(Request $request,$id)
    {
    //  dd($request->all());
     $foodItem = FoodItem::find($id);


     $foodItem->update([
        //    'name'=>$request->input('name'),
        //    'workingArea'=>$request->input('workingArea'),
        //    'email'=>$request->input('email'),
        //    'contact'=>$request->input('contact'),
        //    'address'=>$request->input('address'),


        'name'=>$request->input('name'),
        'description' => $request->input('description'),
        'price'=>$request->input('price')]);


// @dd($request);


     return redirect()->route('foodItem')->with('success','Item Updated Successfully');
    }

}








