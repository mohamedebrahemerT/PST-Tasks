@extends('admin_temp')
@section('content')
  <div class="row page-titles">
      <div class="col-md-5 align-self-center">
          <h3 class="text-themecolor">{{trans('admin.add_new_phase')}}</h3>
      </div>
      <div class="col-md-7 align-self-center">
          <ol class="breadcrumb">
               <li class="breadcrumb-item">{{trans('admin.add_new_phase')}}</li>
              <li class="breadcrumb-item"><a href="{{url('phases')}}">{{trans('admin.nav_phases')}}</a></li>
              <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
          </ol>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-12">
          <div class="card">
              <div class="card-body">
<form  method ="POST"  action="{{url('/')}}/createphases" enctype="multipart/form-data">

  @csrf
                  <h4 class="card-title" class="text">{{trans('admin.phase_info')}}</h4>
                  <hr> 
                            
                 
                </a>
                
                <div class="form-group m-t-40 row" >

                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.projects')}}</label>
                        <div class="col-md-8">
                          <select name="project_id" id="project_id" class="form-control" style="padding: 2px;">
               @foreach(App\Models\projects::get()  as $project)
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

                  

  <div class="form-group m-t-40 row" >

                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.devloper')}}</label>
                        <div class="col-md-8">
         <select name="developers_id" id="developers_id" class="form-control" style="padding: 2px;">
                @foreach(App\Models\User::where('status','available')->get() as $users)
  <option value="{{$users->id}}">
    {{$users->name}}
    
  </option>
   @endforeach   
 
</select> 
                  
                        </div>

                  </div>
    

                  <div class="form-group m-t-40 row" >

                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.title_ar')}}</label>
                        <div class="col-md-8">
                {{ Form::text('title_ar',old('title_ar'),["class"=>"form-control" ,"required"]) }}
                        </div>


                  </div>
            <div class="form-group m-t-40 row" >

                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.title_en')}}</label>
                        <div class="col-md-8">
                          {{ Form::text('title_en',old('title_en'),["class"=>"form-control" ,"required"]) }}
                        </div>


                  </div>

                  <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.desc_ar')}}</label>
                        <div class="col-md-8">
                              <textarea type="text" name="desc_ar" class="form-control" required> 
{{old('desc_ar')}}
                </textarea> 
                        </div>
                        </div>

                        <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.desc_en')}}</label>
                        <div class="col-md-8">
          <textarea type="text" name="desc_en" class="form-control" required> 
 

                </textarea> 
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

            <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.start_datee')}}</label>
                        <div class="col-md-3">
         {{ Form::date('start_date',old('start_date'),["class"=>"form-control" ,"required" ]) }}
                        </div>
   
                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.end_datee')}}</label>
                        <div class="col-md-3">
                {{ Form::date('end_date',old('end_date'),["class"=>"form-control" ,"required" ]) }}
                        </div>
                      </div>
                        


 <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.delivery_date')}}</label>
                        <div class="col-md-3">
                {{ Form::date('delivery_date',old('delivery_date'),["class"=>"form-control" ]) }}
                        </div>
    



                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.Number_of_hours')}}</label>
                        <div class="col-md-3">
            {{ Form::number('Number_of_hours',old('Number_of_hours'),["class"=>"form-control" ,"required" ]) }}
                        </div>
                        </div>


  <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.notes')}}</label>
                       <div class="col-md-8">
                        <textarea type="text" name="notes" class="form-control" required=""> 
{{old('notes')}}

                </textarea> 
                        </div>
                        </div>






                          <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.photo')}}</label>
                        <div class="col-md-8">
                          {{ Form::file('photo',null,["class"=>"form-control"  ]) }}
                        </div>
                        </div>

            
 <div class="form-group m-t-40 row">




       <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.important')}}</label>
                       <div class="col-md-8">
          <select name="important" id="important" class="form-control" style="padding: 2px;">
                       
  <option value="1"  @if('important' ==1 ) selected @endif>{{trans('admin.yes')}}
 

</option>
  <option value="0" @if('important' ==0 ) selected @endif>{{trans('admin.No')}}
 

</option>
 
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

