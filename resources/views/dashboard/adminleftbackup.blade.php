<div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">              
              
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.users')}}">
              <i class="menu-icon mdi mdi-account-card-details"></i>
              <span class="menu-title">Users</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.category')}}">
              <i class="menu-icon mdi mdi-tag-multiple"></i>
              <span class="menu-title">Premium</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.department')}}">
              <i class="menu-icon mdi mdi-domain"></i>
              <span class="menu-title">Services</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.generates')}}">
              <i class="menu-icon mdi mdi-account-card-details"></i>
              <span class="menu-title">Accounts</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.paymentlist')}}">
              <i class="menu-icon mdi mdi-account-card-details"></i>
              <span class="menu-title">Payments</span>
            </a>
          </li>

         <!--  <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.upcomming') }}">
              <i class="menu-icon mdi mdi-arrow-right-bold-box"></i>
              <span class="menu-title">Upcomming</span>
            </a>
          </li> -->
       
        </ul>
      </nav>
      <div class="main-panel">
        <div class="content-wrapper">
           @yield('content')