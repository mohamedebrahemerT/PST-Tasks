                                                                
@extends('admin_temp')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.nav_users')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.nav_users')}}</li>
                <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
            </ol>
        </div>
    </div>
        <!-- /.card-header -->
     <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{url('addusers')}} " style="font-size:150%;"
                       class="btn btn-info btn-bg">{{trans('admin.add_user')}}</a>

                </div>
                <div class="table-responsive">

                   <!-- Start home table -->
                   <h4 class="card-title">{{trans('admin.nav_users')}} <code>

                   </code>

                   </h4> 
                    <table id="myTable" class="table full-color-table full-primary-table">
                        <thead>
                           
                            <tr>
            <th class="text-lg-center">id</th>
                                <th class="text-lg-center">

@if(session('lang')=='ar')
                                    {{trans('admin.name_ar')}}
                                        @elseif(session('lang')=='en')
                                           {{trans('admin.name_en')}}
                                        @endif




                                </th>
                    <th  class="text-lg-center">
                            {{trans('admin.email')}}
                        </th>
                        <th  class="text-lg-center">
                            {{trans('admin.phonenumber')}}
                        </th>
                       <th  class="text-lg-center">
                            {{trans('admin.address')}}
                        </th>
                         
                       
                        <th  class="text-lg-center">
                            {{trans('admin.gender')}}
                        </th>
                                
                                <th class="text-lg-center">

@if(session('lang')=='ar')
                                    {{trans('admin.jobtitle_ar')}}
                                        @elseif(session('lang')=='en')
                                           {{trans('admin.jobtitle_ar')}}
                                        @endif



                            </th>
                               
                                <th class="text-lg-center">{{trans('admin.status')}}</th>
                                <th class="text-lg-center">{{trans('admin.photo')}}</th>



                                   <th class="text-lg-center">{{trans('admin.edit')}}</th>
       
                             

                           
                            </tr>

                              

                           
                            </tr>
                           
                        </thead>
                        <tbody>
                      
                            <tr>
     @foreach($users as $User) 
             <td class="text-lg-center">{{$User->id}}</td>  
                                <td class="text-lg-center">
                                	{{$User->name}}</td>
                                   <td class="text-lg-center">
                                    {{$User->email}}</td>
                                    <td class="text-lg-center">
                                    {{$User->phonenumber}}</td>
                                    <td class="text-lg-center">
                                    {{$User->address}}</td>
                                     
                                
                     <td class="text-lg-center">
                                    {{$User->gender}}</td>
                                 
                                 <td class="text-lg-center">
                                 	{{$User->jobtitle_ar}}</td>
                                 
                                 <td class="text-lg-center">
                                    @if($User->status == 'notavailable')
                                    {{trans('admin.notavailable')}}
                                 	@endif

 @if($User->status == 'available')
                                    {{trans('admin.available')}}
                                    @endif
                                    
 @if($User->status == 'active')
                                    {{trans('admin.active')}}
                                    @endif

                                 </td>
                                 <td class="text-lg-center">

                                    <img src="{{url('/')}}/public/{{$User->photo}}" style="height: 50px;width: 50px" required="">
                                    

                                </td>
                                 <td class="text-lg-center">
 <a href="{{url('/')}}/User/{{$User->id}}/edit">
    
                 <button class="btn btn-success">{{trans('admin.edit')}}</button>
                
                                </td>
        </a>
     

                              </a>
                 
                            </tr>
             @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
@endsection