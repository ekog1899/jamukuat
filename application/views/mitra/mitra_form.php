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
                                  <h6 class="m-0 font-weight-bold text-primary">Mitra  <?php echo $button ?></h6>
                                </div>
                                <div class="card-body">
                                   <form action="<?php echo $action; ?>" method="post">
	    
		 


		
	    <div class="form-group">
            <label for="varchar">Kode Satker <?php echo form_error('kode_satker') ?></label>
            <input type="text" class="form-control" name="kode_satker" id="kode_satker" placeholder="Kode Satker" value="<?php echo $kode_satker; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Satker <?php echo form_error('nama_satker') ?></label>
            <input type="text" class="form-control" name="nama_satker" id="nama_satker" placeholder="Nama Satker" value="<?php echo $nama_satker; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Satker <?php echo form_error('alamat_satker') ?></label>
            <input type="text" class="form-control" name="alamat_satker" id="alamat_satker" placeholder="Alamat Satker" value="<?php echo $alamat_satker; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kota Kabupaten Satker <?php echo form_error('kota_kabupaten_satker') ?></label>
            <input type="text" class="form-control" name="kota_kabupaten_satker" id="kota_kabupaten_satker" placeholder="Kota Kabupaten Satker" value="<?php echo $kota_kabupaten_satker; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Wilayah Kerja <?php echo form_error('wilayah_kerja') ?></label>
            <input type="text" class="form-control" name="wilayah_kerja" id="wilayah_kerja" placeholder="Wilayah Kerja" value="<?php echo $wilayah_kerja; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email Satker <?php echo form_error('email_satker') ?></label>
            <input type="text" class="form-control" name="email_satker" id="email_satker" placeholder="Email Satker" value="<?php echo $email_satker; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Telepon Satker <?php echo form_error('telepon_satker') ?></label>
            <input type="text" class="form-control" name="telepon_satker" id="telepon_satker" placeholder="Telepon Satker" value="<?php echo $telepon_satker; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Fax Satker <?php echo form_error('fax_satker') ?></label>
            <input type="text" class="form-control" name="fax_satker" id="fax_satker" placeholder="Fax Satker" value="<?php echo $fax_satker; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Wa Satker <?php echo form_error('wa_satker') ?></label>
            <input type="text" class="form-control" name="wa_satker" id="wa_satker" placeholder="Wa Satker" value="<?php echo $wa_satker; ?>" />
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
           <?php echo cmb_dinamis('pengadilan_id', 'pengadilan_agama',$valGroup['sendpengadilan'], 'nama', 'id',$pengadilan_id,''); ?>
			</div>
        <div class="form-group ">
            <label for="varchar">Instansi Akses <?php echo form_error('instansi_id') ?></label>
           <?php echo cmb_dinamis('instansi_id', 'master_kategori_instansi',$valGroup['sendinstansi'], 'nama_instansi', 'instansi_id',$instansi_id,''); ?>
        </div>
        
        <div class="form-group">
            <label for="tinyint">Group Level <?php echo form_error('group_id') ?></label>
          	<?php echo cmb_dinamis('group_id', 'master_group',$valGroup['sendgroup_id'], 'nama_group', 'group_id',$group_id,''); ?>
			</div>
                                </div>
								
								<div class="card-footer"><b>
								
								
								<input type="hidden" name="mitra_id" value="<?php echo $mitra_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    
		
                <ul class="pagination  pagination-sm m-0 float-right">
                   <a href="<?php echo site_url('Mitra') ?>" class="btn btn-danger">Cancel</a>
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




