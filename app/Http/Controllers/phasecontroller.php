<?php

namespace App\Http\Controllers;
use App\Models\phase;
use App\Models\phase_projects_teams;
use App\Models\comment;
use App\Models\projects;
use App\Models\attachment;
use App\Models\phases_Request_extra_hours;

use Illuminate\Http\Request;

class phasecontroller extends Controller
{
  public function index()
  {
    $project=projects::get(); 

  	$phases=phase::orderBy('id','desc')->get();

if (Auth()->user()->type == 'user')
 {

    $phase_projects_teams= phase_projects_teams::where('developers_id',Auth()->user()->id)->get();

    $phases_ids=[];

    foreach ($phase_projects_teams as   $phase_projects_team) 

    {
      array_push($phases_ids, $phase_projects_team->phases_id);
    }

       

    $phases=phase::whereIn('id',$phases_ids)->orderBy('id','desc')->get();

    return view('layout.phases',compact('phases','project'));
   
  }

  	return view('layout.phases',compact('phases','project'));
  }


  public function showphasesforthisproject ($id)
  {


if (Auth()->user()->type == 'developer')
       {

       $phase_projects_teams= phase_projects_teams::
      where('project_id',$id)->
      where('developers_id',Auth()->user()->id)
      ->get();

         $phases_ids=[];
  foreach ($phase_projects_teams as  $phase_projects_team) 
  {
       array_push($phases_ids, $phase_projects_team->phases_id);
  }


 
$phases=phase::whereIn('id',$phases_ids)->get();





       
      }

      else
      {

      $phase_projects_teams= phase_projects_teams::where('project_id',$id)->get();

         $phases_ids=[];
  foreach ($phase_projects_teams as  $phase_projects_team) 
  {
       array_push($phases_ids, $phase_projects_team->phases_id);
  }
 
$phases=phase::whereIn('id',$phases_ids)->get();



      }



  
      $project=projects::where('id',$id)->first();

    

    


    return view('layout.showphasesforthisproject' ,compact('phases','project'));
      
  }



   public function project_phases ()
  {

                 $id=request('project_id');
if (Auth()->user()->type == 'developer')
       {

       $phase_projects_teams= phase_projects_teams::
      where('project_id',$id)->
      where('developers_id',Auth()->user()->id)
      ->get();

         $phases_ids=[];
  foreach ($phase_projects_teams as  $phase_projects_team) 
  {
       array_push($phases_ids, $phase_projects_team->phases_id);
  }


 
$phases=phase::whereIn('id',$phases_ids)->get();





       
      }

      else
      {

      $phase_projects_teams= phase_projects_teams::where('project_id',$id)->get();

         $phases_ids=[];
  foreach ($phase_projects_teams as  $phase_projects_team) 
  {
       array_push($phases_ids, $phase_projects_team->phases_id);
  }
 
$phases=phase::whereIn('id',$phases_ids)->get();



      }



  
      $project=projects::where('id',$id)->first();

    

    


    return view('layout.showphasesforthisproject' ,compact('phases','project'));
      
  }



public function show($id)

 {

        $phase =phase::where('id',$id)->first();
        $comments=comment::where('phases_id',$id)->get();

       return view('layout.viewphases',compact('phase','comments'));

    }

    public function create(Request $request)
    {
  
    return view('layout.createphases');

    }
 

