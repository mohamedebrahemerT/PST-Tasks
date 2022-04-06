@extends('admin_temp')
@section('content')
  <div class="row page-titles">
      <div class="col-md-5 align-self-center">
          <h3 class="text-themecolor">{{trans('admin.viewproject')}}</h3>
      </div>
      <div class="col-md-8 align-self-center">
          <ol class="breadcrumb">
               <li class="breadcrumb-item">{{trans('admin.viewproject')}}</li>
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
                   <img src="{{url('/')}}/public/{{$project->photo}}" style="height:100px;width:100px">
                  <hr> 
                   <a href="{{url('layout.projects')}}">  

                  
                </a>

                         @php

$status=App\Models\status::get();

@endphp

<div class="row">
    <div class="col-md-3">
      {{trans('admin.Projectname_ar')}}:
{{$project->Projectname_ar}}
    </div>
    <div class="col-md-3">
      {{trans('admin.Projectname_en')}}:
            {{$project->Projectname_en}}
    </div>

    <div class="col-md-3">
      {{trans('admin.status')}}:

@php

$stat=App\Models\status::where('id',$project->status_id)->first();

@endphp
                                        @if(session('lang')=='ar')

                            {{$stat->title_ar}}
                                        @elseif(session('lang')=='en')
                                           {{$stat->title_en}}
                                        @endif

    </div>

    <div class="col-md-3">
      {{trans('admin.desc_arr')}}:
{{$project->desc_ar}}

    </div>
</div>
<br>
             <div class="row">
    <div class="col-md-3">
        {{trans('admin.desc_en')}}:
{{$project->desc_en}}

    </div>
    <div class="col-md-3">
      {{trans('admin.registration_date')}}:
{{$project->registration_date}}

    </div>

     <div class="col-md-3">
      {{trans('admin.start_date')}}:
{{$project->start_date}}

    </div>

     <div class="col-md-3">
      {{trans('admin.end_date')}}:
{{$project->end_date}}

    </div>

    </div>   
 
      <br>
      <div class="row">
    <div class="col-md-3">
      {{trans('admin.notes')}}:
{{$project->notes}}

    </div>

    


  </div>

                
  
 

  

      @php

$attachments=App\Models\attachment::where('project_id',$project->id)->get();

@endphp
 <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.attachment project')}}</label>
                    
        
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


       <img src="{{url('/')}}/public/{{$photo}}" alt="user" width="50">


              

            </div>
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



 <form  method ="POST"  action="{{url('/')}}/addcommentProject" enctype="multipart/form-data">

               
                    @csrf

               <input type="hidden" name="project_id" value="{{$project->id}}">
                         <div class="form-group m-t-40 row">
                       
                     
<label for="example-text-input" class="col-md-2 col-form-label" >{{trans('admin.addcomment')}}</label>

                 
            <textarea type="text" name="comment" class="form-control" required=""> 

                </textarea> 
          
                 <div  >
                   <br>

                        <button type="submit" name="submit"   class="btn btn-info" >{{trans('admin.addcomment')}}</button>
                        
              </form>

              </div>

                        </div>

                        
                         
                        </div>



                   
                  
                        
                  </div>
                  
              </div>
          </div>
      </div>

@endsection

