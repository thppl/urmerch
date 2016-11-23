<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-relative ">
        <div class="container-fluid ">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header ">
                <div class="col-md-12 col-xs-8" >
                    <ul class="nav navbar-nav navbar-left" >
                        <li class="navbar-brand"> 
                            <img src="<?=base_url('assets/img/logo_header.png');?>" width="55%" >
                        </li>
                    </ul>    
                </div>
                
                <div class="col-xs-4" style="padding-top:5px;">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>    
                </div>
                
                <!--<a class="navbar-brand page-scroll" href="#page-top">Start Bootstrap</a>-->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                
                    <ul class="nav navbar-nav navbar-left no-home">
                        <li>
                            <a class="page-scroll" href="<?=base_url()?>#header">Home</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?=base_url()?>#band" >Bands</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?=base_url()?>#catalog">Catalogs</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?=base_url()?>#blog">Blogs</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?=base_url()?>#contact">contact Us</a>
                        </li>

                    </ul>
               
                
                <ul class="nav navbar-nav navbar-right no-home">
                    <?php
                        if ($this->session->userdata('username')) {
                            ?>
                            <li>
                                <a href="<?=base_url('index/band_detail/'.$this->session->userdata('band_code'));?>" style="font-size:20px;" ><span class="glyphicon glyphicon-user"></span> <?= $this->session->userdata('username'); ?></a>
                            </li>
                            <?php
                        }
                    ?>
                    <li>
                        <a style="font-size:20px;" ><span class="glyphicon glyphicon-shopping-cart"></span> <span id="cartLabel">0</span></a>
                    </li>
                    <li>
                        <a href="#" style="font-size:20px;"> <span class="glyphicon glyphicon-search page-scroll"></span></a>
                    </li>
                </ul>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- CONTENT -->
        <?php $this->load->view($view); ?>
    <!-- CONTENT -->

    <aside id="contact" class="bg-transparent">
        <div class="container text-center">
            <div class="row">
                <div>
                <nav id="social">
                    <ul>
                        <li>
                            <a href="">
                                <span class="fa fa-whatsapp"></span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="fa fa-instagram"></span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="fa fa-facebook"></span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="fa fa-google-plus"></span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="fa fa-twitter"></span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="fa fa-youtube"></span>
                            </a>
                        </li>

                    </ul>                    
                </nav>
                </div>
            </div>
        </div>
    </aside>

<!-- CONTACT US -->
    <?php $parent->contact_us(); ?>

    <?php
        $this->load->view('main_html/footer');
    ?>

</body>
