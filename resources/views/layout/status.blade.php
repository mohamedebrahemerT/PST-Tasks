@extends('admin_temp')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.nav_status')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.nav_status')}}</li>
                <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
            </ol>
        </div>
    </div>
        <!-- /.card-header -->
     <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{url('addstatus')}}" style="font-size:150%;"
                       class="btn btn-info btn-bg">{{trans('admin.add_status')}}</a>

                </div>
                <div class="table-responsive">

                   <!-- Start home table -->
                   <h4 class="card-title">{{trans('admin.nav_status')}} <code>

                   </code>

                   </h4> 
                    <table id="myTable" class="table full-color-table full-primary-table">
                        <thead>
                            <tr>
                                <th class="text-lg-center">id</th>
                                <th class="text-lg-center">

                               
                            @if(session('lang')=='ar')
                                            {{trans('admin.title_arr')}}
                                        @elseif(session('lang')=='en')
                                           {{trans('admin.title_enn')}}
                                        @endif
                                    </th>


                               

                                   

                                
                                
                                


                          
                                <th class="text-lg-center">
 
                 {{trans('admin.edit')}}
                 
                                </th>

       
  

        

                            </tr>
                        </thead>
                        <tbody>
                  <tr>
                @foreach($status as $status)
                       <td class="text-lg-center">{{$status->id}}</td>
                        <td class="text-lg-center">{{$status->title_ar}}</td>
                     
                        
                 
                    
                            
                
            
                <td class="text-lg-center">

<a href="{{url('/')}}/status/{{$status->id}}/edit">
            <button class="btn btn-success">{{trans('admin.edit')}}</button>
</a>
                        </td>
                   
                   
     
                          
                 
                 
                            </tr>
                 @endforeach  
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
@endsection