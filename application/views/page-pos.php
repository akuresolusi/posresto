<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Akure - Point of Sale</title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/app.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/font-awesome/css/all.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/numpad/jquery.numpad.css">
    <meta name="theme-color" content="#64b5f6">
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
<div class="sidebar-offcanvas-desktop">
    <aside class="main-sidebar fixed offcanvas shadow">
    <section class="sidebar">
        <div class="w-150px mt-3 mb-3 ml-3">
            <img src="<?php echo base_url(); ?>assets/img/basic/logo-akure.png" alt="">
        </div>
        <div class="relative">
            <div class="user-panel p-3 light mb-2">
                <div>
                    <div class="float-left image">
                        <img class="user_avatar" src="<?php echo base_url(); ?>assets/img/users.png" alt="User Image">
                    </div>
                    <div class="float-left info">
                        <h6 class="font-weight-light mt-2 mb-1">Firman</h6>
                        <a href="#" class="text-success"><i class="icon-circle blink"></i> Online</a>
                    </div>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header"><strong>MAIN NAVIGATION</strong></li>
            <li><a href=""><i class="icon icon-dashboard2 blue-text s-18"></i><span>Dashboard</span></a></li>
            <li><a href="<?php echo base_url(); ?>pos"><i class="icon icon-desktop_windows green-text s-18"></i><span>Point Of Sale</span></a>
            </li>
            <li><a href=""><i class="icon icon-sign-out red-text s-18"></i><span>Logout</span></a></li>
            <!-- <li class="header light mt-3"><strong>UI COMPONENTS</strong></li> -->
        </ul>
    </section>
</aside>
<!--Sidebar End-->
</div>
<div class="page">
    <header class="blue lighten-2 relative shadow ">
        <div class="navbar navbar-expand navbar-dark d-flex justify-content-between bd-navbar">
            <div class="relative">
                <a href="#" data-toggle="offcanvas" class="paper-nav-toggle pp-nav-toggle paper-nav-white">
                    <i></i>
                </a>
            </div>

            
            <!--Top Menu Start -->
<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        <li data-toggle="control-sidebar" style="cursor: pointer; padding: 10px;">
            <span id="name-outlet"><?php echo $this->session->userdata()['outlet']; ?></span>
        </li>
        <!-- User Account-->
        <li class="dropdown custom-dropdown notifications-menu">
            <a href="#" class=" nav-link" data-toggle="dropdown" aria-expanded="false">
                <i class="icon-notifications "></i>
                <span class="badge badge-danger badge-mini rounded-circle">4</span>
            </a>
            <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                        <li>
                            <a href="#">
                                <i class="icon icon-data_usage text-success"></i> Order Table 5
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon icon-data_usage text-success"></i> Order Table 5
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon icon-data_usage text-success"></i> Order Table 5
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="footer p-2 text-center"><a href="#">View all</a></li>
            </ul>
        </li>
    </ul>
</div>
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        <?php $this->load->view($isi); ?>
    </div>
</div>
<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="<?php echo base_url(); ?>assets/js/app.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pos.js"></script>
<script src="<?php echo base_url(); ?>assets/js/numpad/jquery.numpad.js"></script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
    });
</script>
<script type="text/javascript">
    $(function() {
        // Set NumPad defaults for jQuery mobile. 
        // These defaults will be applied to all NumPads within this document!
        $.fn.numpad.defaults.gridTpl = '<table class="table modal-content" style="width:400px; height:350px;"></table>';
        $.fn.numpad.defaults.backgroundTpl = '<div class="modal-backdrop in"></div>';
        $.fn.numpad.defaults.displayTpl = '<input type="text" class="form-control  input-lg" style="width:100%; height:80px; font-size:30px;" />';
        $.fn.numpad.defaults.buttonNumberTpl =  '<button type="button" class="btn btn-default btn-lg" style="width:100%; height:80px; font-size:28px; "></button>';
        $.fn.numpad.defaults.buttonFunctionTpl = '<button type="button" class="btn btn-lg" style="width:100%; height:80px;"></button>';
        $.fn.numpad.defaults.onKeypadCreate = function(){$(this).find('.done').addClass('btn-primary');};
        
        // Instantiate NumPad once the page is ready to be shown
        $(document).ready(function(){
            $('.qty').numpad();
            $('#password').numpad({
                displayTpl: '<input class="form-control" type="password" />'        
            });
            $('#numpadButton-btn').numpad({
                target: $('#numpadButton'),
                                decimalSeparator: '.'
            });
            $('#numpad4div').numpad();
            $('#numpad4column .qtyInput').numpad();
            
       // alert($(window).width());
        });
    });
</script>


<!-- Script Proses POS -->
<script type="text/javascript">
    
    function cari_items() {
        var input, filter, data, item, h6, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        data = document.getElementById("mydata");
        item = data.getElementsByClassName("item");
        for (i = 0; i < item.length; i++) {
            h6 = item[i].getElementsByTagName("h6")[0];
            if (h6.innerHTML.toUpperCase().indexOf(filter) > -1) {
                item[i].style.display = "";
            }else{
                item[i].style.display = "none";
            }
        }
    }

    function pilih_kategori(id){
        $("#mydata").html("");
        var data = <?php echo $data ?>;
        $.each( data, function( key, value ) {
            var element = "<div class='col-md-2 col-6 pr-2 pl-2 '><div class='item-all text-center p-0' style='cursor: pointer;'><div class='mb-2'><img class='img-fluid' src='<?php echo base_url(); ?>assets/gambar/"+ value['idoutlet'] +"/small/"+ value['image'] +"'></div><h6 class='mb-1'>"+ value['name'] +"</h6><span>Rp "+ value['price'] +"</span></div></div>";
            if(id == null || id == ""){
                $("#mydata").append(element);
            }else{
                if(id == value['idcategori']){
                    $("#mydata").append(element);
                }
            }
        });
    }
    pilih_kategori();

</script>


</body>
</html>