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
        <h2 style="margin-top:0px">Menu_pta Read</h2>
        <table class="table">
	    <tr><td>Parent Id</td><td><?php echo $parent_id; ?></td></tr>
	    <tr><td>Title</td><td><?php echo $title; ?></td></tr>
	    <tr><td>Url</td><td><?php echo $url; ?></td></tr>
	    <tr><td>View</td><td><?php echo $view; ?></td></tr>
	    <tr><td>Is Active</td><td><?php echo $is_active; ?></td></tr>
	    <tr><td>Icon</td><td><?php echo $icon; ?></td></tr>
	    <tr><td>Group Id</td><td><?php echo $group_id; ?></td></tr>
	    <tr><td>Instansi Id</td><td><?php echo $instansi_id; ?></td></tr>
	    <tr><td>Urutan</td><td><?php echo $urutan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('menu_') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>