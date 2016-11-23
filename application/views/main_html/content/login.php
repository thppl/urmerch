    <section class="bg-transparent margin-top" style="padding-top:20px; padding-bottom: 24px; ">
        <div class="container ">
            <div class="row">
                <div class="col-md-4 col-xs-12 login-box">
                    <h3 style="margin-top: 0; color:#fff;">Sign In </h3>
                    <p class="text-muted">For Band to Change Everything</p>
                    <form action="<?=base_url('band/band/do_login')?>" method="post" class="form-group" id="form_login">
                        <input type="text" name="username" class="form-control bg-dark" placeholder="Username">
                        
                        <input type="password" name="password" class="form-control bg-dark" placeholder="Password">
                        
                        <button type="submit" class="btn btn-primary btn-l" style="margin-top:10px;">Sign In</button>
                    </form>
                </div>
                <div class="col-md-6 col-sm-offset-2 col-xs-12 bg-light-dark login-box">
                    <h3 style="margin-top: 0;">Sign Up </h3>
                    <p class="text-muted">For Band to Change Everything</p>
                    <form action="<?=base_url('band/band/do_signup')?>" method="post" class="form-group" id="form_signup">
                        <input type="text" name="username" class="form-control bg-dark" placeholder="Username">
                        <input type="email" name="email" class="form-control bg-dark" placeholder="Email">
                        <div class="col-lg-6 no-padding " style="padding-right:2px;">
                            <input type="password" name="password" class="form-control bg-dark" placeholder="Password">
                        </div>
                        <div class="col-lg-6 no-padding" style="padding-left:2px;">
                            <input type="password" name="passwordver" class="form-control bg-dark" placeholder="Re-Password">
                        </div>
                        <input type="text" name="band_name" class="form-control bg-dark" placeholder="Name Band">
                        <button type="submit" class="btn btn-primary btn-l" style="margin-top:10px;">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="<?=base_url('assets/js/jquery.js');?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#form_login").on('submit', function(e){
                e.preventDefault();
                $.ajax({
                  type: $('#form_login').attr("method"),
                  url: $('#form_login').attr("action"),
                  data: $('#form_login').serialize(),
                  success: function (i) {
                    var jsonObjectParse = JSON.parse(i);
                    var jsonObjectStringify = JSON.stringify(jsonObjectParse);
                    var jsonObjectFinal = JSON.parse(jsonObjectStringify);                    
                    if (jsonObjectFinal.status == 'true') {
                      new PNotify({
                                title: 'Login',
                                text: "Login Berhasil, Tunggu Sebentar",
                                type: 'success',
                                hide: true,
                                styling: 'bootstrap3'
                            });
                      setTimeout(function (ev) {
                          window.location.href = '<?= base_url(); ?>Index/band_detail/' + jsonObjectFinal.band_code;
                      }, 1000);
                    }else{
                      new PNotify({
                                title: 'Login',
                                text: "Login Gagal",
                                type: 'warning',
                                hide: true,
                                styling: 'bootstrap3'
                            });
                        $('#form_login:first *:input[type!=hidden]:first').focus();
                    }
                  }    
                });  
            });
            $("#form_signup").on('submit', function(e){
                e.preventDefault();
                $.ajax({
                  type: $('#form_signup').attr("method"),
                  url: $('#form_signup').attr("action"),
                  data: $('#form_signup').serialize(),
                  success: function (i) {
                    var jsonObjectParse = JSON.parse(i);
                    var jsonObjectStringify = JSON.stringify(jsonObjectParse);
                    var jsonObjectFinal = JSON.parse(jsonObjectStringify);                    
                    if (jsonObjectFinal.status == 'true') {
                      new PNotify({
                                title: 'Registrasi',
                                text: jsonObjectFinal.message,
                                type: 'success',
                                hide: true,
                                styling: 'bootstrap3'
                            });
                    }else{
                      new PNotify({
                                title: 'Registrasi',
                                text: jsonObjectFinal.message,
                                type: 'warning',
                                hide: true,
                                styling: 'bootstrap3'
                            });
                    }
                  }    
                });                 
            });
        });
    </script>    