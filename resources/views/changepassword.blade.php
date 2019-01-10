

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Self Evaluate Tool</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('asset/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('asset/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('asset/vendors/css/vendor.bundle.addons.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{asset('asset/vendors/iconfonts/font-awesome/css/font-awesome.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('asset/images/favicon.ico')}}" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="https://colaninfotech.com/">
          <img src="{{asset('asset/images/logo-colan.png')}}" alt="logo" />
        </a>
       
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hello,<?php echo Auth::user()->name;?></span>
              <img class="img-xs rounded-circle" src="{{URL('/')}}/uploads/{{Auth::user()->images}}" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                  </div>
                </div>
              </a>
              <a class="dropdown-item mt-2" href="{{ route('profile') }}" >
                Myprofile
              </a>
              <a class="dropdown-item" href="{{ route('changepassword') }}">
                Change Password
              </a>
              <!-- <a class="dropdown-item">
                Check Inbox
              </a> -->
              <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                Sign Out
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>



    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="{{URL('/')}}/uploads/{{Auth::user()->images}}" alt="profile image">
                  
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo Auth::user()->name;?></p>
                  <div>
                    <!-- <small class="designation text-muted">Manager</small> -->
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              <!-- <button class="btn btn-success btn-block">New Project
                <i class="mdi mdi-plus"></i>
              </button> -->
            </div>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="{{route('department')}}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Department</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('category')}}">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Categories</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('title')}}">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Titles</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('upcomming') }}">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Upcomming</span>
            </a>
          </li>
        -->
        </ul>
      </nav>
      <div class="main-panel">
        <div class="content-wrapper">
           
<div class="col-12">
                  <div class="card">
                    <div class="card-body">
                    <div>
                      <h3>Change Password</h3> <br/>
                      <!-- <a class="btn btn-light" href="{{ url('/') }}"> -->
                      <?php echo "<div align=\"right\"> <a class=\"btn btn-primary\" href=\"javascript:history.go(-1)\">GO BACK</a> </div>"; ?>
                    </div>
                      <!-- <p class="card-description">
                        Change Password Old Password
                      </p> -->
                      <form class="forms-sample" method="post" 
                      action="{{ route('changedpassword') }}">
                       @csrf
                        @if (session()->has('warning'))
    <div class="alert alert-danger text-center animated fadeIn">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>
            {!! session()->get('warning') !!}
        </strong>
    </div>
@endif
                        <div class="form-group ">
                          <label for="oldpassword">Old Password</label>
                          <input type="password" name="oldpassword" class="form-control {{ $errors->has('oldpassword') ? ' is-invalid' : '' }}" id="oldpassword" placeholder="Password" value="{{old('oldpassword')}}">
                          
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('oldpassword') }}</strong>
                                    </span>
                     
                        </div>
                        
                        <div class="form-group">
                          <label for="exampleInputPassword1">New Password</label>
                          <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="New Password" id="password">
                          <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                          </span>
                        </div>
                        <div class="form-group">
                          <label for="confirmpassword">Confirm Password</label>
                          <input type="password" name="confirmpassword" class="form-control {{ $errors->has('confirmpassword') ? ' is-invalid' : '' }}" id="confirmpassword" placeholder="Password">
                          <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('confirmpassword') }}</strong>
                          </span>
                        </div>

                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                      </form>
                    </div>
                  </div>
                </div>



</div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
              <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
              <i class="mdi mdi-heart text-danger"></i>
            </span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{asset('asset/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('asset/vendors/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('asset/js/off-canvas.js')}}"></script>
  <script src="{{asset('asset/js/misc.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('asset/js/dashboard.js')}}"></script>
  <!-- End custom js for this page-->


<!-- pradeep -->


<!-- for autocomplete -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/jquery.easy-autocomplete.js"></script>



</body>

</html>