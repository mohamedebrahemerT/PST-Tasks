@extends('admin_temp')
@section('content')
  <div class="row page-titles">
      <div class="col-md-5 align-self-center">
          <h3 class="text-themecolor">{{trans('admin.update_user')}}</h3>
      </div>
      <div class="col-md-7 align-self-center">
          <ol class="breadcrumb">
               <li class="breadcrumb-item">{{trans('admin.update_user')}}</li>
              <li class="breadcrumb-item"><a href="{{url('users')}}">{{trans('admin.nav_users')}}</a></li>
              <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
          </ol>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-12">
          <div class="card">
              <div class="card-body">
              <h4 class="card-title">{{trans('admin.club_info')}}</h4>
              <hr>
              {!! Form::model($user_data, ['route' => ['users.update',$user_data->id] , 'method'=>'put' ,'files'=> true]) !!}
              {{ csrf_field() }}

              <div class="form-group m-t-40 row">
                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.name')}}</label>
                        <div class="col-md-10">
                          {{ Form::text('name',$user_data->name,["class"=>"form-control" ,"required"]) }}
                        </div>
                  </div>
                  <div class="form-group m-t-40 row">
                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.email')}}</label>
                        <div class="col-md-10">
                          {{ Form::email('email',$user_data->email,["class"=>"form-control" ,"required"]) }}
                        </div>
                  </div>
                  <div class="form-group row">
                      <label for="example-password-input" class="col-md-2 col-form-label">{{trans('admin.password')}}</label>
                        <div class="col-md-10">
                          <input class="form-control" type="password" name="password"  id="example-password-input" >
                        </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-password-input2" class="col-md-2 col-form-label">{{trans('admin.password_confirmation')}}</label>
                      <div class="col-md-10">
                          <input class="form-control" type="password" name="password_confirmation"  id="example-password-input2" >
                      </div>
                  </div>
                  @if(auth()->user()->type == 'super admin')
                    <div class="form-group row">
                        <label for="example-month-input" class="col-md-2 col-form-label">{{trans('admin.city_name')}}</label>
                        <div class="col-md-10">
                            {{ Form::select('city_id',$cities,$user_data->city_id,["class"=>"custom-select col-12"]) }}
                        </div>
                    </div>
                  @endif

              <div class="center">
                  {{ Form::submit( trans('admin.public_Edit') ,['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}
              </div>

                  {{ Form::close() }}
              </div>
          </div>
      </div>
  </div>
@endsection

