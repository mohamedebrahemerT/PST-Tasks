<?php

namespace App\Http\Controllers;
 use App\Models\projects;
 use App\Models\phase;
 use App\Models\phase_projects_teams;
 use App\Models\User;
use Illuminate\Http\Request;

class reportscontroller extends Controller
{
    public function project_status()
    {

      
  $status_id=Request('status_id');

  $project= projects::where('status_id',$status_id)->get();

    	return view('reports.project_status',compact('project'));

    }


    public function project_status_list()

    {


    	$project= projects::get();
    	return view('reports.project_status',compact('project'));
    }




public function phase_status()
    {   
        
     $status_id=Request('status_id');

     $phase= phase::where('status_id',$status_id)->get();

        return view('reports.phase_status',compact('phase'));
    }

    public function phase_status_list()
    {

        $phase= phase::get();
        return view('reports.phase_status',compact('phase'));
    }




public function project_period()
    {   

          
  $from=request('from_date');
  $to=request('to_date');
     $status=Request('status');
  if ($status == 1) 
  {

       $project= projects::
   where('registration_date', '>=', $from)
  ->where('registration_date', '<=', $to)->get();
       
  }

  elseif ($status == 2) 
  {
       $project= projects::
   where('start_date', '>=', $from)
  ->where('start_date', '<=', $to)->get();
  }
  

   elseif ($status == 3) 
  {
       $project= projects::
   where('delivery_date', '>=', $from)
  ->where('delivery_date', '<=', $to)->get();
  }
  
 
  
   
        return view('reports.project_period',compact('project'));
    }


    public function project_period_list()
    {
    

         $project= projects::get();
   

      
        return view('reports.project_period',compact('project'));
    }

    

  public function developer_phase_list()
  {

        $Users=User::where('type','user')->get();

   $Users_ids=[];
       foreach ($Users as $key => $User) 
       {
          array_push($Users_ids, $User->id);
       }

        

  
   $phase_projects_teams= phase_projects_teams::
     whereIn('developers_id', $Users_ids)->get();



   $phase_ids=[];
     foreach ($phase_projects_teams as $key => $xx) 
     {
          array_push($phase_ids, $xx->phases_id);
     }


     $phase= phase::whereIn('id',$phase_ids)->get();
    return view('reports.developer_phase',compact('phase'));
  }




  public function developer_phase()
    {


     $developers_id= Request('User');
    
      
  
       $phase_projects_teams= phase_projects_teams::
     where('developers_id', $developers_id)->get();


   $phase_ids=[];
     foreach ($phase_projects_teams as $key => $xx) 
     {
          array_push($phase_ids, $xx->phases_id);
     }
         
       
       $phase= phase::whereIn('id',$phase_ids)->get();

      return view('reports.developer_phase',compact('phase'));
    }






public function adus_phase_list()

{
 
  $Users=User::where('type','admin')->get();

   $Users_ids=[];
       foreach ($Users as $key => $User) 
       {
          array_push($Users_ids, $User->id);
       }

        

  
   $phase_projects_teams= phase_projects_teams::
     whereIn('developers_id', $Users_ids)->get();



   $phase_ids=[];
     foreach ($phase_projects_teams as $key => $xx) 
     {
          array_push($phase_ids, $xx->phases_id);
     }


     $phase= phase::whereIn('id',$phase_ids)->get();
  return view('reports.adus_phase',compact('phase'));

}



public function adus_phase()
{

  $developers_id= Request('admin');
    
      
  
       $phase_projects_teams= phase_projects_teams::
     where('developers_id', $developers_id)->get();


   $phase_ids=[];
     foreach ($phase_projects_teams as $key => $xx) 
     {
          array_push($phase_ids, $xx->phases_id);
     }
         
       
       $phase= phase::whereIn('id',$phase_ids)->get();

  return view('reports.adus_phase',compact('phase'));

}

}