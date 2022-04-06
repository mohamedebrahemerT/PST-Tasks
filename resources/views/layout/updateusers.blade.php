@extends('admin_temp')
@section('content')
  <div class="row page-titles">
      <div class="col-md-5 align-self-center">
          <h3 class="text-themecolor">{{trans('admin.updateusers')}}</h3>
      </div>
      <div class="col-md-7 align-self-center">
          <ol class="breadcrumb">
               <li class="breadcrumb-item">{{trans('admin.updateusers')}}</li>
              <li class="breadcrumb-item"><a href="{{url('users')}}">{{trans('admin.users')}}</a></li>
              <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
          </ol>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-12">
          <div class="card">
              <div class="card-body">

                  <h4 class="card-title" class="text">{{trans('admin.user_info')}}</h4>
                  <hr> 
                   <a href="{{url('layout.updateusers')}}">  

                   <form  method ="POST"  action="{{url('/')}}/updateusers" enctype="multipart/form-data">

                    
                    @csrf
       
                  
                </a>

         <input type="hidden"  value="{{$users->id}}" name="User_id">

                  <div class="form-group m-t-40 row" >

                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.name')}}</label>
                        <div class="col-md-8">

          {{ Form::text('name',$users->name,["class"=>"form-control" ,"required"]) }}
                        </div>


                  </div>
            <div class="form-group m-t-40 row" >

                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.email')}}</label>
                        <div class="col-md-8">
           {{ Form::email('email',$users->email,["class"=>"form-control" ,"required"]) }}
                       
                  </div>
                    </div>
                    
                      <div class="form-group m-t-40 row" >

                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.password')}}</label>
                        <div class="col-md-8">
        {{ Form::password('password',["class"=>"form-control" ,"required"]) }}
                        </div>
                      </div>

                       <div class="form-group m-t-40 row" >

                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.type')}}</label>
                      <div class="col-md-8">
           <select name="type" id="type" class="form-control" style="padding: 2px;">


<option value="admin">{{trans('admin.admin')}}</option>

<option value="user">{{trans('admin.user')}}</option>

 
</select> 





</div>
                      </div>
            <div class="form-group m-t-40 row" >

                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.phonenumber')}}</label>
                        <div class="col-md-8">
           {{ Form::text('phonenumber',$users->phonenumber,["class"=>"form-control" ,"required"]) }}
                        </div>


                  </div>
                  <div class="form-group m-t-40 row" >

                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.address')}}</label>
                        <div class="col-md-8">
           {{ Form::text('address',$users->address,["class"=>"form-control" ,"required"]) }}
                        </div>


                  </div>

 <div class="form-group m-t-40 row" >

                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.gender')}}</label>
                        <div class="col-md-8">

             <select name="gender" id="gender" class="form-control" style="padding: 2px;">

  <option   value="male" @if($users->gender=='male') selected @endif>{{trans('admin.male')}}</option>


  <option value="female" 
  @if($users->gender=='female')
   selected @endif>{{trans('admin.female')}}</option>
 
</select> 
                        </div>
                      </div>





                  <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.jobtitle_ar')}}</label>
                       <div class="col-md-8">
                    {{ Form::text('jobtitle_ar',$users->jobtitle_ar,["class"=>"form-control" ,"required" ]) }}
                        </div>
                        </div>
                         <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.jobtitle_en')}}</label>
                       <div class="col-md-8">
                    {{ Form::text('jobtitle_en',$users->jobtitle_en,["class"=>"form-control" ,"required" ]) }}
                        </div>
                        </div>

                 

                   <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.status')}}</label>
                        <div class="col-md-8">
                          <select name="status" id="status" class="form-control" style="padding: 2px;">


  <option value="available" @if($users->gender=='available') selected @endif>{{trans('admin.available')}}</option>
  <option value="notavailable" @if($users->gender=='notavailable') selected @endif>{{trans('admin.notavailable')}}</option>
 
</select> 
                        </div>
                        </div>
                       
                       

                         <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.photo')}}</label>
                        <div class="col-md-8">
                           <img src="{{url('/')}}/public/{{$users->photo}}" style="height: 50px;width: 50px">

                          {{ Form::file('photo',["class"=>"form-control"  ]) }}
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

