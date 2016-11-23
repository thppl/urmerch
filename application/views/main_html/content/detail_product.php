    <section class="bg-dark" id="catalog" style="padding-bottom:70px; padding-top: 0px;">
        <aside>
            <div class="container">
                <div class="col-md-6 col-xs-12" style="padding-left:0;">
                    <div class="call-to-action">
                        <h3><?=($table->num_rows()>0)?$table->row()->product_name:'N/A'?>
                        -
                        <?=($table->num_rows()>0)?$this->GLobalModel->select(array("band_code"=>$table->row()->band_code), "ur_band")->row()->band_name:'N/A'?></h3>
                    </div>
                </div>
                
                <div class="col-md-6 col-xs-12">
                    <div class="call-to-action text-right" style="padding-right:0;">
                        <h5 class="text-muted">Home / Catalog / <?=($table->num_rows()>0)?$this->GLobalModel->select(array("category_code"=>$table->row()->category), "ur_category")->row()->category_name:'N/A'?> , <?=($table->num_rows()>0)?$this->GLobalModel->select(array("band_code"=>$table->row()->band_code), "ur_band")->row()->band_name:'N/A'?> / <?=($table->num_rows()>0)?$table->row()->product_name:'N/A'?></h5>
                    </div>
                </div>

            </div>
        </aside>
        <!-- SnapWidget -->
        <div class="container" >
            <div class="row catalog ">
                <div class="col-md-5 col-xs-12 ">
                    <img class="img-responsive" src="http://placehold.it/450x703" alt="">
                </div>
                <form id='formCart' method='POST' action='<?=base_url('index/addtocartpost')?>' data-band="<?= ($table->num_rows()>0)?$this->GLobalModel->select(array("band_code"=>$table->row()->band_code), "ur_band")->row()->band_code:'N/A'?>">
                <div class="col-md-7 col-xs-12 text-left">
                     <h2><?=$table->num_rows()>0?$table->row()->product_name:'N/A'?></h2>
                     <p class="price" id="price">Rp <?=$table->num_rows()>0?($retVal = ($table->row()->harga!=0) ? number_format($table->row()->harga) : 'N/A') :'N/A'?></p>
                     <hr />
                     <div class="col-md-12 col-xs-12 size">
                        <div class="col-md-4 col-xs-6 no-left">
                            <p style="padding-top:6px;">Chose Size</p>
                        </div>
                        <div class="col-md-7 col-xs-6 no-left">
                            <select class="form-control bg-light-dark" id="sizeProduct" name="size">
                                <?php 
                                    foreach ($table->result_array() as $row) { 
                                if ($row['size']!="") {
                                        ?>
                                        <option value="<?=$row['size']?>"><?=$row['size']?></option>
                                <?php 
                                    }else{
                                    ?>
                                        <option value="0">N/A</option>
                                <?php 
                                }
                                }
                                ?>
                            </select>
                            <input type="hidden" name="product_code" value="<?=$table->num_rows()>0?$table->row()->product_code:''?>"></input>
                        </div> 
                    </div>
                    <div class="col-md-12 col-xs-12 qtyy">
                        <div class="col-md-4 col-xs-6 no-left">
                                <input type='button' value='-' class='btn qtyminus bg-light-dark' field='quantity' />
                                <input type='text' readonly="" name='quantity' value='1' class='qty form-control bg-dark' />
                                <input type='button' value='+' class='btn qtyplus bg-light-dark' field='quantity' />
                        </div>
                        <div class="col-md-7 col-xs-6 no-left">
                            <button type="submit" class="btn btn-primary btn-xl">Add To Cart</button>
                        </div> 
                    </div>
                    <p class="text-muted">quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                    
                </div>
                </form>
            </div>
            <div class="row descript">
                <div class="col-md-12 col-xs-12 ">
                    <ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab" href="#home">Description</a></li>
                      <li><a data-toggle="tab" href="#menu1">Review </a></li>
                      <li><a data-toggle="tab" href="#menu2">Additional Information</a></li>
                    </ul>

                    <div class="tab-content">
                      <div id="home" class="tab-pane fade in active">
                        <h3>Product Description</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>

                      </div>
                      <div id="menu1" class="tab-pane fade">
                        <h3>Menu 1</h3>
                        <p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p>
                      </div>
                      <div id="menu2" class="tab-pane fade">
                        <h3>Menu 2</h3>
                        <p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                      </div>
                    </div>                
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Related Products </h2>
                    <hr/>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a class="thumbnail" href="#">
                        <figure>
                            
                            <img class="img-responsive" src="http://placehold.it/248x349" alt="">
                            
                            <figcaption>
                                <h2>Product Name</h2>
                                <br/>
                                <button type="submit" onclick="window.open('http://google.com');" class="btn btn-primary btn-l" >Details</button>                                    
                                <br/><br/>
                                <button type="submit" onclick="window.open('http://google.com');" class="btn btn-primary btn-l" >Add to Cart</button>                                    
                            </figcaption>
                            
                        </figure>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a class="thumbnail" href="#">
                        <figure>
                            
                            <img class="img-responsive" src="http://placehold.it/248x349" alt="">
                            
                            <figcaption>
                                <h2>Product Name</h2>
                                <br/>
                                <button type="submit" onclick="window.open('http://google.com');" class="btn btn-primary btn-l" >Details</button>                                    
                                <br/><br/>
                                <button type="submit" onclick="window.open('http://google.com');" class="btn btn-primary btn-l" >Add to Cart</button>                                    
                            </figcaption>
                            
                        </figure>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a class="thumbnail" href="#">
                        <figure>
                            
                            <img class="img-responsive" src="http://placehold.it/248x349" alt="">
                            
                            <figcaption>
                                <h2>Product Name</h2>
                                <br/>
                                <button type="submit" onclick="window.open('http://google.com');" class="btn btn-primary btn-l" >Details</button>                                    
                                <br/><br/>
                                <button type="submit" onclick="window.open('http://google.com');" class="btn btn-primary btn-l" >Add to Cart</button>                                    
                            </figcaption>
                            
                        </figure>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a class="thumbnail" href="#">
                        <figure>
                            
                            <img class="img-responsive" src="http://placehold.it/248x349" alt="">
                            
                            <figcaption>
                                <h2>Product Name</h2>
                                <br/>
                                <button type="submit" onclick="window.open('http://google.com');" class="btn btn-primary btn-l" >Details</button>                                    
                                <br/><br/>
                                <button type="submit" onclick="window.open('http://google.com');" class="btn btn-primary btn-l" >Add to Cart</button>                                    
                            </figcaption>
                            
                        </figure>
                        </a>
                    </div>
                    

                </div>            
            </div>
        </div>
    </section>
        <!-- jQuery -->
    <script src="<?=base_url('assets/js/jquery.js');?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("form#formCart").on('submit', function(e){
                e.preventDefault();
                $.ajax({
                  type: $("form#formCart").attr('method'),
                  url: $("form#formCart").attr('action'),
                  data: $("form#formCart").serialize(),
                  dataType: "JSON",
                  success: function (i) {
                    if (i.status == "success") {
                        window.location.href = "<?= base_url('Index/band_detail'); ?>/"+$("form#formCart").data("band");
                    }
                  }
                });
            });
            $('select#sizeProduct').on('change', function(e){
                $.ajax({
                  type: $("form#formCart").attr('method'),
                  url: '<?=base_url('index/changecategori')?>',
                  data: $("form#formCart").serialize(),
                  dataType: "JSON",
                  success: function (i) {
                    $("form#formCart").find("p#price").html("Rp "+i.data.harga);
                  }    
                });                
            });
        });
    </script>