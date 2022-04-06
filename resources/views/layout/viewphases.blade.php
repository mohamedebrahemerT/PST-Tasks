@extends('admin_temp')
@section('content')
  <div class="row page-titles">
      <div class="col-md-5 align-self-center">
          <h3 class="text-themecolor">{{trans('admin.viewphases')}}</h3>
      </div>
      <div class="col-md-7 align-self-center">
          <ol class="breadcrumb">
               <li class="breadcrumb-item">{{trans('admin.viewphases')}}</li>
              <li class="breadcrumb-item"><a href="{{url('phases')}}">{{trans('admin.nav_phases')}}</a></li>
              <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
          </ol>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-12">
          <div class="card">
              <div class="card-body">

                  <h4 class="card-title" class="text">{{trans('admin.phase_info')}}</h4>
                  <hr> 
                   <a href="{{url('layout.phases')}}">         
               
                

                </a>


 

                  <div class="form-group m-t-40 row" >

                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.title_ar')}}</label>
                        <div class="col-md-8">

          {{ Form::text('title_ar',$phase->title_ar,["class"=>"form-control" ,"required","readonly"]) }}
                        </div>


                  </div>
            <div class="form-group m-t-40 row" >

                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.title_en')}}</label>
                        <div class="col-md-8">
           {{ Form::text('title_en',$phase->title_en,["class"=>"form-control" ,"required","readonly"]) }}
                        </div>


                  </div>

                  <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.desc_ar')}}</label>
                       <div class="col-md-8">
                    {{ Form::text('desc_ar',$phase->desc_ar,["class"=>"form-control" ,"required" ,"readonly" ]) }}
                        </div>
                        </div>

                    <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.desc_en')}}</label>
                       <div class="col-md-8">
                    {{ Form::text('desc_en',$phase->desc_en,["class"=>"form-control" ,"required","readonly" ]) }}
                        </div>
                        </div>



                         @php

$status=App\Models\status::get();

@endphp
         
                            <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.status')}}</label>
                        <div class="col-md-8">
                                  <select name="status_id" id="status_id" class="form-control" readonly="" style="padding: 2px;">
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

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.notes')}}</label>
                    
                       <div class="col-md-8">
                           <textarea type="text" name="notes" class="form-control" readonly=""> 
 {{$phase->notes}}
                </textarea> 
                        </div>
                        </div>
                      
            

              
<div class="form-group m-t-40 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.start_date')}}</label>
                        <div class="col-md-3">
                          {{ Form::date('start_date',$phase->start_date,["class"=>"form-control" ,"required" ,"readonly"]) }}
                        </div>
                        

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.end_date')}}</label>
                        <div class="col-md-3">
                          {{ Form::date('end_date',$phase->end_date,["class"=>"form-control" ,"required" ,"readonly"]) }}
                        </div>
                      
</div>

<div class="form-group m-t-40 row">
<label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.delivery_date')}}</label>
                        <div class="col-md-3">
                          {{ Form::date('delivery_date',$phase->delivery_date,["class"=>"form-control" ,"required","readonly" ]) }}
                        </div>


                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.Number_of_hours')}}</label>
                        <div class="col-md-3">
                          {{ Form::number('Number_of_hours',$phase->Number_of_hours,["class"=>"form-control"  ,"readonly"]) }}
                        </div>
 </div>

                    

                         <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.photo')}}</label>
                        <div class="col-md-8">
                          
<img src="{{url('/')}}/public/{{$phase->photo}}" style="height:100px;width:100px">
                         
                        </div>
                        </div>
@php

$attachments=App\Models\attachment::where('phase_id',$phase->id)->get();

@endphp
 <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.attachment phase')}}</label>
                    
        
                    <div class="col-md-8">
             


         <table class="table">
  <thead>
    <tr>
      <th scope="col">{{trans('admin.filename')}}</th>
      <th scope="col">{{trans('admin.name')}}</th>
      <th scope="col">{{trans('admin.title')}}</th>
       
    </tr>
  </thead>
  <tbody>
      @foreach($attachments as $attachment)
    <tr>
   
      <td>
        <a href="{{url('/')}}/public/{{$attachment->filenames}}"  > {{$attachment->filenames}}
       </a>
      </td>

      <td>  
{{$attachment->name}}
       </td>

        <td>  
{{$attachment->title}}
       </td>
       
    </tr>
         @endforeach
     
  </tbody>
</table>
                        </div>


                        </div>






 <div class="card-body">
                                    

                             @foreach($comments as $comment)
                              @php
         $name= App\Models\User::where('id',$comment->developers_id)->first()->name;
         $jobtitle_ar= App\Models\User::where('id',$comment->developers_id)->first()->jobtitle_ar;
       $photo= App\Models\User::where('id',$comment->developers_id)->first()->photo;
                                            @endphp
                                    <div class="activity-item">
                                        <div class="round m-r-20">
        <img src="{{url('/')}}/public/{{$photo}}" alt="user" width="50"></div>
                                        <div class="m-t-10">
                                            <h5 class="m-b-0 font-medium">
                                          {{$name}}
        <span class="text-muted font-14 m-l-10">| &nbsp; {{$comment->created_at->diffForHumans()}}</span></h5>
                         <h6 class="text-muted">{{$jobtitle_ar}} </h6>
                                            <p>
                                              {{$comment->comment}}
                                             </p>
                                             
                                        </div>
                                    </div>
                                 @endforeach
                                    <!-- Activity item-->
                                </div>
                  
                
               
      <form  method ="POST"  action="{{url('/')}}/addcommentphases" enctype="multipart/form-data">

                    
                    @csrf

            <input type="hidden" name="phase_id" value="{{$phase->id}}">
                         <div class="form-group m-t-40 row">
                       
                      
<label for="example-text-input" class="col-md-2 col-form-label" >{{trans('admin.addcomment')}}</label>

                 
            <textarea type="text" name="comment" class="form-control" required=""> 

                </textarea> 

            

                        </div>
                         <div class="form-group m-t-40 row">

                        <button type="submit" name="submit"   class="btn btn-info" >{{trans('admin.addcomment')}}</button>
                   
                 
                       
                  </div>
                   {{ Form::close() }}
              </div>
          </div>
      </div>
  </div>
@endsection

