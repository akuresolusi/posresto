<style type="text/css">
    .title{
        font-size: 12px;
        margin-bottom: 5px;
        color: #ccc;
    }
    .content{
        font-size: 14px;
        padding: 0;
        margin-top: 5px;
        margin-bottom: 5px;
        font-weight: 600;
        text-transform: uppercase;
    }
    .list-group-item{
        padding: 10px;
    }
    .foto img{
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
                    <a class="nav-link" href="<?php echo base_url('item/add'); ?>"><i class="icon icon-plus-circle"></i> Add New Product</a>
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
                        foreach ($list as $value) {
                        $i++;
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $value['name'] ?></td>
                            <td><?php echo $value['categori'] ?></td>
                            <td>Rp <?php echo $value['price'] ?></td>
                            <td align="center">
                                <a value_id="<?php echo $value['iditem'] ?>"  class="btn-fab btn-fab-sm shadow btn-primary view-item" ><i class="icon-eye"></i></a>
                                <a href="#" class="btn-fab btn-fab-sm shadow btn-warning"><i class="icon-edit"></i></a>
                                <a href="#" class="btn-fab btn-fab-sm shadow btn-danger"><i class="icon-close"></i></a>
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
              <h4 class="modal-title">View Products</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <ul class="list-group">
                <li class="list-group-item">
                    <p class="text-muted title">Item Name</p>
                    <h4 class="content" id="modal_name"></h4>
                </li>
                <li class="list-group-item">
                    <p class="text-muted title">Category</p>
                    <h4 class="content" id="modal_categori"></h4>
                </li>
                <li class="list-group-item">
                    <p class="text-muted title">Harga</p>
                    <h4 class="content" id="modal_price"></h4>
                </li>
                <li class="list-group-item">
                    <p class="text-muted title">description</p>
                    <h4 class="content" id="modal_desc"></h4>
                </li>
                <li class="list-group-item">
                    <p class="text-muted title">image</p>
                    <h4 class="content">
                        <img src="" id="modal_image" hight='200px' />
                    </h4>
                </li>
                <li class="list-group-item">
                    <p class="text-muted title">Variant</p>
                    <div class="content">
                        <table align="center" id="list-variant">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Item Name</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- varint list -->
                            </tbody>
                        </table>
                    </div>
                </li>
            </ul>
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
            url: '<?php echo base_url('item/json_detail_item'); ?>?id=' + id, 
            data: { get_param: 'value' }, 
            success: function(data) { 
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

});

</script>