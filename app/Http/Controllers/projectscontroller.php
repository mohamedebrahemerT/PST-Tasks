<?php

namespace App\Http\Controllers;
 use App\Models\projects;
 use App\Models\comment;
 use App\Models\attachment;
 use App\Models\phase_projects_teams;

use Illuminate\Http\Request;

class projectscontroller extends Controller

{


     public function index()
    {
    	

       if (Auth()->user()->type == 'developer')
 {

     $phase_projects_teams= phase_projects_teams::where('developers_id',Auth()->user()->id)->get();

    $project_ids=[];

    foreach ($phase_projects_teams as   $phase_projects_team) 

    {
      array_push($project_ids, $phase_projects_team->project_id);
    }

         

     $projects=projects::whereIn('id',$project_ids)->orderBy('id','desc')->get();

      return view('layout.projects',compact('projects'));
     
   
  }


  elseif (Auth()->user()->type == 'user') 
  {



     $phase_projects_teams= phase_projects_teams::where('developers_id',Auth()->user()->id)->get();

    $project_ids=[];

    foreach ($phase_projects_teams as   $phase_projects_team) 

    {
      array_push($project_ids, $phase_projects_team->project_id);
    }

         

     $projects=projects::whereIn('id',$project_ids)->orderBy('id','desc')->get();

      return view('layout.projects',compact('projects'));
    
  }

   $projects = projects::orderBy('id','desc')->get();
    	return view('layout.projects',compact('projects'));
    }


public function show($id)
    {
    
    
      $project =projects::where('id',$id)->first();
       $comments=comment::where('project_id',$id)->get();
       $attachments=attachment::where('project_id',$id)->first();

return view('layout.viewprojects',compact('project','comments','attachments'));
    }


    public function create()
    {
  
    	
    return view('layout.addprojects');
    }


     public function store(Request $request)
    {
       
       
        $Projectname_ar= request('Projectname_ar');
        $Projectname_en= request('Projectname_en');
        $status_id= request('status_id');
        $desc_ar= request('desc_ar');
        $desc_en= request('desc_en');
        $start_date= request('start_date');
        $end_date= request('end_date');

        if ($start_date  > $end_date  ) 
        {

        return back()->with('danger', trans('admin.start_date is bigger than end_date'));

     
        }
        elseif ($end_date < $start_date) {

           return back()->with('danger', trans('admin.end_date is less than start_date'));

        }
        
      





        $delivery_date= request('delivery_date');
        $notes= request('notes');
        $priority= request('priority');
        $registration_date= request('registration_date');
        
       if ($request->photo) 
       {
          $photo = time().'.'.$request->photo->extension();  
         $request->photo->move(public_path('/'), $photo);
        
             
       }
       else{
        $photo='';
       }
       
         $projects= projects::create([
             
            'Projectname_ar'=>$Projectname_ar,
            'Projectname_en'=>$Projectname_en,
            'status_id'=>$status_id,
            'desc_ar'=>$desc_ar,
            'desc_en'=>$desc_en,

            'start_date'=>$start_date,
            'end_date'=>$end_date,
            'delivery_date'=>$delivery_date,
            'notes'=>$notes,
            'photo'=>$photo,
            'priority'=>$priority,
            'registration_date'=>$registration_date


        

         ]);
        session()->flash('success', trans('admin.Added successfully'));



          return redirect('projects');
    }



public function update(Request $request)
{
     $id=request('project_id');
     $project =projects::where('id',$id)->first();

    $Projectname_ar= request('Projectname_ar');
        $Projectname_en= request('Projectname_en');
        $desc_ar = request('desc_ar');
        $desc_en = request('desc_en');
        $status_id= request('status_id');
        $start_date= request('start_date');
        $end_date= request('end_date');
        $delivery_date= request('delivery_date');
         $notes= request('notes');
         $priority= request('priority');
         $registration_date= request('registration_date');


         if ($request->photo) 
       {

          $photo = time().'.'.$request->photo->extension();  
         $request->photo->move(public_path('/'), $photo);
        
             
       }

       else

       {
         
            $photo= $project->photo;
       }

 if ($start_date  > $end_date  ) 
        {

        return back()->with('danger', trans('admin.start_date is bigger than end_date'));

     
        }
        elseif ($end_date < $start_date) {

           return back()->with('danger', trans('admin.end_date is less than start_date'));

        }

         $project= projects::where('id',$id)->update([
             
            'Projectname_ar'=>$Projectname_ar,
            'Projectname_en'=>$Projectname_en,
            'status_id'=>$status_id,
            'desc_ar'=>$desc_ar,
            'desc_en'=>$desc_en,
            'start_date'=>$start_date,
            'end_date'=>$end_date,
            'delivery_date'=>$delivery_date,
            'notes'=>$notes,
            'photo'=>$photo,
            'priority'=>$priority,
            'registration_date'=>$registration_date


        

         ]);

        session()->flash('success', trans('admin.Modified successfully'));
        
    return redirect('projects');
}


public function uploadfileproject($id)

{
     $project= projects::where('id',$id)->first();

    return view('layout.uploadfile',compact('id','project'));
}



public function uploadfileprojectpost(Request $request)
{

  $project_id=request('project_id');
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
                   'project_id'=>$project_id,
                   'name'=>Request('name')[$key],
                   'title'=>Request('title')[$key]
                ]);

                    

                    
                }
 

                
               }

    
  
      


        return back()->with('success', trans('admin.Your files has been successfully added'));
}

           



    public function edit($id)

    {

      
	$project =projects::where('id',$id)->first();
    	
    	return view('layout.updateprojects',compact('project'));


    }

   public function delete($id)
    {
         projects::where('id',$id)->delete();

          return redirect('layout.projects');
         
    }

}
