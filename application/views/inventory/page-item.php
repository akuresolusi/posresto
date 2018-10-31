<style type="text/css">
    .title{
        font-size: 12px;
        margin-top: 0px;
        margin-bottom: 5px;
        color: #ccc;
        display: inline;
    }
    .content{
        font-size: 14px;
        padding: 0;
        margin-top: 5px;
        margin-bottom: 5px;
        font-weight: 600;
        display: inline;

    }
    .list-group-item{
        padding: 10px;
    }
    .img{
        margin: 0 auto;
        display: block;
    }
</style>
<header class="blue lighten-2 relative">
    <div class="container-fluid text-white">
        <div class="row p-t-b-10 ">
            <div class="col">
                <h4>
                    <i class="icon-package"></i>
                    <?php echo $title; ?>
                </h4>
            </div>
        </div>
        <div class="row">
            <ul class="nav responsive-tab nav-material nav-material-white">
                <li>
                    <a class="nav-link active" href="<?php echo base_url('item'); ?>"><i class="icon icon-list"></i>All Products</a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo base_url('item/add'); ?>"><i class="icon icon-plus"></i> Add Products</a>
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
                       data-options='{ "paging": false; "searching":false}'>
                    <thead>
                    <tr>
                        <th width="10">No</th>
                        <th>NAME</th>
                        <th>CATEGORY</th>
                        <th>PRICING</th>
                        <th width="80"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i=0;
                        foreach ($list as $value){
                        $i++;
                        $iditem = $this->encrypt->encode($value['iditem']);
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $value['name'] ?></td>
                            <td><?php echo $value['categori'] ?></td>
                            <td>Rp <?php echo $value['price'] ?></td>
                            <td align="center">
                                <a style="cursor: pointer;" value_id="<?php echo $iditem ?>"  class="btn-fab btn-fab-sm shadow btn-primary view-item" ><i class="icon-eye"></i></a>
                                <a style="cursor: pointer;" value_id="<?php echo $value['iditem']; ?>" class="btn-fab btn-fab-sm shadow btn-warning update-item"><i class="icon-edit"></i></a>
                                <a style="cursor: pointer;" value_id="<?php echo $iditem; ?>" class="btn-fab btn-fab-sm shadow btn-danger delete-item"><i class="icon-trash"></i></a>
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

<!-- modal Form input -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
              <h5 class="modal-title">Detail Products</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body p-2">
            <div class="row" style="padding: 0 15px;">
                <div class="col-md-12 mb-3 mt-2">
                    <img src="" id="modal_image" class="img" width="150" />
                </div>
                <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td width="100px"><p class="text-muted title">Item Name</p></td>
                            <td colspan="3"><h4 class="content" id="modal_name"></h4></td>
                        </tr>
                        <tr>
                            <td><p class="text-muted title">Category</p></td>
                            <td><h4 class="content" id="modal_categori"></h4></td>
                        </tr>
                        <tr>
                            <td><p class="text-muted title">Price</p></td>
                            <td><h4 class="content" id="modal_price"></h4></td>
                        </tr>
                        <tr>
                            <td><p class="text-muted title">Description</p></td>
                            <td colspan="3"><h4 class="content" id="modal_desc"></h4></td>
                        </tr>
                    </tbody>
                </table>
                </div>
                <div class="col-md-12 mb-2 p-2">
                    <h6><strong>List Variant</strong></h6>
                </div>
                    <table id="list-variant" class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="10">No</th>
                                <th>Item Name</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- varint list -->
                        </tbody>
                    </table>
                </div>
        </div>
      </div>
      
    </div>
</div>


<script type="text/javascript">
$(document).ready(function () {

    $(".view-item").click(function() {
        var id = $(this).attr('value_id');
        // alert(id);
        $.ajax({ 
            type: 'GET', 
            url: '<?php echo base_url('item/json_detail_item/'); ?>', 
            data: { id : id }, 
            success: function(data){ 
                var obj = $.parseJSON(data);
                $("#modal_name").html(obj['name']);
                $("#modal_categori").html(obj['categori']);
                $("#modal_price").html(obj['price']);
                $("#modal_desc").html(obj['desc']);
                $("#modal_image").attr('src' ,'<?php echo base_url('assets/gambar/'); ?>' + obj['iduser'] + '/' + obj[1][0]['image']);


                $("#list-variant tbody").html('');
                var i = 0;
                $.each(obj[0], function(index, value) {
                    i++;
                    var markup = "<tr><td>" + i + "</td><td>" + value['name'] + "</td><td>" + value['price'] + "</td></tr>";
                    $("#list-variant tbody").append(markup);
                });

                $('#myModal').modal('show');
                
            }
        });
    });


    $(".update-item").click(function() {
        var id = $(this).attr('value_id');
        window.location.href = "<?php echo base_url('item/update/'); ?>" + id;
    });

    $(document).on("click", ".delete-item", function(){
        var id      = $(this).attr('value_id');
        var element = $(this).parents("tr");
        $.ajax({ 
            type: 'GET', 
            url: '<?php echo base_url('item/delete_item/'); ?>', 
            data: {id : id}, 
            success: function(data){
                var data = $.parseJSON(data); 
                if(data['status'] == 'true'){
                    swal('Item ' + name + ' ' + ' Serta Variant pada item berhasil dihapus');
                    element.remove();
                }else{
                    swal('Tidak dapat dihapus item ' + name + ' atau variant telah ditransaksikan');
                }
            }
        });
    });


});

</script>