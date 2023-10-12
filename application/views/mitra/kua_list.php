<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"></h1>
	<div class="row" style="margin-bottom: 10px">       


	</div>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">KEY KUA</h6>
		</div>
		<div class="card-body">
			<div>
				<button class='btn text-primary  border border-primary' onclick="tambah_kua((<?php echo $mitra_id; ?>),(<?php echo $pa; ?>))"><i class='fa fa-plus'></i> Tambah Key</button></div>
				<div class="table-responsive" id="div_pengguna">
					<table class="table table-bordered table-sm table-hover"  id='my-grid' cellspacing="0">
						<thead>
							<tr class="bg-primary text-light">
								<th style="text-align: center;">No</th>
								<th style="text-align: center;">KUA</th>
								<th style="text-align: center;">Key</th>
								<th style="text-align: center;">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no=1;
							foreach($key->result_array() as $row){


								?>
								<tr>
									<td><center><?php echo $no++; ?></center></td>
									<td><?php echo $row['nama_satker']; ?></td>
									<td><center><?php echo $row['key']; ?></center></td>
									<td><center>

										<button class='btn ml-3 btn-sm'><a onClick="return confirmDialog()" href='<?php echo base_url('Mitra/hapus_key_kua/'.$row['ids'].'/'.$row['mitra_id']);?>' id='HapusBarang'><i class='fa fa-trash' title='Hapus Pengguna'> </i></button></a>
									</center></td>

								</tr>
								<?php 

							}?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">

	</div>
	<!-- /.container-fluid -->

</div>

<!-- <div class="modal fade"  id="ModalGue">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>
				<h4 class="modal-title" id="ModalHeader"></h4>
			</div>
			<div class="modal-body" id="ModalContent"></div>
			<div class="modal-footer" id="ModalFooter"></div>
		</div>                                                                    
	</div>                                          
</div> -->

<div class="modal fade" id="ModalGue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content" id='mdl_isi'>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>
				<h4 class="modal-title" id="ModalHeader"></h4>
			</div>
			<div class="modal-body" id="ModalContent"></div>
			<div class="modal-footer" id="ModalFooter"></div>
		</div>
	</div>
</div>
<!-- .modal -->
<!-- Page level custom scripts -->
<link href="<?php echo base_url('assets/'); ?>vanilla-dataTables/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url('assets/'); ?>vanilla-dataTables/vanilla-dataTables.min.js" type="text/javascript"></script>
<link href="<?php echo base_url('assets/'); ?>slim_select/slimselect.min.css" rel="stylesheet" />
<script src="<?php echo base_url('assets/'); ?>slim_select/slimselect.min.js"></script>

<script type="text/javascript">

	function tambah_kua(mitra_id, pa){

		// $('#mdl_search').modal('show');
		$('.modal-dialog').removeClass('modal-sm');
		$('.modal-dialog').addClass('modal-lg');
		$('#ModalGue').modal('show');

		var url = '<?php echo base_url()?>Mitra/tambah_kua';
		$.ajax({
			url: url,
			type: "POST",
			dataType: "html",   
			data:{
				"mitra_id" : mitra_id,
				"pa" : pa
			},
			success: function(data)
			{
				$("#mdl_isi").html(data);

			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				$("#mdl_isi").html('Gagal Load Data');
			}
		}); 
	} 

</script> 

<script>
	  function confirmDialog()
  {
    return confirm('Anda yakin ingin menghapus Data?')
  }
	$('#ModalGue').on('hide.bs.modal', function () {
		setTimeout(function(){ 
			$('#ModalHeader, #ModalContent, #ModalFooter').html('');
		}, 500);
	});
</script>