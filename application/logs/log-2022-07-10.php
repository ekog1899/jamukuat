<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-07-10 10:10:01 --> Severity: Error --> Call to undefined method Api_m::get_data_putusan() /var/www/html/jamukuat/application/controllers/Api.php 221
ERROR - 2022-07-10 12:52:14 --> Severity: Compile Error --> Cannot redeclare Dashboard::dashboard_dukcapil() /var/www/html/jamukuat/application/controllers/Dashboard.php 173
ERROR - 2022-07-10 12:52:16 --> Severity: Compile Error --> Cannot redeclare Dashboard::dashboard_dukcapil() /var/www/html/jamukuat/application/controllers/Dashboard.php 173
ERROR - 2022-07-10 13:08:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '''')
		AS dum
		ORDER BY ids DESC' at line 13 - Invalid query: SELECT * FROM
		( SELECT '1' AS jenis_pihak,a.`nama_pihak1` AS nama, a.`nik_pihak1` AS nik, a.`alamat_pihak1` AS alamat, a.`pekerjaan_pihak1` AS pekerjaan, a.`tempatlahir_pihak1` AS tempat_lahir, a.`tanggallahir_pihak1` AS tanggal_lahir,
		a.`nomor_perkara`,a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids, a.status_pihak1 as status_pihak, capil_pihak1 as capil,tanggal_permohonan_pihak1 as tanggal_permohonan, tanggal_pengambilan_pihak1 as tanggal_pengambilan, id
		FROM perkara_akta_cerai a 
		where nama_pihak1='' OR nama_pihak2='' OR nik_pihak1='' OR nik_pihak2=''

		UNION ALL
		SELECT '2' AS jenis_pihak, a.`nama_pihak2` AS nama, a.`nik_pihak2` AS nik, a.`alamat_pihak2` AS alamat, a.`pekerjaan_pihak2` AS pekerjaan, a.`tempatlahir_pihak2` AS tempat_lahir, a.`tanggallahir_pihak2` AS tanggal_lahir,
		a.`nomor_perkara`,  a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids , a.status_pihak2 as status_pihak, capil_pihak2 as capil,tanggal_permohonan_pihak2 as tanggal_permohonan, tanggal_pengambilan_pihak2 as tanggal_pengambilan, id
		FROM perkara_akta_cerai a 
		where nama_pihak1='' OR nama_pihak2='' OR nik_pihak1='' OR nik_pihak2=''')
		AS dum
		ORDER BY ids DESC
ERROR - 2022-07-10 13:09:35 --> Severity: Parsing Error --> syntax error, unexpected '$query' (T_VARIABLE) /var/www/html/jamukuat/application/models/Api_m.php 372
ERROR - 2022-07-10 13:09:37 --> Severity: Parsing Error --> syntax error, unexpected '$query' (T_VARIABLE) /var/www/html/jamukuat/application/models/Api_m.php 372
ERROR - 2022-07-10 13:09:38 --> Severity: Parsing Error --> syntax error, unexpected '$query' (T_VARIABLE) /var/www/html/jamukuat/application/models/Api_m.php 372
