@extends('admin_temp')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.nav_reports_with_date')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.nav_reports_with_date')}}</li>
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
                  {{ Form::open( ['url' => ['project_period'],'method'=>'post'] ) }}
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                           <h4>{{trans('admin.search_period')}}</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
         <label>{{trans('admin.period_from')}}</label>
<input type="date" value=" "  required class="form-control" id="from_date" name="from_date">
                                        </div>
                                    </div>

                               <div class="col-md-3">
                                        <div class="form-group">
                                            <label>{{trans('admin.period_to')}}</label>
                                            <input type="date" value=" "  required class="form-control" id="from_date" name="to_date">
                                        </div>
                                    </div>

                                     <div class="col-md-3">
                                        <div class="form-group">
             <label>{{trans('admin.status')}}</label>
              <select name="status" id="status" class="form-control" style="padding: 2px;">
                       
  <option value="1">
  تاريخ تسجيل المشروع

</option>


<option value="2">
   تاريخ بداية المشروع

</option>

<option value="3">
    تاريخ التسليم

</option>
 
 
</select> 
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
                                    <th class="center"> @if(session('lang')=='ar')
                                    {{trans('admin.Projectname_ar')}}
                                        @elseif(session('lang')=='en')
                                           {{trans('admin.Projectname_en')}}
                                        @endif
                                    </th>
                                    

                                    <th class="center">{{trans('admin.registration_date')}}</th>
                                    
                                    <th class="center">{{trans('admin.start_date')}}</th>
                                    <th class="center">{{trans('admin.delivery_date')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                   @foreach($project as $project)
                                        <tr>
                                            <th class="center">
                                                {{$project->Projectname_ar}}
                                            </th>
                     
                                            <th class="center">{{$project->registration_date}}
                                            </th>
                                            
                                            <th class="center">{{$project->start_date}}</th>
                                            <th class="center">{{$project->delivery_date}}</th>
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

