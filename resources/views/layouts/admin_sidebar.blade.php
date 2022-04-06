    <aside class="left-sidebar">
            <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li> 
                        <a class="waves-effect waves-dark" href="{{url('home')}}" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">{{trans('admin.nav_home')}}</span></a>
                    </li>

            @if(Auth()->user()->type == 'admin')
                     <li> 
                            <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-file"></i>
                                <span class="hide-menu">{{trans('admin.projects')}}</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">


                               
                                <li>
        <a href="{{url('/')}}/projects">{{trans('admin.projects')}}</a>
                                </li>
                                <li><a href="{{url('/')}}/addshow">{{trans('admin.addprojects')}}</a>
                                </li>

                                
                            </ul>
                        </li>



             <li> 
                            <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-file"></i>
                                <span class="hide-menu">{{trans('admin.phases')}}</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">


                               
                     <li><a href="{{url('/')}}/phases">{{trans('admin.phases')}}</a>
                                </li>
                                <li><a href="{{url('/')}}/addphases">{{trans('admin.createphases')}}</a>
                                </li>

                                
                            </ul>
                        </li>


                         <li> 
                            <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-file"></i>
                                <span class="hide-menu">{{trans('admin.statusprojects')}}</span>
                            </a>

                         <ul aria-expanded="false" class="collapse">


                             <li>
                                <a href="{{url('/')}}/status">{{trans('admin.statusprojects')}}</a>
                                </li>
 
                                <li>
                        <a href="{{url('/')}}/addstatus">{{trans('admin.addstatus')}}</a>
                                </li>
                               

                                
                            </ul>
                       </li>
                

             <li> 
                            <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-file"></i>
                                <span class="hide-menu">{{trans('admin.users')}}</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">


                               
                     <li><a href="{{url('/')}}/users">{{trans('admin.users')}}</a>
                                </li>
                                <li><a href="{{url('/')}}/addusers">{{trans('admin.addusers')}}</a>
                                </li>

                                
                            </ul>
     
                        </li>

                          @else

                       <li> 
                        <a class="waves-effect waves-dark" href="{{url('projects')}}" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">{{trans('admin.myprojects')}}</span></a>
                    </li>
                 @endif


  @if(Auth()->user()->type == 'admin')
                   
                       <li> 
<a class="waves-effect waves-dark" href="" aria-expanded="false">
    <i class="mdi mdi-chart-bubble"></i>
  <span class="hide-menu">{{trans('admin.nav_reports')}}</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('/')}}/project_status">{{trans('admin.reports.project_status')}}</a></li>

                                <li><a href="{{url('/')}}/phase_status">{{trans('admin.phase_status')}}</a></li>

         <li><a href="{{url('/')}}/project_period">{{trans('admin.project_period')}}</a></li>
                              
                    <li><a href="{{url('/')}}/developer_phase">{{trans('admin.developer_phase')}}</a></li>
                    <li><a href="{{url('/')}}/adus_phase">{{trans('admin.adus_phase')}}</a></li>
                            </ul>
                        </li>

                    @endif 
                   
                            
                     

                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <div class="page-wrapper">
        @include('layouts.errors')
        @include('layouts.messages')
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">