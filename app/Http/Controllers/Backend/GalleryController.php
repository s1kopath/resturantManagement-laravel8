<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;


class GalleryController extends Controller
{


    public function galleryManage()
    {
        $gallerys=Gallery::orderBy('id','desc')->paginate(4);
        return view('backend.content.galleryManage',compact('gallerys'));
    }

    public function galleryCreate(Request $request)
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
    Gallery::create([
            'file' => $file_name,
            'name'=>$request->name]);



            return redirect()->back();
    }
    public function galleryDelete($id)
   {
    // dd($id);
       //first get the product
       $gallerys = Gallery::find($id);


       //then delete it
       $gallerys->delete();

       return redirect()->back();
   }
}


