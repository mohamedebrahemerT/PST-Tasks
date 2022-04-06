@extends('admin_temp')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.nav_phases')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.nav_phases')}}</li>
                <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
            </ol>
        </div>
    </div>
        <!-- /.card-header -->
     <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                  @if(Auth()->user()->type == 'admin')

                    <a href="{{url('addphases')}}" style="font-size:150%;"
                       class="btn btn-info btn-bg">{{trans('admin.add_phase')}}</a>
                 @endif
                </div>  
                <div class="table-responsive" >

                  @if(Auth()->user()->type == 'admin')
                  

                   <div class="card">
                        <div class="card-body">
     {{ Form::open( ['url' => ['project_phases'],'method'=>'post'] ) }}
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                           <h4>{{trans('admin.search_phase_project')}}</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
             <label>{{trans('admin.projects')}}</label>
              <select name="project_id" id="status" class="form-control" style="padding: 2px;">
                        @foreach(App\Models\projects::get() as $project)
  <option value="{{$project->id}}">
  @if(session('lang')=='ar')
                                  {{$project->Projectname_ar}}
                                        @elseif(session('lang')=='en')
                                           {{$project->Projectname_en}}
                                        @endif


</option>
 @endforeach
 
</select> 
                                        </div>
                                    </div>
                                     
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label></label>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="text-align: center;">
                                         <div class="form-group">
                                            <label>&nbsp;</label>
                                           <button style="" type="submit" class="btn btn-info"><i class="fa fa-search"></i>&nbsp; {{trans('admin.search')}} </button>
                                        </div>
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                          @endif

                   </h4> 
                  @if(Auth()->user()->type == 'user')

                    <table id="myTable" class="table full-color-table full-primary-table">
                        <thead >
                            <tr>
                                
                                <th class="text-lg-center" >{{trans('admin.projectname')}}</th>
                                <th class="text-lg-center" >

                               
                            @if(session('lang')=='ar')
                                            {{trans('admin.title_ar')}}
                                        @elseif(session('lang')=='en')
                                           {{trans('admin.title_en')}}
                                        @endif
                                    </th>


                               

                            
<th class="text-lg-center" >{{trans('admin.status')}}</th>
                                
                                
                                
                               
 <th class="text-lg-center" >{{trans('admin.start_datee')}}</th>
 <th class="text-lg-center" >{{trans('admin.end_datee')}}</th>
    <th class="text-lg-center">{{trans('admin.delivery_date')}}</th>
    <th class="text-lg-center">{{trans('admin.Number_of_hours')}}</th>

<th class="text-lg-center" >{{trans('admin.photo')}}</th>
<th class="text-lg-center" >{{trans('admin.important')}}</th>
 
 <th class="text-lg-center" >{{trans('admin.devloper')}}</th>
 
                     @if(Auth()->user()->type == 'admin')
                                <th class="text-lg-center" >
 
                 {{trans('admin.edit')}}
                 
                                </th>
                                @endif
  
                    <th class="text-lg-center"> 
 
                 {{trans('admin.view')}}
                 
                                </th>

         <th class="text-lg-center" scope="row">{{trans('admin.uploadfile')}}
                                </th>
  

        

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
                        <td class="text-lg-center">
                          @if(session('lang') == 'ar')  
                            {{$phase->title_ar}}
                                 @endif
                          @if(session('lang') == 'en')
                               {{$phase->title_en}} 
                                @endif
                        </td>
                     
                         
         <td class="text-lg-center">
            @php
$status=App\Models\status::where('id',$phase->status_id)->first();
@endphp

@if(session('lang') =='ar')
   {{$status->title_ar}}
                                        @elseif(session('lang')=='en')
                                           {{$status->title_en}}
                                        @endif

        </td>
                        
                    
                            
                    <td class="text-lg-center">{{$phase->start_date}}</td>
                    <td class="text-lg-center">{{$phase->end_date}}</td>
                    <td class="text-lg-center">{{$phase->delivery_date}}</td>                     
                    <td class="text-lg-center">{{$phase->Number_of_hours}}</td>                     
                    <td class="text-lg-center">{{$phase->important}}</td>                     
                    

                    <td class="text-lg-center">
<img src="{{url('/')}}/public/{{$phase->photo}}" style="height: 50px;width: 50px"  required="">
                        </td>

                     <td class="text-lg-center">
@php

$developers_id=App\Models\phase_projects_teams::where('phases_id',$phase->id)->first()->developers_id;

$name=App\Models\User::where('id',$developers_id)->first()->name;
@endphp
 
       {{$name}}

                    </td>

                     @if(Auth()->user()->type == 'admin')

                <td class="text-lg-center">

<a href="{{url('/')}}/phases/{{$phase->id}}/edit">
            <button class="btn btn-success">{{trans('admin.edit')}}</button>
</a>
 
                        </td>
                          @endif
                           






                     <td class="text-lg-center">
 <a href="{{url('/')}}/viewphases/{{$phase->id}}">
    
                 <button class="btn btn-success">{{trans('admin.view')}}</button>
                
                                </td>
        </a>
 
                  <td class="text-lg-center">
 
    
  <a class="btn btn-success" href="{{url('/')}}/phasesuploadfile/{{$phase->id}}">{{trans('admin.phasesuploadfile')}}</a>
                  
                
                                </td> 
                          
                 
                 
                            </tr>
                       @endforeach
                        </tbody>
                    </table >
                 @endif
                    
                </div>
            </div>
        </div>
    </div>
@endsection