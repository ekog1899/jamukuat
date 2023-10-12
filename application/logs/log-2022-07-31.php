<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-07-31 09:33:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ORDER BY a.id ASC' at line 2 - Invalid query: SELECT * FROM perkara_akta_cerai a JOIN pengadilan_agama b ON a.kd_satker=b.id
                                            WHERE a.keterangan22 is null and tanggal is null and status=1 ORDER BY a.id ASC ORDER BY a.id ASC 
ERROR - 2022-07-31 10:10:01 --> Severity: Error --> Call to undefined method Api_m::get_data_putusan() /var/www/html/jamukuat/application/controllers/Api.php 222
