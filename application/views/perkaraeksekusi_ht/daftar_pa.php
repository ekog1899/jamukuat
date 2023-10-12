
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading 
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>-->

    <?php echo form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

    <?php echo $this->session->flashdata('message'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DAFTAR PERKARA EKSEKUSI HAK TANGGUNGAN</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-hover table-condensed" id="dataTable" width="100%" cellspacing="1">
                    <thead>
                        <tr class="bg-primary text-light">
                            <th>No</th>
                            <th>Satker</th>
                            <th>Jumlah Perkara</th>
                            <th>Selesai / Pencabutan Permohonan Eksekusi</th>
                            <th>Dalam Proses</th>
                        </tr>
                    </thead>

                    <tbody> 
                        <?php
                            $no=0; 
                            foreach($perkara as $data): 
                                $no++;
                                echo "<tr>";
                                echo "<td>";
                                echo $no;
                                echo "</td>";
                                echo "<td>";
                                echo $data->nama;
                                echo "</td>";
                                echo "<td>";
                               // $url=base64_encode($data->id);
                                $url=base_url('data_eksekusi_ht/daftarperkara_list/').base64_encode($data->id);
                                echo "<a title='Detail' href='".$url."'>".$data->jml."</a>";
                                echo "</td>";
                                echo "<td>";
                                echo $data->selesai;
                                echo "</td>";
                                echo "<td>";
                                echo $data->dalam_proses;
                                echo "</td>";
                                echo "</tr>";
                                //http://raehman/project/paba/eksekusi/data_eksekusi/daftarperkara_list/MTAxLzQ3NS8wL01AZ2VsYW5n
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
    $('#dataTable').DataTable( {
        "language": {
            "emptyTable": "Tidak ada data yang tersedia pada tabel ini",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            "infoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
            "infoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
            "lengthMenu": "Tampilkan _MENU_ entri",
            "loadingRecords": "Sedang memuat...",
            "processing": "Sedang memproses...",
            "search": "Cari:",
            "zeroRecords": "Tidak ditemukan data yang sesuai",
            "thousands": "'",
            "paginate": {
                "first": "Pertama",
                "last": "Terakhir",
                "next": "Selanjutnya",
                "previous": "Sebelumnya"
            }
        }
    } );
} );
</script>


