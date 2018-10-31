<?php echo form_open_multipart(''); ?>
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
                    <a class="nav-link" href="<?php echo base_url('item'); ?>"><i class="icon icon-list"></i>All Products</a>
                </li>
                <li>
                    <a class="nav-link active" href="<?php echo base_url('item/update/'. $id); ?>"><i class="icon icon-list"></i>Update Product</a>
                </li>
            </ul>
        </div>
    </div>
</header>

<div class="row p-3">
    <!-- Item Profile -->
    <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-header white">
                <p style="display: inline;"><i class="icon-package blue-text"></i>
                <strong> Item Profile </strong> </p>
            </div>
            <div class="card-body b-b">
                <div class="row clearfix p-2">
                    <div class="form-group col-md-4">
                        <div class="form-line">
                            <label>Item Name</label>
                            <input type="text" required="" name="name" maxlength="200" value="<?php echo $data['name']; ?>" class="form-control">
                            <?php echo form_error('name','<span class="text-red">','</span>'); ?>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-line">
                            <label>Categories</label>
                            <select class="custom-select" name="categori" value="3" required="">
                                <option value=""></option>
                                <?php
                                foreach ($categori as $value) {
                                    if( $value['id'] == $data['idcategori']){
                                        echo"<option value='".$value['id']."' selected>".$value['categori']."</option>";
                                    }else{
                                        echo"<option value='".$value['id']."'>".$value['categori']."</option>";    
                                    }
                                    
                                }
                                ?>
                            </select>
                            <?php echo form_error('categori','<span class="text-red">','</span>'); ?>
                        </div>
                    </div>
                     <div class="form-group col-md-4">
                        <div class="form-line">
                            <label>Price</label>
                            <input type="number" name="price" required="" value="<?php echo $data['price']; ?>" class="form-control">
                            <?php echo form_error('price','<span class="text-red">','</span>'); ?>
                        </div>
                    </div>
                    <div class="col-md-12 mb-1">
                        <a id="add-variant" class="btn btn-sm btn-primary"><span class="icon-add"></span> Add Variant</a>
                    </div>
                    <div class="col-md-12 mb-1">
                    <table id="table-variant" class="table">
                        <tbody>
                            <!-- generate input variant -->

                            <?php

                            foreach ($variant as $value) {
                            ?>
                            <tr>
                                <div class="col-md-4">
                                    <td style='border: none;'>
                                        <label>Item Name</label>
                                        <input type="hidden" name="update_variantid[]" value="<?php echo $value['id'] ?>">
                                        <input type='text'  required='' name="update_variantname[]" value="<?php echo $value['name']; ?>"  class='form-control'>
                                    </td>
                                </div>
                                <div class="col-md-4">
                                    <td style='border: none;'>
                                        <label>Price</label>
                                        <input type='number' required='' name="update_variantprice[]" value="<?php echo $value['price']; ?>" class='form-control'>
                                    </td>
                                </div>
                                <div class="col-md-4">
                                    <td style='border: none; padding:30px 0 5px 5px;'><a class='btn-fab btn-fab-sm shadow btn-danger delete-variant' value_name="<?php echo $value['name']; ?>" value_id="<?php echo $value['id']; ?>" style='cursor:pointer;'><span class='icon-close2'></span></a>
                                <div class="col-md-4">
                            </tr>
                            <?php
                            }



                            $variant_name = $this->input->post('variantname');
                            $variant_price = $this->input->post('variantprice');
                            for ($i=0; $i < count($variant_name); $i++) { 
                            ?>
                            <tr>
                                <div class="col-md-4">
                                    <td style='border: none;'>
                                        <label>Item Name</label>
                                        <input type='text' name='variantname[]' required='' value="<?php echo $variant_name[$i]; ?>"  class='form-control'>
                                    </td>
                                </div>
                                <div class="col-md-4">
                                    <td style='border: none;'>
                                        <label>Price</label>
                                        <input type='number' name='variantprice[]' required='' value="<?php echo $variant_price[$i]; ?>" class='form-control'>
                                    </td>
                                </div>
                                <div class="col-md-4">
                                    <td style='border: none; padding:30px 0 5px 5px;'><a class='btn-fab btn-fab-sm shadow btn-danger delete-row' style='cursor:pointer;'><span class='icon-close2'></span></a>
                                <div class="col-md-4">
                            </tr>
                            <?php                     
                            } 
                            ?>
                        </tbody>
                    </table>
                </div>
                    <div class="form-group col-md-12">
                        <div class="form-line">
                            <label>Image</label>
                            <input type="file" class="form-control" accept="image/png, image/jpeg" name="gambar" onchange="readURL(this);">
                            <img id="blah" src="<?php echo base_url('assets/gambar/'. $iduser.'/'. $image['image']); ?>" class="img-responsive align-center mt-3" style="max-height: 200px; " />
                        </div>
                    </div>
                   <div class="form-group col-md-12">
                        <div class="form-line">
                            <label>Description</label>
                            <textarea class="form-control" rows="6" name="desc"><?php echo $data['desc']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-sm btn-success"><span class="icon-save"></span> Save</button>
                        <button type="reset" class="btn btn-sm btn-danger"><span class="icon-close"></span> Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Item Profile -->

</div>
<?php echo form_close(); ?>


<script type="text/javascript">

    $(document).ready(function(){
        

        $("#add-variant").click(function(){
            var markup = "<tr><td style='border: none; padding-left: 0;'><label>Item Name</label><input type='text' name='variantname[]'  class='form-control'></td><td style='border: none;  width='20%'><label>Price</label> <input type='number' name='variantprice[]' required='' class='form-control'></td><td style='border: none; padding:30px 0 5px 5px;'><a class='btn-fab btn-fab-sm shadow btn-danger delete-row' style='cursor:pointer;'><span class='icon-close'></span></a></td></tr>";
            $("#table-variant tbody").append(markup);
        });

        <?php
            $pesan = $this->session->flashdata('pesan');
            if(!empty($pesan)){
                echo"swal('".$pesan."');";
            }
        ?>

    });

    $(document).on("click", ".delete-row", function(){
        $(this).parents("tr").remove();
    });

    $(document).on("click", ".delete-variant", function(){
        var id      = $(this).attr('value_id');
        var name    = $(this).attr('value_name');
        var element = $(this).parents("tr");

        $.ajax({ 
            type: 'GET', 
            url: '<?php echo base_url('item/delete_variant/'); ?>' + id, 
            data: { get_param: 'value' }, 
            success: function(data){
                var data = $.parseJSON(data); 
                if(data['status'] == 'true'){
                    swal('Variant ' + name + ' ' + 'berhasil dihapus');
                    element.remove();
                }else{
                    swal('Tidak dapat dihapus item ' + name + ' telah ditransaksikan');
                }
            }
        });

    });

    function cek_image(){
        var image = '<?php echo $image['image']; ?>';
        if(image == ""){
           $('#blah').hide();
        }
    }
    cek_image();

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
            $('#blah').show();
        }
    }
</script>