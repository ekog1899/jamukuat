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
        <h2 style="margin-top:0px">Master_mitra Read</h2>
        <table class="table">
	    <tr><td>Instansi Id</td><td><?php echo $instansi_id; ?></td></tr>
	    <tr><td>Group Id</td><td><?php echo $group_id; ?></td></tr>
	    <tr><td>Pengadilan Id</td><td><?php echo $pengadilan_id; ?></td></tr>
	    <tr><td>Kode Satker</td><td><?php echo $kode_satker; ?></td></tr>
	    <tr><td>Nama Satker</td><td><?php echo $nama_satker; ?></td></tr>
	    <tr><td>Alamat Satker</td><td><?php echo $alamat_satker; ?></td></tr>
	    <tr><td>Kota Kabupaten Satker</td><td><?php echo $kota_kabupaten_satker; ?></td></tr>
	    <tr><td>Wilayah Kerja</td><td><?php echo $wilayah_kerja; ?></td></tr>
	    <tr><td>Email Satker</td><td><?php echo $email_satker; ?></td></tr>
	    <tr><td>Telepon Satker</td><td><?php echo $telepon_satker; ?></td></tr>
	    <tr><td>Fax Satker</td><td><?php echo $fax_satker; ?></td></tr>
	    <tr><td>Wa Satker</td><td><?php echo $wa_satker; ?></td></tr>
	    <tr><td>Aktif</td><td><?php echo $aktif; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('master_mitra') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>