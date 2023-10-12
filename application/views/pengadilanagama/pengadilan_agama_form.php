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
        <h2 style="margin-top:0px">Pengadilan_agama <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Pt Id <?php echo form_error('pt_id') ?></label>
            <input type="text" class="form-control" name="pt_id" id="pt_id" placeholder="Pt Id" value="<?php echo $pt_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kode <?php echo form_error('kode') ?></label>
            <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kode Pn <?php echo form_error('kode_pn') ?></label>
            <input type="text" class="form-control" name="kode_pn" id="kode_pn" placeholder="Kode Pn" value="<?php echo $kode_pn; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">Aktif <?php echo form_error('aktif') ?></label>
            <input type="text" class="form-control" name="aktif" id="aktif" placeholder="Aktif" value="<?php echo $aktif; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Jenis Pengadilan <?php echo form_error('jenis_pengadilan') ?></label>
            <input type="text" class="form-control" name="jenis_pengadilan" id="jenis_pengadilan" placeholder="Jenis Pengadilan" value="<?php echo $jenis_pengadilan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ip Satker <?php echo form_error('ip_satker') ?></label>
            <input type="text" class="form-control" name="ip_satker" id="ip_satker" placeholder="Ip Satker" value="<?php echo $ip_satker; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pengadilanagama') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>