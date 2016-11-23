<section class="bg-dark" id="catalog" style="padding-bottom:70px; padding-top: 0;">
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
                        <ul id="filters" class="option-set" data-option-key="filter">
                            <li class="type-work">Categories</li>
                            <?php $tableCategory = modules::run('index/Index/getCategory'); ?>
                            <?php if($tableCategory->num_rows() > 0){ ?>
                                <?php foreach ($tableCategory->result_array() as $rowCategory) { ?>
                                    <li><a href="<?=base_url('index/all_product')?>/<?=$rowCategory['category_code']?>" data-option-value="*" class="selected"><?=$rowCategory['category_name']?></a></li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-9 col-md-12 col-xs-12">
                    <?php if($row > 0){ ?>
                        <?php foreach ($table->result_array() as $row) { ?>
                            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                <a class="thumbnail" href="#">
                                <figure>
                                    
                                    <img class="img-responsive" src="http://placehold.it/248x349" alt="">
                                    
                                    <figcaption>
                                        <h2><?=$row['product_name']?></h2>
                                        <br/>
                                        <a type="submit" href="<?=base_url('index/detail_product')?>/<?=$row['product_code']?>" class="btn btn-primary btn-l" >Details</a>                                    
                                        <br/><br/>
                                        <button type="submit" onclick="window.open('http://google.com');" class="btn btn-primary btn-l" >Add to Cart</button>                                    
                                    </figcaption>
                                    
                                </figure>
                                </a>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    
                    <div class="col-lg-12 col-md-12 col-xs-12" style="text-align:center;">
                        <ul class="pagination pagination-lg">
                            <?php if($row > 0){ ?>
                                <?php for($i = 1; $i <= $count; $i++) { ?>
                                  <li class="<?=$currentPage==$i?'active':''?>"><a href="<?=base_url('index/all_product')?>/<?=$category?>/<?=$i?>"><?=$i?></a></li>
                                <?php } ?>
                            <?php }else{ ?>
                                  <!-- <li class="active"><a href="#">0</a></li> -->
                            <?php } ?>
                        </ul>
                    </div>

                </div>
                

        <!-- SnapWidget 
                <script src="http://snapwidget.com/js/snapwidget.js"></script>
                <iframe src="http://snapwidget.com/in/?u=dGhwcGwubmV0d29ya3xpbnw1MHw1fDF8ZmZmZnxub3w1fGZhZGVPdXR8b25TdGFydHxub3x5ZXM=&ve=250416" title="Instagram Widget" class="snapwidget-widget" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:100%;"></iframe>-->
            
            </div>
        </div>
    </section>