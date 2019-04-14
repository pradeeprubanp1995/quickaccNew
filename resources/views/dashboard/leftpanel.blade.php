<!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation fornavigation">
                    <li class="xn-logo">
                        <a href="index.html">Quick Acc</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="{{asset('asset/images/admin_img.png')}}" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="{{asset('asset/images/unknown.jpg ')}}" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">ADMIN</div>
                                <div class="profile-data-title">QuicAcc</div>
                            </div>
                            <!-- <div class="profile-controls">
                                <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div> -->
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Menu</li>                    
                    <li>
                        <a href="{{route('admin.users')}}"><span class="fa fa-desktop"></span> <span class="xn-text">Users</span></a>
                    </li>
                    <li >
                        <a href="{{route('admin.category')}}"><span class="fa fa-files-o"></span> <span class="xn-text">Premium</span></a>
                       
                    </li>
                    <li>
                        <a href="{{route('admin.department')}}"><span class="fa fa-file-text-o"></span> <span class="xn-text">Services</span></a>
                        
                    </li>             
                                     
                    <li >
                        <a href="{{route('admin.generates')}}"><span class="fa fa-cogs"></span> <span class="xn-text">Accounts</span></a>
                        
                    </li>                    
                    <li >
                        <a href="{{route('admin.paymentlist')}}"><span class="fa fa-pencil"></span> <span class="xn-text">Payments</span></a>
                        
                    </li>
                                        
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
               <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                    <!-- <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="Search..."/>
                        </form>
                    </li>    -->
                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="{{ url('/admin/logout') }}" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    
                    
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     
                
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li><a href="#">Tables</a></li>
                    <li class="active">Data Tables</li>
                </ul>
                <!-- END BREADCRUMB -->

                
                  @yield('content')