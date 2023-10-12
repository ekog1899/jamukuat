<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-04-12 09:38:44 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 09:43:47 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 09:54:03 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Dashboard.php 498
ERROR - 2023-04-12 09:54:09 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 170
ERROR - 2023-04-12 10:16:19 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Dashboard.php 498
ERROR - 2023-04-12 10:18:30 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Dashboard.php 498
ERROR - 2023-04-12 10:20:32 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:20:52 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:20:53 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:20:56 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:21:51 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:22:03 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:22:26 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:22:37 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:22:42 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:22:45 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:22:46 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:22:53 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:22:59 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:23:05 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:23:09 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:23:22 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:23:25 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:24:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 10:24:46 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:24:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 10:24:59 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 10:25:02 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-04-12 10:25:03 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:25:04 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:25:11 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:25:14 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-04-12 10:25:15 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:25:21 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:25:26 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-04-12 10:25:39 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:25:40 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-04-12 10:25:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 10:25:52 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-04-12 10:25:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 10:26:04 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-04-12 10:26:16 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-04-12 10:26:28 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-04-12 10:26:38 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-04-12 10:26:43 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:26:43 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:26:50 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-04-12 10:27:01 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-04-12 10:27:16 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:27:16 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-04-12 10:27:28 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-04-12 10:27:40 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-04-12 10:27:53 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-04-12 10:28:05 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-04-12 10:28:18 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:28:25 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-04-12 10:28:30 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:28:36 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:28:37 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:28:37 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:28:37 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-04-12 10:28:38 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:28:41 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:28:49 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-04-12 10:29:01 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-04-12 10:29:11 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-04-12 10:29:29 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-04-12 10:29:40 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-04-12 10:29:52 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:29:55 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-04-12 10:30:06 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-04-12 10:30:10 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:30:20 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:30:31 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-04-12 10:30:37 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:30:43 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-04-12 10:31:27 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-04-12 10:31:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 10:31:39 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-04-12 10:31:51 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-04-12 10:31:54 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:31:58 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:32:14 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-04-12 10:32:33 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-04-12 10:32:44 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-04-12 10:32:55 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:32:56 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-04-12 10:32:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 10:33:00 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:33:03 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:33:09 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-04-12 10:33:20 --> Query error: Unknown column 'nik' in 'field list' - Invalid query: UPDATE `perkara_pendaftaran_pns` SET `nik` = '3302192902760001'
WHERE `id` = 146
ERROR - 2023-04-12 10:33:21 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-04-12 10:33:26 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:33:30 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-04-12 10:33:31 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:33:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 10:33:56 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-04-12 10:34:01 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:34:07 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-04-12 10:34:19 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-04-12 10:34:38 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-04-12 10:34:50 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-04-12 10:35:05 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:35:12 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 10:35:36 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 10:35:44 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-04-12 10:35:56 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-04-12 10:36:06 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-04-12 10:36:18 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-04-12 10:36:19 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-04-12 10:36:19 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-04-12 10:36:29 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-04-12 10:36:41 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-04-12 10:36:52 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-04-12 10:37:04 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-04-12 10:37:04 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-04-12 10:37:04 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /var/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-04-12 10:37:26 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:37:28 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:37:36 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:37:38 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:37:43 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:40:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 10:42:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 10:43:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 10:43:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 10:43:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 10:44:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 10:44:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 10:44:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 10:45:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 10:45:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 10:46:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 10:47:24 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:47:28 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:47:33 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:47:33 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:47:56 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:48:01 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:48:04 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:48:22 --> Query error: Unknown column 'nik' in 'field list' - Invalid query: UPDATE `perkara_pendaftaran_pns` SET `nik` = '3302096103990001'
WHERE `id` = 135
ERROR - 2023-04-12 10:48:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 10:49:28 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:49:39 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:49:40 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:49:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 10:52:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 10:54:22 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:54:22 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:55:03 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Dashboard.php 498
ERROR - 2023-04-12 10:55:15 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Dashboard.php 498
ERROR - 2023-04-12 10:55:19 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 170
ERROR - 2023-04-12 10:56:41 --> Query error: Unknown column 'nik' in 'field list' - Invalid query: UPDATE `perkara_pendaftaran_pns` SET `nik` = '125444'
WHERE `id` = 146
ERROR - 2023-04-12 10:57:36 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:57:52 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:57:54 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 10:57:54 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 11:00:03 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 11:00:03 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 11:00:04 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 11:00:04 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 11:00:05 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 11:05:21 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Dashboard.php 498
ERROR - 2023-04-12 11:05:36 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 11:05:38 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 11:05:40 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 11:08:45 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 11:09:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 11:09:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 11:09:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 11:09:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 11:09:43 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 11:10:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 11:10:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 11:10:08 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 11:10:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 11:10:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 11:10:46 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=499
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=499 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 11:11:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 12 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE (a.`kua_tempat_nikah` LIKE 'bulu%' AND kd_satker=507
					OR a.`kua_tempat_nikah` LIKE '%kua bulu%' AND kd_satker=507
					OR a.`kua_tempat_nikah` LIKE '%kec. bulu%' AND kd_satker=507
					OR a.`kua_tempat_nikah` LIKE '%kecamatan bulu%' AND kd_satker=507
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  bulu%' AND kd_satker=507
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama bulu%' AND kd_satker=507
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan bulu%' AND kd_satker=507
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan bulu%' AND kd_satker=507
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. bulu%' AND kd_satker=507
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec bulu%' AND kd_satker=507 )
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-04-12 11:13:05 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Dashboard.php 498
ERROR - 2023-04-12 11:31:51 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 11:32:30 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 11:33:02 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 11:33:19 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 11:48:03 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 12:08:04 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 12:32:22 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 13:03:19 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Dashboard.php 498
ERROR - 2023-04-12 13:06:53 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 13:07:06 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 13:07:26 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 13:07:44 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 13:11:07 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 13:31:03 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-04-12 13:32:49 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jamukuat/application/controllers/Kua.php 46
