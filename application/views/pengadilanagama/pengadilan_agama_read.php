<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Pengadilan_agama Read</h2>
        <table class="table">
	    <tr><td>Pt Id</td><td><?php echo $pt_id; ?></td></tr>
	    <tr><td>Kode</td><td><?php echo $kode; ?></td></tr>
	    <tr><td>Kode Pn</td><td><?php echo $kode_pn; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Aktif</td><td><?php echo $aktif; ?></td></tr>
	    <tr><td>Jenis Pengadilan</td><td><?php echo $jenis_pengadilan; ?></td></tr>
	    <tr><td>Ip Satker</td><td><?php echo $ip_satker; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pengadilanagama') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>