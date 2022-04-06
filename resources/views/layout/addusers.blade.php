@extends('admin_temp')
@section('content')
  <div class="row page-titles">
      <div class="col-md-5 align-self-center">
          <h3 class="text-themecolor">{{trans('admin.add_new_User')}}</h3>
      </div>
      <div class="col-md-7 align-self-center">
          <ol class="breadcrumb">
               <li class="breadcrumb-item">{{trans('admin.add_new_User')}}</li>
              <li class="breadcrumb-item"><a href="{{url('users')}}">{{trans('admin.nav_User')}}</a></li>
              <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
          </ol>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-12">
          <div class="card">
              <div class="card-body">
<form  method ="POST"  action="{{url('/')}}/addusers" enctype="multipart/form-data">

  @csrf
                  <h4 class="card-title" class="text">{{trans('admin.users_info')}}</h4>
                  <hr> 
                             
                 
                </a>

                
            <div class="form-group m-t-40 row" >

                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.name')}}</label>
                        <div class="col-md-8">
                          {{ Form::text('name',null,["class"=>"form-control" ,"required"]) }}
                        </div>


                  </div>
                  <div class="form-group m-t-40 row" >

                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.email')}}</label>
                        <div class="col-md-8">
                          {{ Form::email('email',null,["class"=>"form-control" ,"required"]) }}
                        </div>
                      </div>

                      <div class="form-group m-t-40 row" >

                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.password')}}</label>
                        <div class="col-md-8" >

        {{ Form::password('password',null,["class"=>"form-control" ,"required"]) }}
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
                          {{ Form::number('phonenumber',null,["class"=>"form-control" ,"required"]) }}
                        </div>
                      </div>

                       <div class="form-group m-t-40 row" >

                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.address')}}</label>
                        <div class="col-md-8">
                          {{ Form::text('address',null,["class"=>"form-control" ,"required"]) }}
                        </div>
                      </div>
                       
                      <div class="form-group m-t-40 row" >

                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.gender')}}</label>
                        <div class="col-md-8">
     <select name="gender" id=" " class="form-control" style="padding: 2px;"> 
      
  <option value="male">{{trans('admin.male')}}</option>
  <option value="female">{{trans('admin.female')}}</option>
 
</select> 
                        </div>
                      </div>


                  <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.jobtitle_ar')}}</label>
                        <div class="col-md-8">
                          {{ Form::text('jobtitle_ar',null,["class"=>"form-control" ,"required" ]) }}
                        </div>
                        </div>
            

              <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.jobtitle_en')}}</label>
                        <div class="col-md-8">
                          {{ Form::text('jobtitle_en',null,["class"=>"form-control" ,"required" ]) }}
                        </div>
                        </div>



              <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.status')}}</label>
                        <div class="col-md-8">
                          <select name="status" id="status" class="form-control"  style="padding: 2px;">
  <option value="available">{{trans('admin.available')}}</option>
  <option value="notavailable">{{trans('admin.notavailable')}}</option>
 
</select> 
                        </div>
                        </div>

                              
                       

                         <div class="form-group m-t-40 row">

                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.photo')}}</label>
                        <div class="col-md-8">
                          {{ Form::file('photo',null,["class"=>"form-control" , "required"  ]) }}
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

