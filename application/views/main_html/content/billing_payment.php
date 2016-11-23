<section class="bg-dark" id="catalog" style="padding-bottom:70px; padding-top: 0;">
        <aside>
            <div class="container">
                <div class="col-md-6 col-xs-12" style="padding-left:0;">
                    <div class="call-to-action">
                        <h3>invoice - <span style="color: #FFC107;">#UR<?=$order_code?></span></h3>
                    </div>
                </div>
                
                <div class="col-md-6 col-xs-12">
                    <div class="call-to-action text-right" style="padding-right:0;">
                        <button type="submit" class="btn btn-primary btn-xl">Payment Confirmation</button>
                    </div>
                </div>

            </div>
        </aside>
        
        <!-- SnapWidget -->
        <div class="container">
            <div class="row catalog">
                <div class="col-md-12 col-xs-12 bg-light-dark">
                    <div class="col-sm-offset-3 col-md-6 col-xs-12 cart-box text-center ">
                        <span class="col-md-12 col-xs-12 text-left no-padding"> Hai <?=$customer_name?>,</span>
                        <?php
                            if ($this->uri->segment(4)) {
                                ?>
                                    <h3 align="left">Order anda sedang kami proses</h3>
                                <?php
                            }
                        ?>
                        <span class="col-md-12 col-xs-12 text-left no-padding">Terima kasih atas kepercayaanmu berbelanja di Urmerch.com. Kode pembelimu adalah:</span>
                        <h3 class="box-text"><?=$customer_code?></h3>
                        <br/>
                        <span class="col-md-12 col-xs-12 no-padding"> Mohon segera lakukan pembayaran sebelum:</span>
                        <h4 class="box-text"><?=$order_date?></h4>
                        <h6>Lakukan pembayaran sebesar : </h6>
                        <?php $lenght = strlen($price+$price_code); ?>
                        <?php $lastDigit = substr($price, -3, 3); ?>
                        <?php $firstDigit = substr($price, 0, $lenght-3) ?>
                        <h2 class="box-text" style="color: #FFC107;">Rp <?=$firstDigit?><u><?=$lastDigit?></u></h2>
                        <br/>
                        <h5>Tepat Hingga <strong>3 digit terakhir</strong></h5>
                        <br/>
                        <span style="font-style:italic;">" Perbedaan nilai transfer akan menghambat proses verifikasi "</span>
                        <br/><br/>
                        Pembayaran dapat dilakukan ke salah satu nomor rekening dibawah ini:
                        <hr/>
                        
                        <span class="col-md-6 col-xs-6 text-left no-padding"><img src="<?=base_url('assets/img/bca.png')?>" width="150"></span>
                        <span class="col-md-6 col-xs-6 text-right no-padding">
                            <span>Bank BCA, Malang</span>
                            <p><strong>011 039 7861</strong> - a/n Rifki Arifin</p>
                        </span>
                        <br/><br/><br/><br/>
                        <hr/>

                        <span class="col-md-6 col-xs-6 text-left no-padding"><img src="<?=base_url('assets/img/bri.png')?>" width="100"></span>
                        <span class="col-md-6 col-xs-6 text-right no-padding">
                            <span>Bank BRI, Malang</span>
                            <p><strong>8086 01 000069 509</strong> - a/n Irtafa Masruri</p>
                        </span>
                        <br/><br/><br/><br/>
                        <hr/>
                        
                    </div>

                </div>

                

            </div>
        </div>
    </section>