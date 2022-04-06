@extends('admin_temp')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.nav_reports_with_admin')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.nav_reports_with_admin')}}</li>
                <li class="breadcrumb-item active"><a href="{{url('home')}}">{{trans('admin.nav_home')}}</a></li>
            </ol>
        </div>
    </div>
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                  {{ Form::open( ['url' => ['adus_phase'],'method'=>'post'] ) }}
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                           <h4>{{trans('admin.search_admin_name')}}</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
             <label>{{trans('admin.admin')}}</label>
              <select name="admin" id="admin" class="form-control" style="padding: 2px;">
                        @foreach(App\Models\User::where('type','admin')->get() as $User)
  <option value="{{$User->id}}">
  
                                            {{$User->name}}
                                         

</option>
 @endforeach
 
</select> 
                                        </div>
                                    </div>
                                     
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label></label>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="text-align: center;">
                                         <div class="form-group">
                                            <label>&nbsp;</label>
                                           <button style="" type="submit" class="btn btn-info"><i class="fa fa-search"></i>&nbsp; {{trans('admin.search')}} </button>
                                        </div>
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    
                        <div class="card-body">
                            <div class="d-flex no-block">
                                <div class="align-self-center">
                                   
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section id="html-headings-default" class="row match-height">
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered">
                                <thead>
                                <tr>
                                <th class="text-lg-center">

             
              @if(session('lang')=='ar')
              {{trans('admin.title_ar')}}
              @elseif(session('lang')=='en')
              {{trans('admin.title_en')}}
              @endif
            </th>


            

         
            
             
            
            <th class="text-lg-center">{{trans('admin.start_datee')}}</th>
            <th class="text-lg-center">{{trans('admin.end_datee')}}</th>
             
             
            <th class="text-lg-center">{{trans('admin.admin')}}</th>
               <th class="center">
                                  @if(session('lang')=='ar')
                                    {{trans('admin.Projectname_ar')}}
                                        @elseif(session('lang')=='en')
                                           {{trans('admin.Projectname_en')}}
                                        @endif

                                     </th>

                                </tr>
                                </thead>
  <tbody>
    
          @foreach($phase as $phase) 
 
             <tr>
             
  
          <td class="text-lg-center">{{$phase->title_ar}}</td>
          
          
          
          
          <td class="text-lg-center">{{$phase->start_date}}</td>
          <td class="text-lg-center">{{$phase->end_date}}</td>
    
           <td class="text-lg-center">
            @php

      

            if(App\Models\phase_projects_teams::where('phases_id',$phase->id)->first() )
            {
            $developers_id=App\Models\phase_projects_teams::where('phases_id',$phase->id)->first()->developers_id;
            }

            $name=App\Models\User::where('id',$developers_id)->first()->name;
            @endphp


            @if($name)
            {{$name}}
            @endif
            
           

        

          </td>
               <td class="text-lg-center">
            
            @php

        if(App\Models\phase_projects_teams::where('phases_id',$phase->id)->first())
        {
           $project_id=App\Models\phase_projects_teams::where('phases_id',$phase->id)->first()->project_id; 
        }
            


            $project=App\Models\projects::where('id',$project_id)->first();
            

            @endphp


            @if(session('lang') == 'ar')
            {{$project->Projectname_ar}}
            @endif

            @if(session('lang') == 'en')
            {{$project->Projectname_en}}
            @endif


          </td>
            </tr>
       @endforeach
     </tbody>
                            </table>
                           
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

