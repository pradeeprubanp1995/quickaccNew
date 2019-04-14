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
                            <a href="{{ route('userprofile') }}">
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
            
            <h3 class="w3ls-title text-uppercase text-bl font-weight-bold">Change Password</h3>
            
        </div>
 
        <div class="row">
          
             
                 
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


<form  method="post" action="{{ route('userchangedpassword') }}" /> @csrf 

                    <p class="card-description">
                      Change Password
                    </p>
                    <input type="hidden" name="id" class="form-control" value="<?php echo AUTH::user()->id;?>" />
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Old Password</label>
                          <div class="col-sm-9">
                          
                          <input type="password" name="oldpassword" class="form-control {{ $errors->has('oldpassword') ? ' is-invalid' : '' }}" id="oldpassword" placeholder="Old Password" value="{{old('oldpassword')}}">
                          
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('oldpassword') }}</strong>
                                    </span>
                            
                          </div>
                        </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">New Password</label>
                          <div class="col-sm-9">
                            
                                <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="New Password" id="password">
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                                </span>
                          </div>
                        </div>
                      </div>
                    
                    
                     <div class="col-md-6">
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Confirm Password</label>
                          <div class="col-sm-9">


                            
                          <input type="password" name="confirmpassword" class="form-control {{ $errors->has('confirmpassword') ? ' is-invalid' : '' }}" id="confirmpassword" placeholder="Confirm Password">
                          <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('confirmpassword') }}</strong>
                          </span>
                           
                          </div>
                        </div>
                      </div>
                      </div>                      
                      
                    
                    </div>
                    <h3>Actions</h3><br/>
                    <div class="col-sm-12">
                        
                             <input type="submit" name="" value="Submit" class="btn btn-primary mr-2">
                              
                       
                        
                    </div>
                   
                  </form>
            </div>


            </div>
        
    </section>
</div>         
@include('dashboard.userfooter')
@endsection
 
