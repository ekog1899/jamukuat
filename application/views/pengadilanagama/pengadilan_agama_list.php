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
        <h2 style="margin-top:0px">Pengadilan_agama List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('pengadilanagama/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('pengadilanagama/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pengadilanagama'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Pt Id</th>
		<th>Kode</th>
		<th>Kode Pn</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>Aktif</th>
		<th>Jenis Pengadilan</th>
		<th>Ip Satker</th>
		<th>Action</th>
            </tr><?php
            foreach ($pengadilanagama_data as $pengadilanagama)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $pengadilanagama->pt_id ?></td>
			<td><?php echo $pengadilanagama->kode ?></td>
			<td><?php echo $pengadilanagama->kode_pn ?></td>
			<td><?php echo $pengadilanagama->nama ?></td>
			<td><?php echo $pengadilanagama->alamat ?></td>
			<td><?php echo $pengadilanagama->aktif ?></td>
			<td><?php echo $pengadilanagama->jenis_pengadilan ?></td>
			<td><?php echo $pengadilanagama->ip_satker ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('pengadilanagama/read/'.$pengadilanagama->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('pengadilanagama/update/'.$pengadilanagama->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('pengadilanagama/delete/'.$pengadilanagama->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('pengadilanagama/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>