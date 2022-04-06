@extends('admin_temp')
@section('content')
  <div class="row page-titles">
      <div class="col-md-5 align-self-center">
          <h3 class="text-themecolor">{{trans('admin.add_new_project')}}</h3>
      </div>
      <div class="col-md-7 align-self-center">
          <ol class="breadcrumb">
               <li class="breadcrumb-item">{{trans('admin.add_new_project')}}</li>
              <li class="breadcrumb-item"><a href="{{url('projects')}}">{{trans('admin.nav_projects')}}</a></li>
              <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
          </ol>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-12">
          <div class="card">
              <div class="card-body">
<form  method ="POST"  action="{{url('/')}}/addprojects" enctype="multipart/form-data">

  @csrf
                  <h4 class="card-title" class="text">{{trans('admin.project_info')}}</h4>
                  <hr> 
                             
                 
                </a>

                  <div class="form-group m-t-50 row" >

                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.Projectname_ar')}}</label>
                        <div class="col-md-8">
                          {{ Form::text('Projectname_ar',null,["class"=>"form-control" ,"required"]) }}
                        </div>

                  </div>

            <div class="form-group m-t-40 row" >

                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.Projectname_en')}}</label>
                        <div class="col-md-8">
                          {{ Form::text('Projectname_en',null,["class"=>"form-control" ,"required"]) }}
                        </div>


                  </div>
                  @php

$status=App\Models\status::get();

@endphp
                   <div class="form-group m-t-40 row">




       <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.status')}}</label>
                        <div class="col-md-8">
                      <select name="status_id" id="status" class="form-control" style="padding: 2px;">

     
                        @foreach($status as $status)
  <option value="{{$status->id}}">
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
                          {{ Form::date('registration_date',null,["class"=>"form-control" ,"required" ]) }}
                        </div>


                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.start_date')}}</label>
                        <div class="col-md-3">
                          {{ Form::date('start_date',null,["class"=>"form-control" ,"required" ]) }}
                        </div>
                        </div>

              
                     
                        

                    <div class="form-group m-t-40 row">
<label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.end_date')}}</label>
                        <div class="col-md-3">
                          {{ Form::date('end_date',null,["class"=>"form-control" ,"required" ]) }}
                   
                        </div>

                   <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.delivery_date')}}</label>

                        <div class="col-md-3">
                          {{ Form::date('delivery_date',null,["class"=>"form-control"  ]) }}      

                    
                        </div>
                        </div>



                  
         <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.desc_arr')}}</label>
                    <div class="col-md-8">
                     <textarea type="text" name="desc_ar" class="form-control" required=""> 

                </textarea> 
                        
                        </div>
                        </div>


                <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.desc_en')}}</label>
                        <div class="col-md-8">
                         <textarea type="text" name="desc_en" class="form-control" required=""> 

                </textarea>
                        </div>
                        </div>
                        <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.notes')}}</label>
                        <div class="col-md-8">
                            <textarea type="text" name="notes" class="form-control"> 

                </textarea>
                        </div>
                        </div>


                         <div class="form-group m-t-40 row">


                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.photo')}}</label>
                        <div class="col-md-8">
                          {{ Form::file('photo',null,["class"=>"form-control" ]) }}
                        </div>

                        </div>
                        <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.priority')}}</label>
                        <div class="col-md-8">
                                 
                          <select name="priority" id="priority" class="form-control" style="padding: 2px;">
  <option value="high">{{trans('admin.high')}}</option>
  <option value="midiom">{{trans('admin.mediom')}}</option>
  <option value="low">{{trans('admin.low')}}</option>
 
</select> 
                        </div>
                        </div>
                   

    
          <div class="center">
                   
          <input type="submit" name="submit" value=" {{trans('admin.public_Add')}}"  class="btn btn-info">

           
                   
                  </div>
                   {{ Form::close() }}
              </div>
          </div>
      </div>
  </div>
  </form>
@endsection

