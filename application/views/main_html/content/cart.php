<section class="bg-dark" id="catalog" style="padding-bottom:70px; padding-top: 0;">
        <aside>
            <div class="container">
                <div class="col-md-6 col-xs-12" style="padding-left:0;">
                    <div class="call-to-action">
                        <h3>Shopping cart</h3>
                    </div>
                </div>
                
                <div class="col-md-6 col-xs-12">
                    <div class="call-to-action text-right" style="padding-right:0;">
                        <a href="<?=base_url('index/all_band')?>"><h5 class="text-muted">Continue shopping >></h5></a>
                    </div>
                </div>

            </div>
        </aside>
        
        <!-- SnapWidget -->
        <div class="container">
            <div class="row catalog">
                <div class="col-md-8 col-xs-12 bg-light-dark">
                    <?php foreach ($this->cart->contents() as $items) { ?>
                        <form id='myform' method='POST' action='<?=base_url('index/updateCart')?>'>
                        <div class="col-md-12 col-xs-12 cart-box ">
                            <div class="col-md-2 col-xs-4 bg-light-dark">
                                <?php
                                    $prod = $this->GLobalModel->select(array("product_code"=>$items["id"]), "ur_product")->row();
                                ?>
                                <a href="<?= base_url('index/detail_product').'/'.$prod->product_code;?>"><img class="img-responsive" src="http://placehold.it/120x180" alt=""></a>
                            </div>
                            <div class="col-md-5 col-xs-5 bg-light-dark">
                                <h5 style="margin-top:0;"><?=$items['name']?></h5>
                                <?php
                                    $band = $this->GLobalModel->select(array("band_code"=>$prod->band_code), "ur_band")->row();
                                ?>
                                <h5 class="text-muted"><a href="<?= base_url('index/band_detail').'/'.$band->band_code;?>"><?= $band->band_name?></a></h5>
                                <p class="">Rp. <?=number_format($items['price'])?></p>
                            </div>

                            <div class="col-md-4 col-xs-2 no-left">
                                    <input type="hidden" name="id" value="<?=$items['rowid']?>" />
                                    <input type='button' value='-' class='btn qtyminus bg-dark' field='quantity' />
                                    <input type='text' readonly="" name='quantity' value='<?=$items['qty']?>' class='qty form-control bg-dark' />
                                    <input type='button' value='+' class='btn qtyplus bg-dark' field='quantity' />
                                    <input type="submit" name="update" value="UPDATE" class='btn bg-dark' />
                            </div>
                            <div class="col-md-1 col-xs-1 bg-light-dark text-right" onclick="deleteCart('<?=$items['rowid']?>')">
                                <p class=""><a href"#">X</a></p>
                            </div>
                        </div>
                        </form>
                    <?php } ?>

                </div>

                <div class="col-md-4 col-xs-12 ">
                    <h5 style="margin-top:0;">Detail Order</h5>
                    <hr/>
                    <span class="col-md-6 col-xs-6 text-left no-padding"> Subtotal : </span><span class="col-md-6 col-xs-6 text-right no-padding">RP <?= number_format($total = ($this->cart->total()))?></span>
                    <br/><br/><br/>
                    <hr/>
                    <span class="col-md-6 col-xs-6 text-left no-padding"> PPN 10% : </span><span class="col-md-6 col-xs-6 text-right no-padding">RP <?= number_format($ppn = ($this->cart->total() * (10/100)))?></span>
                    <br/><br/><br/>
                    <hr/>
                    <span class="col-md-6 col-xs-6 text-left no-padding"> TOTAL <span class="text-muted">(Termasuk PPN)</span> : </span><span class="col-md-6 col-xs-6 text-right no-padding price-total">RP <?=number_format($total+$ppn)?></span>
                    <br/><br/><br/>
                    <a href="<?=base_url('index/customer_data')?>" class="btn btn-primary btn-xl">CONTINUE PAYMENT</a>
                </div>

            </div>
        </div>
    </section>
        <!-- jQuery -->
    <script src="<?=base_url('assets/js/jquery.js');?>"></script>
    <script type="text/javascript">
        function deleteCart(id){
            $.ajax({
              type: 'GET',
              url: '<?=base_url('index/deleteCart')?>/'+id,
              data: $("#myform").serialize(),
              success: function (i) {
                // alert(i);
                location.reload();
              }    
            });
        }
        $(document).ready(function(){
            $('#myform').on('submit', function(e){
                e.preventDefault();
                $.ajax({
                  type: $("#myform").attr('method'),
                  url: $("#myform").attr('action'),
                  data: $("#myform").serialize(),
                  success: function (i) {
                    // var jsonObjectParse = JSON.parse(i);
                    // var jsonObjectStringify = JSON.stringify(jsonObjectParse);
                    // var jsonObjectFinal = JSON.parse(jsonObjectStringify);
                    // alert(i);
                    location.reload();

                  }    
                });                
            });
        });
    </script>    