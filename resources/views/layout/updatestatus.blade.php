@extends('admin_temp')
@section('content')
  <div class="row page-titles">
      <div class="col-md-5 align-self-center">
          <h3 class="text-themecolor">{{trans('admin.updatestatus')}}</h3>
      </div>
      <div class="col-md-7 align-self-center">
          <ol class="breadcrumb">
               <li class="breadcrumb-item">{{trans('admin.updatestatus')}}</li>
              <li class="breadcrumb-item"><a href="{{url('papers')}}">{{trans('admin.nav_status')}}</a></li>
              <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
          </ol>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-12">
          <div class="card">
              <div class="card-body">

                  <h4 class="card-title" class="text">{{trans('admin.status_info')}}</h4>
                  <hr> 
                 

                   <form  method ="POST"  action="{{url('/')}}/updatestatus" enctype="multipart/form-data" >

                    
                    @csrf
                


         <input type="hidden"  value="{{$status->id}}" name="status_id" >

                  <div class="form-group m-t-40 row" >

                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.title_arr')}}</label>
                        <div class="col-md-8">
          {{ Form::text('title_ar',$status->title_ar,["class"=>"form-control" ,"required" ]) }}
                        </div>


                  </div>
                  <div class="form-group m-t-40 row" >

                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.title_enn')}}</label>
                        <div class="col-md-8">
          {{ Form::text('title_en',$status->title_en,["class"=>"form-control" ,"required" ]) }}
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

