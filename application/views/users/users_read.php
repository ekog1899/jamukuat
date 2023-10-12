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
        <h2 style="margin-top:0px">Users Read</h2>
        <table class="table">
	    <tr><td>Pengadilan Id</td><td><?php echo $pengadilan_id; ?></td></tr>
	    <tr><td>Fullname</td><td><?php echo $fullname; ?></td></tr>
	    <tr><td>Handphone</td><td><?php echo $handphone; ?></td></tr>
	    <tr><td>Mitra Id</td><td><?php echo $mitra_id; ?></td></tr>
	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
	    <tr><td>Nip</td><td><?php echo $nip; ?></td></tr>
	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
	    <tr><td>Has Change Password</td><td><?php echo $has_change_password; ?></td></tr>
	    <tr><td>Group</td><td><?php echo $group; ?></td></tr>
	    <tr><td>Instansi Id</td><td><?php echo $instansi_id; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Block</td><td><?php echo $block; ?></td></tr>
	    <tr><td>Diinput Oleh</td><td><?php echo $diinput_oleh; ?></td></tr>
	    <tr><td>Diinput Tanggal</td><td><?php echo $diinput_tanggal; ?></td></tr>
	    <tr><td>Diedit Oleh</td><td><?php echo $diedit_oleh; ?></td></tr>
	    <tr><td>Diedit Tanggal</td><td><?php echo $diedit_tanggal; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>