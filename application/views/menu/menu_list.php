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
	
	<!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DAFTAR MENU</h6>
                        </div>
			
		<div class="card-header clearfix">
				
				   <?php echo anchor(site_url('menu/create'),'+ Tambah Menu', 'class="btn btn-success"'); ?>
				
                <ul class="pagination  pagination m-0 float-right">
                   <form action="<?php echo site_url('menu/index'); ?>" class="form-inline" method="get">
				    
                  <div class="input-group input-group" style="width: 200px;" >
					<input type="text" class="form-control float-right" name="q" value="<?php echo $q; ?>" placeholder="cari">
                       
                            <?php 
                                if ($q <> ''  )
                                {
                                    ?>
									<div class="input-group-append">
                                    <a href="<?php echo site_url('menu'); ?>" class="btn btn-danger  "><i class="fas fa-undo" title="reset"></i></a>
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
		<th>Parent </th>
		<th>Judul</th>
		<th>Url Controller</th>
		<th>Tampil</th>
		<th>Aktif</th>
		<th>icon</th>
		<th>Group Akses</th>
		<th>Instansi Akses</th>
		<th>Urutan</th>
		<th>Action</th>
            </tr>
			</thead><?php
            foreach ($menu_data as $menu_)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td>
			<?php echo view_arr('menu_pta', 'title','id',$menu_->parent_id) ?></td>
			<td><?php echo $menu_->title ?></td>
			<td><?php echo $menu_->url ?></td>
			<td><?php echo $menu_->view ?></td>
			<td><?php echo $menu_->is_active ?></td>
			<td><?php echo $menu_->icon ?></td>
			<td><?php echo view_arr('master_group', 'nama_group','group_id',$menu_->group_id) ?></td>
			<td><?php echo view_arr('master_kategori_instansi', 'nama_instansi','instansi_id',$menu_->instansi_id) ?></td>
			
			<td><?php echo $menu_->urutan ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				  echo anchor(site_url('menu/update/'.$menu_->id),'<i class="fa fa-edit"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); 
                    echo '  '; ?> 
				
				
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