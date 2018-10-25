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
                    <a class="nav-link active" href="<?php echo base_url('item/add'); ?>"><i class="icon icon-plus-circle"></i> Add New Product</a>
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
                            <input type="text" required="" name="name" maxlength="200" value="<?php echo $this->input->post('name') ?>" class="form-control">
                            <?php echo form_error('name','<span class="text-red">','</span>'); ?>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-line">
                            <label>Categories</label>
                            <select class="custom-select" name="categori" required="">
                                <option value=""></option>
                                <?php
                                foreach ($categori as $value) {
                                    echo"<option value='".$value['id']."'>".$value['categori']."</option>";
                                }
                                ?>
                            </select>
                            <?php echo form_error('categori','<span class="text-red">','</span>'); ?>
                        </div>
                    </div>
                     <div class="form-group col-md-4">
                        <div class="form-line">
                            <label>Price</label>
                            <input type="number" name="price" required="" value="<?php echo $this->input->post('price') ?>" class="form-control">
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
                            <input type="file" class="form-control-file" accept="image/png, image/jpeg" name="gambar" onchange="readURL(this);">
                            <img id="blah" src="#" class="img-responsive align-center mt-3" style="max-height: 200px; " />
                        </div>
                    </div>
                   <div class="form-group col-md-12">
                        <div class="form-line">
                            <label>Description</label>
                            <textarea class="form-control" rows="6" name="desc"><?php echo $this->input->post('desc') ?></textarea>
                            <input type="submit" >
                        </div>
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
            var markup = "<tr><td style='border: none; padding-left: 0;'><label>Item Name</label><input type='text' name='variantname[]'  class='form-control'></td><td style='border: none;  width='20%'><label>Price</label> <input type='number' name='variantprice[]' required='' class='form-control'></td><td style='border: none; padding:30px 0 5px 5px;'><a class='btn-fab btn-fab-sm shadow btn-danger delete-row' style='cursor:pointer;'><span class='icon-close2'></span></a></td></tr>";
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

    $('#blah').hide();
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