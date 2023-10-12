<?php 
if(isset($balasan['id'])) { 
	echo '<table cellpadding="3">';
			echo '<tr><td class="bg-primary text-white">Kutipan Akta Nikah</td><td> '.$balasan["kutipan_akta_nikah"] .'</td></tr>';
			echo '<tr><td class="bg-primary text-white">Tanggal Menikah</td><td> '.tgl_indo($balasan["tanggl_menikah"]).'</td></tr>';
			echo '<tr><td class="bg-primary text-white">Lokasi Nikah</td><td> '.$balasan['lokasi_nikah'] .'</td></tr>';
			echo '<tr><td class="bg-primary text-white">Kecamatan</td><td> '.$balasan['kecamatan'] .'</td></tr>';
			echo '<tr><td class="bg-primary text-white">Kabupaten</td><td> '.$balasan['kabupaten'] .'</td></tr>';
			echo '<tr><td class="bg-primary text-white text-center" colspan="2">DATA SUAMI</td></tr>';
			echo '<tr><td class="bg-primary text-white">Nama</td><td> '.$balasan['nama_suami'] .'</td></tr>';
			echo '<tr><td class="bg-primary text-white">Nama Ayah</td><td> '.$balasan['nama_ayah_suami'] .'</td></tr>';
			echo '<tr><td class="bg-primary text-white">TTL</td><td> '.$balasan['tempat_lahir_suami'] .", ".tgl_indo($balasan['tanggal_lahir_suami']).'</td></tr>';
			echo '<tr><td class="bg-primary text-white">Pekerjaan</td><td> '.$balasan['pekerjaan_suami'] .'</td></tr>';
			echo '<tr><td class="bg-primary text-white text-center" colspan="2">DATA ISTRI</td></tr>';
			echo '<tr><td class="bg-primary text-white">Nama</td><td> '.$balasan['nama_istri'] .'</td></tr>';
			echo '<tr><td class="bg-primary text-white">Nama Ayah</td><td> '.$balasan['nama_ayah_istri'] .'</td></tr>';
			echo '<tr><td class="bg-primary text-white">TTL</td><td> '.$balasan['tempat_lahir_istri'] .", ".tgl_indo($balasan['tanggal_lahir_istri']).'</td></tr>';
			echo '<tr><td class="bg-primary text-white">Pekerjaan</td><td> '.$balasan['pekerjaan_istri'] .'</td></tr>';
			echo '<tr><td class="bg-primary text-white"></td><td></td></tr>';
			echo '<tr><td class="bg-primary text-white">SAKSI</td><td>'.$balasan['saksi_1'] .', '.$balasan['saksi_2'] .'</td></tr>';


			echo '</table>';
	
}else{
		echo "<h1 class='text-danger text-center'>Data tidak dapat ditemukan</h1>";
}
		
?>
	