<header class="white lighten-2 relative nav-sticky p-0">
    <div class="container-fluid ">
        <div class="row p-t-b-20">
            <div class="col-6">
                <h4 class="text-blue mt-1 mb-0">
                    <?php echo $title; ?>
                </h4>
            </div>
            <div class="col-6">
                <button class="btn btn-sm float-right btn-primary" onclick="add_discount()"><span class="icon-add"></span> Add Data</button>
            </div>
        </div>
    </div>
</header>
<div class="row p-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body b-b">
                <table class="table table-hover table-bordered table-striped data-tables"
                       data-options='{ "paging": true; "searching":true}'">
                    <thead>
                    <tr>
                        <th width="10">No</th>
                        <th>Discount Names</th>
                        <th>Amount</th>
                        <th width="40"></th>
                    </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );
    var save_method; //for save method string
    var table;
 
 
    function add_discount()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }
 
    function edit_discount(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
 
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('categories/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.id);
            $('[name="categories_name"]').val(data.categories_name);
 
 
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Categories'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
 
 
 
    function save_discount()
    {
      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('categories/add')?>";
      }
      else
      {
        url = "<?php echo site_url('categories/update')?>";
      }
        

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                swal("ERROR!", "Category names cannot be empty.", "error");
            }
        });
    }
 
    function delete_discount(id)
    {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('categories/delete_by_id')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
              
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }

  </script>

<!-- The Modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add Categories</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body form">
                <form action="#" id="form" onkeypress="return event.keyCode != 13;">
                    <input type="hidden" value="" name="id"/>
                  <div class="form-group">
                      <label>Discount Name</label>
                      <input type="text" name="categories_name" class="form-control" required="">
                  </div>
                  <div class="form-group">
                      <label>Amount</label>
                      <input type="text" name="categories_name" class="form-control" required="">
                  </div>
                  <div class="form-group mb-0">
                    <label>Options</label>
                  </div>
                  <div class="form-group mb-0">
                      <div class="toggle-button toggle-button--aava">
                          <input id="toggleButton" type="checkbox">
                          <label for="toggleButton" data-on-text="On" data-off-text="%&nbsp;"></label>
                      </div>
                      <div class="toggle-button toggle-button--aava">
                          <input id="toggleButton2" type="checkbox">
                          <label for="toggleButton2" data-on-text="On" data-off-text="Rp"></label>
                      </div>
                  </div>
                </form>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" id="btnSave" onclick="save_discount()" class="btn btn-sm btn-success"><span class="icon-save"></span> Save</button>
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><span class="icon-remove"></span> Close</button>
            </div>
        </div>
    </div>
</div>