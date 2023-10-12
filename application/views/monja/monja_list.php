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

                      

                       

                       
                    </div>

                    
	
	<!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">MONITORING AKSES</h6>
                        </div>
			
		<div class="card-header clearfix">
				
				
                <ul class="pagination  pagination m-0 float-right">
                   <form action="<?php echo site_url('Monja/index'); ?>" class="form-inline" method="get">
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
                                    <a href="<?php echo site_url('Monja'); ?>" class="btn btn-danger  "><i class="fas fa-undo" title="reset"></i></a>
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
                <table class="table table-head-fixed text-nowrap table-sm">
         
				<thead>
            <tr>
                <th>No</th>
                <th>Pengadilan</th>
                <th>Mitra</th>
                <th>Jenis Mitra</th>
                <th>Akses</th>
                <th>Nama User</th>
                <th>Login Terakhir</th>
                <th>Kategori Log</th>
                <th>Tanggal Log</th>
                <th>isi Log</th>
	

            </tr>
			</thead><?php
            foreach ($users_data as $users)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
            <td ><?php echo  !empty($users->nama) ? $users->nama : '-';?></td>
            <td ><?php echo  !empty($users->nama_satker ) ? $users->nama_satker  : '-';?></td>
            <td ><?php echo  !empty($users->nama_instansi ) ? $users->nama_instansi  : '-';?></td>
            <td ><?php echo  !empty($users->nama_group ) ? $users->nama_group  : '-';?></td>
            <td> <?php echo  !empty($users->fullname) ? $users->fullname : '-';?></td>
            <td> <?php echo  !empty($users->last_login ) ? $users->last_login  : '-';?></td>
  
        

			
			<?php 
            $usera = $users->userid;
            $querylog = "SELECT data_log.* FROM data_log, (SELECT MAX(IDlog) AS ch ,catLog,dateLog,userID,contentLog FROM data_log  GROUP BY userID) maxlog WHERE data_log.`userID`=maxlog.userID AND 
            data_log.`IDlog`=maxlog.ch AND data_log.`userID`=$usera
                        ";
            $hasillog = $this->db->query($querylog)->result_array();

           
           if (empty($hasillog))  {  echo "<td>-</td><td>-</td><td>-</td>"; } else {?>
           
  <?php foreach ($hasillog as $log) : ?>
             
                <td><?php echo   $log['catLog'] ;?></td>
                <td><?php echo  date("Y-m-d H:i:s",  $log['dateLog']); ?></td>
                <td><?php echo   $log['contentLog'] ;?></td>
                      
            <?php endforeach; ?>
           
			
			

			
		</tr>
                <?php
            }}
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