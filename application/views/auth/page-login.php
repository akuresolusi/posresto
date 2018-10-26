<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login &mdash; Point Of Sale</title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/app.css">
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
<div id="app" >
<main>
    <div id="primary" class="p-t-b-80 height-full ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mx-md-auto">
                    <div class="text-center">
                        <img style="width: 200px" src="<?php echo base_url(); ?>assets/img/basic/logo-akure.png" alt="">
                        <h4 class="mt-2 p-b-20">Login Your Account.</h4>
                    </div>
                    <?php echo form_open(''); ?>
                        <div class="form-group has-icon"><i class="icon-envelope-o"></i>
                            <input type="email" class="form-control form-control-lg" placeholder="Email Address" name="email" value="<?php echo $this->input->post('email'); ?>">
                            <?php echo form_error('email','<span class="text-red">','</span>'); ?>
                        </div>
                        <div class="form-group has-icon"><i class="icon-lock"></i>
                            <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
                            <?php echo form_error('password','<span class="text-red">','</span>'); ?>
                        </div>
                        <input type="submit" name="loginSubmit" class="btn btn-success btn-lg btn-block" value="Log In">
                        <div class="col-md-12 p-0 pt-2">
                            <span>Not a member ? <a href="<?php echo base_url(); ?>auth/registration">Sign up now.</a></span>
                            <span><a href="<?php echo base_url(); ?>auth/forgot" class="float-right">Forgot password ?</a></span>
                        </div>
                         <div class="col-md-12 p-0 pt-2">
                            <p class="copyright text-center" style="font-size: 12px;">&copy; 2018 <a href="http://akure-solusi.com" target="_blank" id="Quick Count">Akure Solusi</a>. All Rights Reserved.</p>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>
<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="<?php echo base_url(); ?>assets/js/app.js"></script>
<script src="<?php echo base_url('assets/js/sweetalert.js'); ?>"></script>
<script type="text/javascript">
    <?php
        $pesan = $this->session->flashdata('pesan');
        if(!empty($pesan)){
            echo"swal('".$pesan."')";
        }
    ?>
</script>

</body>
</html>