<div class="modal-header">
	<h4 class="modal-title">Tambah Key KUA</h4>  
	<button type='button' id='BarisBaru' class='btn btn-default'>Tambah Baris Baru</button>
<div id='ResponseInput'></div>                                                           
</div> 
<div class="modal-body">
	<?php echo form_open('Mitra/simpan_kua_key', array('id' => 'FormTambahBarang')); ?>
<table class='table table-bordered' id='TabelTambahBarang'>
	<thead>
		<tr>
			<th>#</th>
			<th>Key</th>
			<th>Batal</th>
		</tr>
	</thead>
	<tbody></tbody>
</table>
</div>   
<div class="modal-footer">
	<button type='button' class='btn btn-primary' id='SimpanTambahBarang'>Simpan Data</button>
	<button type='button' class='btn btn-default' data-dismiss='modal'>Tutup</button>
</div>


<script>
$(document).ready(function(){

	var kua_id   = $("#kua_id").val();
	BarisBaru();

	$('#BarisBaru').click(function(){
		BarisBaru();
	});

	$('#SimpanTambahBarang').click(function(e){
		e.preventDefault();

		if($(this).hasClass('disabled'))
		{
			return false;
		}
		else
		{
			if($('#FormTambahBarang').serialize() !== '')
			{
				$.ajax({
					url: $('#FormTambahBarang').attr('action'),
					type: "POST",
					dataType: "html",
					data:{
						"kua_id" : kua_id
					}, 
					cache: false,
					data: $('#FormTambahBarang').serialize(),
					dataType:'json',
					beforeSend:function(){
						$('#SimpanTambahBarang').html("Menyimpan Data, harap tunggu ...");
					},
					success: function(json){
						if(json.status == 1){ 
							// $('.modal-dialog').removeClass('modal-lg');
							// $('.modal-dialog').addClass('modal-sm');
							// $('#ModalHeader').html('Sukses !');
							// $('#ModalContent').html(json.pesan);
							// $('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal'>Ok</button>");
							// $('#ModalGue').modal('show');
							// $('#my-grid').DataTable().ajax.reload( null, false );
							alert("Berhasil");
							window.location.reload();
						}
						else {
							$('#ResponseInput').html(json.pesan);
						}

						$('#SimpanTambahBarang').html('Simpan Data');
					}
				});
			}
			else
			{
				$('#ResponseInput').html('');
			}
		}
	});

	$("#FormTambahBarang").find('input[type=text],textarea,select').filter(':visible:first').focus();
});

$(document).on('click', '#HapusBaris', function(e){
	e.preventDefault();
	$(this).parent().parent().remove();

	var Nomor = 1;
	$('#TabelTambahBarang tbody tr').each(function(){
		$(this).find('td:nth-child(1)').html(Nomor);
		Nomor++;
	});

	$('#SimpanTambahBarang').removeClass('disabled');
});

function BarisBaru()
{
	var Nomor = $('#TabelTambahBarang tbody tr').length + 1;
	var Baris = "<tr>";
	Baris += "<td>"+Nomor+"</td>";
	Baris += "<td><input type='text' name='key[]' class='form-control input-sm'></td>";
	Baris += "<input type='hidden' name='kua_id[]' class='form-control input-sm' value='<?php echo $kua_id;?>' >";
	
	
	Baris += "<td align='center'><a href='#' id='HapusBaris'><i class='fa fa-times' style='color:red;'></i></a></td>";
	Baris += "</tr>";

	$('#TabelTambahBarang tbody').append(Baris);
}


</script>