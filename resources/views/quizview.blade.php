@include('dashboard.userheader')
@extends('dashboard.userleftpanel')
@section('content') 







        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>QUIZ</h1>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>

        <div class="content"> 
@if (\Session::has('success'))
<div class="alert alert-success">
<p>{{ \Session::get('success') }}</p>
</div><br />
@endif


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif 



        <!-- <?php  //echo "<pre>"; print_r($post_data[0]); exit; ?> -->
               <div class="row"> 
                  <div class="col-sm-12 col-lg-12" >
                        <div class="card text-white bg-flat-color-3">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="">Today :</span>
                                    </h3>
                                     <p class="text-light mt-8 m-20" align="center">
                                     <span >Title : </span>
                                         <?php  if(isset($post_data[1])) 
                                         { ?>
                                              <a  class="tit" href="{{ route('attendquiz') }}" > {{ $post_data[1][0]->title_name }} </a>
                                          <?php } else echo "<span> Title will be upload soon </span>"; ?>
                                        </p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                    <!-- <i class="icon fade-5 icon-lg pe-7f-users"></i> -->
                                    <i class="fa fa-check-square" style="font-size:60px;"></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>



                      
                      <div class="col-sm-12 col-lg-12" >
                               <div class="card text-white bg-flat-color-1">
                                <div class="card-body">
                                    <div class="card-left pt-1 float-left">
                                        <h3 class="mb-0 fw-r">
                                            <span class="currency float-left mr-1"></span>
                                            <span class="">Tommorrow :</span>
                                        </h3>
                                        
                                        <p class="text-light mt-8 m-20" align="center">
                                        <span >Title : </span>
                                         <?php  if(isset($post_data[0])) 
                                         { ?>
                                              <a  class="tit" href="{{ route('updatequestioninput') }}" > {{ $post_data[0][0]->title_name }} </a>
                                          <?php } else echo "<span > Title will be upload soon </span>"; ?>
                                        </p>
                                    </div><!-- /.card-left -->

                                    <div class="card-right float-right text-right">
                                        <!-- <i class="icon fade-5 icon-lg pe-7f-cart"></i> -->
                                        <i class="fa fa-comment-o" style="font-size:60px"></i>
                                    </div><!-- /.card-right -->

                                </div>

                            </div>
                        </div>


                      


                    



                    </div>
        </div>

        <style type="text/css">
          .tit
          {
            font-size: 25px;
            color: white;
            text-decoration:none;
          }
          .tit:hover
          {
            /*color: white;*/
            font-size: 25px;
            text-decoration:none;
          }
          span
          {
            font-size: 25px;
          }
        </style>
@include('dashboard.userfooter')
@endsection
            

            
