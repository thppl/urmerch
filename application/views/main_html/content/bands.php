    <section id="band" class="bg-light-dark" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Bands </h2>
                    <h3>Check Your Favorite Bands More <a href="<?=base_url('Index/index/all_band')?>">Here</a>.</h3>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php
                    if($dataBand != 'false'){
                        foreach ($dataBand->result_array() as $row) {
                            ?>
                                <div class="col-lg-3 col-xs-6 text-center">
                                    <div class="service-box ">
                                        <a class="thumbnail" href="<?=base_url('index/band_detail/'.$row['band_code'])?>">
                                            <img class="img-responsive" src="<?=base_url('assets/img/portfolio/none.png')?>" alt="">
                                        </a>
                                    </div>
                                    <h5 class="text-muted"><?=$row['band_name']?></h5>
                                </div>
                            <?php
                        }
                    }else{
                        ?>
                            <div class="col-lg-3 col-xs-6 text-center">
                                <div class="service-box ">
                                    <a class="thumbnail" href="#">
                                        <img class="img-responsive" src="<?=base_url('assets/img/portfolio/none.png')?>" alt="">
                                    </a>
                                </div>
                                <h5 class="text-muted">No Data Found</h5>
                            </div>                        
                        <?php
                    }
                ?>
            </div>
        </div>
    
        <br>
        <aside class="bg-dark">
            <div class="container text-center">
                <div class="call-to-action">

                    <?php
                        if ($this->session->userdata('username')) {
                            ?>
                                <h2 class="text-muted">Update Your Profile, <a href="<?=base_url('index/band_detail/'.$this->session->userdata('band_code'));?>">Click Me</a>. </h2>
                            <?php
                        }else{
                            ?>
                                <h2 class="text-muted">Want to Join With Us, <a href="<?=base_url('band/Band')?>">Register Your Band</a>. </h2>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </aside>
    </section>
    