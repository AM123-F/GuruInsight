<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>K</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Guru</b>Insight  </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
    
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Search Bar -->
          <li class="nav-item">
            <form class="form-inline my-2 my-lg-0" action="#" method="GET" style="padding-top: 8px;">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search..." name="query">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="submit">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
            </form>
          </li>
    
          <!-- Shortcut Links -->
          <li class="nav-item">
            <a href="/dashboard" class="nav-link"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="/reports" class="nav-link"><i class="fa fa-file-text"></i> Reports</a>
          </li>
          <li class="nav-item">
            <a href="/settings" class="nav-link"><i class="fa fa-cogs"></i> Settings</a>
          </li>
    
          <!-- Notifications Dropdown -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
    
          <!-- Language Selector -->
          <li class="dropdown language-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-globe"></i> Language
            </a>
            <ul class="dropdown-menu">
              <li><a href="#">English</a></li>
              <li><a href="#">Bahasa Indonesia</a></li>
              <li><a href="#">Español</a></li>
            </ul>
          </li>
    
          <!-- Theme Toggle -->
          <li class="nav-item">
            <a href="#" id="toggle-theme" class="btn btn-dark">
              <i class="fa fa-moon-o"></i> Dark Mode
            </a>
          </li>
    
          <!-- User Account Dropdown -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('AdminLTE-2.3.11/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
              @if(Auth::check())
                <span>{{ Auth::user()->name }}</span>
              @else
                <span>Guest</span>
              @endif
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="{{ asset('AdminLTE-2.3.11/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                <p>
                  {{ Auth::check() ? Auth::user()->name : 'Guest' }} - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="/profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
    
  </header>