     public function store(Request $request)
    {

        
        $title_ar= request('title_ar');
        $title_en= request('title_en');
        $desc_ar= request('desc_ar');
        $desc_en= request('desc_en');
        $status_id= request('status_id');

        $notes= request('notes');
        $start_date= request('start_date');
        $end_date= request('end_date');
        $delivery_date= request('delivery_date');
        $Number_of_hours= request('Number_of_hours');
        $important= request('important');
        

       if ($request->photo) 
       {
          $photo = time().'.'.$request->photo->extension();  
         $request->photo->move(public_path('/'), $photo);
        
             
       }

       else
       {
          $photo ='';
       }


    $project_id= request('project_id');
     $end_date_project=projects::where('id',$project_id)->first()->end_date;
    $start_date_project=projects::where('id',$project_id)->first()->start_date;

if ($end_date >= $end_date_project ) 
{

  return back()->with('danger', trans('admin.end_date is bigger than end_date_project'));


}


elseif ($end_date < $start_date) 
{
  return back()->with('danger', trans('admin.end_date is less than start_date'));
}

elseif ($start_date <  $start_date_project)

 {

  return back()->with('danger', trans('admin.start_date is less than start_date_project'));
}

    
         $phases= phase::create([
             
            'title_ar'=>$title_ar,
            'title_en'=>$title_en,
            'desc_ar'=>$desc_ar,
            'desc_en'=>$desc_en,
            'notes'=>$notes,
            'status_id'=>$status_id,
            'start_date'=>$start_date,
            'end_date'=>$end_date,
            'delivery_date'=>$delivery_date,
            'photo'=>$photo,
            'Number_of_hours'=>$Number_of_hours,
            'important'=>$important

         ]);



             $phases_id=$phases->id;
           $project_id= request('project_id');
         $developers_id= request('developers_id');




          phase_projects_teams::create([
             
            'project_id'=>$project_id,
            'developers_id'=>$developers_id,
            'phases_id'=>$phases_id
             

         ]);

        session()->flash('success', trans('admin.phase has been added'));

         
          return redirect('phases');
    }




public function update(Request $request)
{

$id=request('phase_id');
$phase =phase::where('id',$id)->first();

 $title_ar= request('title_ar');
        $title_en= request('title_en');
        $desc_ar= request('desc_ar');
        $desc_en= request('desc_en');
        $notes= request('notes');
        $status_id= request('status_id');
        
        $start_date= request('start_date');
        $end_date= request('end_date');
        $delivery_date= request('delivery_date');

        $Number_of_hours= request('Number_of_hours');
        $important= request('important');
        

       if ($request->photo) 
       {
          $photo = time().'.'.$request->photo->extension();  
         $request->photo->move(public_path('/'), $photo);
        
             
       }
       else

       {
         
            $photo= $phase->photo;
       }

        $project_id= request('project_id');
 $end_date_project=projects::where('id',$project_id)->first()->end_date;
 $start_date_project=projects::where('id',$project_id)->first()->start_date;

if ($end_date >= $end_date_project ) 
{

  return back()->with('danger', trans('admin.end_date is bigger than end_date_project'));


}


elseif ($end_date < $start_date) 
{
  return back()->with('danger', trans('admin.end_date is less than start_date'));
}

elseif ($start_date <  $start_date_project)
 {
  return back()->with('danger', trans('admin.start_date is less than start_date_project'));
}
                 

                  
                 $phase_Delivery=request('status_id');
               
                  
               
    
         $phases= phase::where('id',$id)->update([
             
            'title_ar'=>$title_ar,
            'title_en'=>$title_en,
            'desc_ar'=>$desc_ar,
            'desc_en'=>$desc_en,
            'notes'=>$notes,
            'status_id'=>$status_id,
            'start_date'=>$start_date,
            'end_date'=>$end_date,
            'delivery_date'=>$delivery_date,
            'photo'=>$photo,
            'Number_of_hours'=>$Number_of_hours,
            'important'=>$important,
            'phase_Delivery'=>$phase_Delivery

         ]);

          $phases_id=$id;
           $project_id= request('project_id');
         $developers_id= request('developers_id');



          phase_projects_teams::where('phases_id',$id)->update([
             
            'project_id'=>$project_id,
            'developers_id'=>$developers_id,
            'phases_id'=>$phases_id
             

         ]);

        session()->flash('success', trans('admin.phase has been updated'));






          return redirect('phases');
    }



public function phasesuploadfile($id)

{
  $phase= phase::where('id',$id)->first();

    return view('layout.phasesuploadfile',compact('id','phase'));
}



public function phasesuploadfilepost(Request $request)
{

  $phase_id=request('phase_id');
        $this->validate($request, [

                'filenames' => 'required',

                'filenames.*' => 'mimes:doc,pdf,docx,zip'

        ]);

 

        if (request()->has('filenames')) 
               {

         
        foreach (request('filenames') as $key => $file)
                 {  
                    $filenam = time().'.'.$file->extension();

                $file->move(public_path().'/files/', $filenam);  
               $name=request('name')[$key];
               $title=request('title')[$key];

                     attachment::create([
                   'filenames'=>'files/'.$filenam,
                   'phase_id'=>$phase_id,
                   'name'=>Request('name')[$key],
                   'title'=>Request('title')[$key]
                ]);

                    

                    
                }
 

                
               }


      


        return back()->with('success', trans('admin.Your files has been successfully added'));
}

           
  /* $phases= phase::where('id',$id)->first();

    return view('layout.uploadfile',compact('id','phases'));
}



public function phasesuploadfilepost(Request $request)
{

  $phases_id=request('phase_id');
        $this->validate($request, [

                'filenames' => 'required',

                'filenames.*' => 'mimes:doc,pdf,docx,zip'

        ]);


        if($request->hasfile('filenames'))

         {

            foreach($request->file('filenames') as $file)

            {

                $name = time().'.'.$file->extension();

                $file->move(public_path().'/files/', $name);  

              

                attachment::create([
                   'filenames'=>'files/'.$name,
                   'phase_id'=>$phases_id
                ]);

            }

         }


      


        return back()->with('success', trans('admin.Your files has been successfully added'));
}*/







