<header class="white lighten-2 relative nav-sticky p-0">
    <div class="container-fluid ">
        <div class="row p-t-b-20">
            <div class="col-6">
                <h4 class="text-blue mt-1 mb-0">
                    <?php echo $title; ?>
                </h4>
            </div>
            <div class="col-6">
                <button class="btn btn-sm float-right btn-primary" onclick="add_category()"><span class="icon-add"></span> Add Data</button>
            </div>
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
                        <th>Category Name</th>
                        <th width="40"></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($categories as $categori){?>
                        <tr>
                            <td><?php echo $categori['id'];?></td>
                            <td><?php echo $categori['categori'];?></td>
                            <td>
                                <button class="btn btn-warning btn-xs" onclick="edit_category(<?php echo $categori['id'];?>)"><i class="icon-edit"></i></button>
                                <button class="btn btn-danger btn-xs" onclick="delete_category(<?php echo $categori['categori'];?>)"><i class="icon-trash"></i></button>
                            </td>
                        </tr>
                        <?php }?>
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
 
 
    function add_category()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }
 
    function edit_category(id)
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
            $('[name="categories_name"]').val(data.categori);
 
 
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Categories'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
 
 
 
    function save_category()
    {
      var url;
      if(save_method == 'add'){
          url = "<?php echo site_url('categories/add')?>";
      }else{
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
 
    function delete_category(id)
    {
      if(confirm('Are you sure delete this data ?'))
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
                      <label>Category Name</label>
                      <input type="text" name="categories_name" class="form-control" required="">
                        <div class="invalid-feedback">
                          Please choose categories name.
                        </div>
                  </div>
                </form>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" id="btnSave" onclick="save_category()" class="btn btn-sm btn-success"><span class="icon-save"></span> Save</button>
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><span class="icon-remove"></span> Close</button>
            </div>
        </div>
    </div>
</div>