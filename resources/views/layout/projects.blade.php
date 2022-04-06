@extends('admin_temp')
@section('content')

@php
     $todydate=date('Y-m-d');


@endphp
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.nav_projects')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.nav_projects')}}</li>
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

                    <a href="{{url('addshow')}} "style="font-size:150%;"
                       class="btn btn-info btn-bg" >{{trans('admin.add_project')}}</a>
                @endif
                
                  


</div>


                <div class="table-responsive">

                   <!-- Start home table -->
                   <h4 class="card-title">{{trans('admin.nav_projects')}} <code>

                   </code>

                   </h4> 
                    <table id="myTable" class="table full-color-table full-primary-table" >
                        <thead >
                           
                            <tr >
           
                                <th class="text-lg-center">
 @if(session('lang')=='ar')
                                    {{trans('admin.Projectname_ar')}}
                                        @elseif(session('lang')=='en')
                                           {{trans('admin.Projectname_en')}}
                                        @endif





                            </th>
                                <th class="text-lg-center">{{trans('admin.project_status')}}</th>
        
                                <th class="text-lg-center">{{trans('admin.registration_date')}}</th>
                                <th class="text-lg-center">{{trans('admin.start_date')}}</th>
                              
                                <th class="text-lg-center">{{trans('admin.end_date')}}</th>
                                <th class="text-lg-center">{{trans('admin.priority')}}</th>


                                
                             
                                <th class="text-lg-center">{{trans('admin.photo')}}</th> 
                  @if(Auth()->user()->type == 'admin')
                                <th class="text-lg-center">{{trans('admin.edit')}}</th>
                                @endif
       
                                <th class="text-lg-center">{{trans('admin.showphases')}}</th>
                                <th class="text-lg-center">{{trans('admin.uploadfile')}}
                                </th>


                                <th class="text-lg-center">{{trans('admin.view')}}</th>

                           
                            </tr>
                           
                     </thead>
                        <tbody>
                      
                          
     @foreach($projects as $project) 
                <tr>
                                <td class="text-lg-center">{{$project->Projectname_ar}}</td>
                                 
                                 <td class="text-lg-center">
@php
$status=App\Models\status::where('id',$project->status_id)->first();
@endphp

@if(session('lang') =='ar')
   {{$status->title_ar}}
                                        @elseif(session('lang')=='en')
                                           {{$status->title_en}}
                                        @endif
                                  


                                 </td>
                                
 <td class="text-lg-center">{{$project->registration_date}}</td>
                                 <td class="text-lg-center">{{$project->start_date}}</td>

                                

                                 <td class="text-lg-center">



         <span
          @if($todydate >   $project->end_date)
class="btn btn-danger"
                                       @endif
                                       >     {{$project->end_date}} </span>
                                     
                                    

                                </td>
                 <td class="text-lg-center">

@if($project->priority == 'midiom') 
<span class="btn btn-warning">  
{{trans('admin.mediom')}}
</span>
             
   @endif

   @if($project->priority == 'low') 

   <span class="btn btn-dark">{{trans('admin.low')}}</span>
             
   @endif

     @if($project->priority == 'high') 

     <span class="btn btn-danger">  {{trans('admin.high')}}  </span>
             
   @endif


                     

                </td>

                                 
                                
                                 <td class="text-lg-center">

                                    <img src="{{url('/')}}/public/{{$project->photo}}" style="height: 50px;width: 50px" required="">
                                    

                                </td>

                                 @if(Auth()->user()->type == 'admin')
                                 <td class="text-lg-center">


 <a href="{{url('/')}}/projects/{{$project->id}}/edit">
    
                 <button class="btn btn-success">{{trans('admin.edit')}}</button>
                 </a>
                                </td>

                                @endif

                               

                 <td class="text-lg-center">
 
    
  <a class="btn btn-success" href="{{url('/')}}/showphasesforthisproject/{{$project->id}}">{{trans('admin.showphases')}}</a>
                  
                
                                </td>  

                       
                        <td class="text-lg-center">
 
    
  <a class="btn btn-success" href="{{url('/')}}/uploadfileproject/{{$project->id}}">{{trans('admin.uploadfile')}}</a>
                  
                
                                </td>  
        
     <td class="text-lg-center">
 <a href="{{url('/')}}/viewprojects/{{$project->id}}">
    
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