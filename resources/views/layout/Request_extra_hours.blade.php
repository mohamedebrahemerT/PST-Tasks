@extends('admin_temp')
@section('content')



  <div class="row page-titles">
      <div class="col-md-5 align-self-center">
          <h3 class="text-themecolor">{{trans('admin.Request_extra_hours')}}</h3>
      </div>
      <div class="col-md-7 align-self-center">
          <ol class="breadcrumb">
               <li class="breadcrumb-item">{{trans('admin.Request_extra_hours')}}</li>
              <li class="breadcrumb-item"><a href="{{url('phases')}}">{{trans('admin.nav_phases')}}</a></li>
              <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
          </ol>
      </div>
  </div>


    <div class="row">
      <div class="col-sm-12">
          <div class="card">
              <div class="card-body">
<form  method ="POST"  action="{{url('/')}}/Request_extra_hours" enctype="multipart/form-data">

  @csrf
                  <h4 class="card-title" class="text">{{trans('admin.project_info')}}:</h4>


                   @php
 $project_id=App\Models\phase_projects_teams::where('phases_id',$phases->id)->first()->project_id;


 $project=App\Models\projects::where('id',$project_id)->first();
 

@endphp

  @if(session('lang')=='ar')
     {{$project->Projectname_ar}}
@elseif(session('lang')=='en')
{{$project->Projectname_en}}
 @endif
                  <hr> 
                             
                 
                </a>

                <input type="hidden" name="phase_id" value="{{$phases->id}}">

                

                  <div class="form-group m-t-50 row" >

                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.The_number_of_hours')}}</label>
                        <div class="col-md-8">
                          {{ Form::number('The_number_of_hours',null,["class"=>"form-control" ,"required"]) }}
                        </div>

                  </div>

                   <div class="form-group m-t-50 row" >

                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.Reason_for_the_delay')}}
: @if(session('lang') == 'ar')
     {{$phases->title_ar}}
     @endif

     @if(session('lang') == 'en')
     {{$phases->title_en}}
     @endif
                      </label>
                        <div class="col-md-8">
                      {{ Form::textarea('Reason_for_the_delay',null,["class"=>"form-control" ,"required"]) }}
                        </div>


                  </div>

                  <div class="form-group m-t-50 row" >

                        <div class="col-md-2">
                   </div>
                        <div class="col-md-8">
                    <input type="submit" name="submit" value=" {{trans('admin.send now')}}"  class="btn btn-info form-control" style="color: #fff">
                        </div>


                  </div>

                     


              </form>
          </div>
          </div>
          </div>
          </div>

@endsection
