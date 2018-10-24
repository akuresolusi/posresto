<header class="white lighten-2 relative nav-sticky p-0">
    <div class="container-fluid ">
        <div class="row p-t-b-20">
            <div class="col-6">
                <h4 class="text-blue mt-1 mb-0">
                    <?php echo $title; ?>
                </h4>
            </div>
            <div class="col-6">
                <a href="<?php echo base_url(); ?>item/add" class="btn btn-sm float-right btn-primary"><span class="icon-add"></span> Add Data</a>
            </div>
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
                        <th>Name</th>
                        <th>Category</th>
                        <th>Pricing</th>
                        <th width="135px">Action</th>
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
                            <td>
                                <a href="#" class="btn btn-xs btn-primary">View</a>
                                <a href="#" class="btn btn-xs btn-warning">Update</a>
                                <a href="#" class="btn btn-xs btn-danger">Delete</a>
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