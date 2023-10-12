<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-04-06 09:38:49 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-04-06 09:39:54 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-04-06 09:40:27 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-04-06 14:16:16 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-06 14:43:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'ngawen%' AND kd_satker=488
					OR a.`kua_tempat_nikah` LIKE '%kua ngawen%' AND kd_satker=488
					OR a.`kua_tempat_nikah` LIKE '%kec. ngawen%' AND kd_satker=488
					OR a.`kua_tempat_nikah` LIKE '%kecamatan ngawen%' AND kd_satker=488
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  ngawen%' AND kd_satker=488
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama ngawen%' AND kd_satker=488
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan ngawen%' AND kd_satker=488
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan ngawen%' AND kd_satker=488
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. ngawen%' AND kd_satker=488
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec ngawen%' AND kd_satker=488 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