    public function edit($id)

    {
  
     	$phases =phase::where('id',$id)->first();
    	
    	return view('layout.updatephases',compact('phases'));
    }

     public function View_delays($id)

    {
  
      $phases =phase::where('id',$id)->first();
      $phases_Request_extra_hours =phases_Request_extra_hours::where('phase_id',$id)->get();
      
      return view('layout.View_delays',compact('phases','phases_Request_extra_hours'));
    }

    

     public function phase_Delivery_now ($id,$project_id)

    {   
        

       $phases =phase::where('id',$id)->first();
               
             $phases->phase_Delivery='12';
             $phases->save();

             session()->put('success',trans('admin.The drug was notified of the addiction and was transferred to the test'));

                      $project_id=$project_id;
if (Auth()->user()->type == 'developer')
       {

       $phase_projects_teams= phase_projects_teams::
      where('project_id',$project_id)->
      where('developers_id',Auth()->user()->project_id)
      ->get();

         $phases_ids=[];
  foreach ($phase_projects_teams as  $phase_projects_team) 
  {
       array_push($phases_ids, $phase_projects_team->phases_id);
  }


 
$phases=phase::whereIn('id',$phases_ids)->get();





       
      }

      else
      {

      $phase_projects_teams= phase_projects_teams::where('project_id',$project_id)->get();

         $phases_ids=[];
  foreach ($phase_projects_teams as  $phase_projects_team) 
  {
       array_push($phases_ids, $phase_projects_team->phases_id);
  }
 
$phases=phase::whereIn('id',$phases_ids)->get();



      }



  
      $project=projects::where('id',$project_id)->first();

    

    


    return view('layout.showphasesforthisproject' ,compact('phases','project'));

             
  
      
    }

     public function Request_extra_hours ($id)

    {
  
      $phases =phase::where('id',$id)->first();

    return view('layout.Request_extra_hours',compact('phases'));
         

       
      
      
    }

    public function Request_extra_hours_post(Request $request)
    {
            $phase_id=request('phase_id');
            $The_number_of_hours=request('The_number_of_hours');
            $Reason_for_the_delay=request('Reason_for_the_delay');
             
              phases_Request_extra_hours::create([
                'phase_id'=>$phase_id,
                'The_number_of_hours'=>$The_number_of_hours,
                'Reason_for_the_delay'=>$Reason_for_the_delay

              ]);

               session()->flash('success', trans('admin.An additional capacity request has been made'));






          return redirect('phases/'.$phase_id.'/Request_extra_hours');
           
    }



                                       
   public function delete($id)
    {
       
         phase::where('id',$id)->delete();

          return redirect('phases');
         
    }
}

