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
            <h6 class="m-0 font-weight-bold text-primary">Monitoring Sharing Data Disdukcapil, BKPSDM, dan KUA
                <a href="<?php echo base_url('Monitoring/cetak');?>" target="_blank"><button class="btn btn-primary pull-right">Cetak</button></a></h6>
        </div>
        <div class="card-body">

            <div class="table-responsive" id="div_pengguna">
                <table class="table table-bordered table-sm table-hover" id="datauser"  cellspacing="0">
                    <thead>
                        <tr class="bg-primary text-light">
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Nama Satker</th>
                            <th style="text-align: center;">Tgl Terakhir Kirim Data</th>
                            <th style="text-align: center;">Jml Petikan Put/Pen atau<br>Petikan AC</th>
                            <th style="text-align: center;">Jml Pendaftaran PNS</th>
                            <th style="text-align: center;">Jml Putusan PNS</th>
                            <th style="text-align: center;">Aksi Balik Disdukcapil</th>
                            <th style="text-align: center;">Aksi Balik BKPSDM</th>
                            <th style="text-align: center;">Jml Perkara Tambahan</th>
                            <th style="text-align: center;">Update Februari</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no2=1;
                        foreach($list_pa->result_array() as $rows){
                            ?>
                            <tr>
                                <td><center><?php echo $no2++; ?></center></td>
                                <td><?php echo $rows['nama']; ?><br /></td>
                                
                                <td><center>
                                    <?php
                                    $ci=& get_instance();
                                    $ci->load->model('Api_m');
                                    $kirim_data = $ci->Api_m->kirim_data_pa($rows['id']);
                                    $kir=$kirim_data->row_array(); 
                                    echo $kir['tgl'];
                                    ?>
                                    </center>
                                </td>
                                <td><center>
                                    <?php
                                    $monitoring_ac_pa = $ci->Api_m->monitoring_ac_pa($rows['id']);
                                    $monitoring_ac=$monitoring_ac_pa->row_array(); 
                                    ?>
                                     <a href="<?php echo base_url('Monitoring/detail_monitoring_ac/'.$rows['id']);?>" target="_blank">
                                     	<?php
                                    echo $monitoring_ac['jum'];
                                    ?></a>
                                     </center>
                                </td>
                                <td><center>
                                    <?php
                                    $monitoring_pns_pendaftaran = $ci->Api_m->monitoring_pns_pendaftaran($rows['id']);
                                    $monitoring_pns=$monitoring_pns_pendaftaran->row_array(); 
                                   ?>
                                     <a href="<?php echo base_url('Monitoring/detail_monitoring_pns/'.$rows['id']);?>" target="_blank">
                                     	<?php
                                    echo $monitoring_pns['jum'];
                                    ?></a>
                                    	
                                    </center>
                                </td>
                                <td><center>
                                    <?php
                                    $monitoring_pns_putusan = $ci->Api_m->monitoring_pns_putusan($rows['id']);
                                    $monitoring_pns_put=$monitoring_pns_putusan->row_array(); 
                                     ?>
                                     <a href="<?php echo base_url('Monitoring/detail_monitoring_pns_put/'.$rows['id']);?>" target="_blank">
                                     	<?php
                                    echo $monitoring_pns_put['jum'];
                                    ?></a>
                                        </center>
                                    </td>
                                <td><center>
                                     <?php
                                    $monitoring_capil_pa = $ci->Api_m->monitoring_capil_pa($rows['id']);
                                    $monitoring_capil=$monitoring_capil_pa->row_array(); 
                                   
                                     ?>
                                     <a href="<?php echo base_url('Monitoring/detail_monitoring_capil/'.$rows['id']);?>" target="_blank">
                                     	<?php
                                    echo $monitoring_capil['jum'];
                                    ?></a></center>
                                </td>
                                <td><center>
                                    <?php
                                    $monitoring_bkd_pa = $ci->Api_m->monitoring_bkd_pa($rows['id']);
                                    $monitoring_bkd_pa=$monitoring_bkd_pa->row_array(); 
                                     ?>
                                     <a href="<?php echo base_url('Monitoring/detail_monitoring_bkd_pa/'.$rows['id']);?>" target="_blank">
                                     	<?php
                                    echo $monitoring_bkd_pa['jum'];
                                    ?></a></center>
                                </td>

                                 <td><center>
                                    <?php
                                    $monitoring_perkara_pa = $ci->Api_m->monitoring_perkara_pa($rows['id']);
                                    $monitoring_perkara_pa=$monitoring_perkara_pa->row_array(); 
                                    if($monitoring_perkara_pa['jum']==0){

                                    echo $monitoring_perkara_pa['jum'];
                                    }else{
                                        ?>
                                        <a href="<?php echo base_url('Monitoring/detail_monitoring_perkara/'.$rows['id']);?>" target="_blank">
                                        <?php
                                    echo $monitoring_perkara_pa['jum'];
                                     }?></a>
                                   
                                    
                                     </center>
                                </td>

                                <td><center>
                                    <?php
                                    $monitoring_update= $ci->Api_m->update_data_02_2023($rows['id']);
                                    $monitoring_update=$monitoring_update->row_array(); 
                          
                                    echo $monitoring_update['update_02_2023'];
                                    ?>
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
