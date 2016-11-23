    <div class="panel panel-warning" style="width: 30%; position: fixed; top: 60px; right: 50px; display: none;" id="statusCart">
        <div class="panel-heading">
            <h4>Status Cart</h4>
        </div>
        <div class="panel-body bg-light-dark">
            <form id='myform' method='POST' action='<?=base_url('index/check_billingPayment')?>'>
                <input type='text' name='order_code' required="true" class='form-control bg-transparent' style="border-bottom: solid 1px;" placeholder="Enter Order Code" />
                <br>
                <input type='text' name='customer_code' required="true" class='form-control bg-transparent' style="border-bottom: solid 1px;" placeholder="Enter Customer Code" />
                <br>
                <a style="font-size:20px;">
                <button type="submit" name="submit" value="submit" class="btn bg-dark">
                    <span class="fa fa-check"></span>
                </button>
                    </a>
                <a href="<?=base_url('index/cart')?>" style="font-size:20px;">
                <button type="button" name="button" value="button" class="btn bg-dark">
                    <span class="glyphicon glyphicon-shopping-cart"></span>
                </button>
                    </a>
            </form>
        </div>
    </div>

    <footer class="bg-dark">
        <div class="container ">
            <div class="row">
                <div class="col-lg-12 text-center">
                    &copy;2016 Urmerch. By <a href="http://thppl.net/">The Happy People Network</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="<?=base_url('assets/js/jquery-1.7.1.min.js');?>"></script>
    <script src="<?=base_url('assets/js/jquery.js');?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>

    <!-- Plugin JavaScript -->
    <script src="<?=base_url('assets/js/jquery.easing.min.js');?>"></script>
    <script src="<?=base_url('assets/js/jquery.fittext.js');?>"></script>
    <script src="<?=base_url('assets/js/wow.min.js');?>"></script>
    <script src="<?=base_url('assets/js/creative.js');?>"></script>

    <script src="<?=base_url('assets/js/jquery.min.js');?>"></script>
    <script src="<?=base_url('assets/filterizr/filterizr/jquery.filterizr.js');?>"></script>
    <script src="<?=base_url('assets/filterizr/js/controls.js');?>"></script>

    <script type="text/javascript" src="<?=base_url('assets/js/pnotify.custom.min.js')?>"></script>
    <script src="<?=base_url('assets/js/jquery.redirect.js');?>"></script>    
    <script type="text/javascript">
        $(document).ready(function () {
            if ($("span#cartLabel").html() != "<?=$this->cart->total_items()?>") {
                var TimetotalCart = window.setTimeout(function() {
                    $("span#cartLabel").slideUp();
                    window.setTimeout(function() {
                       $("span#cartLabel").slideDown();
                        window.setTimeout(function() {
                           $("span#cartLabel").html('<?=$this->cart->total_items()?>');
                        }, 100);
                    }, 200);
                }, 1000);
            }
            $("span#cartLabel").parent().on("click", function (ev) {
                var statusCart = $("div#statusCart");
                if (statusCart.css("display")=="none") {
                    $("div#statusCart").slideDown();
                }else{
                    $("div#statusCart").slideUp();
                }
            });
        });
            $("button#btnProductDetail").closest("figure").on("click", function (ev) {
                var product_code = $(this).closest("figure").data("id");
                window.location.href = "<?=base_url('Index/detail_product').'/'?>"+product_code;
            });
            $("button#btnProductAddCart").closest("figure").on("click", function (ev) {
                var product_code = $(this).closest("figure").data("id");
                var band_code = $(this).closest("figure").data("band");
                window.location.href = "<?=base_url('Index/detail_product').'/'?>"+product_code;
            });
        function addtocart(product){
                $.ajax({
                    type        : 'GET',
                    url         : '<?=base_url('index.php/index/addtocart/')?>/'+product,
                })
                .done(function(data) {
                    console.log(data); 
                });
        }
    </script>
