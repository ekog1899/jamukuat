<html>
<head>
    <style type="text/css">
    table {     font-family: Calibri, Helvetica, Arial, sans-serif; 
            font-size: 14px;
            line-height: 110%;}
    h1 { font-family: Cambria,"Times New Roman",serif; }
    
    .nomor{
        font-family: Cambria,"Times New Roman",serif; 
        font-size:100px;
        line-height: 90%;
    }
    .space
    {
        line-height: 50%
    }
    
    @media print 
    {
       @page {
    size: A4;
    size: 210mm 287mm;
}
    }
    </style>
</head>
<script>
    function printPage()
    {
        window.print();
        setTimeout(function () { window.close(); }, 10);
    }
</script>
<body onload="printPage()">
<h2 class="m-0 font-weight-bold text-primary"><center>Monitoring Sharing Data Disdukcapil, BKPSDM dan KUA</center></h2>
<h3><center>Tanggal <?php echo tgl_indo(date('Y-m-d'));?></center></h3>

                <table border="1" cellspacing="0">
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
                                    echo $monitoring_ac['jum'];
                                    ?></center>
                                </td>
                                <td><center>
                                    <?php
                                    $monitoring_pns_pendaftaran = $ci->Api_m->monitoring_pns_pendaftaran($rows['id']);
                                    $monitoring_pns=$monitoring_pns_pendaftaran->row_array(); 
                                    echo $monitoring_pns['jum'];
                                    ?></center>
                                </td>
                                <td><center>
                                    <?php
                                    $monitoring_pns_putusan = $ci->Api_m->monitoring_pns_putusan($rows['id']);
                                    $monitoring_pns_put=$monitoring_pns_putusan->row_array(); 
                                    echo $monitoring_pns_put['jum'];
                                    ?>
                                        </center>
                                    </td>
                                <td><center>
                                     <?php
                                    $monitoring_capil_pa = $ci->Api_m->monitoring_capil_pa($rows['id']);
                                    $monitoring_capil=$monitoring_capil_pa->row_array(); 
                                    echo $monitoring_capil['jum'];
                                    ?></center>
                                </td>
                                <td><center>
                                    <?php
                                    $monitoring_bkd_pa = $ci->Api_m->monitoring_bkd_pa($rows['id']);
                                    $monitoring_bkd_pa=$monitoring_bkd_pa->row_array(); 
                                    echo $monitoring_bkd_pa['jum'];
                                    ?>
                                </td>

                            </tr>
                            <?php 

                        }?>
                    </tbody>
                </table>

</body>

</head>
</html>
