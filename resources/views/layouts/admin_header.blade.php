

        @if(session('lang') == 'ar')



<!DOCTYPE html>
<html lang="en" dir="rtl">
    <head >
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/earlyaccess/droidarabickufi.css">
        <style>
            body {
                font-family: 'Droid Arabic Kufi', serif !important;
                font-size: 48px; 

            }
        </style>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/assets/images/favicon.png') }}">
    


        <!-- Bootstrap Core CSS -->
        <link href="{{ asset('/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
        <!-- This page CSS -->

        <!--c3 CSS -->
        <link href="{{ asset('/assets/plugins/c3-master/c3.min.css') }}" rel="stylesheet">
        <!--Toaster Popup message CSS -->
        <link href="{{ asset('/assets/plugins/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/myStyles.css') }}" rel="stylesheet">
        
        <!-- Dashboard 1 Page CSS -->
        <link href="{{ asset('/css/pages/dashboard1.css') }}" rel="stylesheet">
        <!-- You can change the theme colors from here -->
        <link href="{{ asset('/css/colors/default-dark.css') }}" id="theme" rel="stylesheet">
        <link href="{{ asset('/assets/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('/assets/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

 <!-- Bootstrap Core CSS -->

        @yield('styles')

        
    </head>

    <body class="fix-header fix-sidebar card-no-border">


           @endif


            @if(session('lang') == 'en')


            <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/')}}/en/images/favicon.png">
    <title>Admin Pro Admin Template - The Ultimate Bootstrap 4 Admin Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{url('/')}}/en/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('/')}}/en/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{url('/')}}/en/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="{{url('/')}}/en/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--c3 CSS -->
    <link href="{{url('/')}}/en/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{url('/')}}/en/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{url('/')}}/en/css/style.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{url('/')}}/en/css/pages/dashboard1.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{url('/')}}/en/css/colors/default-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->



        @yield('styles')

</head>

<body class="fix-header fix-sidebar card-no-border" >
  

        @endif