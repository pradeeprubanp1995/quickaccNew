@include('dashboard.userheader')
@extends('dashboard.userleftpanel')
@section('content') 

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>

        <div class="content">

        <!-- <?php //echo "<pre>";print_r($post_data[1]);exit; ?> -->

            <div class="breadcrumbs">
                <div class="breadcrumbs-inner">
                <div class="row">   
                      <div class="col-sm-12 col-lg-4" align="center" >
                               <div class="card text-white bg-flat-color-1">
                                <div class="card-body" style="height: 500px;">
                                    <div class="card-left pt-9">
                                        <h3 class="mb-0 fw-r">
                                            <span class="currency  mr-1"></span>
                                            <span class="count">{{ $post_data[0]->points }}</span>
                                        </h3>
                                        <p class="text-light">Today High Score</p>
                                    </div><!-- /.card-left -->

                                    

                                </div>

                            </div>
                        </div>
            
                 
                      <div class="col-sm-12 col-lg-4" align="center" >
                               <div class="card text-white bg-flat-color-3">
                                <div class="card-body" style="height: 500px;">
                                    <div class="card-left pt-9">
                                        <h3 class="mb-0 fw-r">
                                            <span class="currency  mr-1"></span>
                                            <span class="count">{{ $post_data[1]->weekpoints }}</span>
                                        </h3>
                                        <p class="text-light">Last Week High Score</p>
                                    </div><!-- /.card-left -->

                                    

                                </div>

                            </div>
                        </div>


                        <div class="col-sm-12 col-lg-4" align="center" >
                               <div class="card text-white bg-flat-color-4">
                                <div class="card-body" style="height: 500px;">
                                    <div class="card-left pt-9">
                                        <h3 class="mb-0 fw-r">
                                            <span class="currency  mr-1"></span>
                                            <span class="count">{{ $post_data[2]->monthpoints }}</span>
                                        </h3>
                                        <p class="text-light">Last Month High Score</p>
                                    </div><!-- /.card-left -->

                                    

                                </div>

                            </div>
                        </div>
            
                </div>


        </div>
        </div>
                    
@include('dashboard.userfooter')
@endsection
            

            
        