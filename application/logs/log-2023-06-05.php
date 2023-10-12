<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-06-05 08:43:27 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 46
ERROR - 2023-06-05 08:43:27 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 137
ERROR - 2023-06-05 08:43:35 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 44
ERROR - 2023-06-05 08:43:35 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 46
ERROR - 2023-06-05 08:43:35 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 135
ERROR - 2023-06-05 08:43:35 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 137
ERROR - 2023-06-05 08:43:43 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 44
ERROR - 2023-06-05 08:43:43 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 46
ERROR - 2023-06-05 08:43:43 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 135
ERROR - 2023-06-05 08:43:43 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 137
ERROR - 2023-06-05 08:48:46 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 08:48:58 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 08:50:45 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 08:50:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 08:50:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 08:51:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 08:51:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 08:51:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 08:51:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 08:51:24 --> 404 Page Not Found: Kua/logout
ERROR - 2023-06-05 08:51:26 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 08:52:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'pulokulon%' 
					OR a.`kua_tempat_nikah` LIKE '%kua pulokulon%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. pulokulon%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan pulokulon%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  pulokulon%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama pulokulon%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan pulokulon%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan pulokulon%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. pulokulon%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec pulokulon%'
					) OR a.`kua_tempat_nikah` LIKE 'pulo kulon%' 
					OR a.`kua_tempat_nikah` LIKE '%kua pulo kulon%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. pulo kulon%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan pulo kulon%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  pulo kulon%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama pulo kulon%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan pulo kulon%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan pulo kulon%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. pulo kulon%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec pulo kulon%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 08:54:10 --> Severity: Error --> Call to undefined method Api_m::monitoring_data_pns() /home/www/html/jamukuat/application/controllers/Monitoring.php 181
ERROR - 2023-06-05 08:54:12 --> Severity: Error --> Call to undefined method Api_m::monitoring_data_pns() /home/www/html/jamukuat/application/controllers/Monitoring.php 181
ERROR - 2023-06-05 08:55:09 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 44
ERROR - 2023-06-05 08:55:09 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 135
ERROR - 2023-06-05 08:55:19 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 44
ERROR - 2023-06-05 08:55:19 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 46
ERROR - 2023-06-05 08:55:19 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 135
ERROR - 2023-06-05 08:55:19 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 137
ERROR - 2023-06-05 08:56:10 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 08:57:47 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 09:02:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:08:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:13:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:14:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:14:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:14:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:17:43 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 09:27:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:27:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:28:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:28:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:28:24 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 09:28:25 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:28:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:28:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:28:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:28:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:28:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:28:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:28:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:28:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:28:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:28:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:28:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:28:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:34:54 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 46
ERROR - 2023-06-05 09:34:54 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 137
ERROR - 2023-06-05 09:35:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:35:14 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 09:35:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:37:07 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 498
ERROR - 2023-06-05 09:37:16 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 170
ERROR - 2023-06-05 09:37:31 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 498
ERROR - 2023-06-05 09:46:57 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 09:50:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:55:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:55:10 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 09:55:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wirosari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wirosari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wirosari%'
					) OR a.`kua_tempat_nikah` LIKE 'wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kua wiro sari%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. wiro sari%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec wiro sari%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-06-05 09:55:19 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 46
