@include('dashboard.userheader')
@extends('dashboard.userleftpanel')
@section('content') 

<style type="text/css">
    .title1
    {
        color: white;font-size: large;font-family: cursive;letter-spacing: 3px;
        /*text-shadow: 1px 2px 2px #e5dcdc;*/
    }
    .title2
    {
        color: black;text-shadow: 3px 3px 4px #e5dcdc;font-size: xx-large;font-family: fantasy;letter-spacing: 3px;
    }
</style>
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
                                <div class="card-body" style="height: 550px;">
                                    <div class="card-left pt-9">
                                       
                                        <h3 class="mb-0 fw-r">
                                            <span class="currency  mr-1"></span>
                                             @if($post_data[0] != null)
                                            <span class="count">{{ $post_data[0]->points }}</span>@else<span> - - </span>
                                            @endif
                                        </h3>
                                        @php  $img1 = $user['today']['images']; @endphp
                                        <p class="title1">Today High Score Of Team</p>
                                        <img src="{{asset('asset/images/solocrown.png')}}" height="100px"></img>
                                        @if($img1 != '')
                                        <img class="user-avatar rounded-circle" src="{{URL('/')}}/uploads/{{$img1}}"  width="160px" height="160px" style="    background-color: white;" /></img>@else
                                        <img class="user-avatar rounded-circle" src="{{asset('asset/images/unknown.jpg')}}" width="160px" height="160px" style="    background-color: white;" /></img>@endif
                                        <p class="text-light"> <b style="color: black">Name :</b>
                                            @if($post_data[0] != null)
                                         {{ucfirst($user['today']['name'])}} @else
                                         <i> None </i> </p>
                                         @endif
                                        <h3 class="title2">Employee of the Day</h3>
                                        
                                    </div><!-- /.card-left -->

                                    

                                </div>

                            </div>
                        </div>
            
        <!-- <?php //echo $post_data[1]; exit; ?>          -->
                      <div class="col-sm-12 col-lg-4" align="center" >
                               <div class="card text-white bg-flat-color-3">
                                <div class="card-body" style="height: 550px;">
                                    <div class="card-left pt-9">
                                        
                                        <h3 class="mb-0 fw-r">
                                            <span class="currency  mr-1"></span>
                                            @if($post_data[1] != null)
                                            <span class="count">{{ $post_data[1]->weekpoints }}</span>@else<span> - - </span>
                                            @endif
                                        </h3>
                                        @php $img2 = $user['week']['images']; @endphp
                                        <p class="title1">This Week High Score</p>
                                        <img src="{{asset('asset/images/king_crown.png')}}" height="100px"></img>
                                        @if($img2 != '')
                                        <img class="user-avatar rounded-circle" src="{{URL('/')}}/uploads/{{$img2}}"  width="160px" height="160px" style="    background-color: white;" /></img>@else
                                        <img class="user-avatar rounded-circle" src="{{asset('asset/images/unknown.jpg')}}" width="160px" height="160px" style="    background-color: white;" /></img>@endif
                                        <p class="text-light"><b style="color: black">Name :</b>
                                            @if($post_data[1] != null)
                                         {{ucfirst($user['week']['name'])}} @else
                                         <i> None </i> </p>
                                         @endif
                                        <h3 class="title2">Employee of the Week</h3>
                                        
                                    </div><!-- /.card-left -->

                                    

                                </div>

                            </div>
                        </div>


                        <div class="col-sm-12 col-lg-4" align="center" >
                               <div class="card text-white bg-flat-color-4">
                                <div class="card-body" style="height: 550px;">
                                    <div class="card-left pt-9">
                                        <h3 class="mb-0 fw-r">
                                            <span class="currency  mr-1"></span>
                                             @if($post_data[2] != null)
                                            <span class="count">{{ $post_data[2]->monthpoints }}</span>@else<span> - - </span>
                                            @endif
                                        </h3>
                                        @php $img3 = $user['month']['images']; @endphp
                                        <p class="title1">This Month High Score</p>
                                        <img src="{{asset('asset/images/diamond.png')}}" height="100px"></img>
                                        @if($img3 != '')
                                        <img class="user-avatar rounded-circle" src="{{URL('/')}}/uploads/{{$img3}}"  width="160px" height="160px" style="    background-color: white;" /></img>@else
                                        <img class="user-avatar rounded-circle" src="{{asset('asset/images/unknown.jpg')}}" width="160px" height="160px" style="    background-color: white;" /></img>@endif
                                        <p class="text-light"><b style="color: black">Name :</b>
                                            @if($post_data[2] != null)
                                         {{ucfirst($user['month']['name'])}} @else
                                         <i> None </i> </p>
                                         @endif
                                        <h3 class="title2">Employee of the Month</h3>
                                        
                                    </div><!-- /.card-left -->

                                    

                                </div>

                            </div>
                        </div>
            
                </div>


        </div>
        </div>

                    
@include('dashboard.userfooter')
@endsection
            

            
        