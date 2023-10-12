<div class="w3-row">Daftar Variabel</div>
<div class="w3-row"><a onclick="tambah_variabel()" href="#" class="w3-btn w3-purple w3-padding-small">+ Tambah Variabel</a></div>
<hr>
<div class="w3-row" id="data_variabel">
<table class="w3-table-all" id="tabel_variabel">
	<thead>
		<tr>
			<th>No</th>
			<th>Nomor</th>
			<th>Keterangan</th>
			<th>Jenis</th>
			<th>Model</th>
			<th>Tabel</th>
			<th>Field</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php
			for ($i = 0; $i < count($variabel); ++$i){
				$no=$i+1;
				echo "<tr>";
				echo "<td>$no</td>";
				echo "<td>".$variabel[$i]->var_nomor."</td>";
				echo "<td>".$variabel[$i]->var_keterangan."</td>";
				echo "<td>".$variabel[$i]->var_jenis."</td>";
				echo "<td>".$variabel[$i]->var_model."</td>";
				echo "<td>".$variabel[$i]->var_tabel."</td>";
				echo "<td>".$variabel[$i]->var_field."</td>";
				echo "<td></td>";
				echo "</tr>";
			}
		?>
	</tbody>
</table>
</div>

<link href="<?php echo base_url('assets/'); ?>plugins/vanilla-dataTables/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url('assets/'); ?>plugins/vanilla-dataTables/vanilla-dataTables.min.js" type="text/javascript"></script>
<script type="text/javascript">
var table = new DataTable("#tabel_variabel"); 
</script>
