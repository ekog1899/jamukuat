<table class="w3-table-all" id="tabel_variabel">
	<thead>
		<tr>
			<th>No</th>
			<th>Nomor</th>
			<th>Keterangan</th>
			<th>Jenis</th>
			<th>ModelTabel<br>Field</th>
			<th>Fungsi</th>
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
				echo "<td>".$variabel[$i]->keterangan."<br>".$variabel[$i]->var_tabel."<br>".$variabel[$i]->var_field."</td>";
				echo "<td>".$variabel[$i]->var_fungsi_nama."</td>";
				echo "<td><button class='w3-btn w3-round w3-border w3-green w3-small' onclick='edit_variabel(".$variabel[$i]->var_id.")'>Edit</button></td>";
				echo "</tr>";
			}
		?>
	</tbody>
</table> 
