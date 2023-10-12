<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Permohonan Pengamanan Se PTA</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <span class="icon text-dark"><i class="fas fa-envelope"></i></span> : Belum Dibaca,   
                <span class="icon text-warning ml-3"><i class="fas fa-envelope-open-text"></i></span> : Sudah dibaca, 
                <span class="icon text-info ml-3"><i class="fas fa-spinner"></i></span> : Dalam Proses, 
                <span class="icon text-success  ml-3"><i class="fas fa-check-circle"></i></span> : Selesai, 
                <span class="icon text-danger ml-3"><i class="fas fa-ban"></i></span> : Ditolak
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-hover"  id="dataTable" cellspacing="0">
                    <thead>
                        <tr class="bg-primary text-light">
                            <th style="width: 5%">No</th>
                            <th style="width: 16%">PA</th>
                            <th style="width: 16%">Pelaksanaan</th>
                            <th>Instansi</th>
                            <th style="width: 5%">Status</th>
                            <th style="width: 5%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php 
                            foreach ($pengamanan as $m) : 
                            echo "<tr id='kolom_ke".$i."'>";
                            echo "<td>$i</td>";
                            echo "<td>". str_replace("Pengadilan Agama ","",ucwords(strtolower($m->pa_pemohon)))."</td>";
                            echo "<td>$m->tanggal_indo</td>";
                            echo "<td>$m->nama_mitra</td><td class='text-center'>";
                            
                            if($m->status==0){
                                echo "<span class='icon text-dark'><i class='fas fa-exclamation-circle'></i></span>";
                            }else
                            if($m->status==1){
                                echo "<span class='icon text-dark'><i class='fas fa-envelope'></i></span>";
                            }else
                            if($m->status==2){
                                echo "<span class='icon text-warning'><i class='fas fa-envelope-open-text'></i></span>";
                            }else
                            if($m->status==3){
                                echo "<span class='icon text-info'><i class='fas fa-spinner'></i></span>";
                            }else
                            if($m->status==4){
                                echo "<span class='icon text-success'><i class='fas fa-check-circle'></i></span>";
                            }else{
                                echo "<span class='icon text-danger'><i class='fas fa-ban'></i></span>";
                            }
                            echo "</td><td><a title='Detail' onclick='pengamanan_detail(".$m->id.")' href='#kolom_ke".$i."'><span class='icon text-primary ml-3'><i class='fas fa-bars'></i></span></a></td>";
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

<!-- The Modal -->
    <div class="modal" id="ModalPengamanan">
    <div class="modal-dialog modal-xl" style="width: 100%; max-width: none; height: 100%; margin: 0;"> 
        <div class="modal-content" style="height: 100%; border: 0; border-radius: 0;">
            <!-- Modal Header -->
            <div class="modal-header"><span class='font-weight-bold text-primary'>Pengamanan</span>
              <button type="button" class="close " data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" id="isi_modal" style="overflow-y: auto;">
            </div>
      </div>
    </div>
    </div>
<!-- The Modal -->
<!-- Loading -->
    <div class="modal" id="ModalLoading">
        <div class="modal-dialog modal-xl" style="width: 100%; max-width: none; height: 100%; margin: 0;"> 
            <div class="modal-content" style="height: 100%; border: 0; border-radius: 0;">
                <div class="modal-body" style="overflow-y: auto;"><h1 class="text-center text-danger"><span class="icon text-info text-danger mr-3"><i class="fas fa-spinner"></i></span> Silahkan Tunggu ....</h1></div>
            </div>
        </div>
    </div>
<!-- The Loading -->
<script>
$(document).ready(function(){
    $('#dataTable').DataTable({
        "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
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


    function pengamanan_detail(id){
        $("#ModalLoading").modal("show");
        var b = new XMLHttpRequest();
        b.open("POST", "<?php echo base_url()?>pengamanan/pengamanan_detail", true);
        b.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        b.onreadystatechange = function () {
            if (b.readyState == XMLHttpRequest.DONE && b.status == 200){
                var c = b.responseText;
                document.getElementById("isi_modal").innerHTML = c;
                $("#ModalPengamanan").modal("show");
                $("#ModalLoading").modal("hide");
            }
        }
        b.send("id="+btoa(id));
    }
</script>