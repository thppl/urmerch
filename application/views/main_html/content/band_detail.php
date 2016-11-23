    <section class="bg-dark" id="catalog" style="padding-bottom:70px; padding-top: 0;">
        <aside>
            <div class="container">
                <div class="col-md-6 col-xs-12" style="padding-left:0;">
                    <div class="call-to-action">
                        <h3><?=$dataBand->row()->band_name?></h3>
                    </div>
                </div>
                
                <div class="col-md-6 col-xs-12">
                    <div class="call-to-action text-right" style="padding-right:0;">    
                    </div>
                </div>

            </div>
        </aside>
        
        <!-- SnapWidget -->
        <div class="container">
            <div class="row">
             
                <div class="col-lg-3 col-md-12 col-xs-12" >
                    <nav id="options" class="work-nav">
                        <img class="img-responsive" src="<?= base_url('assets/img/portfolio/'.$dataBand->row()->picture);?>" alt="">
                        <br/>
                        <span class="text-muted"><?=$dataBand->row()->band_name?></span> 
                        <br/>
                        <hr/>
                        <ul class="band-desc">
                            <li><a href="">Patd!band.com</a></li>
                            <li><a href="">Facebook</a></li>
                            <li><a href="">Twitter</a></li>
                            <li><a href="">Youtube</a></li>
                        </ul>
                        
                        <hr/>
                        <ul id="filters" class="simplefilter">
                            <?php
                                if ($this->session->userdata('username')) {
                                    ?>
                                        <li data-filter="1"><a>Product</a></li>
                                        <li data-filter="2"><a>Edit Profile</a></li>
                                        <li data-filter="3"><a>Upload Merch</a></li>
                                        <li data-filter="4"><a>Check Provit</a></li>
                                        <li><a href="<?= base_url('band/logout_band'); ?>">Logout</a></li>
                                    <?php
                                }else{
                                    ?>
                                        <li><a href="<?=base_url('band/Band')?>" data-option-value="*" class="">Login</a></li>
                                    <?php
                                }
                            ?>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-9 col-md-12 col-xs-12" id="editprofile">
                    <div class="filtr-band">
                        <div class="row filtr-item" data-category="1" style="width: 100%;">
                            <div class="col-md-12 col-xs-12" id="infilter">
                                <ul class="nav nav-tabs">
                                  <li class="active"><a data-toggle="tab" href="#merch">Merch </a></li>
                                  <li><a data-toggle="tab" href="#desc">Description</a></li>
                                </ul>

                                <div class="tab-content">
                                  <div id="desc" class="tab-pane fade">
                                    <h3>Band Description</h3>
                                    <p><?= $dataBand->row()->information; ?></p>

                                  </div>

                                  <div id="merch" class="tab-pane fade  in active">
                                    <div class="row">
                                    <?php
                                        foreach ($dataProduct->result() as $row) {
                                            ?>

                                                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                                    <a class="thumbnail">
                                                    <figure data-id="<?= $row->product_code?>" data-band="<?= $row->band_code?>">
                                                        
                                                        <img class="img-responsive" src="http://placehold.it/248x349" alt="">
                                                        
                                                        <figcaption>
                                                            <h2><?= $row->product_name?></h2>
                                                            <br/>
                                                            <?php
                                                                if ($this->session->userdata('username')) {
                                                                    ?>
                                                                        <button type="submit" class="btn btn-primary btn-l" id="btnProductEdit">Edit Merch</button>
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                        <button type="submit" class="btn btn-primary btn-l btn-block" id="btnProductDetail">Details</button>
                                                                        <br>
                                                                        <button type="submit" class="btn btn-primary btn-l btn-block" id="btnProductAddCart">Add To Cart</button>
                                                                    <?php
                                                                }
                                                            ?>
                                                            <br/><br/>
                                                                                               
                                                        </figcaption>
                                                        
                                                    </figure>
                                                    </a>
                                                </div>
                                            <?php
                                        }
                                    ?>                                      
                                    <div class="col-lg-12 col-md-12 col-xs-12" style="text-align:center;">
                                        <ul class="pagination pagination-lg">
                                          <li class="active"><a href="#">1</a></li>
                                          <li><a href="#">2</a></li>
                                          <li><a href="#">3</a></li>
                                          <li><a href="#">4</a></li>
                                          <li><a href="#">5</a></li>
                                        </ul>
                                    </div>
                                    </div>
                                  </div>
                                  
                                </div>                
                            </div>
                        </div>
                        <?php
                            if ($this->session->userdata('username')) {
                                ?>
                        <div class="row filtr-item" data-category="2" style="width: 100%;">
                            <div class="col-md-12 col-xs-12" id="infilter">
                                <ul class="nav nav-tabs">
                                  <li class="active"><a data-toggle="tab" href="#biodata">Biodata </a></li>
                                </ul>

                                <div class="tab-content">
                                  <div id="biodata" class="tab-pane fade in active">
                                    <h3>Edit Your Profile</h3>
                                    <p>
                                        <img class="img-responsive" src="<?= base_url('assets/img/portfolio/'.$dataBand->row()->picture);?>" alt="" width="30%">
                                        <br/>
                                        <form action="<?= base_url('band/update_data'); ?>" method="post" class="form-group">
                                            
                                            <input type="file" class="form-control bg-light-dark" name="photo">
                                            <input type="text" name="name" class="form-control bg-light-dark" placeholder="Band Name" value="<?=$dataBand->row()->band_name?>">
                                            <input type="text" name="username" class="form-control bg-light-dark" placeholder="Username" value="<?=$dataBand->row()->username?>">
                                            <input type="email" name="email" class="form-control bg-light-dark" placeholder="Email" value="<?=$dataBand->row()->email?>">
                                            <div class="col-lg-6 no-padding " style="padding-right:2px;">
                                                <input type="password" name="password" class="form-control bg-light-dark" placeholder="Password">
                                            </div>
                                            <div class="col-lg-6 no-padding" style="padding-left:2px;">
                                                <input type="password" name="repassword" class="form-control bg-light-dark" placeholder="Re-Password">
                                            </div>
                                            <textarea name="information" class="form-control bg-light-dark" placeholder="Description" rows="5"><?=$dataBand->row()->information?></textarea>
                                            <button type="submit" class="btn btn-primary btn-xl">EDIT PROFILE</button>
                                        </form>
                                    </p>
                                  </div>
                                  
                                </div>                
                            </div>
                        </div>
                        <div class="row filtr-item" data-category="3" style="width: 100%;">
                            <div class="col-md-12 col-xs-12 " id="infilter">
                                <ul class="nav nav-tabs">
                                  <li class="active"><a data-toggle="tab" href="#uploadmerch">Upload Merch </a></li>
                                </ul>

                                <div class="tab-content">
                                  <div id="uploadmerch" class="tab-pane fade in active">
                                    <h3>Download Design</h3>
                                    <p>
                                        <p class="text-muted">Jika desainmu tidak memenuhi format yang diminta , kami tidak dapat menampilkannya, oleh karena itu ikuti petunjuk dengan baik. Download tema dasar dibawah ini : </p>
                                        <br/>

                                        <div class="col-lg-6 col-xs-6 no-padding text-center">
                                            <a href=""><img src="<?= base_url('assets/img/Adobe_Photoshop.png'); ?>" width="31%">
                                            <br/>
                                            <p>Adobe Photoshop</p>  </a>
                                        </div>
                                        <div class="col-lg-6 col-xs-6 no-padding text-center" >
                                            <a href=""><img src="<?= base_url('assets/img/corel-draw-logo.png'); ?>" width="30%">                        
                                            <br/>
                                            <p>Corel Draw</p></a>
                                        </div>
                                        <h3>Form Merch</h3>
                                        <form action="<?= base_url('band/add_product'); ?>" method="post" class="form-group">
                                            <h6 class="text-muted">Design Photo:</h6>
                                            <input type="file"class="form-control bg-light-dark" name="photo">
                                        <p class="text-muted" align="center"><img class="img-responsive" src="http://placehold.it/248x349" alt="" width="30%"></p>
                                            <input type="text" name="name" class="form-control bg-light-dark" placeholder="Product Name">
                                            <select class="form-control bg-light-dark" name="status">
                                                <option value="0">Print</option>
                                                <option value="1">Sablon</option>
                                            </select>
                                            <h6 class="text-muted">Harga yang anda masukkan disini adalah provit yang anda terima setiap pembelian satu merch. </h6>
                                            <input type="number" name="price" class="form-control bg-light-dark" placeholder="Price">
                                            <textarea name="information" class="form-control bg-light-dark" placeholder="Description" rows="5"></textarea>
                                            <button type="submit" class="btn btn-primary btn-xl">UPLOAD MERCH</button>
                                        </form>

                                    </p>

                                  </div>
                                  
                                </div>                
                            </div>
                        </div>

                        <div class="row filtr-item" data-category="4" style="width: 100%;">
                            <div class="col-md-12 col-xs-12 " id="infilter">
                                <ul class="nav nav-tabs">
                                  <li class="active"><a data-toggle="tab" href="#checkprovit">Check Provit </a></li>
                                </ul>

                                <div class="tab-content">
                                  <div id="checkprovit" class="tab-pane fade in active">
                                    <h3>Check Provit</h3>
                                    <p>
                                        asdasdasd

                                    </p>

                                  </div>
                                  
                                </div>                
                            </div>
                        </div>

                        <div class="row filtr-item" data-category="5" style="width: 100%;">
                            <div class="col-md-12 col-xs-12 " id="infilter">
                                <ul class="nav nav-tabs">
                                  <li class="active"><a data-toggle="tab" href="#editmerch">Upload Merch </a></li>
                                </ul>

                                <div class="tab-content">
                                  <div id="editmerch" class="tab-pane fade in active">
                                    <h3>Edit Merch</h3>
                                    <p>
                                        <form action="<?= base_url('band/edit_product'); ?>" method="post" class="form-group">
                                            <h6 class="text-muted">Design Photo:</h6>
                                            <input type="text" name="product_code" hidden="true">
                                            <input type="file" class="form-control bg-light-dark" name="photo">
                                            <p class="text-muted" align="center"><img class="img-responsive" src="http://placehold.it/248x349" alt="" width="30%"></p>
                                            <input type="text" name="name" class="form-control bg-light-dark" placeholder="Product Name">
                                            <select class="form-control bg-light-dark" name="status">
                                                <option value="0">Print</option>
                                                <option value="1">Sablon</option>
                                            </select>
                                            <h6 class="text-muted">Harga yang anda masukkan disini adalah provit yang anda terima setiap pembelian satu merch. </h6>
                                            <input type="number" name="price" class="form-control bg-light-dark" placeholder="Price">
                                            <textarea name="information" class="form-control bg-light-dark" placeholder="Description" rows="5"></textarea>
                                            <button type="submit" class="btn btn-primary btn-xl" name="act" value="update">UPDATE MERCH</button>
                                        </form>

                                    </p>

                                  </div>
                                  
                                </div>                
                            </div>
                        </div>
                                <?php
                            }
                        ?>

                    </div>
                </div>
                

            </div>
        </div>
    </section>

    <script src="<?=base_url('assets/js/jquery-1.7.1.min.js');?>"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var filterizd = $('.filtr-band').filterizr('filter', "1");
            $("button#btnProductEdit").closest("figure").on("click", function (ev) {
                var id = $(this).closest("figure").data("id");
                filterizd.filterizr('filter', "5");
                var form = filterizd.find("[data-category=5]").find("form");
                var name = form.find("input[name=name]");
                var status = form.find("select[name=status]");
                var price = form.find("input[name=price]");
                var info = form.find("textarea[name=information]");
                var code = form.find("input[name=product_code]");
                $.ajax({
                  type: form.attr('method'),
                  url: form.attr('action'),
                  data: {product_code:id,act:'edit'},
                  dataType: "JSON",
                  success: function (res) {
                    code.val(res.data.code);
                    name.val(res.data.name);
                    status.val(res.data.status);
                    price.val(res.data.provit);
                    info.val(res.data.info);
                    // info.text(res.data.info);
                  }    
                });
            });
            $("ul#filters").find("li").on("click", function (ev) {
                var form = filterizd.find("[data-category=5]").find("form");
                form[0].reset();
            });
        });
    </script>