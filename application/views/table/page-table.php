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
                        <th width="10px">No</th>
                        <th>Name</th>
                        <th width="200px">Use Status</th>
                        <th width="100px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i=0;
                    foreach ($data as $value) {
                    $i++;
                    $id = $this->encrypt->encode($value['id']);
                    ?>
                    <tr>
                       <td><?php echo $i; ?></td>
                       <td><?php echo $value['name']; ?></td>
                       <td></td>
                       <td align="center" width="100px">
                            <a style="cursor: pointer;" value_id="<?php echo $id ?>" class="btn-fab btn-fab-sm shadow btn-warning btn-update"><i class="icon-edit"></i></a>
                            <a style="cursor: pointer;" value_id="<?php echo $id ?>"
                            value_name="<?php echo $value['name'] ?>" 
                            class="btn-fab btn-fab-sm shadow btn-danger hapus-table"><i class="icon-trash"></i></a>
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
                <label>Table Name</label>
                <input type="text" name="name" class="form-control" autocomplete="off">
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
                <label>Table Name</label>
                <input type="hidden" id="input-id" name="id" value="">
                <input type="text" id="input-name" name="name" class="form-control" autocomplete="off">
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
        url : "<?php echo base_url('table/ajax_add'); ?>",
        type: "post",
        data : form_data
    }).done(function(response){

        var data = $.parseJSON(response);
        if(data['status'] == 'sukses'){
            setTimeout(function(){ 
                $('#loading').modal('hide');
                reset_form();
                swal("Meja berhasil ditambahkan").then((value) => {
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
        url : "<?php echo base_url('table/ajax_detail'); ?>",
        type: "post",
        data : {id:id},
        success: function(result){
            var data = $.parseJSON(result);
            $("#input-id").val(data['id']);
            $("#input-name").val(data['name']);
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
        url : "<?php echo base_url('table/ajax_update'); ?>",
        type: "post",
        data : form_data
    }).done(function(response){

        var data = $.parseJSON(response);
        if(data['status'] == 'sukses'){
            
            setTimeout(function(){ 
                $('#loading').modal('hide');
                reset_form();
                swal("Data meja berhasil diperbarui").then((value) => {
                    location.reload();
                });
            }, 500);

        }else{
            setTimeout(function(){ 
                $('#loading').modal('hide');
                swal(data['pesan']).then((value) => {
                    $('#modal-update').modal('show');
                });
            }, 500);
        }

    });
});


$(".hapus-table").click(function(){

    var id = $(this).attr('value_id');
    var name = $(this).attr('value_name');
    swal({
        title: "Apakah Kamu Yakin?",
        text: "Setelah dihapus, meja "+ name +" tidak dapat digunakan",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if(willDelete){
            $("#loading").modal('show');
            $.ajax({
                url : "<?php echo base_url('table/ajax_delete_table'); ?>",
                type: "post",
                data : {id:id},
                success: function(result){
                    var data = $.parseJSON(result);
                    if(data['status'] == "sukses"){
                        setTimeout(function(){
                            $("#loading").modal('hide'); 
                            swal("Meja  " + name + " berhasil dihapus",{
                                icon: "success",
                            }).then((value) => {
                                location.reload();
                            });
                        },500);
                    }else{
                        setTimeout(function(){
                            $("#loading").modal('hide'); 
                            swal("Meja gagal dihapus",{
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