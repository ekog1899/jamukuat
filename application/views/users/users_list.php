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
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$totaluser?> Orang</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                User Instansi Lain</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $userlain;?> User</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Email tidak valid</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $kontak;?> User</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
	
	<!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DAFTAR USER</h6>
                        </div>
			
		<div class="card-header clearfix">
				<?php 
                
                
                echo ($group_id <= 4 and $instansi_id <= 1)  ? anchor(site_url('Users/create'),'+ Tambah Pengguna', 'class="btn btn-success "')  : '' ; 
                  ?>
				
                <ul class="pagination  pagination m-0 float-right">
                   <form action="<?php echo site_url('Users/index'); ?>" class="form-inline" method="get">
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
                                    <a href="<?php echo site_url('Users'); ?>" class="btn btn-danger  "><i class="fas fa-undo" title="reset"></i></a>
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
		<th>Pengadilan | Mitra | Akses | Jenis User | Login Terakhir</th>
		<th>Nama | Username | Email | Handphone </th>
	
		<th>Action</th>
            </tr>
			</thead><?php
            foreach ($users_data as $users)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td>
			
			
				<?php echo  !empty($users->nama) ? $users->nama : '-';?>
				<br><?php echo  !empty($users->nama_satker ) ? $users->nama_satker  : '-';?>
				<br><?php echo  !empty($users->nama_group ) ? $users->nama_group  : '-';?>
				<br><?php echo  !empty($users->nama_instansi ) ? $users->nama_instansi  : '-';?>
				<br>Login :  <?php echo  !empty($users->last_login ) ? $users->last_login  : '-';?>
		
			 
			 
			 </td>
			<td>
			<?php echo  !empty($users->fullname) ? $users->fullname : '-';?>
			<br><b><?php echo  !empty($users->username) ? $users->username : '-';?>
			<br><?php echo  !empty($users->email) ? $users->email : '-';?>
			<br><?php echo  !empty($users->handphone) ? $users->handphone : '-';?> </b>
			</td>
			

			<td style="text-align:center" >
				<?php 
				  echo anchor(site_url('Users/update/'.encrypt_url($users->userid)),'<i class="fa fa-edit"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); 
                    echo '  '; ?> 
							 															
					<?php if($users->block == 1){ ?>
											
					<?php    echo anchor(site_url('Users/aktif/'.encrypt_url($users->userid).'/aktif'),'<i class="fa fa-ban"></i>',array('title'=>'status non aktif','class'=>'btn btn-danger btn-sm')); 
                    echo '  '; ?>
					<?php  } else {?>
					<?php    echo anchor(site_url('Users/aktif/'.encrypt_url($users->userid).'/block'),'<i class="fa fa-check"></i>',array('title'=>'status aktif','class'=>'btn btn-success btn-sm')); 
                    echo '  '; ?>
					<?php } ?> 
					<?php 
					
			
					/*if($users->group_id==5){
						echo anchor(site_url('Pengguna/kua_list/'.$users->userid),'<i class="fa fa-edit"></i>',array('title'=>'edit','class'=>'btn btn-info btn-sm')); 
					}
					
			         echo '  '; */
			echo anchor(site_url('Users/sendinfo/'.encrypt_url($users->userid)),'<i class="fa fa-paper-plane"></i>',array('title'=>'kirim akun','class'=>'btn btn-info btn-sm')); 
                    echo '  ';
				//; echo anchor(site_url('users/delete/'.$users->userid),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
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