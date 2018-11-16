<style type="text/css">
    @media (min-width: 992px){
        .modal-lg {
            max-width: 80%;
        }
        .modal-xlg {
            max-width: 95%;
        }
</style>
<div class="row">
    <div class="col-md-8 p-0">
        <div class="card" style="border-right: 0; border-radius: 0;">
            <div class="card-body">
                <div class="row pl-3 pr-3">
                  <div class="col-9 p-0">
                    <div class="input-group focused">
                        <input class="form-control custom-search" id="myInput" style="border-right: none;" placeholder="Search something..." type="text" onkeyup="cari_items()">
                        <span class="input-group-btn">
                            <button  class="btn btn-default btn-transparent"><i class="icon-search"></i></button>
                        </span>
                    </div>
                  </div>
                  <div class="col-3 p-0 pl-2">
                    <div class="dropdown">
                      <button class="btn btn-primary btn-block" type="button" id="categori" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-heart-o mr-2"></i>
                        <span>All categories</span>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="categori">
                        <a class="dropdown-item pilih-kategori" value="" onclick="pilih_kategori('')" style="cursor: pointer;" >All categories</a>
                        
                        <?php
                         foreach ($list_categori as $value){
                            // $id = $this->encrypt->encode($value['id']);
                            $id = $value['id'];
                        ?>
                            <a class="dropdown-item pilih-kategori" style="cursor: pointer;" onclick="pilih_kategori('<?php echo $id ?>')" ><?php echo $value['categori'] ?></a>
                        <?php
                         }
                        ?>
                      </div>
                    </div>
                   <!--  <a href="#" class="btn btn-primary btn-block"><i class="icon-heart-o mr-2"></i>Categories</a> -->
                  </div>
                </div>
                <!-- END SEARCH -->

                <!-- MENU --> 
                <div class="row mt-2 mb-0 p-2 white slimScroll" data-height="505" id="mydata">

                    <!-- INSERT ITEM -->

                </div>
            </div>
        </div>
    </div>
    <!-- LIST MENU -->

    <!-- LIST ORDER -->
    <div class="col-md-4 p-0">
        <div class="card" style="border-radius: 0;">
            <div class="card-header white pr-2 pl-3">
                <p style="display: inline;"><i class="icon-clipboard-edit blue-text"></i>
                <strong> LIST ORDER </strong> </p>
                <a href="#" class="btn button-act btn-primary r-30 float-right" data-toggle="modal" data-target="#ModalDine"><i class="fal fa-plus"></i></a>
                <a href="#" class="btn button-act btn-primary r-30 float-right mr-2" data-toggle="modal" data-target="#ModalHold"><i class="fal fa-list"></i></a>
            </div>
            <div class="card-body p-0 bg-white">
                <div class="table-responsive slimScroll" data-height="320">
                    <table class="table table-hover table-striped">
                        <!-- Table heading -->
                        <tbody>
                        <tr>
                            <td class="col-md-6">Nasi Goreng</td>
                            <td class="col-md-2">
                                <input type="number" name="" class="form-control qty nmpd-target" value="0" readonly="readonly" data-numpad="nmpd1">
                            </td>
                            <td class="col-md-2">10.000</td>
                            <td class="col-md-2" align="right">10.000</td>
                            <td><a href="#"><i class="icon-delete text-red"></i></a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="container-fluid list">
                    <div class="row">
                        <div class="col-md-12 p-0">
                            <span id="left-list">Subtotal</span>
                            <span id="right-list">0</span>
                        </div>
                    </div>
                </div>
                <div class="container-fluid list">
                    <div class="row">
                        <div class="col-md-12 p-0">
                            <span id="left-list">Tax</span>
                            <span id="right-list">0</span>
                        </div>
                    </div>
                </div>
                <div class="container-fluid list mb-2">
                    <div class="row">
                        <div class="col-md-12 p-0">
                            <span id="left-list">Discount</span>
                            <span id="right-list">0%</span>
                        </div>
                    </div>
                </div>

                <div class="container-fluid list mb-3">
                    <div class="row">
                        <div class="col-md-12 p-0">
                        <!-- <a href="#" class="btn button-act btn-primary r-30 mr-1" data-toggle="popover" data-trigger="hover" data-content="Print" data-placement="top"><i class="fal fa-print"></i></a> -->

                        <!-- <a href="#" class="btn button-act btn-primary  r-30 mr-1" data-toggle="popover" data-trigger="hover" data-content="Send to Kitchen" data-placement="right"><i class="fal fa-utensils"></i></a> -->

                        <a href="#" class="btn button-act btn-danger  r-30 float-right" data-toggle="popover" data-trigger="hover" data-content="Cancel Order" data-placement="top"><i class="fal fa-times"></i></a>

                        <a href="#" class="btn button-act btn-warning  r-30 mr-2" data-toggle="popover" data-trigger="hover" data-content="Hold Order" data-placement="left"><i class="fal fa-clock"></i></a>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                    <a class="btn btn-success btn-block btn-pay" data-toggle="modal" data-target="#ModalTakeAway"><span style=" float:left; font-size: 20px; ">Pay</span> <span style="float: right; font-size: 20px; font-weight: bold;">Rp. 10.000</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>




<?php $this->load->view('pos/modal_bayar'); ?>
<?php $this->load->view('pos/modal_pilih_meja'); ?>
<?php $this->load->view('pos/modal_list_order'); ?>




