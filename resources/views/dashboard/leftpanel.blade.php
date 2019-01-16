<div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">              
              
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('department')}}">
              <i class="menu-icon mdi mdi-domain"></i>
              <span class="menu-title">Department</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('category')}}">
              <i class="menu-icon mdi mdi-tag-multiple"></i>
              <span class="menu-title">Categories</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('title')}}">
              <i class="menu-icon mdi mdi-account-card-details"></i>
              <span class="menu-title">Titles</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('upcomming') }}">
              <i class="menu-icon mdi mdi-arrow-right-bold-box"></i>
              <span class="menu-title">Upcomming</span>
            </a>
          </li>
       
        </ul>
      </nav>
      <div class="main-panel">
        <div class="content-wrapper">
           @yield('content')