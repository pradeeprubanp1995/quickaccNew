@include('dashboard.userheader')
@extends('dashboard.userleftpanel')
@section('content') 
    
<?php $img = Auth::user()->images;  ?>



<div id="home">
       

        <!-- second header -->
        <div class="main-top">
            <div class="container" >
                <div class="header d-md-flex  py-3">
                    
                   
                    <!-- nav -->
                    <div class="nav_w3ls" style="padding-top:8px;">

                        <div id="menu-bar">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </div>
                        <nav>
                            <label for="drop" class="toggle">Menu</label>
                            <input type="checkbox" id="drop" />
                            <ul class="menu">
                                <li><a href="#" class="active">Home</a></li>
                                <li class="mx-lg-4 mx-md-3 my-md-0 my-2"><a href="#">About Us</a></li>
                                <li><a href="#">Pricing</a></li>
                                
                                <li><a class="mx-lg-4 mx-md-3 my-md-0 my-2" href="#">Accounts</a></li>
                                <li><a href="#">Generator</a></li>
                         
                            </ul>
                        </nav>
                    </div>
                    <!-- //nav -->
                </div>
            </div>
        </div>
        <!-- //second header -->

       
    </div>

<!-- for accounts -->
<!-- Main-wrapper -->
<div class="main-wrapper">
<!-- Left sideMenu -->
    <div class="left-menu">
            <div class="leftmenu-profile">
                    <!-- logo -->
                    <div id="logo">
                        <h4>
                            <a href="#" >
                               <!--  <img src="{{asset('uploads/face1.jpg')}}" width="50px" height="40px" style="border-radius: 100px;" /> -->
                                <span class="logo-sp">Quick</span> Acc
                           </a>
                        </h4>
                    </div>
                    <!-- //logo -->
            <!-- <img src="http://ec2-18-224-182-62.us-east-2.compute.amazonaws.com/uploads/face1.jpg" alt="pro"/> -->
            <?php if($img !='') { ?> <img src="{{asset('uploads/'.$img ) }}"  /> 
             <?php } else { ?> <img src="{{ asset('asset/images/unknown.jpg' ) }}"  /><?php } ?>
             
            <span><?php echo Auth::user()->name; ?></span>
            </div>
            <ul>
            <li><a href="{{ route('userprofile') }}" >Edit Profile</a></li>
             <li><a href="{{ route('admin.logout')}}"><span class="fa fa-sign-in mr-2"></span>Logout</a></li> 
            </ul>
    </div>


<section class="blog_w3ls py-xl-5" id="why" >
    <div class="container py-xl-5 py-3 py-3 ">
        
        <div class="title-section mb-md-5 mb-4" >
            
            <h3 class="w3ls-title text-uppercase text-bl font-weight-bold">ACCOUNTS</h3>
            
        </div>
 
        <div class="row">
             @foreach($dept_data as $key => $data)
                
                <div class="col-lg-3" style="text-align: center;align-items: center; padding-bottom:50px;">
                    <img src="{{asset('uploads/'.$data->image)}}" width="160px" height="120px" />
                    <h2>{{ ucfirst($data->service_name) }}</h2>
                    <!-- <span style="background-color: #eee;">{{ ucfirst($data->username) }} : {{ ucfirst($data->password) }}</span> -->
                    <div><a href="{{ url('/generatelink/'.$data->id ) }}" class="btn btn-danger">Generate</a></div>
                </div>
                @endforeach
                
            </div>


            </div>
            
        </div>
    </section>
                    
</div>
@endsection
 