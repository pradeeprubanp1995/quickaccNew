@include('dashboard.userheader')
@extends('dashboard.userleftpanel')
@section('content') 
<?php $img = Auth::user()->images;  ?>

<div id="home">
       

        <!-- second header -->
        <div class="main-top">
            <div class="container" >
                <div class="header d-md-flex  py-3">
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
                                <li> <a class=""></a></li>
                               
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
    <div class="container py-xl-5 py-3 ">
        <div class="title-section mb-md-5 mb-4" style="padding-top: 40px;">
            
            <h3 class="w3ls-title text-uppercase text-bl font-weight-bold">Myprofile</h3>
            
        </div>
 
        <div class="row">
             
                 <form class="form-sample" action="{{route('usereditprofile')}}" method="post"  enctype="multipart/form-data">
                  @csrf
                  @if (\Session::has('success'))
  <div class="alert alert-success">
  <p>{{ \Session::get('success') }}</p>
  </div><br />
  @endif
  @if (\Session::has('danger'))
  <div class="alert alert-danger">
  <p>{{ \Session::get('danger') }}</p>
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
                    <p class="card-description">
                      Personal info
                    </p>
                    <input type="hidden" name="id" class="form-control" value="<?php echo $data->id;?>" />
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Premium</label>
                          <div class="col-sm-9">
                            <input type="text" name="primeum" class="form-control" value="<?php echo $pre->primeum;?>"  disabled/>
                            
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $data->name;?>"  name="name" required />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                     <div class="col-md-6">
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Profile Image</label>
                          <div class="col-sm-9">
                            @if(Auth::user()->images == '') <i class="fa fa-user" style="font-size: 20px;"></i>@else
                             
                             <img src="{{asset('uploads/'.$data->images)}}" width="170px" height="150px" />
                             @endif
                            <input type="hidden" name="imgbackup"   value="{{$data->images}}"/>
                            <input type="file" class="form-control" value="" name="img" />
                            <span style="color:red">*Note: Image should not exceed 1MB</span>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Phone Number</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $data->phone;?>"  name="phone" required />
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                    <h3>Actions</h3><br/>
                    <div class="col-sm-12">
                        
                             <input type="submit" name="" value="Save Changes" class="btn btn-primary mr-2">

                             <a href="{{ route('userchangepassword') }}" class="btn btn-primary" >Change Password</a>
                              
                       
                        
                    </div>
                   
                  </form>
            </div>


            </div>
        
    </section>
  </div>
                    
@include('dashboard.userfooter')
@endsection
 