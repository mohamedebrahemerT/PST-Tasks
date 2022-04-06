<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;

class commentcontroller extends Controller
{


     public function addcommentProject( )
     {

        $developers_id=auth()->user()->id;
         $developer=auth()->user()->name;

     	$project_id=Request('project_id');
     	$comment=Request('comment');

          comment::create([
         'project_id'=>$project_id,
         'comment'=>$comment,
         'developers_id'=>$developers_id
          ]);

        session()->flash('success', trans('admin.addcommentProject'));
           

         return redirect('viewprojects/'.$project_id);
     }


 public function addcommentphases( )
     {

         

        $developers_id=auth()->user()->id;
         $developer=auth()->user()->name;

        $phases_id=Request('phase_id');
        $comment=Request('comment');

          comment::create([
         'phases_id'=>$phases_id,
         'comment'=>$comment,
         'developers_id'=>$developers_id
          ]);

        session()->flash('success', trans('admin.addcommentphases'));
           

         return redirect('viewphases/'.$phases_id);
     }
 }
