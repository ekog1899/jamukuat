


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

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total User Aktif</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$totalmitra?> Mitra Aktif</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                     
     </div>

                
	
	<!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DAFTAR MITRA</h6>
                        </div>
			
		<div class="card-header clearfix">
				<?php  

 echo ($group_id == 4 and $instansi_id == 1 or $group_id==1)  ? anchor(site_url('Mitra/create'),'+ Tambah Mitra', 'class="btn btn-success "')  : '' ; 				?>
				
			
                <ul class="pagination  pagination m-0 float-right">
                   <form action="<?php echo site_url('Mitra/index'); ?>" class="form-inline" method="get">
				    <div class="input-group input-group" style="width: 200px;" >
				   <?php echo cmb_dinamis('pengadilan', 'pengadilan_agama',$valGroup['sendpengadilan'], 'nama', 'id',$pengadilan,''); ?>
				   </div>
				   
                    <div class="input-group input-group" style="width: 200px;" >
                    <?php echo cmb_dinamis('group', 'master_group',$valGroup['sendgroup_id'], 'nama_group', 'group_id',$group,''); ?>
                    
                    </div> 
                    <div class="input-group input-group" style="width: 200px;" >
                    
                    <?php echo cmb_dinamis('instansi', 'master_kategori_instansi',$valGroup['sendinstansi'], 'nama_instansi', 'instansi_id',$instansi,''); ?>
                    </div>
				   
                  <div class="input-group input-group" style="width: 200px;" >
					<input type="text" class="form-control float-right" name="q" value="<?php echo $q; ?>" placeholder="cari">
                       
                            <?php 
                                if ($q <> '' or $pengadilan <> ''or $group <> '' or $instansi <> '' )
                                {
                                    ?>
									<div class="input-group-append">
                                    <a href="<?php echo site_url('Mitra'); ?>" class="btn btn-danger  "><i class="fas fa-undo" title="reset"></i></a>
									</div>
                                    <?php
                                }
                            ?>
							<div class="input-group-append">
                          <button class="btn btn-primary " type="submit"> <i class="fas fa-search" title='search' name="cari"></i></button>
						  
						  </div>
						
                   
                
                  </div>
				  </form>
                </ul>
				</div>
          
		  
                        <div class="card-body">
                            <div class="card-body table-responsive p-0" style="height: 500px;">
                <table class="table table-head-fixed text-nowrap">
         
				<thead>
            <tr>
                <th>No</th>
		<th> Jenis Mitra  | Jenis Group </th>
		<th>Nama | Kode Satker | Alamat  | Kota | Wilayah Kerja</th>
        <th>Email | Telepon| Fax  | Whatsapp</th>
	
		<th>Action</th>
            </tr>
			</thead><?php
            foreach ($master_mitra_data as $mitra)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td>
			
			
				<?php echo  !empty($mitra->nama_instansi) ? $mitra->nama_instansi : '-';?>
                <br><?php echo  !empty($mitra->nama_group ) ? $mitra->nama_group  : '-';?>
                <br><?php echo  !empty($mitra->nama) ? $mitra->nama : '-';?>
			
		
			 
			 
			 </td>
			<td>
			<?php echo  !empty($mitra->nama_satker) ? $mitra->nama_satker : '-';?>
			<br><b><?php echo  !empty($mitra->kode_satker) ? $mitra->kode_satker : '-';?>
			<br><?php echo  !empty($mitra->alamat_satker) ? $mitra->alamat_satker : '-';?>
			<br><?php echo  !empty($mitra->kota_kabupaten_satker) ? $mitra->kota_kabupaten_satker : '-';?> </b>
            <br><?php echo  !empty($mitra->wilayah_kerja) ? $mitra->wilayah_kerja : '-';?> </b>
			</td>
            <td>
			<?php echo  !empty($mitra->email_satker) ? $mitra->email_satker : '-';?>
			<br><b><?php echo  !empty($mitra->telepon_satker) ? $mitra->telepon_satker : '-';?>
			<br><?php echo  !empty($mitra->fax_satker) ? $mitra->fax_satker : '-';?>
			<br><?php echo  !empty($mitra->wa_satker) ? $mitra->wa_satker : '-';?> </b>
           
			</td>
			
			<?php if ($group_id == 4 and $instansi_id == 1 or $group_id ==1) {?>
			<td style="text-align:center" >
				<?php 
				  echo anchor(site_url('Mitra/update/'.encrypt_url($mitra->mitra_id)),'<i class="fa fa-edit"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); 
                    echo '  '; 
			
			
			
			
			 ?> 
					
		 															
					<?php if($mitra->aktif == 1){ ?>
											
                        <?php    echo anchor(site_url('Mitra/aktif/'.encrypt_url($mitra->mitra_id).'/block'),'<i class="fa fa-check"></i>',array('title'=>'status aktif','class'=>'btn btn-success btn-sm'));  
                    echo '  '; ?>
					<?php  } else {?>
					
                    <?php    echo anchor(site_url('Mitra/aktif/'.encrypt_url($mitra->mitra_id).'/aktif'),'<i class="fa fa-ban"></i>',array('title'=>'status non aktif','class'=>'btn btn-danger btn-sm')); 
                    echo '  '; ?>
					<?php } ?> 
					
					
					<?php echo  ($mitra->group_id == 5  and $mitra->instansi_id == 2 /*or $mitra->group_id == 4 and $mitra->instansi_id == 2*/) ? anchor(site_url('Mitra/kua_list/'.base64_encode($mitra->mitra_id)),'<i class="fa fa-bars"></i>',array('title'=>'Manage KUA','class'=>'btn btn-info btn-sm')) : '';?>
			</td>
			<?php } else {?>
<td style="text-align:center" > </td>
				<?php  }?>
		</tr>
                <?php
            }
            ?>
        </table>
        </div>
                        </div>
						
						<!-- /.card -->
          <div class="card-footer clearfix"><b>
		  <?php echo 'Total Record :  '.$total_rows.''; ?></b>
                <ul class="pagination  pagination m-0 float-right">
                   <?php echo $pagination; ?>
                </ul>
              </div>
                    </div>

	
	
</div>
	<script type="text/javascript">
 $('.basic').select2({
			placeholder: "- Silahkan Pilih -",
	theme: 'bootstrap4',
          allowClear: true
    })
	

</script>