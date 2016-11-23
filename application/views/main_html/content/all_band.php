    <section class="bg-dark" id="band" style="padding-bottom:70px; padding-top: 0;">
        <aside>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Bands</h2>
                    <?php
                        if ($this->session->userdata('username')) {
                            ?>
                                <h3 class="text-muted">Update Your Profile, <a href="<?=base_url('index/index/detail_band/')?>">Click Me</a>. </h3>
                            <?php
                        }else{
                            ?>
                                <h3 class="text-muted">Want to Join With Us, <a href="<?=base_url('band/Band')?>">Register Your Band</a>. </h3>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        </aside>
        <div class="container">
            <div class="row">
            <?php if($table->num_rows() > 0){ ?>
                <?php foreach ($table->result_array() as $row) { ?>
                    <div class="col-lg-3 col-xs-6 text-center">
                        <div class="service-box ">
                            <a class="thumbnail" href="<?=base_url('index/band_detail/'.$row['band_code'])?>">
                                <img class="img-responsive" src="<?=base_url();?>assets/img/portfolio/1.jpg" alt="">
                            </a>
                        </div>
                        <h5 class="text-muted"><?= $row["band_name"];?></h5>
                    </div>                
                <?php } ?>
            <?php } ?>
            </div>
        </div>   
    </section>