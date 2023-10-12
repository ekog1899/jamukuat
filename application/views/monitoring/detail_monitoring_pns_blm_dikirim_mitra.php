<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Monitoring JAMU KUAT SATKER</h1> -->
    <h1 class="h3 mb-4 text-gray-800"></h1>
    <div class="row" style="margin-bottom: 10px">       
        <div class="col-md-4 text-center">
            <div style="margin-top: 8px" id="message">
            </div>
        </div>
        
    </div>



    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $title;?>
        </h6>
    </div>

    <div class="card-body">

        <div class="table-responsive" id="div_pengguna">
            <table class="table table-bordered table-sm table-hover" id="datauser"  cellspacing="0">
                <thead>
                    <tr class="bg-primary text-light">
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">No. Perkara<br />Tgl. Daftar Perkara</th>
                        <th style="text-align: center;">Nama<br />NIP</th>
                        <th style="text-align: center;">Jenis Perkara<br />Jenis Pihak</th>
                        <th style="text-align: center;">Izin Cerai</th>
                        <th style="text-align: center;">Tanggal Putusan</th>
                        <th style="text-align: center;">Amar Putusan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no2=1;
                    foreach($list_data->result_array() as $row){

                       $tanggal_pendaftaran=tgl_indo($row['tanggal_pendaftaran']);
                       
                       if($row['tanggal_putusan']==NULL){
                        $tanggal_putusan='';
                       }else{

                       $tanggal_putusan=tgl_indo($row['tanggal_putusan']);
                       }

                       if ($row['jenis_pihak']==1){
                        $jenis_pihak='Penggugat/Pemohon';
                    }elseif ($row['jenis_pihak']==2){
                        $jenis_pihak='Tergugat/Termohon';
                    }

                    if($row['jenis_pihak']=='1'){
                     if($row['izin_cerai']==1 ){
                        $izin_cerai='Sudah Ada Izin Cerai';
                    }else{
                        $izin_cerai='Belum Ada Izin Cerai';

                    }
                }else{
                    if($row['izin_cerai']==1 ){
                        $izin_cerai='Sudah Ada Surat Keterangan';
                    }else{
                        $izin_cerai='Belum Ada Surat Keterangan';

                    }

                }

                if($row['status_lapor']==0){
                    $lapor="<a href='#'><button type='button' class='btn btn-danger'>Belum Lapor</button></a>";
                }else{
                    $lapor="<a href='#'><button type='button' class='btn btn-success'>Sudah Lapor</button></a>";
                }


                ?>
                <tr>
                    <td><center><?php echo $no2++; ?></center></td>
                     <td><center><?php echo $row['nomor_perkara']; ?><br /><?php echo $tanggal_pendaftaran; ?></center></td>
                    <td><?php echo $row['nama']; ?><br />NIP. <?php echo $row['nip']; ?></td>
                    <td><center><?php echo $row['jenis_perkara']; ?><br /><?php echo $jenis_pihak; ?></center></td>
                  
                    </td>
                    <td><center><?php echo $izin_cerai;?></center>
                        <!--  <a target='_blank' title='Unduh Softcopy Izin' href='<?php //echo base_url($row["softcopy_izin"])?>'>
                            <span class='icon text-primary'>Unduh</span>
                        </a> -->
                    </td>
                     <td>
                        <center><?php echo $tanggal_putusan;?></center>
                    </td>
                     <td>
                        <center><?php echo $row['amar_putusan'];?></center>
                    </td>
                     
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
<!-- Page level custom scripts -->
<link href="<?php echo base_url('assets/'); ?>vanilla-dataTables/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url('assets/'); ?>vanilla-dataTables/vanilla-dataTables.min.js" type="text/javascript"></script>
<link href="<?php echo base_url('assets/'); ?>slim_select/slimselect.min.css" rel="stylesheet" />
<script src="<?php echo base_url('assets/'); ?>slim_select/slimselect.min.js"></script>
