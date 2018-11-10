<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title; ?> &mdash; Point Of Sale</title>
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
<div id="app">
<main>
    <div id="primary" class="p-t-b-80 height-full ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mx-md-auto">
                    <div class="text-center">
                        <img style="width: 200px" src="<?php echo base_url(); ?>assets/img/basic/logo-akure.png" alt="">
                        <h4 class="mt-2 p-b-20">Confirm Your Account.</h4>
                    </div>
                    <form method="post">
                        <div class="form-group has-icon"><i class="icon-envelope-o"></i>
                            <input type="text" name="email" class="form-control form-control-lg"
                                   placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="type">
                                <option value="">Select account type</option>
                                <option value="e">Employee</option>
                                <option value="o">Owner</option>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-success btn-lg btn-block" value="Submit">
                        <div class="col-md-12 p-0 pt-2">
                            <span><a href="<?php echo base_url(); ?>auth/login">&larrhk; Back to Login</a></span>
                        </div>
                                                 <div class="col-md-12 p-0 pt-2">
                            <p class="copyright text-center" style="font-size: 12px;">&copy; 2018 <a href="http://akure-solusi.com" target="_blank" id="Quick Count">Akure Solusi</a>. All Rights Reserved.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>



<!-- Modal Loading Dialog -->
<div id="loading" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered modal-sm">

    <!-- Modal content-->
    <div class="modal-content" id="custom-modal-body">
      <div class="modal-body text-center" >
        <div class="preloader-wrapper medium active">
            <div class="spinner-layer spinner-blue-only">
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

  </div>
</div>



<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="<?php echo base_url(); ?>assets/js/app.js"></script>
<script type="text/javascript">
    $("form").submit(function(e){
        $('#loading').modal('show');
        e.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url : "<?php echo base_url('auth/reset'); ?>",
            type: "post",
            data : form_data
        }).done(function(response){
            var data = $.parseJSON(response);
            if(data['status'] == 'sukses'){
                setTimeout(function(){ 
                    $('#loading').modal('hide');
                    swal("Password baru berhasil dikirim ke email kamu",{icon: success});
                },500);
            }else if(data['status'] == 'gagal'){
                setTimeout(function(){ 
                   $('#loading').modal('hide');
                    swal(data['pesan']);
                }, 500);
            }
        });

    });
</script>

<script src="<?php echo base_url('assets/js/sweetalert.js'); ?>"></script>
</body>
</html>