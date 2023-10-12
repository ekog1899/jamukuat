<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">KUA</h1>
    <div class="row" style="margin-bottom: 10px">       
        <div class="col-md-4 text-center">
            <div style="margin-top: 8px" id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
        
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">PERKARA PERCERAIAN</h6>
        </div>
        <div class="card-body">
            <!--<div><button class='btn text-primary  border border-primary' onclick="tambah_pengguna()"><i class='fa fa-plus'></i> Tambah Pengguna</button></div>-->
            <div class="table-responsive" id="div_pengguna">
                <table class="table table-bordered table-sm table-hover" id="datauser"  cellspacing="0">
                    <thead>
                        <tr class="bg-primary text-light">
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Nama Pihak</th>
                            <th style="text-align: center;">No Kutipan Akta Nikah<br>Tgl Kutipan<br>Tgl Nikah</th>
                            <th style="text-align: center;">No. Perkara<br />Tgl. Putusan</th>
                            <th style="text-align: center;">No. Akta Cerai<br />Tgl. Akta Cerai</th>
                            <th style="text-align: center;">Jenis Perkara</th>
                            <th style="text-align: center;">KUA</th>
                            <th style="text-align: center;">Petikan Putusan/Penetapan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        foreach($kua->result_array() as $row){
                            $tanggal_putusan=tgl_indo($row['tanggal_putusan']);
                            $tanggal_akta_cerai=tgl_indo($row['tanggal_akta_cerai']);
                            $tgl_nikah=tgl_indo($row['tgl_nikah']);
                            $tgl_kutipan_akta_nikah=tgl_indo($row['tgl_kutipan_akta_nikah']);
                           

                            ?>
                            <tr>
                                <td><center><?php echo $no++; ?></center></td>
                                <td><?php echo $row['nama_pihak1']; ?><br /><?php echo $row['nama_pihak2']; ?></td>
                                <td><center><?php echo $row['no_kutipan_akta_nikah']; ?><br /><?php echo $tgl_kutipan_akta_nikah; ?></center></td>
                                <td><center><?php echo $row['nomor_perkara']; ?><br /><?php echo $tanggal_putusan; ?></center></td>
                                <td><center><?php echo $row['nomor_akta_cerai']; ?><br /><?php echo $tanggal_akta_cerai; ?></center></td>
                                <td><center><?php echo $row['jenis_perkara_text']; ?></center></td>
                                <td><center><?php echo $row['kua_tempat_nikah']; ?></center></td>
                                <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default<?php echo $row['ids'];?>">
                                        Salinan Petikan/Putusan
                                    </button>

                                    <div class="modal fade" id="modal-default<?php echo $row['ids'];?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                        <!--  <h4 class="modal-title">Alamat </h4> -->
                                                    </div>
                                                    <div class="modal-body">
                                                       <!--  <div class="row">
                                                            <div class="col-md-6">
                                                                <textarea name="alamat" rows="2" cols="60" autocomplete="off" required class="form-control pull-left"></textarea> 
                                                            </div>
                                                        </div> -->

                                                        <table class="table" style="border: none !important;" width="100%" cellspacing="0" cellpadding="0">

                                                            <tbody>
                                                                <tr>
                                                                    <td>Nama</td>
                                                                    <td>:</td>
                                                                    <td><?php echo $row['nama_pihak1'];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>NIK</td>
                                                                    <td>:</td>
                                                                    <td><?php echo $row['nik_pihak1'];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tempat / Tanggal Lahir</td>
                                                                    <td>:</td>
                                                                    <td><?php echo $row['tempatlahir_pihak1'].' / '.$row['tanggallahir_pihak1'];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Alamat</td>
                                                                    <td>:</td>
                                                                    <td><?php echo $row['alamat_pihak1'];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td colspan="2">Sebagai Penggugat/Pemohon</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nama</td>
                                                                    <td>:</td>
                                                                    <td><?php echo $row['nama_pihak2'];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>NIK</td>
                                                                    <td>:</td>
                                                                    <td><?php echo $row['nik_pihak2'];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tempat / Tanggal Lahir</td>
                                                                    <td>:</td>
                                                                    <td><?php echo $row['tempatlahir_pihak2'].' / '.$row['tanggallahir_pihak2'];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Alamat</td>
                                                                    <td>:</td>
                                                                    <td><?php echo $row['alamat_pihak2'];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td colspan="2">Sebagai Tergugat/Termohon</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <br>
                                                        <?php

                                                        $qobla = $row['qobla_bada']==0?'Qobla Dukhul':'Ba\'da Dukhul';
                                                        $keadaan_istri=$row['keadaan_istri'];
                                                        switch ($keadaan_istri) {
                                                            case 1:
                                                            $keadaan_istri = "Suci";
                                                            break;
                                                            case 2:
                                                            $keadaan_istri = "Haid";
                                                            break;
                                                            case 3:
                                                            $keadaan_istri = "Hamil";
                                                            break;
                                                            case 4:
                                                            $keadaan_istri = "Tidak diketahui";
                                                            break;
                                                            default:
    
                                                            $keadaan_istri =  "-";
                                                        }
                                                        if($row['jenis_perkara_id']==347){
                                                            ?>
                                                            <table class="table" style="border: none !important;" width="100%" cellspacing="0" cellpadding="0">

                                                                <tbody>
                                                                    <tr>
                                                                        <td>Amar Putusan</td>
                                                                        <td>:</td>
                                                                        <td><?php echo $row['amar_putusan'];?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <table class="table" style="border: none !important;" width="100%" cellspacing="0" cellpadding="0">

                                                                <tbody>
                                                                    <tr>
                                                                        <td>Tanggal Ikrar Talak</td>
                                                                        <td>:</td>
                                                                        <td><?php echo tgl_indo($row['tgl_ikrar_talak']);?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Amar Ikrar Talak</td>
                                                                        <td>:</td>
                                                                        <td><?php echo $row['amar_ikrar_talak'];?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <?php
                                                        }
                                                        ?>

                                                        <br>
                                                        <table class="table" style="border: none !important;" width="100%" cellspacing="0" cellpadding="0">

                                                            <tbody>
                                                                <tr>
                                                                    <td>Tanggal Inkrah</td>
                                                                    <td>:</td>
                                                                    <td><?php echo tgl_indo($row['tanggal_bht']);?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Perceraian yang Ke</td>
                                                                    <td>:</td>
                                                                    <td><?php echo $row['perceraian_ke'];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Keadaan Istri</td>
                                                                    <td>:</td>
                                                                    <td><?php echo $qobla;?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Keadaan Istri</td>
                                                                    <td>:</td>
                                                                    <td><?php echo $keadaan_istri;?></td>
                                                                </tr>

                                                            </tbody>
                                                        </table>

                                                        

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
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