<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"></h1>
	<div class="row" style="margin-bottom: 10px">       


	</div>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Kutipan Akta Cerai</h6>
		</div>
		<div class="card-body">
			<div>
				</div>
				<div class="table-responsive" id="div_pengguna">
					<table class="table table-bordered table-sm table-hover"  id='my-grid' cellspacing="0">

						<?php
						if($ketemu==1){
							?>
							<tr class="bg-primary text-light">
								<td style="text-align: center;">Nomor Akta Cerai</td>
								
							</tr>
							<tr>
								<td style="text-align: center;"><?php echo $nomor_akta_cerai;?></td>
							</tr>
							<tr class="bg-primary text-light">
								<td style="text-align: center;">Tanggal Akta Cerai</td>
								
							</tr>
							<tr>
								<td style="text-align: center;"><?php echo tgl_indo($tanggal_akta_cerai);?></td>
							</tr>
							<tr class="bg-primary text-light">
								<td style="text-align: center;">Nama Pihak Penggugat/Pemohon</td>
								
							</tr>
							<tr>
								<td style="text-align: center;"><?php echo $nama_pihak1;?></td>
							</tr>
							<tr class="bg-primary text-light">
								<td style="text-align: center;">NIK Pihak Penggugat/Pemohon</td>
								
							</tr>
							<tr>
								<td style="text-align: center;"><?php echo $nik_pihak1;?></td>
							</tr>
							<tr class="bg-primary text-light">
								<td style="text-align: center;">Alamat Pihak Penggugat/Pemohon</td>
								
							</tr>
							<tr>
								<td style="text-align: center;"><?php echo $alamat_pihak1;?></td>
							</tr>

							<tr class="bg-primary text-light">
								<td style="text-align: center;">Nama Pihak Tergugat/Termohon</td>
								
							</tr>
							<tr>
								<td style="text-align: center;"><?php echo $nama_pihak2;?></td>
							</tr>
							<tr class="bg-primary text-light">
								<td style="text-align: center;">NIK Pihak Tergugat/Termohon</td>
								
							</tr>
							<tr>
								<td style="text-align: center;"><?php echo $nik_pihak2;?></td>
							</tr>
							<tr class="bg-primary text-light">
								<td style="text-align: center;">Alamat Pihak Tergugat/Termohon</td>
								
							</tr>
							<tr>
								<td style="text-align: center;"><?php echo $alamat_pihak2;?></td>
							</tr>
							<?php
						}else{
							?>
							<tr class="bg-danger text-light">
								<td style="text-align: center;">Data tidak ditemukan.</td>
								
							</tr>

							<?php

						}
						?>
					
							
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

	function tambah_kua(kua_id){

		// $('#mdl_search').modal('show');
		$('.modal-dialog').removeClass('modal-sm');
		$('.modal-dialog').addClass('modal-lg');
		$('#ModalGue').modal('show');

		var url = '<?php echo base_url()?>Pengguna/tambah_kua';
		$.ajax({
			url: url,
			type: "POST",
			dataType: "html",   
			data:{
				"kua_id" : kua_id
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