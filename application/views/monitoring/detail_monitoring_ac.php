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
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $titlemenu.' '.$nama_pa;?>
             </h6>
        </div>
        <div class="card-body">

            <div class="table-responsive" id="div_pengguna">
                <table class="table table-bordered table-sm table-hover" id="datauser"  cellspacing="0">
                    <thead>
                        <tr class="bg-primary text-light">
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Nomor Akta Cerai<br>Nomor Perkara</th>
                            <th style="text-align: center;">Jenis Perkara</th>
                            <th style="text-align: center;">Tanggal Putusan<br>Tanggal Akta Cerai</th>
                            <th style="text-align: center;">Nama Pihak</th>
                            <th style="text-align: center;">KUA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no2=1;
                        foreach($ac->result_array() as $rows){
                            ?>
                            <tr>
                                <td><center><?php echo $no2++; ?></center></td>
                                <td><?php echo $rows['nomor_akta_cerai']; ?><br/><?php echo $rows['nomor_perkara']; ?></td>
                                
                                <td><center>
                                    <?php
                                    echo $rows['jenis_perkara_text'];
                                    ?>
                                    </center>
                                </td>
                                <td><center>
                                    <?php
                                    echo tgl_indo($rows['tanggal_putusan']).'<br>'.tgl_indo($rows['tanggal_akta_cerai']);
                                    ?></a>
                                     </center>
                                </td>
                                <td><center>
                                     	<?php
                                    echo $rows['nama_pihak1'].'<br>'.$rows['nama_pihak2'];
                                    ?></a>
                                    	
                                    </center>
                                </td>
                                <td><center>
                                   
                                     	<?php
                                    echo $rows['kua_tempat_nikah'];
                                    ?></a>
                                        </center>
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
