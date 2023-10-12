<?php
$template=file_get_contents($source_file); 
$template=str_replace('#nomor_register_eksekusi#', $nomor_register_eksekusi, $template);
//$template=str_replace('#nama_pa#', $nama_pa, $template);
$template=str_replace('#eksekusi_nomor_perkara#', $eksekusi_nomor_perkara, $template);
//$template=str_replace('#tanggal_putusan_perkara_eksekusi#', $tanggal_putusan_perkara_eksekusi, $template);
//$template=str_replace('#pemohon_nama#', $pemohon_nama, $template);
//$template=str_replace('#pemohon_nama#', $pemohon_nama, $template);
//$template=str_replace('#termohon_eksekusi#', $termohon_eksekusi, $template);
$template=str_replace('#eksekusi_amar_putusan#', $eksekusi_amar_putusan, $template);
//$template=str_replace('#surat_permohon_eksekusi#', $surat_permohon_eksekusi, $template);
$template=str_replace('#permohonan_eksekusi#', $permohonan_eksekusi, $template);
//$template=str_replace('#hari_aanmaning#', $hari_aanmaning, $template);
//$template=str_replace('#tanggal_aanmaning#', $tanggal_aanmaning, $template);
//$template=str_replace('#jam_aanmaning#', $jam_aanmaning, $template);
//$template=str_replace('#kota_pa#', $kota_pa, $template);
//$template=str_replace('#tanggal_penetapan_aanmaning#', $tanggal_penetapan_aanmaning, $template);

 
//$template=str_replace($template, "#nomor_urut_register#", $register['nomor_urut_register']);
			//$template=str_replace($template, "#nomor_perkara#", $register['nomor_perkara']);
			
header("Content-Type: application/vnd.ms-word");
header("Expires: 0");
header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
$nama_file= str_replace("/","_",$nomor_register_eksekusi);
header("Content-disposition: attachment; filename=\"$nama_file.rtf\"");
echo $template;
?>