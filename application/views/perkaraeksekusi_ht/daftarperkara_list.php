<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading 
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>-->


    <!-- DataTales Example -->
    <?php echo form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

    <?php echo $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DAFTAR PERKARA EKSEKUSI HAK TANGGUNGAN
 <?php echo $namasatker?></h6>
        </div> 
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-hover table-condensed" id="dataTable" width="100%" cellspacing="1">
                    <thead>
                        <tr class="bg-primary text-light">
                            <th>No</th>
                            <th>Nomor Perkara Eksekusi</th>
                            <th>Tanggal Permohonan</th>
                            <th>Jenis Eksekusi HT</th>
                            <th>Status</th>
                            <th>Link</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>
                        <?php 
                            foreach ($data as $m) : 
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>$m->eksekusi_nomor_perkara</td>";
                            echo "<td>$m->tanggal_permohonan_eksekusinya</td>";
                            echo "<td>$m->jenis_ht_text</td><td>";
                            if(strlen($m->status_eksekusi_text)<=6){
                                echo "Dalam Proses";
                            }else{
                               echo $m->status_eksekusi_text;
                            }
                            $url=base_url('data_eksekusi_ht/daftarperkara_detil/'.base64_encode($satker).'/'.base64_encode($m->ht_id));
                            echo "</td><td><a href='$url'>[ Detil ]</a></td>";
                            echo "</tr>";
                                
                            $i++; 
                            endforeach; 
                            ?>  
                                                     
                                                
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<link href="<?php echo base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<script src="<?php echo base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
  $('#dataTable').DataTable();
});
</script>