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
                                  <h6 class="m-0 font-weight-bold text-primary">Menu <?php echo $button ?></h6>
                                </div>
                                <div class="card-body">  
		   
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Parent Menu<?php echo form_error('parent_id') ?></label>
<?php echo  cmb_dinamis('parent_id', 'menu_pta','SELECT id FROM menu_pta where parent_id=0', 'title', 'id',$parent_id,''); ?>
        </div>

		
	    <div class="form-group">
            <label for="varchar">Judul menu <?php echo form_error('title') ?></label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Url Controller <?php echo form_error('url') ?></label>
            <input type="text" class="form-control" name="url" id="url" placeholder="Url" value="<?php echo $url; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tampil (isikan nilai 1) <?php echo form_error('view') ?></label>
            <input type="text" class="form-control" name="view" id="view" placeholder="View" value="<?php echo $view; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Aktif (isikan nilai 1) <?php echo form_error('is_active') ?></label>
            <input type="text" class="form-control" name="is_active" id="is_active" placeholder="Is Active" value="<?php echo $is_active; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Icon <?php echo form_error('icon') ?></label>
            <input type="text" class="form-control" name="icon" id="icon" placeholder="Icon" value="<?php echo $icon; ?>" />
        </div>
		 <div class="form-group">
            <label for="varchar">Urutan <?php echo form_error('urutan') ?></label>
            <input type="text" class="form-control" name="urutan" id="urutan" placeholder="Urutan" value="<?php echo $urutan; ?>" />
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
            <label for="varchar">Group Akses <?php echo form_error('group_id[]') ?></label>
            
			
			 <?php echo select2_dinamis('group_id[]','master_group', 'nama_group','group_id',$group_id,$button) ?>
        </div>
	    <div class="form-group">
            <label for="varchar">Instansi yang boleh akses <?php echo form_error('instansi_id[]') ?></label>
			<?php echo select2_dinamis('instansi_id[]','master_kategori_instansi', 'nama_instansi','instansi_id',$instansi_id,$button) ?>
        </div>
	   
	    
		 </div>
		<div class="card-footer"><b>
								
								
								 <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    
		
                <ul class="pagination  pagination-sm m-0 float-right">
                   <a href="<?php echo site_url('menu') ?>" class="btn btn-danger">Cancel</a>
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
			placeholder: "- Silahkan Pilih -",
	theme: 'bootstrap4',
          allowClear: true
    })
	


	
	
	</script>
