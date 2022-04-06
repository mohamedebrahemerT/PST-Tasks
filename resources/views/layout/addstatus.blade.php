@extends('admin_temp')
@section('content')
  <div class="row page-titles">
      <div class="col-md-5 align-self-center">
          <h3 class="text-themecolor">{{trans('admin.add_new_status')}}</h3>
      </div>
      <div class="col-md-7 align-self-center">
          <ol class="breadcrumb">
               <li class="breadcrumb-item">{{trans('admin.add_new_status')}}</li>
              <li class="breadcrumb-item"><a href="{{url('status')}}">{{trans('admin.nav_status')}}</a></li>
              <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
          </ol>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-12">
          <div class="card">
              <div class="card-body">
<form  method ="POST"  action="{{url('/')}}/addstatus" enctype="multipart/form-data">

  @csrf
                  <h4 class="card-title" class="text">{{trans('admin.status_info')}}</h4>
                  <hr> 
                             
                 
                </a>

                
          
               

                  <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.title_arr')}}</label>
                        <div class="col-md-8">
                          {{ Form::text('title_ar',null,["class"=>"form-control" ,"required" ]) }}
                        </div>
                        </div>
            

              <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.title_enn')}}</label>
                        <div class="col-md-8">
                          {{ Form::text('title_en',null,["class"=>"form-control" ,"required" ]) }}
                        </div>
                        </div>



              

                 
                 
 
          <div class="center">
                   
          <input type="submit" name="submit" value=" {{trans('admin.send now')}}"  class="btn btn-info">

           
                   
                  </div>
                   {{ Form::close() }}
              </div>
          </div>
      </div>
  </div>
  </form>
@endsection

