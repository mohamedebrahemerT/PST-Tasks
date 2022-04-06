

@extends('admin_temp')
@section('content')

 
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.View_delays')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.View_delays')}}</li>
                <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
            </ol>
        </div>
    </div>
        <!-- /.card-header -->
     <div class="row">
        <div class="col-lg-12">
            <div class="card">
                


                <div class="table-responsive">

                   <!-- Start home table -->
                   <h4 class="card-title">{{trans('admin.View_delays')}} :

                       @php
 $project_id=App\Models\phase_projects_teams::where('phases_id',$phases->id)->first()->project_id;


 $project=App\Models\projects::where('id',$project_id)->first();
 

@endphp

  @if(session('lang')=='ar')
     {{$project->Projectname_ar}}
@elseif(session('lang')=='en')
{{$project->Projectname_en}}
 @endif  |


@if(session('lang') == 'ar')
     {{$phases->title_ar}}
     @endif

     @if(session('lang') == 'en')
     {{$phases->title_en}}
     @endif
                   </h4> 
                    <table id="myTable" class="table full-color-table full-primary-table" >
                        <thead >
                           
                            <tr >
           
                                <th class="text-lg-center">
                                  
                                    {{trans('admin.The_number_of_hours')}}
                                     </th>

                                     <th class="text-lg-center">
                                  
                                    {{trans('admin.Reason_for_the_delay')}}
                                     </th>
                                      <th class="text-lg-center">
                                  
                                    {{trans('admin.opration')}}
                                     </th>
                               
                           
                            </tr>
                           
                     </thead>
                        <tbody>
                      
                          
     @foreach($phases_Request_extra_hours as $phases_Request) 
                <tr>
                                <td class="text-lg-center">{{$phases_Request->The_number_of_hours}}</td>

                                 <td class="text-lg-center">{{$phases_Request->Reason_for_the_delay}}</td>
                                 
                                  
        
     <td class="text-lg-center">
 <a href="{{url('/')}}/Delay_activation/{{$phases_Request->id}}">
    
                 <button class="btn btn-danger">{{trans('admin.Delay activation')}}</button>
                  </a>

                <a href="{{url('/')}}/Delay_not_activated/{{$phases_Request->id}}">
    
                 <button class="btn btn-success">{{trans('admin.Delay not activated')}}</button>
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