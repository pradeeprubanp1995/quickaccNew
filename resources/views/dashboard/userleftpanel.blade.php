<!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <br />
        <nav class="navbar navbar-expand-sm navbar-default" style="background-color: white!important;border-color: white!important;">

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ url('/home') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    
                    <!-- <li class="menu-title">Menu</li> -->
                    <li class="menu-item">
                        <a href="{{route('quiz')}}" > <i class="menu-icon fa fa-sign-in"></i>QuiZ</a>
                        
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Result</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="{{ route('history') }}">All Records</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="{{ route('resultview') }}">Today Record</a></li>
                            
                            
                        </ul>
                    </li>
                    <!-- <li class="menu-item">
                        <a href="{{route('updatequestioninput')}}" > <i class="menu-icon fa fa-sign-in"></i>Post Question Today</a>
                        
                    </li> -->
                    
                    <!-- <li class="menu-item">
                        <a href="{{route('history')}}"><i class="menu-icon fa fa-sign-in"></i>Results</a>
                        
                    </li>
                    <li class="menu-item">
                        <a href="{{route('rank')}}"> <i class="menu-icon fa fa-sign-in"></i>HIGHSCORE</a>
                        
                    </li> -->
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">  
            <div class="top-left">
                <div class="navbar-header"> 
                    <div class="col-sm-8">
                          <div class="col-sm-4">
                    <a class="navbar-brand" href="#"><img  src="{{asset('asset/user/original/images/logo-frontuser.png')}}" alt="Logo"></a></div>
                    <div class="col-sm-4 titset"> <span class="logoset"><b>SET</b></span> </div> </div>   
                    <a class="navbar-brand hidden" href="./"><img src="{{asset('asset/user/original/images/logo2.png')}}" alt="Logo"></a> 
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a> 
                </div> 
            </div>
            <div class="top-right"> 
                <div class="header-menu"> 
                    <div class="header-left">
                        <!-- <button class="search-trigger"><i class="fa fa-search"></i></button> -->
                        <!-- <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div> -->

                        <!-- <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">3</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-check"></i>
                                    <p>Server #1 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-info"></i>
                                    <p>Server #2 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-warning"></i>
                                    <p>Server #3 overloaded.</p>
                                </a>
                            </div>
                        </div> -->

                       <!--  <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                                <span class="count bg-primary">4</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have 4 Mails</p>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jonathan Smith</span>
                                        <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jack Sanders</span>
                                        <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="{{URL('/')}}/uploads/{{Auth::user()->images}}"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Cheryl Wheeler</span>
                                        <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Rachel Santos</span>
                                        <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>
                                </a>
                            </div>
                        </div> -->
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@if(Auth::user()->images == '')<i class="fa fa-user" style="font-size: 20px;"></i>@else
                            <img class="user-avatar rounded-circle" src="{{URL('/')}}/uploads/{{Auth::user()->images}}" alt="User Avatar">@endif
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="{{route('userprofileview')}}"><i class="fa fa-user"></i>My Profile</a>

                            <a class="nav-link" href="{{route('userchangepassword')}}"><i class="fa fa-unlock-alt"></i>change password</a>

                            <!-- <a class="nav-link" href="#"><i class="fa fa-cog"></i>Settings</a> -->

                            <a class="nav-link" href="{{ route('logout') }}"><i class="fa fa-power-off"></i>Logout</a>
                        </div>
                    </div> 
                </div>  
            </div>

            <style type="text/css">
                .logoset
                {
                    color: #54D3D3;
                    font-size: 20px;

                    /*line-height:-50px;*/
                }
                .titset
                {
                    padding-top: 20px;
                }
                .navbar-brand img {
                width: 30px !important; 
                }
                ul li a:hover
                {
                    color: #03A9F3 !important;
                    /*color: white !important;*/
                }
               /* ul li a:hover
                {
                    color: white !important;
                }*/
            </style>
        </header><!-- /header -->
        <!-- Header-->
        @yield('content')