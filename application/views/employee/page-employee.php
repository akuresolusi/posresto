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
                    <a class="nav-link active" href="<?php echo base_url('categories'); ?>"><i class="icon icon-list"></i>All <?php echo $title; ?></a>
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
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th width="50"></th>
                    </tr>
                    </thead>
                    <tbody>
                       <td>1</td>
                       <td>Agus Setiawan</td>
                       <td>08121234567</td>
                       <td>Tj. Morawa</td>
                       <td align="center">
                            <a style="cursor: pointer;" class="btn-fab btn-fab-sm shadow btn-warning"><i class="icon-edit"></i></a>
                            <a  style="cursor: pointer;" class="btn-fab btn-fab-sm shadow btn-danger"><i class="icon-trash"></i></a>
                        </td>
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
      <div class="modal-body">
        <form>
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="" class="form-control">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="" class="form-control">
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea class="form-control"> </textarea>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="Password" name="" class="form-control">
            </div>
        </form>
      </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-success"><span class="icon-save"></span> Save</button>
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><span class="icon-remove"></span> Close</button>
        </div>
    </div>
  </div>
</div>