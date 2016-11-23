<section class="bg-dark" id="catalog" style="padding-bottom:70px; padding-top: 0;">
        <aside>
            <div class="container">
                <div class="col-md-6 col-xs-12" style="padding-left:0;">
                    <div class="call-to-action">
                        <h3>Payment Method : Transfer</h3>
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
            <div class="row catalog">
                <div class="col-md-8 col-xs-12 bg-light-dark">

                    <div class="col-md-12 col-xs-12 cart-box ">
                        
                        <img src="<?=base_url('assets/img/bca.png')?>" width="150">
                        <img src="<?=base_url('assets/img/bri.png')?>" width="100">
                        <br/>
                        <hr/>
                        <br/>
                        <p class="text-muted">*Total belanja Anda <span style="color: #FFC107;">BELUM TERMASUK</span> kode pembayaran.</p>
                        <ol>
                            <li>Transaksi dengan menggunakan metode pembayaran transfer akan ditambahkan kode pembayaran*.</li>
                            <li>Pembayaran dengan angka yang tidak tepat menyebabkan proses verifikasi terhambat.</li>
                            <li>
                            Total pembayaran transaksi yang harus dibayar beserta kode pembayaran dapat diketahui setelah mengklik tombol
                            <strong>LANJUT</strong>.
                            </li>
                            <li>
                            Transaksi dianggap batal jika sampai dengan
                            <strong>pukul <?=modules::run('index/convertDate', 'h:i:s', $order_date)?> WIB hari <?=modules::run('index/convertDate', 'l', $order_date)?> , <?=modules::run('index/convertDate', 'd M Y', $order_date)?>  (1×12 jam)</strong>
                            pembayaran belum dilunasi.
                            </li>
                        </ol>
                        <br/>
                        <p class="text-muted">Klik tombol " Payment Confirmation " jika Anda telah memahami dan menyetujui ketentuan transaksi di atas. Bukalapak akan mengirim tagihan pembayaran ke <span style="color: #FFC107;"><?=$customer_email?></span> .</p>
                        <hr/>
                        <br/>
                        <a href="<?=base_url('index/billingPayment/'.$order_code)?>" class="btn btn-primary btn-xl">Billing Payment</a>
                    </div>

                </div>
                <div class="col-md-4 col-xs-12 ">
                    <h5 style="margin-top:0;">Detail Order</h5>
                    <hr/>
                    <span class="col-md-6 col-xs-6 text-left no-padding"> Subtotal : </span><span class="col-md-6 col-xs-6 text-right no-padding">RP <?=number_format($this->cart->total())?></span>
                    <br/><br/><br/>
                    <hr/>
                    <span class="col-md-6 col-xs-6 text-left no-padding"> TOTAL <span class="text-muted">(Termasuk PPN)</span> : </span><span class="col-md-6 col-xs-6 text-right no-padding price-total">RP <?=number_format($this->cart->total() + ($this->cart->total() * (10/100)))?></span>
                    <br/><br/><br/>
                    <a href="<?=base_url('index/billingPayment/'.$order_code)?>" class="btn btn-primary btn-xl">Billing Payment</a>
                </div>

            </div>
        </div>
    </section>