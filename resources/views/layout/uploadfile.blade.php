@extends('admin_temp')
@section('content')
<html lang="en">

<head>

  <title>File Upload 
   @if(session('lang')=='ar')
                                    {{trans('admin.Projectname_ar')}}
                                        @elseif(session('lang')=='en')
                                           {{trans('admin.Projectname_en')}}
                                        @endif
 

  </title>

  <script src="jquery/1.9.1/jquery.js"></script>

  <link rel="stylesheet" href="3.3.6/css/bootstrap.min.css">

</head>

<body>


<div class="container lst">


@if (count($errors) > 0)

<div class="alert alert-danger">

    <strong>Sorry!</strong> There were more problems with your HTML input.<br><br>

    <ul>

      @foreach ($errors->all() as $error)

          <li>{{ $error }}</li>

      @endforeach

    </ul>

</div>

@endif


@if(session('success'))

<div class="alert alert-success">

  {{ session('success') }}

</div> 

@endif


<h3 class="well" style="text-align: center;"> 

 
                
                              {{trans('admin.projectname')}}:


                               @if(session('lang') == 'ar')
                                    {{$project->Projectname_ar}}
                                    @endif

                                    @if(session('lang') == 'en')

                                    {{$project->Projectname_en}}
                                    
                                    @endif
                                        


                                    </h3>
                                    <br>

<form method="post" action="{{url('uploadfileprojectpost')}}" enctype="multipart/form-data">

  {{csrf_field()}}



<input type="hidden" name="project_id" value="{{$project->id}}">


 <label>{{trans('admin.Please upload')}}</label>
   <br>
    <div class="input-group hdtuto control-group lst increment" >

      <input type="file" name="filenames[]" class="myfrm form-control">
       <input type="text" name="name[]" class="myfrm form-control" placeholder="{{trans('admin.name')}}">
        <input type="text" name="title[]" class="myfrm form-control" placeholder="{{trans('admin.note')}}">


      <div class="input-group-btn"> 

        <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>{{trans('admin.Add more')}}</button>

      </div>

    </div>

    <div class="clone hide">

      <div class="hdtuto control-group lst input-group" style="margin-top:10px">

        <input type="file" name="filenames[]" class="myfrm form-control">
        <input type="text" name="name[]" class="myfrm form-control" placeholder="{{trans('admin.name')}}">
        <input type="text" name="title[]" class="myfrm form-control" placeholder="{{trans('admin.note')}}">

         

      </div>

    </div>


    <button type="submit" class="btn btn-success" style="margin-top:10px">{{trans('admin.Submit')}}</button>


</form>        

</div>

@push('js')
<script type="text/javascript">

    $(document).ready(function() {

      $(".btn-success").click(function(){ 

          var lsthmtl = $(".clone").html();

          $(".increment").after(lsthmtl);

      });

      $("body").on("click",".btn-danger",function(){ 

          $(this).parents(".hdtuto control-group lst").remove();

      });

    });

</script>
@endpush

</body>

</html>
@endsection