    <section class="bg-light-dark" id="catalog" style="padding-bottom:70px; padding-top: 0;">
        <aside>
            <div class="container text-center">
                <div class="call-to-action">
                    <h1>Catalogs</h1>
                    <p class="text-muted">we trust every people have plan for what they will do, just make it flow you can trust your action on us</p>
                </div>
            </div>
        </aside>
        
        <!-- SnapWidget -->
        <div class="container">
            <div class="row">
             
                <div class="col-lg-3 col-md-12 col-xs-12" >
                    <nav id="options" class="work-nav">
                        <ul class="simplefilter" id="filters" class="option-set" data-option-key="filter">
                            <li data-filter="all">All Product</li>
                            <li data-filter="1">Best Selling</li>
                            <li data-filter="2">Newest Product</li>
                        </ul>                        
                    </nav>
                </div>
                <div class="col-lg-9 col-md-12 col-xs-12 filter-catalogs">
                    <?php foreach($productTerlaris->result_array() as $rowTerlaris):?>
                        <div class="col-lg-3 col-md-4 col-xs-6 thumb filtr-item" data-category="1">
                            <a class="thumbnail">
                            <figure data-id="<?= $rowTerlaris['product_code']?>" data-band="<?= $rowTerlaris['band_code']?>">
                                
                                <img class="img-responsive" src="<?=base_url('assets/img/portfolio/none.png')?>" alt="" style="width: 248px;height: 320px;">
                                
                                <figcaption>
                                    <h2><?=$rowTerlaris['product_name']?></h2>
                                    <br/>
                                    <button type="submit" class="btn btn-primary btn-l btn-block" id="btnProductDetail">Details</button>
                                    <br>
                                    <button type="submit" class="btn btn-primary btn-l btn-block" id="btnProductAdd">Add To Cart</button>                              
                                </figcaption>
                                
                            </figure>
                            </a>
                        </div>                        
                    <?php endforeach; ?>
                    <?php foreach($productTerbaru->result_array() as $rowTerbaru):?>
                        <div class="col-lg-3 col-md-4 col-xs-6 thumb filtr-item" data-category="2">
                            <a class="thumbnail">
                            <figure data-id="<?= $rowTerbaru['product_code']?>" data-band="<?= $rowTerbaru['band_code']?>">
                                
                                <img class="img-responsive" src="<?=base_url('assets/img/portfolio/none.png')?>" alt="" style="width: 248px;height: 320px;">
                                
                                <figcaption>
                                    <h2><?=$rowTerlaris['product_name']?></h2>
                                    <br/>
                                    <button type="submit" class="btn btn-primary btn-l btn-block" id="btnProductDetail">Details</button>
                                    <br>
                                    <button type="submit" class="btn btn-primary btn-l btn-block" id="btnProductAddCart">Add To Cart</button>

                                </figcaption>
                                
                            </figure>
                            </a>
                        </div>                        
                    <?php endforeach; ?>
                </div>
           
            </div>
        </div>
    </section>


    <script src="<?=base_url('assets/js/jquery-1.7.1.min.js');?>"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.filter-catalogs').filterizr();
        });
    </script>