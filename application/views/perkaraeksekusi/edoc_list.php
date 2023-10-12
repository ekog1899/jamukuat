<?php
	if(count($edoc)>=1){
?>
<table class="table table-bordered table-bordered table-sm table-condensed" id="dataTable" width="100%" cellspacing="1">
	<thead>
		<tr class="bg-success text-light">
			<th style="width: 5%">No</th>
			<th>Keterangan</th>
			<th class="text-center">Dokumen</th>
			<th style="width: 10%"></th>
		</tr>
	</thead>
	<tbody>
		<?php
			for ($i = 0; $i < count($edoc); ++$i){
				$no=$i+1;
				echo "<tr>";
				echo "<td>$no</td>";
				echo "<td>".$edoc[$i]->keterangan."</td>";
				echo "<td class='text-center'><a href='".base_url($edoc[$i]->edoc_url)."' target='_blank' title='Unduh Dokumen'>Unduh</a></td>";
				echo "<td class='text-center'><button class='btn text-danger border border-danger' onclick='hapus_edoc(".$edoc[$i]->id.")'>Hapus</button></td>";
				echo "</tr>";
			}
		?>
	</tbody>
</table> 
<?php
	}
?>