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



            
              
                  <?php 
                      if(isset($post_data))
                      {  ?>

                      <h2> Your Today Post </h2> <br/>
                      <!-- echo "<pre>"; print_r(json_decode($post_data->options, true)); exit(); -->
                      <div class="form-group">
                     1. <label>{{$post_data->question}}</label>
                      <br/><br/>
                      @php
                       
                       $q = 1; $no = ['a)','b)','c)','d)','e)','f)'];

                      $array = $post_data['options'];
                      $options = json_decode($array, true);
                      $count = count($options);

                      @endphp
                      <div class="row col-sm-12">
                      @for ($i=0;$i<$count;$i++)
                      <br />
                      <div class="col-sm-3"> {{$no[$i]}}   {{$options[$i]['options']}} </div>
                      @endfor
                     </div>

                     
                     <div class="row col-sm-12"> <label><br/> Answer :  </label> <label style="color: blue;"> <br/>&nbsp;&nbsp;{{ $options[ $post_data->answer]['options'] }}</label> </div>


                     </div>
                                    
                            
                 <?php  }
                            else

                      { ?>
                    <div class="row">   
                      <a href="{{ route('updatequestioninput') }}" class="col-sm-12 col-lg-12" >
                               <div class="card text-white bg-flat-color-1">
                                <div class="card-body">
                                    <div class="card-left pt-1 float-left">
                                        <h3 class="mb-0 fw-r">
                                            <span class="currency float-left mr-1"></span>
                                            <span class="">Post Today Question</span>
                                        </h3>
                                        <p class="text-light mt-1 m-0"></p>
                                    </div><!-- /.card-left -->

                                    <div class="card-right float-right text-right">
                                        <!-- <i class="icon fade-5 icon-lg pe-7f-cart"></i> -->
                                        <i class="fa fa-comment-o" style="font-size:60px"></i>
                                    </div><!-- /.card-right -->

                                </div>

                            </div>
                        </a>

                       <?php } ?>


                    <a href="{{ route('attendquiz') }}" class="col-sm-12 col-lg-12" >
                        <div class="card text-white bg-flat-color-3">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="">Attend Today Quiz</span>
                                    </h3>
                                    <p class="text-light mt-1 m-0"></p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                    <!-- <i class="icon fade-5 icon-lg pe-7f-users"></i> -->
                                    <i class="fa fa-check-square" style="font-size:60px;"></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </a>



                    </div>
        </div>
@include('dashboard.userfooter')
@endsection
            

            
