@extends('admin_temp')
@section('content')
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h3 class="text-themecolor">

     @if(session('lang') == 'ar')
     {{$project->Projectname_ar}}
     @endif

     @if(session('lang') == 'en')
     {{$project->Projectname_en}}
     @endif
   </h3>
<br>
     <div class="col-md-5 align-self-center">
                  @if(Auth()->user()->type == 'admin')

     <a href="{{url('addphases')}}" >
    <h class="btn btn-info btn-bg">{{trans('admin.addphases')}}

    </a>
  @endif

  </h>
 </div>
</div>


 <div class="col-md-7 align-self-center">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
     
     @if(session('lang') == 'ar')
     {{$project->Projectname_ar}}
     @endif

     @if(session('lang') == 'en')
     {{$project->Projectname_en}}
     @endif
        </li>
   <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
 </ol>
</div>
</div>
<!-- /.card-header -->
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
       <h1>{{trans('admin.nav_phases')}} :
        @if(session('lang') == 'ar')
        {{$project->Projectname_ar}}
        @endif

        @if(session('lang') == 'en')
        {{$project->Projectname_en}}
        @endif
      </h1>

    </div>
    <div class="card-body">

      
      <table id="myTable" class="table full-color-table full-primary-table table-responsive">
        <thead>
          <tr>
             
            <th class="text-lg-center">

             
              @if(session('lang')=='ar')
              {{trans('admin.title_ar')}}
              @elseif(session('lang')=='en')
              {{trans('admin.title_en')}}
              @endif
            </th>

            <th class="text-lg-center">{{trans('admin.start_datee')}}</th>
            <th class="text-lg-center">{{trans('admin.end_datee')}}</th>
            <th class="text-lg-center">{{trans('admin.photo')}}</th>
            <th class="text-lg-center">{{trans('admin.projectname')}}</th>
            <th class="text-lg-center">{{trans('admin.devloper')}}</th>
            <th class="text-lg-center">{{trans('admin.status')}}</th>
            <th class="text-lg-center">{{trans('admin.important')}}</th>
            <th class="text-lg-center">{{trans('admin.phase_Delivery')}}</th>
            <th class="text-lg-center">{{trans('admin.Delivery_status')}}</th>



            @if(Auth()->user()->type == 'admin')
            <th class="text-lg-center">
             
             {{trans('admin.edit')}}
             
           </th>                                
           @endif

           <th class="text-lg-center">
             {{trans('admin.phasesuploadfile')}}

             
           </th>
           <th class="text-lg-center">
             
             {{trans('admin.view')}}
             
           </th>
           
           

           

         </tr>
       </thead>
       <tbody>
    
          @foreach($phases as $phase) 
          @php
$todydate=date('Y-m-d');
    $count=App\Models\phase::
    where('id',$phase->id)->
    where('status_id','!=',3)->
 where('start_date', '<=', $todydate)
  ->where('end_date', '>=', $todydate)
->orderBy('id','desc')->count();
@endphp
            <tr   @if($count != 0) class="alert alert-danger" @endif>
             
 
         
          <td class="text-lg-center">{{$phase->title_ar}}</td>
          
         
          
          
          <td class="text-lg-center">{{$phase->start_date}}</td>
          <td class="text-lg-center">{{$phase->end_date}}</td>

          <td class="text-lg-center">
            <img src="{{url('/')}}/public/{{$phase->photo}}" style="height: 50px;width: 50px">
          </td>

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
          <td class="text-lg-center">
            @php

            $developers_id=App\Models\phase_projects_teams::where('phases_id',$phase->id)->first()->developers_id;

            $name=App\Models\User::where('id',$developers_id)->first()->name;
            @endphp
            
            {{$name}}

          </td>

          <td class="text-lg-center">
            @php

            $status=App\Models\status::where('id',$phase->status_id)->first();
 
                @endphp

                 @if(session('lang')=='ar')
                                            {{$status->title_ar}}
                                        @elseif(session('lang')=='en')
                                           {{$status->title_en}}
                                        @endif

          </td>
          <td >
            @if($phase->important == '0')
             {{trans('admin.No')}}
            @endif

            @if($phase->important == '1')
             {{trans('admin.yes')}}
            @endif


          </td>

          @if(Auth()->user()->type == 'admin')
           

          <td class="text-lg-center">

            <a href="{{url('/')}}/phases/{{$phase->id}}/edit">
              <button class="btn btn-success">{{trans('admin.edit')}}</button>
            </a>

          </td>

           
          @endif

           <td >
            

            @if($phase->phase_Delivery == '1')
            <span class="btn btn-primary">  
             الانتظار
             </span>

              @elseif($phase->phase_Delivery == '2')
            <span class="btn btn-secondary">  
          جاري التنفيذ
             </span>

         

              @elseif($phase->phase_Delivery == '3')
            <span class="btn btn-success">  
              تم   الانتهاء  من المرحلة 
             </span>

               @elseif($phase->phase_Delivery == '4')
            <span class="btn btn-danger">  
          التحليل والعرض الفني
             </span>

               @elseif($phase->phase_Delivery == '5')
            <span class="btn btn-info">  
         انشاء قواعد البيانات
             </span>

               @elseif($phase->phase_Delivery == '6')
            <span class="btn btn-warning">  
    التصميم
             </span>

              @elseif($phase->phase_Delivery == '7')
            <span class="btn btn-info">  
     البرمجه والكود
             </span>

               @elseif($phase->phase_Delivery == '8')
            <span class="btn btn-light">  
     تست كود
             </span>

              @elseif($phase->phase_Delivery == '9')
            <span class="btn btn-info">  
      الرفع علي السيرفر
             </span>

               @elseif($phase->phase_Delivery == '10')
            <span class="btn btn-dark">  
      التست النهائي
             </span>
                 @elseif($phase->phase_Delivery == '11')
            <span class="btn btn-info">  
      التسليم
             </span>

             @else
                <span class="btn btn-light">  
                  {{trans('admin.request_send')}}
             </span>

            @endif
          

          </td>
<td class="text-lg-center">
            
      
@if($phase->phase_Delivery !== '3')
            <a href="{{url('/')}}/phases/{{$phase->id}}/{{$project->id}}/phase_Delivery_now">
              <button class="btn btn-success">{{trans('admin.phase_Delivery_now')}}</button>
            </a>
  

 <br>
             <a href="{{url('/')}}/phases/{{$phase->id}}/Request_extra_hours">
              <button class="btn btn-dark" style="margin-top:5%">{{trans('admin.Request extra hours')}}</button>
            </a>
@endif

<a href="{{url('/')}}/phases/{{$phase->id}}/View_delays">
              <button class="btn btn-dark" style="margin-top:5%">{{trans('admin.View delays')}}</button>
            </a>
         
                  

          </td>

          <td class="text-lg-center">
           
            
            <a class="btn btn-success" href="{{url('/')}}/phasesuploadfile/{{$phase->id}}">{{trans('admin.phasesuploadfile')}}</a>
            
            
          </td> 
          

          
          <td class="text-lg-center">
           <a href="{{url('/')}}/viewphases/{{$phase->id}}">
            
             <button class="btn btn-success">{{trans('admin.view')}}</button>
             </a>
           </td>
         
       </tr>
       @endforeach
     </tbody>
   </table>
   
 </div>
</div>
</div>
</div>
 
@endsection