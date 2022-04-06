<?php

namespace App\Http\Controllers;
USE App\Models\status;
use Illuminate\Http\Request;

class statuscontroller extends Controller
{
   public function index()
   {
     $status = status::get();
   return view('layout.status',compact('status'));
   }

   public function show()
    {
        //
    }

    public function create()
    {
  
    	
    return view('layout.addstatus');
    }


public function store(Request $request)
{


  $title_ar= request('title_ar');
  $title_en= request('title_en');


  $status= status::create([

 'title_ar'=>$title_ar,
 'title_en'=>$title_en


  ]);


session()->flash('success', trans('admin.Added successfully'));
    return redirect('status');

}

public function update(Request $request)
{

   
     $id=request('status_id');
     $status =status::where('id',$id)->first();

      $title_ar= request('title_ar');
  $title_en= request('title_en');


 
$status= status::where('id',$id)->update([


 'title_ar'=>$title_ar,
 'title_en'=>$title_en


  ]);
 session()->flash('success', trans('admin.Modified successfully'));
  return redirect('status');
}












     public function edit($id)

    {

      
  $status =status::where('id',$id)->first();
      
      return view('layout.updatestatus',compact('status'));


    }
}
