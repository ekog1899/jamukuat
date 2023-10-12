<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row" style="margin-bottom: 10px">       
        <div class="col-md-12 text-center">
            <div style="margin-top: 8px" id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                <p style="background-color: red; color: white"><?php echo $this->session->flashdata('msg'); ?></p>
            </div>
        </div>
        
    </div>
	             
	  <div class="row">

                        <div class="col-lg-6">

                            <!-- Default Card Example -->
                            <div class="card mb-4">
                                <div class="card-header">
                                  <h6 class="m-0 font-weight-bold text-primary">Users <?php echo $button ?></h6>
                                </div>
                                <div class="card-body">
                                   <form action="<?php echo $action; ?>" method="post">
	    
		 


		
	    <div class="form-group">
            <label for="varchar">Nama Lengkap <?php echo form_error('fullname') ?></label>
            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Nama Lengkap" value="<?php echo $fullname; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Handphone <?php echo form_error('handphone') ?></label>
            <input type="text" class="form-control" name="handphone" id="handphone" placeholder="Nomor Handphone" value="<?php echo $handphone; ?>" />
        </div>
	    
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NIP  <?php echo form_error('nip') ?></label>
            <input type="text" class="form-control" name="nip" id="nip" placeholder="Nip" value="<?php echo $nip; ?>" />
        </div>
	   
	   
	    
	    <div class="form-group">
            <label for="varchar">Email Aktif <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>

	   
	
 
                                </div>
                            </div>

                            <!-- Basic Card Example -->
                           
                        </div>
						 <div class="col-lg-6">

                            <!-- Default Card Example -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary"> Akses dan Wilayah</h6>
                                </div>
                                <div class="card-body">
                                  <div class="form-group">
            <label for="int">Wilayah Pengadilan <?php echo form_error('pengadilan_id') ?></label>
           <?php echo cmb_dinamis('pengadilan_id', 'pengadilan_agama',$valGroup['sendpengadilan'], 'nama', 'id',$pengadilan_id, ''); ?>
			</div>
			 <div class="form-group">
            <label for="tinyint">Group Level <?php echo form_error('group_id') ?></label>
          	<?php echo cmb_dinamis('group_id', 'master_group',$valGroup['sendgroup_id'], 'nama_group', 'group_id',$group_id,''); ?>
			</div>
			<div class="form-group ">
            <label for="varchar">Instansi Akses <?php echo form_error('instansi_id') ?></label>
           <?php echo cmb_dinamis('instansi_id', 'master_kategori_instansi',$valGroup['sendinstansi'], 'nama_instansi', 'instansi_id',$instansi_id,''); ?>
        </div>
		<div class="form-group">
            <label for="int">Mitra Satuan Kerja<?php echo form_error('mitra_id') ?></label>
             <?php echo cmb_dinamis('mitra_id', 'master_mitra',$valGroup['sendmitra'], 'nama_satker', 'mitra_id',$mitra_id, 'and aktif=1' ); ?>
        </div>
                                </div>
								
								<div class="card-footer"><b>
								
								
								 <input type="hidden" name="userid" value="<?php echo $userid; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    
		
                <ul class="pagination  pagination-sm m-0 float-right">
                   <a href="<?php echo site_url('users') ?>" class="btn btn-danger">Cancel</a>
                </ul>
              </div>
                            </div>
					
					
                            <!-- Basic Card Example -->
                         

                        </div>

                   </form>
                    </div>


	
	
</div>



        
	<script type="text/javascript">
 $('.basic').select2({
			placeholder: "- silihakan isi-",
			theme: 'bootstrap4',
          allowClear: true
    })
	

</script>
