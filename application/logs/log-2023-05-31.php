<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-05-31 08:03:45 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-05-31 08:06:49 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-05-31 08:20:09 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-05-31 08:21:14 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-05-31 08:22:42 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 49
ERROR - 2023-05-31 08:22:42 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 151
ERROR - 2023-05-31 08:23:09 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 49
ERROR - 2023-05-31 08:23:09 --> Severity: 4096 --> Object of class CI_DB_mysqli_driver could not be converted to string /home/www/html/jamukuat/application/models/Mitra_model.php 151
ERROR - 2023-05-31 08:45:14 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-05-31 08:46:51 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-05-31 08:49:36 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-05-31 09:03:29 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-05-31 09:43:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'pekalongan timur%' 
					OR a.`kua_tempat_nikah` LIKE '%kua pekalongan timur%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec pekalongan timur%'
					) OR a.`kua_tempat_nikah` LIKE 'pekalongantimur%' 
					OR a.`kua_tempat_nikah` LIKE '%kua pekalongantimur%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec pekalongantimur%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-05-31 09:43:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'pekalongan timur%' 
					OR a.`kua_tempat_nikah` LIKE '%kua pekalongan timur%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec pekalongan timur%'
					) OR a.`kua_tempat_nikah` LIKE 'pekalongantimur%' 
					OR a.`kua_tempat_nikah` LIKE '%kua pekalongantimur%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec pekalongantimur%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-05-31 09:43:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'pekalongan timur%' 
					OR a.`kua_tempat_nikah` LIKE '%kua pekalongan timur%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec pekalongan timur%'
					) OR a.`kua_tempat_nikah` LIKE 'pekalongantimur%' 
					OR a.`kua_tempat_nikah` LIKE '%kua pekalongantimur%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec pekalongantimur%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-05-31 09:43:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'pekalongan timur%' 
					OR a.`kua_tempat_nikah` LIKE '%kua pekalongan timur%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec pekalongan timur%'
					) OR a.`kua_tempat_nikah` LIKE 'pekalongantimur%' 
					OR a.`kua_tempat_nikah` LIKE '%kua pekalongantimur%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec pekalongantimur%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-05-31 09:43:35 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'pekalongan timur%' 
					OR a.`kua_tempat_nikah` LIKE '%kua pekalongan timur%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec pekalongan timur%'
					) OR a.`kua_tempat_nikah` LIKE 'pekalongantimur%' 
					OR a.`kua_tempat_nikah` LIKE '%kua pekalongantimur%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec pekalongantimur%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-05-31 09:43:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'pekalongan timur%' 
					OR a.`kua_tempat_nikah` LIKE '%kua pekalongan timur%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec pekalongan timur%'
					) OR a.`kua_tempat_nikah` LIKE 'pekalongantimur%' 
					OR a.`kua_tempat_nikah` LIKE '%kua pekalongantimur%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec pekalongantimur%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-05-31 09:43:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'pekalongan timur%' 
					OR a.`kua_tempat_nikah` LIKE '%kua pekalongan timur%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec pekalongan timur%'
					) OR a.`kua_tempat_nikah` LIKE 'pekalongantimur%' 
					OR a.`kua_tempat_nikah` LIKE '%kua pekalongantimur%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec pekalongantimur%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-05-31 09:44:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'pekalongan timur%' 
					OR a.`kua_tempat_nikah` LIKE '%kua pekalongan timur%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec pekalongan timur%'
					) OR a.`kua_tempat_nikah` LIKE 'pekalongantimur%' 
					OR a.`kua_tempat_nikah` LIKE '%kua pekalongantimur%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec pekalongantimur%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-05-31 09:46:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'pekalongan timur%' 
					OR a.`kua_tempat_nikah` LIKE '%kua pekalongan timur%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec pekalongan timur%'
					) OR a.`kua_tempat_nikah` LIKE 'pekalongantimur%' 
					OR a.`kua_tempat_nikah` LIKE '%kua pekalongantimur%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec pekalongantimur%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-05-31 09:50:36 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_ce' at line 23 - Invalid query: SELECT YEAR(a.`tanggal_akta_cerai`) AS tahun,nama_bulan(MONTH(a.tanggal_akta_cerai)) AS namabulan,
					MONTH(a.`tanggal_akta_cerai`) AS bulan, COUNT(a.id) AS jum FROM perkara_akta_cerai a WHERE 
					(a.`kua_tempat_nikah` LIKE 'pekalongan timur%' 
					OR a.`kua_tempat_nikah` LIKE '%kua pekalongan timur%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. pekalongan timur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec pekalongan timur%'
					) OR a.`kua_tempat_nikah` LIKE 'pekalongantimur%' 
					OR a.`kua_tempat_nikah` LIKE '%kua pekalongantimur%' 
					OR a.`kua_tempat_nikah` LIKE '%kec. pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kecamatan  pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama (KUA) kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kecamatan pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec. pekalongantimur%'
					OR a.`kua_tempat_nikah` LIKE '%kantor urusan agama kec pekalongantimur%'
					) AND YEAR(a.`tanggal_akta_cerai`)='2023'
					GROUP BY LEFT(a.`tanggal_akta_cerai`,7)
					ORDER BY MONTH(a.`tanggal_akta_cerai`) ASC
ERROR - 2023-05-31 10:50:49 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 71
ERROR - 2023-05-31 10:50:49 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 199
ERROR - 2023-05-31 10:50:56 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-05-31 10:50:56 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-05-31 10:51:05 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 509
ERROR - 2023-05-31 11:16:16 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-05-31 11:16:16 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-05-31 11:16:23 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 71
ERROR - 2023-05-31 11:16:23 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 199
ERROR - 2023-05-31 11:16:30 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 277
ERROR - 2023-05-31 11:16:30 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 435
ERROR - 2023-05-31 11:16:39 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 509
ERROR - 2023-05-31 11:16:40 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given /home/www/html/jamukuat/application/controllers/Singkron.php 509
ERROR - 2023-05-31 14:41:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AND YEAR(a.`tanggal_akta_cerai`)='2023'
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
ERROR - 2023-05-31 14:50:48 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-05-31 14:50:58 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-05-31 14:55:57 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-05-31 14:56:58 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
ERROR - 2023-05-31 14:57:51 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /home/www/html/jamukuat/application/controllers/Kua.php 46
