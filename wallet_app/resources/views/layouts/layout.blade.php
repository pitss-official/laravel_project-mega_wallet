
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Mega Wallet</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/css/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link href="{{mix('css/app.css')}}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block ">
                <button class="badge badge-light mt-2">

                    User id: {{auth()->user()->id}}
                </button>
            </li>
            <li class="nav-item d-none d-sm-inline-block ">
                <button class="badge badge-light mt-2">
                Email: {{auth()->user()->email}}
                </button>
            </li>
        </ul>



        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <li class="btn btn-success mt-1 mr-3" id="currBal">Current Balance: Rs {{$currentBalance}}</li>
            <!-- Messages Dropdown Menu -->


            <li>
                <div class="dropdown-menu dropdown-menu-right"></div>
                <a  class="btn btn-outline-danger mt-2" href="{{route('logout')}}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                    {{__('Logout')}}

                </a>

                <form id="logout-form" action="{{route('logout')}}" method="post"
                style="display: none;">
                    @csrf
                </form>

            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar bg-gradient-gray-dark elevation-4">
        <!-- Brand Logo -->
        <div class="bg-gradient-yellow">
        <a href="index3.html" class="brand-link">
            <img src="/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light text-dark">Mega Wallet</span>
        </a>
        </div>
        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{\Illuminate\Support\Facades\Auth::user()->image}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block text-white font-weight-bold">{{Auth::user()->name}}</a>
                </div>
            </div>


            <!-- Sidebar Menu -->

            <navigation-menu :item-navigation="{{$navigations}}"></navigation-menu>
{{--            <div>--}}
{{--            <nav class="mt-2">--}}
{{--                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">--}}
{{--                    <!-- Add icons to the links using the .nav-icon class--}}
{{--                         with font-awesome or any other icon font library -->--}}
{{--                    @foreach($navigations as $navigation)--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{$navigation->link}}" class="nav-link {{'/'.Request::path() === $navigation->link ? " active" : '' }}">--}}
{{--                        <router-link to="{{$navigation->link}}" class="nav-link {{'/'.Request::path() === $navigation->link ? " active" : '' }}"></router-link>--}}
{{--                            <i class="nav-icon fas fa-tachometer-alt"></i>--}}
{{--                            <p>--}}

{{--                                {{$navigation->name}}--}}


{{--                            </p>--}}
{{--                        </a>--}}

{{--                    </li>--}}

{{--                    @endforeach--}}

{{--                    <!-- Navigation vue -->--}}




{{--                </ul>--}}
{{--            </nav>--}}

            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
    @yield('content')
{{--                <div id="app">--}}
                @if(Request::is('/home/'))
                    <dashboard></dashboard>

                @endif
                <router-view></router-view>




{{--                </div>--}}

            </div><!-- /.container-fluid -->


{{--            <div id="app">--}}
{{--                <router-view></router-view>--}}
{{--            </div>--}}

        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2020 <a href="https://adminlte.io">Developed by Pawan Kumar and Anukriti Gupta</a>.</strong> All rights reserved.
    </footer>
</div>


<script src="{{mix('js/app.js')}}" defer></script>
<script src="/js/adminlte.min.js" defer></script>

</body>
</html>
