@extends('admin_temp')
@section('content')
  <div class="row page-titles">
      <div class="col-md-5 align-self-center">
          <h3 class="text-themecolor">{{trans('admin.updateprojects')}}</h3>
      </div>
      <div class="col-md-7 align-self-center">
          <ol class="breadcrumb">
               <li class="breadcrumb-item">{{trans('admin.updateprojects')}}</li>
              <li class="breadcrumb-item"><a href="{{url('projects')}}">{{trans('admin.nav_projects')}}</a></li>
              <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
          </ol>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-12">
          <div class="card">
              <div class="card-body">

                  <h4 class="card-title" class="text">{{trans('admin.project_info')}}</h4>
                  <hr> 
                   <a href="{{url('layout.updateprojects')}}">  

                   <form  method ="POST"  action="{{url('/')}}/updateprojects" enctype="multipart/form-data" >

                    
                    @csrf
                </a>


                <input type="hidden"  value="{{$project->id}}" name="project_id" >

                  <div class="form-group m-t-40 row" >

                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.Projectname_ar')}}</label>
                        <div class="col-md-8">
          {{ Form::text('Projectname_ar',$project->Projectname_ar,["class"=>"form-control" ,"required" ]) }}
                        </div>


                  </div>
            <div class="form-group m-t-40 row" >

                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.Projectname_en')}}</label>
                        <div class="col-md-8">
                    {{ Form::text('Projectname_en',$project->Projectname_en,["class"=>"form-control" ,"required"]) }}
                        </div>


                  </div>
                @php

$status=App\Models\status::get();

@endphp
                   <div class="form-group m-t-40 row">




       <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.status')}}</label>
                        <div class="col-md-8">
              <select name="status_id" id="status_id" class="form-control" style="padding: 2px;">
                        @foreach($status as $status)
  <option value="{{$status->id}}"   @if($project->status_id == $status->id) selected @endif>
 @if(session('lang')=='ar')
                                            {{$status->title_ar}}
                                        @elseif(session('lang')=='en')
                                           {{$status->title_en}}
                                        @endif

</option>
 @endforeach
 
</select> 



              </div>
                        </div>


                     

        <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.registration_date')}}</label>
               <div class="col-md-3">
     {{ Form::date('registration_date',$project->registration_date,["class"=>"form-control" ,"required" ]) }}
                        </div>
               

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.start_date')}}</label>
                        <div class="col-md-3">
                          {{ Form::date('start_date',$project->start_date,["class"=>"form-control" ,"required" ]) }}
                        </div>
                        </div>
                  


 <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.end_date')}}</label>
                        <div class="col-md-3">
                          {{ Form::date('end_date',$project->end_date,["class"=>"form-control" ,"required" ]) }}
                        </div>
<label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.delivery_date')}}</label>
                        <div class="col-md-3">
     {{ Form::date('delivery_date',$project->delivery_date,["class"=>"form-control" ]) }}

                    
                        </div>
                        </div>
                           <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.desc_arr')}}</label>
                        <div class="col-md-8">
                                        <textarea type="text" name="desc_ar" class="form-control" required=""> 
  {{$project->desc_ar}}

                </textarea>
                        </div>
                        </div>
                <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.desc_en')}}</label>
                        <div class="col-md-8">
                                           <textarea type="text" name="desc_en" class="form-control" required=""> 
  {{$project->desc_en}}

                </textarea>
                        </div>
                        </div>
                         <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.notes')}}</label>
                        <div class="col-md-8">
                                <textarea type="text" name="notes" class="form-control" required=""> 
  {{$project->notes}}

                </textarea>
                        </div>
                        </div>
                       

                         <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.photo')}}</label>
                        <div class="col-md-8">
                           <img src="{{url('/')}}/public/{{$project->photo}}" style="height: 50px;width: 50px">

                          {{ Form::file('photo',["class"=>"form-control"  ]) }}
                        </div>
                        </div>
                        <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.priority')}}</label>
                        <div class="col-md-8">
                                  
         <select name="priority" id="priority" class="form-control" style="padding: 2px;">
  <option value="high"  
  @if($project->priority == 'high') 
  selected
   @endif
>
 {{trans('admin.high')}}</option>
  <option value="midiom"
@if($project->priority == 'midiom') 
  selected
   @endif
  >{{trans('admin.mediom')}}</option>
  <option value="low"
@if($project->priority == 'low') 
  selected
   @endif
  >{{trans('admin.low')}}</option>
 
</select> 
                        </div>
                        </div>

                  <div class="center">
                   <input type="submit" name="submit" value=" {{trans('admin.public_edit')}}"  class="btn btn-info">
                 
                        
                  </div>
                   {{ Form::close() }}
              </div>
          </div>
      </div>
  </div>
@endsection

