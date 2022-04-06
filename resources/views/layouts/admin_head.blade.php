    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader" >
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">{{trans('admin.Bitdashboard')}}</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" style="background-color:#f2f2f2;">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header" >
                    <a class="navbar-brand" href="">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                     <!--        <img src="{{ asset('/assets/images/logo-icon.png') }}" alt="homepage" class="dark-logo" />
                            Light Logo icon
                            <img src="{{ asset('/assets/images/logo-light-icon.png') }}" alt="homepage" class="light-logo" /> -->
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                      <image src="{{url('/')}}/bit.png" style="
    width: 66%;"></image>

                          </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse" >
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
     <li class="nav-item" style="color: #004cff;"> 
        <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)">
        <i class="ti-menu" style="color: #004cff;">
            
        </i>
    </a> </li>
                        <li class="nav-item" style="color: #004cff;"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu" style="color: #004cff;"></i></a> </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                      
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->

    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        @if(App::getLocale() == 'ar')
                            <i class="flag-icon flag-icon-kw"></i>
                        @else
                            <i class="flag-icon flag-icon-us"></i>
                        @endif
                    </a>
                       <div class="dropdown-menu dropdown-menu-right animated bounceInDown">
                        @if(App::getLocale() == 'ar')
                            <a class="dropdown-item" href="{{url('/')}}/language/en">
                               <i class="flag-icon flag-icon-us"></i> English
                            </a>
                        @else
                            <a class="dropdown-item" href="{{url('/')}}/language/ar">
                                <i class="flag-icon flag-icon-kw"> </i> العربية
                            </a>
                        @endif   
                </li>


                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('/assets/images/users/1.jpg') }}" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <ul class="dropdown-user">
                                    <li>
                                        
                                    </li>
                                    <li>
                                        <a class="fa fa-power-off" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{trans('admin.logout')}}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>