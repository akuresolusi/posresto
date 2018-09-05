<header class="white lighten-2 relative nav-sticky p-0">
    <div class="container-fluid ">
        <div class="row p-t-b-20">
            <div class="col-6">
                <h4 class="text-blue mt-1 mb-0">
                    <?php echo $title; ?>
                </h4>
            </div>
            <div class="col-6">
                <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-sm float-right btn-primary"><span class="icon-add"></span> Add Data</a>
            </div>
        </div>
    </div>
</header>
<div class="row p-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body b-b">
                <table class="table table-hover table-bordered table-striped data-tables"
                       data-options='{ "paging": true; "searching":true}'>
                    <thead>
                    <tr>
                        <th width="10">No</th>
                        <th>Category Name</th>
                        <th>Item Stock</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Seafood</td>
                            <td>20</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog ">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add Categories</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              <div class="form-group">
                  <label>Categories Name</label>
                  <input type="text" name="" class="form-control">
              </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-sm btn-success"><span class="icon-save"></span> Save</button>
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><span class="icon-remove"></span> Close</button>
            </div>
        </div>
    </div>
</div>