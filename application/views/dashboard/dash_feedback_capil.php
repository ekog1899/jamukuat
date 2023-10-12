<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?> <?php echo $titlemenu; ?></h1>
    <!-- Page Heading -->
    
    <div class="row" style="margin-bottom: 10px">       
        <div class="col-md-4 text-center">
            <div style="margin-top: 8px" id="message">
                <?php echo $this->session->flashdata('message') <> '' ? $this->session->flashdata('message') : ''; ?>
            </div>
        </div>
        
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <!--<div><button class='btn text-primary  border border-primary' onclick="tambah_pengguna()"><i class='fa fa-plus'></i> Tambah Pengguna</button></div>-->

               <div class="table-responsive" id="div_pengguna">
                <table class="table table-bordered table-sm table-hover" id="datauser"  cellspacing="0">
                    <thead>
                        <tr class="bg-primary text-light">
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Nama<br />NIK</th>
                            <th style="text-align: center;">Alamat</th>
                            <th style="text-align: center;">No. Perkara<br />Tgl. Putusan</th>
                            <th style="text-align: center;">No. Akta Cerai<br />Tgl. Akta Cerai</th>
                            <th style="text-align: center;">Jenis Perkara<br />Jenis Pihak</th>
                             <th style="text-align: center;">Tanggal Permohonan</th>
                            <th style="text-align: center;">Tanggal Pengambilan</th>
                            <th style="text-align: center;">Satker Disdukcapil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        foreach($capil->result_array() as $row){
                          if($row['tanggal_permohonan']==null){
                            $tanggal_permohonan='';
                          }else{
                            $tanggal_permohonan=tgl_indo($row['tanggal_permohonan']);
                          }
                         

                           if($row['tanggal_pengambilan']==null){
                            $tanggal_pengambilan='';
                          }else{
                            $tanggal_pengambilan=tgl_indo($row['tanggal_pengambilan']);
                          }



                            $tanggal_putusan=tgl_indo($row['tanggal_putusan']);
                            $tanggal_akta_cerai=tgl_indo($row['tanggal_akta_cerai']);
                            if ($row['jenis_pihak']==1){
                                $jenis_pihak='Penggugat/Pemohon';
                            }elseif ($row['jenis_pihak']==2){
                                $jenis_pihak='Tergugat/Termohon';
                            }

                            ?>
                            <tr>
                                <td><center><?php echo $no++; ?></center></td>
                                <td><?php echo $row['nama']; ?><br />NIP. <?php echo $row['nik']; ?></td>
                                <td><?php echo $row['alamat']; ?></td>
                                <td><center><?php echo $row['nomor_perkara']; ?><br /><?php echo $tanggal_putusan; ?></center></td>
                                <td><center><?php echo $row['nomor_akta_cerai']; ?><br /><?php echo $tanggal_akta_cerai; ?></center></td>
                                <td><center><?php echo $row['jenis_perkara_text']; ?><br /><?php echo $jenis_pihak; ?></center></td>

                                <td><center><?php echo $tanggal_permohonan; ?></center></td>
                                <td><center><?php echo $tanggal_pengambilan; ?></center></td>
                               
                                <td><center><?php echo $row['nama_satker']; ?></center></td>
                              

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
<!-- The Modal -->

<!-- The Modal -->

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