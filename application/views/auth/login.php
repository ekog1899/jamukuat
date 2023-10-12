<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-1">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block  ">
                                <!-- gambar berikutnya -->
                                    <img src="<?php echo base_url("assets/")?>images/jm.png" style="width: 100%;">

                        </div>
                        <div class="col-lg-6">

                            <div class="p-5">
                                <div class="text-center">
				    <h1><img src="<?= base_url('assets/JAMUKUAT-LOGO.png');?>" style="width: 30%"></h1>
                                  
                                  
                                </div>
                                <?= $this->session->flashdata('message') ;  ?> 



                                <div class="form-group">


                                    <form action="<?php echo base_url('login/signin/'); ?>" method="post" > 

                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
									<?php $cpt = generateCode();?>
									<div class="input-group mb-3">
				<input type="text" class="form-control" disabled value="<?=$cpt['text'];?>">
			
			<input type="text" class="form-control" name="captcha"  placeholder="hitung">
			<input type="hidden" name="rescpt" id="rescpt" value="<?=$cpt['res']?>" />
          
		  <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calculator"></span>
            </div>
          </div>
        </div>
		<?= form_error('captcha', '<small class="text-danger pl-3">', '</small>'); ?>
									
									
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Masuk
                                    </button>

                                </form>
                                <hr>
                                <div class="text-center">
                                    <a  href="<?= base_url('login/forgotpassword'); ?>">Lupa Password?</a>
                                </div>
                                <br>
                                <div class="text-center">
                                    <a  class="btn btn-success btn-user btn-block" href="<?= base_url('panduan'); ?>">Panduan Aplikasi Jamu Kuat</a>
                                </div>
                                <!--
                                <div class="text-center">
                                <a class="small" href="<?= base_url('login/registration'); ?>">Create an Account!</a>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
            <div class="text-center"><p>© 2021 Pengadilan Tinggi Agama Semarang<br>Direktorat Jenderal Badan Peradilan Agama<br>Mahkamah Agung Republik Indonesia</p>
        </div>

    </div>

                   

</div>

</div>
