<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-06-08 08:15:22 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-08 08:43:10 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 08:43:24 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 08:43:38 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 08:44:10 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 08:44:20 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 08:44:23 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 08:46:20 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 08:47:37 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 08:47:38 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 09:00:19 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 09:01:34 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 09:05:45 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 09:16:31 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 71
ERROR - 2023-06-08 09:16:31 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 199
ERROR - 2023-06-08 09:18:23 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 09:22:53 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-08 09:48:47 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 498
ERROR - 2023-06-08 09:48:53 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 498
ERROR - 2023-06-08 09:48:57 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 170
ERROR - 2023-06-08 09:49:06 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 498
ERROR - 2023-06-08 09:49:17 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 170
ERROR - 2023-06-08 09:53:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '3318185211820003\' AND a.capil_pihak1 IS NULL

		UNION ALL
		SELECT '2' AS je' at line 6 - Invalid query: SELECT * FROM
		( SELECT '1' AS jenis_pihak,a.`nama_pihak1` AS nama, a.`nik_pihak1` AS nik, a.`alamat_pihak1` AS alamat, a.`pekerjaan_pihak1` AS pekerjaan, a.`tempatlahir_pihak1` AS tempat_lahir, a.`tanggallahir_pihak1` AS tanggal_lahir,
		a.`nomor_perkara`,a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids, a.status_pihak1 as status_pihak, capil_pihak1 as capil,tanggal_permohonan_pihak1 as tanggal_permohonan, tanggal_pengambilan_pihak1 as tanggal_pengambilan, id
		FROM perkara_akta_cerai a 
		where a.nama_pihak1='3318185211820003\' OR a.nik_pihak1='3318185211820003\' AND a.capil_pihak1 IS NULL

		UNION ALL
		SELECT '2' AS jenis_pihak, a.`nama_pihak2` AS nama, a.`nik_pihak2` AS nik, a.`alamat_pihak2` AS alamat, a.`pekerjaan_pihak2` AS pekerjaan, a.`tempatlahir_pihak2` AS tempat_lahir, a.`tanggallahir_pihak2` AS tanggal_lahir,
		a.`nomor_perkara`,  a.`tanggal_putusan`, a.`nomor_akta_cerai`,a.`tanggal_akta_cerai`, a.`jenis_perkara_text`, a.`kd_satker`, 
		a.`no_kutipan_akta_nikah`, a.`tgl_kutipan_akta_nikah`, a.`id` AS ids , a.status_pihak2 as status_pihak, capil_pihak2 as capil,tanggal_permohonan_pihak2 as tanggal_permohonan, tanggal_pengambilan_pihak2 as tanggal_pengambilan, id
		FROM perkara_akta_cerai a 
		where a.nama_pihak2='3318185211820003\' OR a.nik_pihak2='3318185211820003\' AND a.capil_pihak2 IS NULL)
		AS dum
		ORDER BY ids DESC
ERROR - 2023-06-08 09:53:32 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-08 10:08:38 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-08 10:12:16 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 48
ERROR - 2023-06-08 10:12:16 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 141
ERROR - 2023-06-08 10:12:45 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 48
ERROR - 2023-06-08 10:12:45 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 141
ERROR - 2023-06-08 10:13:05 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 48
ERROR - 2023-06-08 10:13:05 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 141
ERROR - 2023-06-08 10:13:19 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 48
ERROR - 2023-06-08 10:13:19 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 141
ERROR - 2023-06-08 10:14:18 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 48
ERROR - 2023-06-08 10:14:18 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 141
ERROR - 2023-06-08 10:14:18 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-08 10:14:32 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-08 10:14:45 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-08 10:15:43 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-08 10:15:51 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-08 10:25:10 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 48
ERROR - 2023-06-08 10:25:10 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 141
ERROR - 2023-06-08 10:32:21 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 498
ERROR - 2023-06-08 10:32:40 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 170
ERROR - 2023-06-08 10:34:06 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 71
ERROR - 2023-06-08 10:34:06 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 199
ERROR - 2023-06-08 10:34:19 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-06-08 10:34:19 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-06-08 10:34:45 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 509
ERROR - 2023-06-08 10:35:23 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 498
ERROR - 2023-06-08 11:11:12 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-08 11:11:47 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 11:11:52 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 11:12:08 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 11:12:10 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 11:12:12 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 11:12:22 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 11:12:29 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 11:12:43 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-08 11:13:26 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-08 11:13:54 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-08 11:14:47 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-08 11:14:56 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-08 11:15:24 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-08 11:15:47 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-08 11:16:05 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-08 11:16:23 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-08 11:16:39 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-08 11:16:51 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-08 11:17:49 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-08 11:27:05 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 11:27:08 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 11:27:11 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 11:41:31 --> Query error: Unknown column 'status_putusan.nama' in 'field list' - Invalid query: SELECT `perkara`.`id`, `perkara`.`perkara_id`, `perkara`.`nomor_perkara`, `perkara`.`tanggal_pendaftaran`, `perkara`.`tanggal_putusan`, `perkara`.`para_pihak`, convert_tanggal_indonesia(tanggal_putusan) AS tanggalputusan, convert_tanggal_indonesia(tanggal_pendaftaran) AS tanggalpendaftaran, `status_putusan`.`nama` AS `putusan`, REPLACE(pengadilan_agama.nama, "PENGADILAN AGAMA ", "") AS nama_pa
FROM `perkara`
ERROR - 2023-06-08 11:41:43 --> Query error: Unknown column 'status_putusan.nama' in 'field list' - Invalid query: SELECT `perkara`.`id`, `perkara`.`perkara_id`, `perkara`.`nomor_perkara`, `perkara`.`tanggal_pendaftaran`, `perkara`.`tanggal_putusan`, `perkara`.`para_pihak`, convert_tanggal_indonesia(tanggal_putusan) AS tanggalputusan, convert_tanggal_indonesia(tanggal_pendaftaran) AS tanggalpendaftaran, `status_putusan`.`nama` AS `putusan`, REPLACE(pengadilan_agama.nama, "PENGADILAN AGAMA ", "") AS nama_pa
FROM `perkara`
ERROR - 2023-06-08 11:43:00 --> Query error: Unknown column 'status_putusan.nama' in 'field list' - Invalid query: SELECT `perkara`.`id`, `perkara`.`perkara_id`, `perkara`.`nomor_perkara`, `perkara`.`tanggal_pendaftaran`, `perkara`.`tanggal_putusan`, `perkara`.`para_pihak`, convert_tanggal_indonesia(tanggal_putusan) AS tanggalputusan, convert_tanggal_indonesia(tanggal_pendaftaran) AS tanggalpendaftaran, `status_putusan`.`nama` AS `putusan`, REPLACE(pengadilan_agama.nama, "PENGADILAN AGAMA ", "") AS nama_pa
FROM `perkara`
ERROR - 2023-06-08 11:58:43 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 11:58:57 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 11:59:00 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 11:59:10 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 11:59:19 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 11:59:53 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 11:59:57 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 11:59:59 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 12:00:59 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-08 12:05:19 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-06-08 12:05:19 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-06-08 12:14:30 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-08 14:01:37 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-08 14:46:15 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-08 16:41:57 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-08 16:42:17 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
