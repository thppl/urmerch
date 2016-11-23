    <section class="bg-dark" id="catalog" style="padding-bottom:70px; padding-top: 0;">
        <aside>
            <div class="container">
                <div class="col-md-6 col-xs-12" style="padding-left:0;">
                    <div class="call-to-action">
                        <h3>Customer Data</h3>
                    </div>
                </div>
                
                <div class="col-md-6 col-xs-12">
                    <div class="call-to-action text-right" style="padding-right:0;">
                        <a href=""><h5 class="text-muted">Back to Shopping Cart >></h5></a>
                    </div>
                </div>

            </div>
        </aside>
        
        <!-- SnapWidget -->
        <div class="container">
            <div class="row catalog">
                <div class="col-md-8 col-xs-12 bg-light-dark">

                    <div class="col-md-12 col-xs-12 cart-box ">
                        
                        <p class="text-muted">Your data is always confidential !</p>
                        <form action="<?=base_url('index/saveCustomer')?>" method="post" class="form-group">
                            <input type="text" name="name" class="form-control bg-dark" placeholder="Name of Buyer">
                            <h6 class="text-muted">Make sure that you write a valid email</h6>
                            <input type="email" name="email" class="form-control bg-dark" placeholder="Email of Buyer">
                            <h6 class="text-muted">Make sure that you write a valid no. telphone</h6>
                            <input type="number" name="phone" class="form-control bg-dark inputnoscroll" placeholder="Phone Number">
                            <br/>
                            <h6 class="text-muted">recipient's address</h6>
                            <?=modules::run('index/provinsi')?>
                            <div id="kabupatenArea"></div>
                            <div id="kecamatanArea"></div>
                            <div id="desaArea"></div>
                            <br/>
                            <textarea name="address" class="form-control bg-dark" placeholder="Address of Buyer" rows="5"></textarea>
                            <!-- <select class="form-control bg-dark">--> 
                            <input type="text" value="" placeholder="POSTAL CODE" name="postal_code" class="form-control bg-dark">
                            <!-- </select> -->
                            <br/>
                            <hr/>
                            <input type="checkbox" name="confirm" checked="true">
                            <span class="text-muted"> Saya setuju dengan syarat dan ketentuan yang telah di tentukan oleh URMERCH .com</span>
                            <br/>
                            <input type="checkbox" name="confirm" checked="true">
                            <span class="text-muted"> Saya akan sabar menanti seorang kekasih yang datang di pagi ini, akankah dia selalu setia bersanding hidup penuh pesona harapanku</span>
                            <br/><br/>
                            <button type="submit" class="btn btn-primary btn-xl">CHOOSE PAYMENT METHOD</button>
                        </form>
                    </div>

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
                    <button type="submit" class="btn btn-primary btn-xl">CHOOSE PAYMENT METHOD</button>
                </div>

            </div>
        </div>
    </section>
    <script type="text/javascript">
            function loadKabupaten()
            {
                var propinsi = document.getElementById("provinsi").value;
                $.ajax({
                    type:'GET',
                    url:"<?=base_url('index/kabupaten')?>",
                    data:"id=" + propinsi,
                    success: function(html)
                    { 
                       $("#kabupatenArea").html(html);
                    }
                });
                $("#kecamatanArea").html('');
                $("#desaArea").html('');
            }
            function loadKecamatan()
            {
                var kabupaten = $("#kabupaten").val();
                $.ajax({
                    type:'GET',
                    url:"<?=base_url('index/kecamatan')?>",
                    data:"id=" + kabupaten,
                    success: function(html)
                    { 
                        $("#kecamatanArea").html(html);
                    }
                });
                $("#desaArea").html('');
            }
            function loadDesa()
            {
                var kecamatan = $("#kecamatan").val();
                $.ajax({
                    type:'GET',
                    url:"<?=base_url('index/desa')?>",
                    data:"id=" + kecamatan,
                    success: function(html)
                    { 
                        $("#desaArea").html(html);
                    }
                }); 
            }        
    </script>