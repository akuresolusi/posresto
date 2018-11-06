<header class="blue lighten-2 relative">
    <div class="container-fluid text-white">
        <div class="row p-t-b-10 ">
            <div class="col">
                <h4>
                    <i class="icon-users"></i>
                    <?php echo $title; ?>
                </h4>
            </div>
        </div>
        <div class="row">
            <ul class="nav responsive-tab nav-material nav-material-white">
                <li>
                    <a class="nav-link active" href="<?php echo base_url('employee'); ?>"><i class="icon icon-list"></i>All <?php echo $title; ?></a>
                </li>
                <li>
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal" x><i class="icon icon-plus"></i> Add <?php echo $title; ?></a>
                </li>
            </ul>
        </div>
    </div>
</header>
<div class="row p-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body b-b">
                <table class="table table-hover table-bordered table-striped data-tables"
                       data-options='{ "paging": true; "searching":true}' id="table_id">
                    <thead>
                    <tr>
                        <th width="10">No</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th width="50">Payment</th>
                        <th width="50"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i=0;
                    foreach ($data as $value) {
                    $i++;
                    $payment = "-";
                    if($value['a_payment'] == 1){
                        $payment = "Yes";
                    }
                    $id = $this->encrypt->encode($value['id']);
                    ?>
                    <tr>
                       <td><?php echo $i; ?></td>
                       <td><?php echo $value['email']; ?></td>
                       <td><?php echo $value['name']; ?></td>
                       <td><?php echo $value['phone']; ?></td>
                       <td align="center"><?php echo $payment; ?></td>
                       <td align="center">
                            <a style="cursor: pointer;" value_id="<?php echo $id ?>" class="btn-fab btn-fab-sm shadow btn-warning btn-update"><i class="icon-edit"></i></a>
                            <a  style="cursor: pointer;" value_id="<?php echo $id ?>" 
                                value_email="<?php echo $value['email'] ?>"class="btn-fab btn-fab-sm shadow btn-danger hapus-employee"><i class="icon-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
 


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
            <h4 class="modal-title">Add <?php echo $title; ?></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="form-input">
      <div class="modal-body">
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="number" name="phone" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Payment Transaction</label>
                <div class="material-switch">
                    <input id="save-payment" type="checkbox" name="payment" autocomplete="off">
                    <label for="save-payment" class="bg-success"></label>
                </div>
            </div>
      </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-success"><span class="icon-save"></span> Save</button>
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><span class="icon-remove"></span> Close</button>
        </div>
    </div>
    </form>
  </div>
</div>







<!-- Modal Edit -->
<div id="modal-update" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
            <h4 class="modal-title">Update <?php echo $title; ?></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="form-update">
      <div class="modal-body">
            <div class="form-group">
                <label>Email</label>
                <input type="hidden" id="input-id" name="id" value="">
                <input type="text" id="input-email" readonly name="email" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" id="input-name" name="name" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="number" id="input-phone" name="phone" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Payment Transaction</label>
                <div class="material-switch">
                    <input id="input-payment" type="checkbox" name="payment" autocomplete="off">
                    <label for="input-payment" class="bg-success"></label>
                </div>
            </div>
      </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-success"><span class="icon-save"></span> Save</button>
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><span class="icon-remove"></span> Close</button>
        </div>
    </div>
    </form>
  </div>
</div>


<script type="text/javascript">

$("#form-input").submit(function(e){
    $('#myModal').modal('hide');
    $('#loading').modal('show');
    e.preventDefault();
    var form_data = $(this).serialize();
    $.ajax({
        url : "<?php echo base_url('employee/ajax_add'); ?>",
        type: "post",
        data : form_data
    }).done(function(response){

        var data = $.parseJSON(response);
        if(data['status'] == 'sukses'){
            setTimeout(function(){ 
                $('#loading').modal('hide');
                reset_form();
                swal("Pegawai berhasil ditambahkan, password login telah dikirim pada email terdaftar").then((value) => {
                    location.reload();
                });
            },500);
        }else if(data['status'] == 'gagal'){
            setTimeout(function(){ 
               $('#loading').modal('hide');
                swal(data['pesan']).then((value) => {
                    $('#myModal').modal('show');
                });
            }, 500);
           
        }else{

           location.reload();

        }

    });
});

function reset_form(){
    $("form").trigger("reset");
}

$(".btn-update").click(function(){
    var id = $(this).attr('value_id');
    $('#loading').modal('show');
    $.ajax({
        url : "<?php echo base_url('employee/ajax_detail'); ?>",
        type: "post",
        data : {id:id},
        success: function(result){
            var data = $.parseJSON(result);
            $("#input-id").val(data['id']);
            $("#input-email").val(data['email']);
            $("#input-name").val(data['name']);
            $("#input-phone").val(data['phone']);
            if(data['a_payment'] == "1"){
                $("#input-payment").attr("checked", "checked");
            }else{
                $("#input-payment").removeAttr('checked');
            }
            setTimeout(function(){ 
                $('#loading').modal('hide');
                $("#modal-update").modal("show");
            }, 500);
        }
    });
});



$("#form-update").submit(function(e){

    e.preventDefault();
    $('#modal-update').modal('hide');
    $('#loading').modal('show');
    var form_data = $(this).serialize();

    $.ajax({
        url : "<?php echo base_url('employee/ajax_update'); ?>",
        type: "post",
        data : form_data
    }).done(function(response){

        var data = $.parseJSON(response);
        if(data['status'] == 'sukses'){
            
            setTimeout(function(){ 
                $('#loading').modal('hide');
                reset_form();
                swal({
                    title: "Success!",
                    text: "Data pegawai berhasil diperbarui.",
                    icon: "success",
                }).then((value) => {
                    location.reload();
                });
            }, 500);

        }else if(data['status'] == 'gagal'){
            setTimeout(function(){ 
                $('#loading').modal('hide');
                swal(data['pesan']).then((value) => {
                    $('#modal-update').modal('show');
                });
            }, 500);
           
        }else{

           location.reload();

        }

    });
});


$(".hapus-employee").click(function(){

    var id = $(this).attr('value_id');
    var email = $(this).attr('value_email');
    swal({
        title: "Are you sure?",
        text: "Setelah dihapus, Akun "+ email +" tidak dapat digunakan untuk login.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if(willDelete){
            $("#loading").modal('show');
            $.ajax({
                url : "<?php echo base_url('employee/ajax_delete_employee'); ?>",
                type: "post",
                data : {id:id},
                success: function(result){
                    var data = $.parseJSON(result);
                    if(data['status'] == "sukses"){
                        setTimeout(function(){
                            $("#loading").modal('hide'); 
                            swal("akun dengan email " + email + " berhasil dihapus",{
                                icon: "success",
                            }).then((value) => {
                                location.reload();
                            });
                        },500);
                    }else{
                        setTimeout(function(){
                            $("#loading").modal('hide'); 
                            swal("akun gagal dihapus",{
                                icon: "error",
                            });
                        },500);
                    }
                }
            });
        }
    });
});

</script>