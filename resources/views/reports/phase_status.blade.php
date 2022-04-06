@extends('admin_temp')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.nav_reports_with_phase')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.nav_reports_with_phase')}}</li>
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
                  {{ Form::open( ['url' => ['phase_status'],'method'=>'post'] ) }}
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                           <h4>{{trans('admin.search_phase_status')}}</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
             <label>{{trans('admin.status')}}</label>
              <select name="status_id" id="status" class="form-control" style="padding: 2px;">
                        @foreach(App\Models\status::get() as $status)
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
                               
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section id="html-headings-default" class="row match-height">
                <div class="col-sm-12 col-md-12">
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered">
                                <thead>
                                <tr>
                          <th class="center">
                                  @if(session('lang')=='ar')
                                    {{trans('admin.Projectname_ar')}}
                                        @elseif(session('lang')=='en')
                                           {{trans('admin.Projectname_en')}}
                                        @endif

                                     </th>
                                    <th class="center">

                                           @if(session('lang')=='ar')
                                            {{trans('admin.title_ar')}}
                                        @elseif(session('lang')=='en')
                                           {{trans('admin.title_en')}}
                                        @endif
                                    </th>

                                    <th class="center">{{trans('admin.status')}}</th>

                                    
                                    
                                    <th class="center">{{trans('admin.start_datee')}}</th>

                                    <th class="center">{{trans('admin.delivery_date')}}</th>


                                </tr>
                                </thead>
                                <tbody>
                                   @foreach($phase as $phase)
                                        <tr>
                                            
                                                  <td class="center">
@php
$project_id=App\Models\phase_projects_teams::where('phases_id',$phase->id)->first()->project_id;
$project=App\Models\projects::where('id',$project_id)->first();


@endphp


                            @if(session('lang') == 'ar')
            {{$project->Projectname_ar}}
            @endif

            @if(session('lang') == 'en')
            {{$project->Projectname_en}}
            @endif


                                            
                                             </td>

                                           
                                            <td class="center">{{$phase->title_ar}}</td>
                                            <td class="center">
                                                
@php
$status=App\Models\status::where('id',$phase->status_id)->first();
@endphp

                                        @if(session('lang') =='ar')
                                    {{$status->title_ar}}
                                        @elseif(session('lang')=='en')
                                           {{$status->title_en}}
                                        @endif
</td>
                                            
                                           
                                            
                                            <td class="center">{{$phase->start_date}}</td>
                                            <td class="center">{{$phase->delivery_date}}</td>
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

