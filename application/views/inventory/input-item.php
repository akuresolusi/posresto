<header class="white lighten-2 relative nav-sticky p-0">
    <div class="container-fluid ">
        <div class="row p-t-b-20">
            <div class="col-6">
                <h4 class="text-blue mt-1 mb-0">
                    <?php echo $title; ?>
                </h4>
            </div>
            <div class="col-6">
                <form action="#">
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
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label>Categories</label>
                                <select class="form-control">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label>Image</label>
                                <input type="file" class="form-control" placeholder="Item Name">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Item Profile -->

    <!-- Pricing - Inventory - Cost -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header white">
                <p style="display: inline;"><i class="icon-cogs blue-text"></i>
                <strong> Pricing - Inventory - Cost  </strong> </p>
            </div>
            <div class="card-body b-b">
                    <div class="row clearfix">
                        <!-- PRICE -->
                        <div class="col-md-12 mb-1">
                            <a href="#" class="btn btn-xs btn-primary float-right">Add Variant</a>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Price</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>SKU</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- END PRICE -->

                        <!-- Stock -->
                        <div class="col-md-12 mb-1">
                            <a href="#" class="btn btn-xs btn-primary float-right">Manage Item Inventory and Alerts</a>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>In Stock</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- End Stock -->

                        <!-- COGS -->
                        <div class="col-md-12 mb-1">
                            <a href="#" class="btn btn-xs btn-primary float-right">Manage Cost Of Goods Sold</a>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Avg Cost</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div> 
                        <!-- END COGS -->

                        <div class="col-md-12">
                            <label>Description</label>
                            <textarea class="form-control"></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end Pricing - Inventory - Cost -->
</div>