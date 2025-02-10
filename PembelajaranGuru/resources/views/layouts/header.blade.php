<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Guru Insight</title>
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-2.3.11') }}/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-2.3.11') }}/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-2.3.11') }}/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-2.3.11') }}/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-2.3.11') }}/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-2.3.11') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-2.3.11') }}/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-2.3.11') }}/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-2.3.11') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- Tambahkan SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

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

</html>
