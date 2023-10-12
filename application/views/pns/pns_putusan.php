<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?> <?php echo $titlemenu; ?></h1>
    <div class="row" style="margin-bottom: 10px">       
        
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="col-auto">
                    <a href="<?php echo base_url('Dashboard/dashboard_bkd');?>"><button class="btn btn-primary pull-right">Perkara Pendaftaran PNS</button></a>
                </div>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">PERKARA PUTUSAN PNS</h6>
        </div>
        <div class="card-body">
        	<!--<div><button class='btn text-primary  border border-primary' onclick="tambah_pengguna()"><i class='fa fa-plus'></i> Tambah Pengguna</button></div>-->
            <div class="table-responsive" id="div_pengguna">
                <table class="table table-bordered table-sm table-hover" id="datauser"  cellspacing="0">
                    <thead>
                        <tr class="bg-primary text-light">
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Nama<br />NIP</th>
                            <th style="text-align: center;">No. Perkara<br />Tgl. Putusan</th>
                            <th style="text-align: center;">Jenis Perkara<br />Jenis Pihak</th>
                            <th style="text-align: center;">Amar Putusan</th>
                            <th style="text-align: center;">Pengadilan Agama</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        foreach($pns->result_array() as $row){
                            $tanggal_putusan=tgl_indo($row['tanggal_putusan']);
                            if ($row['jenis_pihak']==1){
                                $jenis_pihak='Penggugat/Pemohon';
                            }elseif ($row['jenis_pihak']==2){
                                $jenis_pihak='Tergugat/Termohon';
                            }

                            ?>
                            <tr>
                                <td><center><?php echo $no++; ?></center></td>
                                <td><?php echo $row['nama']; ?><br />NIP. <?php echo $row['nip']; ?></td>
                                <td><center><?php echo $row['nomor_perkara']; ?><br /><?php echo $tanggal_putusan; ?></center></td>
                                <td><center><?php echo $row['jenis_perkara']; ?><br /><?php echo $jenis_pihak; ?></center></td>
                                <td><?php echo $row['amar_putusan'];?></td>
                                <td><center><?php echo $row['nama_pa'];?></center></td>
                                
                        </tr>
                        <?php 

                    }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<div class="row">

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 
<!-- .modal -->
<div class="modal fade" id="Mymodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Silahkan Tunggu</h4>                                                             
            </div> 
            <div class="modal-body">
                Proses sedang dilakukan
            </div>   
            <div class="modal-footer">
            </div>
        </div>                                                                       
    </div>                                          
</div>
<!-- .modal -->
<!-- Page level custom scripts -->
<link href="<?php echo base_url('assets/'); ?>vanilla-dataTables/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url('assets/'); ?>vanilla-dataTables/vanilla-dataTables.min.js" type="text/javascript"></script>
<link href="<?php echo base_url('assets/'); ?>slim_select/slimselect.min.css" rel="stylesheet" />
<script src="<?php echo base_url('assets/'); ?>slim_select/slimselect.min.js"></script>

<script>

</script>
<script type="text/javascript">
    var dataTable = new DataTable("#datauser", {
        searchable: true,
        perPage: 25,
        perPageSelect: [25, 50, 75, 100, 250, 1000]
    });
</script>