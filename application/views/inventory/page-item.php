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
                                <a href="#" class="btn-fab btn-fab-sm shadow btn-primary" data-toggle="modal" data-target="#myModal"><i class="icon-eye"></i></a>
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
                    <h4 class="content"><?php echo $value['name'] ?></h4>
                </li>
                <li class="list-group-item">
                    <p class="text-muted title">Category</p>
                    <h4 class="content"><?php echo $value['categori'] ?></h4>
                </li>
            </ul>
        </div>
      </div>
      
    </div>
</div>