<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand page-scroll" href="#page-top">Start Bootstrap</a> -->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="col-lg-3 text-center">
                </div>
                <div class="col-lg-6 ">
                    <ul class="nav navbar-nav">
                        <li>
                            <a class="page-scroll" href="#header">Home</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#band">Bands</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#catalog">Catalogs</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#blog">Blogs</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#contact">contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <ul class="nav navbar-nav navbar-right">
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
                            <a style="font-size:20px;"><span class="glyphicon glyphicon-shopping-cart"></span> <span id="cartLabel">0</span></a>
                        </li>
                        <li>
                            <a href="#" style="font-size:20px;"> <span class="glyphicon glyphicon-search page-scroll"></span></a>
                        </li>
                    </ul>
                </div>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <header id="header" class="bg-transparent">
        <div class="header-content">
            <div class="header-content-inner">
                <!--<h1>Your Favorite Source of Free Bootstrap Themes</h1>-->
                
                <img src="<?=base_url('assets/img/logo_trans.png')?>" width="60%" height="60%">
                <br><br>
                <p>Place for Band Merch, Music and Accessories T-Shirts.</p>
                  
            </div>

        </div>
    </header>
<!-- BAND -->
   <?php $parent->band(); ?>
<!-- CATALOG -->
   <?php $parent->catalog(); ?>
<!-- BLOG -->
   <?php $parent->blog(); ?>
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

<script type="text/javascript">

    $(document).ready(function () {
        var filtrcontainer = $('.filtr-container').filterizr();
    });
</script>