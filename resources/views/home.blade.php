
@extends('admin_temp')
@section('content')
{{--Main Menu--}}

@php
if (Auth()->user()->type == 'admin')
{
  $projects=App\Models\projects::orderBy('id','desc')->get();
   $phase_projects_teams=App\Models\phase_projects_teams::get();

 $project_ids=[];

 foreach ($phase_projects_teams as   $phase_projects_team) 

 {
  array_push($project_ids, $phase_projects_team->project_id);
}




}

else
{

 $phase_projects_teams=App\Models\phase_projects_teams::where('developers_id',Auth()->user()->id)->get();

 $project_ids=[];

 foreach ($phase_projects_teams as   $phase_projects_team) 

 {
  array_push($project_ids, $phase_projects_team->project_id);
}



$projects=App\Models\projects::whereIn('id',$project_ids)->orderBy('id','desc')->get();


}

@endphp

<div class="row page-titles" >
   
  <div class="col-md-5 align-self-center" >

    <h3 class="text-themecolor" >{{trans('admin.nav_home')}}</h3>
  </div>
</div>



<div class="row" >


  <div class="col-lg-4" >
    <div  style="background-color: #92a8d1;" >
      <div class="card-body">
        <div class="d-flex no-block">
           <a href="{{url('/')}}/projects">
          <div class="m-r-20 align-self-center" ><img src="{{ asset('/assets/images/icon/expense-w.png') }}" alt="">

          </div>
             </a>
          <div class="align-self-center">
           <h6 style="font-size:150%;">{{trans('admin.Total projects')}}</h6>
           <h2 style="font-size:150%;"> 

             {{$projects->count()}}

           </h2>
      
       </div>
     </div>
   </div>
 </div>
</div>


  <div class="col-lg-4">
    <div  style="background-color: #80ced6;" >
      <div class="card-body">
        <div class="d-flex no-block">
          <a href="{{url('/')}}/phases">
          <div class="m-r-20 align-self-center"><img src="{{ asset('/assets/images/icon/assets-w.png') }}" alt=""></div>
          </a>


          <div class="align-self-center">

            <h6  style="font-size:150%;">
            {{trans('admin.Total phases')}}</h6>
            
            


            <h2 style="font-size:150%;">

              {{$phase_projects_teams->count()}}
            </h2>




        </div>
      </div>
    </div>
  </div>
</div>




     @if(Auth()->user()->type =='admin')



  <div class="col-lg-4">
    <div  style="background-color:  #cccccc; ">
    
      <div class="card-body">
      
  <div class="d-flex no-block">

       <a href="{{url('/')}}/users">   
  <div class="m-r-20 align-self-center">


    <img src="{{ asset('/assets/images/icon/staff-w.png') }}" alt="">
  </div>
    </a>
  <div class="align-self-center">

    <h6 style="font-size:150%;" >{{trans('admin.Total users')}}</h6>

    <h2  style="font-size:150%;" >{{App\Models\User::count()}}</h2>


        </div>
 


      </div>

    </div>
  </div>
</div>

@endif
   
      
    

@php
 

if (Auth()->user()->type == 'user')
{

 $phase_projects_teams=App\Models\phase_projects_teams::where('developers_id',Auth()->user()->id)->get();

 $phase_ids=[];

 foreach ($phase_projects_teams as   $phase_projects_team) 

 {
  array_push($phase_ids, $phase_projects_team->phases_id);
}

 $todydate=date('Y-m-d');

$phases=App\Models\phase::whereIn('id',$phase_ids)->
 where('start_date', '<=', $todydate)
  ->where('end_date', '>=', $todydate)
->orderBy('id','desc')->get();


}

@endphp

@if (Auth()->user()->type == 'user')
 <div class="card-body">

      
      <table id="myTable" class="table full-color-table full-primary-table">
        <thead>
          <tr>
                <th class="text-lg-center">{{trans('admin.projectname')}}</th>
            <th class="text-lg-center">

             
              @if(session('lang')=='ar')
              {{trans('admin.title_ar')}}
              @elseif(session('lang')=='en')
              {{trans('admin.title_en')}}
              @endif
            </th>

 
            
            <th class="text-lg-center">{{trans('admin.start_datee')}}</th>
            <th class="text-lg-center">{{trans('admin.end_datee')}}</th>
           
       
     
         </tr>
       </thead>
       <tbody>
        <tr>
          @foreach($phases as $phase) 
           <td class="text-lg-center">
            
            @php
            $project_id=App\Models\phase_projects_teams::where('phases_id',$phase->id)->first()->project_id;


            $project=App\Models\projects::where('id',$project_id)->first();
            

            @endphp


            @if(session('lang') == 'ar')
            {{$project->Projectname_ar}}
            @endif

            @if(session('lang') == 'en')
            {{$project->Projectname_en}}
            @endif


          </td>
           
          <td class="text-lg-center">{{$phase->title_ar}}</td>
    
          <td class="text-lg-center">{{$phase->start_date}}</td>
          <td class="text-lg-center">{{$phase->end_date}}</td>

        

        
        
        
         
         
         
         
         
       </tr>
       @endforeach
     </tbody>
   </table>
   
 </div>

@endif

</div>
<br>
  <!-- Column -->
  <div class="row"> 
    @foreach($projects as $project)         
  <div class="col-lg-4">

    <div class="card">
      <img class="card-img-top img-responsive" src="{{url('/')}}/public/{{$project->photo}}" alt="Card image cap" style="width: 100%; height: 80px">
      <div class="card-body">
        <ul class="list-inline font-14" style="color: DodgerBlue; font-size: 100%">{{trans('admin.start')}}:
          <li class="p-l-0">

           {{$project->start_date}}
         </li>
         {{trans('admin.end')}}:
         <li class="p-l-0">

           {{$project->end_date}}
         </li>

         <li>
           <a href="javascript:void(0)" class="link">|
            &nbsp;{{App\Models\comment::where('project_id',$project->id)->count()}}</a> {{trans('admin.comment')}}</li>
          </ul>
          <h3 style="font-size:150%; color:  tomato;">
            @if(session('lang') == 'ar')
            {{$project->Projectname_ar}}
            @endif

            @if(session('lang') == 'en')
            {{$project->Projectname_en}}
            @endif


          </h3>

          <p class="m-b-0 m-t-10">
           @php
           $status=App\Models\status::where('id',$project->status_id)->first();
           @endphp

           @if(session('lang') =='ar')
           {{$status->title_ar}}
           @elseif(session('lang')=='en')
           {{$status->title_en}}
           @endif
         </p>
         <a href="{{url('/')}}/viewprojects/{{$project->id}}" class="btn btn-info btn-rounded waves-effect waves-light m-t-20"
        style="border-radius: 60%; " >

          {{trans('admin.view more')}}</a>
       </div>
     </div>
   </div>
   @endforeach
 



</div>


 
 

 @endsection
 @section('scripts')


 @endsection
