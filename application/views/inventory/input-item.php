<?php echo form_open_multipart(''); ?>
<header class="white lighten-2 relative nav-sticky p-0">
    <div class="container-fluid ">
        <div class="row p-t-b-20">
            <div class="col-6">
                <h4 class="text-blue mt-1 mb-0">
                    <?php echo $title; ?>
                </h4>
            </div>
            <div class="col-6">
                <button type="submit" class="btn btn-sm float-right btn-success"><span class="icon-save"></span> Save</button>
            </div>
        </div>
    </div>
</header>

<div class="row p-3">
    
    <!-- Item Profile -->
    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-header white">
                <p style="display: inline;"><i class="icon-package blue-text"></i>
                <strong> Item Profile </strong> </p>
            </div>
            <div class="card-body b-b">
                <div class="row clearfix p-2">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="form-line">
                                <label>Item Name</label>
                                <input type="text" required="" name="name" maxlength="200" value="<?php echo $this->input->post('name') ?>" class="form-control">
                                <?php echo form_error('name','<span class="text-red">','</span>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
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
                         <div class="form-group">
                            <div class="form-line">
                                <label>Price</label>
                                <input type="number" name="price" required="" value="<?php echo $this->input->post('price') ?>" class="form-control">
                                <?php echo form_error('price','<span class="text-red">','</span>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label>Image</label>
                                <input type="file" class="form-control" accept="image/png, image/jpeg" name="gambar" onchange="readURL(this);">
                                <img id="blah" src="#" class="img-responsive align-center" style="max-height: 200px;" />
                            </div>
                        </div>
                                               <div class="form-group">
                            <div class="form-line">
                                <label>Description</label>
                                <textarea class="form-control" rows="6" name="desc"><?php echo $this->input->post('desc') ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Item Profile -->

    <!-- Varian -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header white">
                <p style="display: inline;"><i class="icon-cogs blue-text"></i>
                <strong>Variant</strong> </p>
            </div>
            <div class="card-body b-b">
                <div class="row clearfix">
                    <div class="col-md-12 mb-1">
                        <a id="add-variant" class="btn btn-xs btn-primary float-right">Add Variant</a>
                    </div>
                    <table id="table-variant" width="100%" class="table" >
                        <tbody>
                            <!-- generate input variant -->

                            <?php
                            $variant_name = $this->input->post('variantname');
                            $variant_price = $this->input->post('variantprice');
                            for ($i=0; $i < count($variant_name); $i++) { 
                            ?>
                            <tr>
                                <td style='border: none;' width='55%'>
                                    <label>Name Item</label>
                                    <input type='text' name='variantname[]' required='' value="<?php echo $variant_name[$i]; ?>"  class='form-control'>
                                </td>
                                <td style='border: none;'>
                                    <label>Price</label>
                                    <input type='number' name='variantprice[]' required='' value="<?php echo $variant_price[$i]; ?>" class='form-control'>
                                </td>
                                <td class='align-bottom' style='border: none;'>
                                    <a class='btn btn-sm btn-danger delete-row'>DEL</a>
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
    <!-- End Variant -->

</div>
<?php echo form_close(); ?>


<script type="text/javascript">

    $(document).ready(function(){
        

        $("#add-variant").click(function(){
            var markup = "<tr><td style='border: none;' width='55%'><label>Name Item</label><input type='text' name='variantname[]'  class='form-control'></td><td style='border: none;'><label>Price</label> <input type='number' name='variantprice[]' required='' class='form-control'></td><td class='align-bottom' style='border: none;'><a class='btn btn-sm btn-danger delete-row'>DEL</a></td></tr>";
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