ERROR - 2023-06-05 09:55:19 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 137
ERROR - 2023-06-05 09:55:32 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-05 09:56:08 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-05 09:56:10 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-05 09:56:11 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-05 09:57:55 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 09:58:04 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 10:34:07 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-05 11:10:46 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-05 11:15:31 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 11:17:30 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 44
ERROR - 2023-06-05 11:17:30 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 45
ERROR - 2023-06-05 11:17:30 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 46
ERROR - 2023-06-05 11:17:30 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 135
ERROR - 2023-06-05 11:17:30 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 136
ERROR - 2023-06-05 11:17:30 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 137
ERROR - 2023-06-05 11:24:34 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 11:24:53 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 11:27:17 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 47
ERROR - 2023-06-05 11:27:17 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 48
ERROR - 2023-06-05 11:27:17 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 49
ERROR - 2023-06-05 11:27:17 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 149
ERROR - 2023-06-05 11:27:17 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 150
ERROR - 2023-06-05 11:27:17 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 151
ERROR - 2023-06-05 11:27:52 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 44
ERROR - 2023-06-05 11:27:52 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 45
ERROR - 2023-06-05 11:27:52 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 46
ERROR - 2023-06-05 11:27:52 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 135
ERROR - 2023-06-05 11:27:52 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 136
ERROR - 2023-06-05 11:27:52 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 137
ERROR - 2023-06-05 11:30:11 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 44
ERROR - 2023-06-05 11:30:11 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 45
ERROR - 2023-06-05 11:30:11 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 46
ERROR - 2023-06-05 11:30:11 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 135
ERROR - 2023-06-05 11:30:11 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 136
ERROR - 2023-06-05 11:30:11 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 137
ERROR - 2023-06-05 11:30:52 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-05 11:31:35 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-05 11:46:52 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 49
ERROR - 2023-06-05 11:46:52 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 151
ERROR - 2023-06-05 11:52:25 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 46
ERROR - 2023-06-05 11:52:25 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 137
ERROR - 2023-06-05 12:15:07 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 49
ERROR - 2023-06-05 12:15:07 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 151
ERROR - 2023-06-05 12:15:14 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 47
ERROR - 2023-06-05 12:15:14 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 49
ERROR - 2023-06-05 12:15:14 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 149
ERROR - 2023-06-05 12:15:14 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 151
ERROR - 2023-06-05 12:15:37 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-05 12:15:46 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-05 12:16:02 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-05 12:16:03 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-05 12:16:23 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 47
ERROR - 2023-06-05 12:16:23 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 149
ERROR - 2023-06-05 13:09:58 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 47
ERROR - 2023-06-05 13:09:58 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 149
ERROR - 2023-06-05 13:10:07 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 47
ERROR - 2023-06-05 13:10:07 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 48
ERROR - 2023-06-05 13:10:07 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 149
ERROR - 2023-06-05 13:10:07 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 150
ERROR - 2023-06-05 13:14:21 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-05 13:29:37 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-05 13:35:49 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-05 13:38:27 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-05 13:39:59 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 47
ERROR - 2023-06-05 13:39:59 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 149
ERROR - 2023-06-05 13:41:51 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 47
ERROR - 2023-06-05 13:41:51 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 149
ERROR - 2023-06-05 13:41:57 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-05 13:43:26 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-05 13:44:42 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 47
ERROR - 2023-06-05 13:44:42 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 149
ERROR - 2023-06-05 13:44:50 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 47
ERROR - 2023-06-05 13:44:50 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 149
ERROR - 2023-06-05 13:44:59 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 47
ERROR - 2023-06-05 13:44:59 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 149
ERROR - 2023-06-05 13:47:57 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 44
ERROR - 2023-06-05 13:47:57 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 135
ERROR - 2023-06-05 13:50:46 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 44
ERROR - 2023-06-05 13:50:46 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 135
ERROR - 2023-06-05 13:56:18 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 44
ERROR - 2023-06-05 13:56:18 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 135
ERROR - 2023-06-05 14:00:09 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 44
ERROR - 2023-06-05 14:00:09 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 135
ERROR - 2023-06-05 14:06:54 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 44
ERROR - 2023-06-05 14:06:54 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 135
ERROR - 2023-06-05 14:17:48 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 44
ERROR - 2023-06-05 14:17:48 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 135
ERROR - 2023-06-05 14:20:07 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 46
ERROR - 2023-06-05 14:20:07 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 137
ERROR - 2023-06-05 14:26:10 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 46
ERROR - 2023-06-05 14:26:10 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 137
ERROR - 2023-06-05 14:29:32 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 46
ERROR - 2023-06-05 14:29:32 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 137
ERROR - 2023-06-05 14:31:45 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 46
ERROR - 2023-06-05 14:31:45 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 137
ERROR - 2023-06-05 14:33:35 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-06-05 14:33:35 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-06-05 15:17:21 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 15:17:45 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 15:18:06 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 71
ERROR - 2023-06-05 15:18:06 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 199
ERROR - 2023-06-05 15:18:12 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-06-05 15:18:12 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-06-05 15:18:21 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 509
ERROR - 2023-06-05 15:31:22 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 15:32:07 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 71
ERROR - 2023-06-05 15:32:07 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 199
ERROR - 2023-06-05 15:32:13 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-06-05 15:32:13 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-06-05 15:32:35 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 509
ERROR - 2023-06-05 15:32:55 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 15:33:08 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 15:35:09 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 71
ERROR - 2023-06-05 15:35:09 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 199
ERROR - 2023-06-05 15:35:18 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-06-05 15:35:18 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-06-05 15:35:27 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 509
ERROR - 2023-06-05 15:35:57 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 15:46:44 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 44
ERROR - 2023-06-05 15:46:44 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 45
ERROR - 2023-06-05 15:46:44 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 46
ERROR - 2023-06-05 15:46:44 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 135
ERROR - 2023-06-05 15:46:44 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 136
ERROR - 2023-06-05 15:46:44 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 137
ERROR - 2023-06-05 15:47:34 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 47
ERROR - 2023-06-05 15:47:34 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 48
ERROR - 2023-06-05 15:47:34 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 49
ERROR - 2023-06-05 15:47:34 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 149
ERROR - 2023-06-05 15:47:34 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 150
ERROR - 2023-06-05 15:47:34 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 151
ERROR - 2023-06-05 15:48:15 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 46
ERROR - 2023-06-05 15:48:15 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 137
ERROR - 2023-06-05 15:49:30 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 15:50:14 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 44
ERROR - 2023-06-05 15:50:14 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 46
ERROR - 2023-06-05 15:50:14 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 135
ERROR - 2023-06-05 15:50:14 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 137
ERROR - 2023-06-05 15:51:05 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 47
ERROR - 2023-06-05 15:51:05 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 49
ERROR - 2023-06-05 15:51:05 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 149
ERROR - 2023-06-05 15:51:05 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 151
ERROR - 2023-06-05 15:51:21 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 47
ERROR - 2023-06-05 15:51:21 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 149
ERROR - 2023-06-05 15:51:41 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 47
ERROR - 2023-06-05 15:51:41 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 49
ERROR - 2023-06-05 15:51:41 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 149
ERROR - 2023-06-05 15:51:41 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 151
ERROR - 2023-06-05 15:52:17 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 44
ERROR - 2023-06-05 15:52:17 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 46
ERROR - 2023-06-05 15:52:17 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 135
ERROR - 2023-06-05 15:52:17 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 137
ERROR - 2023-06-05 15:53:25 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 47
ERROR - 2023-06-05 15:53:25 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 49
ERROR - 2023-06-05 15:53:25 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 149
ERROR - 2023-06-05 15:53:25 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 151
ERROR - 2023-06-05 15:54:11 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 44
ERROR - 2023-06-05 15:54:11 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 46
ERROR - 2023-06-05 15:54:11 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 135
ERROR - 2023-06-05 15:54:11 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 137
ERROR - 2023-06-05 15:56:30 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 48
ERROR - 2023-06-05 15:56:30 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 141
ERROR - 2023-06-05 15:56:43 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 47
ERROR - 2023-06-05 15:56:43 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 49
ERROR - 2023-06-05 15:56:43 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 149
ERROR - 2023-06-05 15:56:43 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 151
ERROR - 2023-06-05 15:56:53 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 47
ERROR - 2023-06-05 15:56:53 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 49
ERROR - 2023-06-05 15:56:53 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 149
ERROR - 2023-06-05 15:56:53 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 151
ERROR - 2023-06-05 15:56:58 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 46
ERROR - 2023-06-05 15:56:58 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 48
ERROR - 2023-06-05 15:56:58 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 139
ERROR - 2023-06-05 15:56:58 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 141
ERROR - 2023-06-05 15:57:18 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 47
ERROR - 2023-06-05 15:57:18 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 49
ERROR - 2023-06-05 15:57:18 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 149
ERROR - 2023-06-05 15:57:18 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 151
ERROR - 2023-06-05 15:57:30 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 46
ERROR - 2023-06-05 15:57:30 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 48
ERROR - 2023-06-05 15:57:30 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 139
ERROR - 2023-06-05 15:57:30 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 141
ERROR - 2023-06-05 15:57:36 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 48
ERROR - 2023-06-05 15:57:36 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 141
ERROR - 2023-06-05 16:11:47 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 16:14:04 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 16:14:13 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 16:14:26 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 16:14:32 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 16:18:23 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 16:20:01 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 44
ERROR - 2023-06-05 16:20:01 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 46
ERROR - 2023-06-05 16:20:01 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 135
ERROR - 2023-06-05 16:20:01 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 137
ERROR - 2023-06-05 16:27:16 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 16:31:24 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 16:31:47 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 16:32:04 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 16:32:08 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 16:32:14 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 16:32:17 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 16:32:21 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 48
ERROR - 2023-06-05 16:32:21 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 141
ERROR - 2023-06-05 16:32:39 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 16:32:42 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 16:32:45 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 16:32:47 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 16:32:50 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 16:34:44 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 209
ERROR - 2023-06-05 16:36:27 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 46
ERROR - 2023-06-05 16:36:27 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 48
ERROR - 2023-06-05 16:36:27 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 139
ERROR - 2023-06-05 16:36:27 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 141
ERROR - 2023-06-05 16:36:44 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 46
ERROR - 2023-06-05 16:36:44 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 48
ERROR - 2023-06-05 16:36:44 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 139
ERROR - 2023-06-05 16:36:44 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 141
ERROR - 2023-06-05 16:37:09 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 498
ERROR - 2023-06-05 16:37:13 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 46
ERROR - 2023-06-05 16:37:13 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 139
ERROR - 2023-06-05 16:37:33 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 170
ERROR - 2023-06-05 16:37:55 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 498
ERROR - 2023-06-05 16:38:03 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 46
ERROR - 2023-06-05 16:38:03 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 139
ERROR - 2023-06-05 16:38:06 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 170
ERROR - 2023-06-05 16:39:04 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 46
ERROR - 2023-06-05 16:39:04 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 139
ERROR - 2023-06-05 16:39:25 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-05 16:39:52 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 46
ERROR - 2023-06-05 16:39:52 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 139
ERROR - 2023-06-05 16:39:55 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 498
ERROR - 2023-06-05 16:40:50 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 44
ERROR - 2023-06-05 16:40:50 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 46
ERROR - 2023-06-05 16:40:50 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 135
ERROR - 2023-06-05 16:40:50 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 137
ERROR - 2023-06-05 16:41:00 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 46
ERROR - 2023-06-05 16:41:00 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 48
ERROR - 2023-06-05 16:41:00 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 139
ERROR - 2023-06-05 16:41:00 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 141
ERROR - 2023-06-05 16:41:09 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-05 16:41:24 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 46
ERROR - 2023-06-05 16:41:24 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 139
ERROR - 2023-06-05 16:41:32 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 46
ERROR - 2023-06-05 16:41:32 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 48
ERROR - 2023-06-05 16:41:32 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 139
ERROR - 2023-06-05 16:41:32 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 141
ERROR - 2023-06-05 16:41:33 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-05 16:41:36 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 498
ERROR - 2023-06-05 16:42:00 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 498
ERROR - 2023-06-05 16:42:01 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 45
ERROR - 2023-06-05 16:42:01 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 136
ERROR - 2023-06-05 16:42:04 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 46
ERROR - 2023-06-05 16:42:04 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 48
ERROR - 2023-06-05 16:42:04 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 139
ERROR - 2023-06-05 16:42:04 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 141
ERROR - 2023-06-05 16:42:07 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 170
ERROR - 2023-06-05 16:42:10 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 498
ERROR - 2023-06-05 16:42:26 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 46
ERROR - 2023-06-05 16:42:26 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 48
ERROR - 2023-06-05 16:42:26 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 139
ERROR - 2023-06-05 16:42:26 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Monja_model.php 141
ERROR - 2023-06-05 16:42:41 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 498
ERROR - 2023-06-05 16:43:07 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 45
ERROR - 2023-06-05 16:43:07 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 136
ERROR - 2023-06-05 16:43:20 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 45
ERROR - 2023-06-05 16:43:20 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 136
ERROR - 2023-06-05 16:43:42 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 45
ERROR - 2023-06-05 16:43:42 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 136
ERROR - 2023-06-05 16:44:10 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 498
ERROR - 2023-06-05 16:44:17 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 170
ERROR - 2023-06-05 16:44:35 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 170
ERROR - 2023-06-05 16:47:10 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-05 16:47:33 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-05 16:47:39 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-05 16:47:41 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-05 16:51:22 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 45
ERROR - 2023-06-05 16:51:22 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 136
ERROR - 2023-06-05 16:51:27 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 45
ERROR - 2023-06-05 16:51:27 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Users_model.php 136
ERROR - 2023-06-05 16:52:39 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-05 16:52:47 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-06-05 16:52:59 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Dashboard.php 498
ERROR - 2023-06-05 16:53:03 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 170
