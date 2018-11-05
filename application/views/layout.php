<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title; ?> &mdash; Akure Solusi</title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/app.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css'); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    
    <meta name="theme-color" content="#fff">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
</head>
<body class="light">
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>

<div id="app">
<aside class="main-sidebar fixed offcanvas shadow">
    <section class="sidebar">
        <div class="w-150px mt-3 mb-3 ml-3">
            <img src="<?php echo base_url('assets/img/basic/logo-akure.png'); ?>" alt="">
        </div>
        <div class="relative">
            <a data-toggle="collapse" href="#userSettingsCollapse" role="button" aria-expanded="false"
               aria-controls="userSettingsCollapse" class="btn-fab btn-fab-sm fab-right fab-top btn-primary shadow1 ">
                <i class="icon icon-cog"></i>
            </a>
            <div class="user-panel p-3 light mb-2">
                <div>
                    <div class="float-left image">
                        <img class="user_avatar" src="<?php echo base_url('assets/img/img-user.png'); ?>" alt="User Image">
                    </div>
                    <div class="float-left info">
                        <h6 class="font-weight-light mt-2 mb-1">Hi, <?php echo $this->session->userdata('name'); ?></h6>
                        <a href="#" class="text-success"><i class="icon-circle blink"></i> Online</a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="collapse multi-collapse" id="userSettingsCollapse">
                    <div class="list-group mt-3 shadow">
                        <a href="#" class="list-group-item list-group-item-action ">
                            <i class="mr-2 icon-user text-blue"></i>Profile
                        </a>
                        <a href="#" class="list-group-item list-group-item-action"><i
                                class="mr-2 icon-lock text-purple"></i>Change Password</a>
                        <a href="<?php echo base_url(); ?>auth/logout" class="list-group-item list-group-item-action"><i
                                class="mr-2 icon-sign-out text-red"></i>Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header"><strong>MAIN NAVIGATION</strong></li>
            <li ><a href="<?php echo base_url('dashboard'); ?>"><i class="icon icon-dashboard2 cyan-text s-18"></i><span>Dashboard</span></a></li>
            <li ><a href="#"><i class="icon icon-clipboard-edit red-text s-18"></i>Library<i
                    class="icon icon-angle-left s-18 pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('item'); ?>"><i class="icon icon-circle-o"></i>Item Library</a>
                    </li>
                    <li><a href="<?php echo base_url('categories'); ?>"><i class="icon icon-circle-o"></i>Categories</a>
                    </li>
                </ul>
            </li>
            <li><a href="<?php echo base_url('employee'); ?>"><i class="icon icon-people_outline teal-text s-18"></i>Employe</a></li>
            <li ><a href="<?php echo base_url('table'); ?>"><i class="icon icon-favorite_border pink-text s-18"></i>Table Management</a>
            </li>
            <li><a href="<?php echo base_url('pos'); ?>"><i class="icon icon-desktop_windows green-text s-18"></i><span>Point Of Sale</span></a></li>
            <!-- <li class="header light mt-3"><strong>UI COMPONENTS</strong></li> -->
        </ul>
    </section>
</aside>
<!--Sidebar End-->
<div class="has-sidebar-left">
    <div class="sticky">
        <div class="navbar navbar-expand navbar-dark d-flex justify-content-between bd-navbar blue lighten-2">
            <div class="relative">
                <a href="#" data-toggle="offcanvas" class="paper-nav-toggle pp-nav-toggle paper-nav-white">
                    <i></i>
                </a>
            </div>

            <h1 class="white-text"><?php echo $this->session->userdata()['outlet']; ?></h1>

            <!--Top Menu Start -->
<div class="navbar-custom-menu p-t-5" style="font-size: 23px;">
    <ul class="nav navbar-nav">
        <?php
        
        ?>
        <li>
            <a href="#" class="nav-link ml-2" data-toggle="control-sidebar">
                <i class="icon-store_mall_directory "></i>
            </a>
        </li>
        <?php ?>
        <!-- User Account-->
        <li class="dropdown custom-dropdown user user-menu">
            <a href="#" class="nav-link" data-toggle="dropdown">
                <img src="<?php echo base_url('assets/img/img-user.png'); ?>" class="user-image" alt="User Image">
            </a>
            <div class="dropdown-menu p-10">
                <div class="row box justify-content-between my-4">
                    <div class="col"><a href="#">
                        <i class="icon-user blue lighten-1 avatar  r-5"></i>
                        <div class="pt-1">Profile</div>
                    </a></div>
                    <div class="col">
                        <a href="#">
                            <i class="icon-lock indigo lighten-2 avatar  r-5"></i>
                            <div class="pt-1">Change Password</div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="<?php echo base_url(); ?>auth/logout">
                            <i class="icon-sign-out red lighten-2 avatar  r-5"></i>
                            <div class="pt-1">Logout</div>
                        </a>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>
        </div>
    </div>
</div>

<div class="page has-sidebar-left height-full">
    <!-- CONTENT -->
    <div class="container-fluid p-0 relative animatedParent animateOnce">
       <?php 
            $this->load->view($content);
       ?>
    </div>
   <!-- END CONTENT -->

    </div>
</div>
<aside class="control-sidebar fixed white ">
    <div class="slimScroll">
        <div class="sidebar-header">
            <h4>List Outlet </h4>
            <a href="#" data-toggle="control-sidebar" class="paper-nav-toggle  active"><i></i></a>
        </div>
        <ul class="list-group no-b">
            <a href="#">
                <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
                    <div>
                        <span class="icon-store_mall_directory text-blue" style="font-size: 16px;"></span> Outlet 1
                    </div>
                    <div>
                        <i class="icon-circle text-success"></i> <span class="text-success">Online</span>
                    </div>
                </li>
            </a>
            <a href="#">
                <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
                    <div>
                        <span class="icon-store_mall_directory text-blue" style="font-size: 16px;"></span> Outlet 2
                    </div>
                    <div>
                        <i class="icon-circle text-danger"></i> <span class="text-danger">Offline</span>
                    </div>
                </li>
            </a>
            <a href="#">
                <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
                    <div>
                        <span class="icon-store_mall_directory text-blue" style="font-size: 16px;"></span> Outlet 3
                    </div>
                    <div>
                        <i class="icon-circle text-success"></i> <span class="text-success">Online</span>
                    </div>
                </li>
            </a>
        </ul>
    </div>
</aside>
<!-- /.right-sidebar -->
<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->


<!-- Modal Loading Dialog -->
<div id="loading" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">
        Loading...
        </div>
      </div>
    </div>

  </div>
</div>




<script src="<?php echo base_url('assets/js/app.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/sweetalert.js'); ?>"></script>
</body>
</html>