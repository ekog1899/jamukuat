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

                <form action="<?php echo base_url();?>Monitoring/monitoring_pns" method="POST">
                <div class="form-group">
                    <div class="mb-3">
                        <label><i class="fa fa-calendar"></i> Dari Tanggal Pendaftaran:</label>
                        <input type="date" class="form-control" value="<?php echo $dari;?>" name="dari">
                    </div>
                    <div class="mb-3">
                        <label><i class="fa fa-calendar"></i> Sampai Tanggal Pendaftaran:</label>
                        <input type="date" class="form-control" value="<?php echo $sampai;?>" name="sampai">
                    </div>
                    <input type="submit" value="Filter Data" class="btn btn-primary pull-left" />
                </div>
            </form>
            </div>


        <div class="card-body">

            <div class="table-responsive" id="div_pengguna">
                <table class="table table-bordered table-sm table-hover" id="datauser"  cellspacing="0">
                    <thead>
                        <tr class="bg-primary text-light">
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Nama Satker</th>
                            <th style="text-align: center;">Jumlah PNS/POLRI</th>
                            <th style="text-align: center;">Jumlah PNS/POLRI yang di kirim ke Mitra</th>
                            <th style="text-align: center;">Jumlah PNS/POLRI yang belum dikirim ke Mitra</th>
                            <th style="text-align: center;">Prosentase % <br>(Jumlah PNS/POLRI yg dikirim/Jumlah Total PNS/POLRI)</th>
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
                                  
                                    ?>
                                     <a href="<?php echo base_url('Monitoring/detail_monitoring_pns2/'.$rows['id'].'/'.$dari.'/'.$sampai);?>" target="_blank">
                                        <?php
                                    echo $rows['data_pns'];
                                    ?></a>
                                    </center>
                                </td>
                                <td><center>
                                   <?php
                                   
                                    ?>
                                     <a href="<?php echo base_url('Monitoring/detail_monitoring_pns_dikirim_mitra/'.$rows['id'].'/'.$dari.'/'.$sampai);?>" target="_blank">
                                        <?php
                                    echo $rows['data_pns_dikirim'];
                                    ?></a>
                                     </center>
                                </td>
                              
                                <td><center>
                                   <?php
                                   
                                    ?>
                                     <a href="<?php echo base_url('Monitoring/detail_monitoring_pns_blm_dikirim_mitra/'.$rows['id'].'/'.$dari.'/'.$sampai);?>" target="_blank">
                                        <?php
                                    echo $rows['data_pns_blm_dikirim'];
                                    ?></a>
                                     </center>
                                </td>
                                  <td><center>
                                   <?php
                                    echo round($rows['prosentase'],2);
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
