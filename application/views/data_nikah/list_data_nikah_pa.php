<!-- Begin Page Content -->
<div class="container-fluid"> 
        <div class="card-body">
            <div class="row">
            
                <div class="col mr-2"><h6 class="m-0 font-weight-bold text-primary"><?php echo $title?></h6>Untuk mendapatkan Daftar Pernikahan, klik pada jumlah pernikahan
                </div>
                <div class="col-auto">
                   
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-hover"  id="dataTable" cellspacing="0">
                    <thead>
                        <tr class="bg-primary text-light">
                            <th>No</th>
                            <th>KUA</th>
                            <th>Bulan</th>
                            <th style="text-align: center;">Tahun</th>

                            <th style="text-align: center;">Jumlah</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php 
                            foreach($data_nikah->result_array() as $m){
                            echo "<tr id='kolom_ke".$i."'>";
                            echo "<td style='width:50px'>$i</td>";
                            echo "<td>".$m["kua"]."</td>"; 
                            echo "<td><span style='display:none'>".$m["bulane"]."</span>".$m["nama_bulan"]."</td>";
                            echo "<td style='text-align: center;'>".$m["tahune"]."</td>";
                            echo "<td style='text-align: center;'><a href='#kolom_ke".$i."' title='Daftar Pernikahan bulan ".$m["namabulan"]." ". $m["tahune"]."' onclick='daftar_nikah_per_kua(".$m["mitra_id"].", ".$m["bulane"].", ".$m["tahune"].")'>".$m["jumlah"]."</a></td>";
                            echo "</tr>";

                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
    <!-- The Modal -->
        <div class="modal" id="Modal_daftar_nikah">
        <div class="modal-dialog modal-xl" style="width: 100%; max-width: none; height: 100%; margin: 0;"> 
            <div class="modal-content" style="height: 100%; border: 0; border-radius: 0;">
                <!-- Modal Header -->
                <div class="modal-header"><h5 class="text-primary">Daftar Pernikahan (untuk mendapatkan Detail Perkara, klik pada Nomor Akta Nikah)</h5>
                  <button type="button" class="close " data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body" id="isi_modal" style="overflow-y: auto;">
                </div>
          </div>
        </div>
        </div>
    <!-- The Modal -->
    <!-- The Modal -->
        <div class="modal" id="Modal_Upoad">
        <div class="modal-dialog modal-xl"> 
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header"><h5 class="text-primary">UPLOAD DATA NIKAH</h5>
                  <button type="button" class="close " data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body" id="Modal_Upoad_isi" style="overflow-y: auto;">
                </div>
          </div>
        </div>
        </div>
    <!-- The Modal -->
    <!-- The Modal -->
        <div class="modal" id="Modal_Detail_Nikah">
        <div class="modal-dialog modal-xl" style="width: 100%; max-width: none; height: 100%; margin: 0;"> 
            <div class="modal-content" style="height: 100%; border: 0; border-radius: 0;">
                <!-- Modal Header -->
                <div class="modal-header"><h5 class="text-primary">DETAIL DATA NIKAH</h5>
                  <button type="button" class="close text-danger" onclick="buka_daftar()">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body" id="isi_modal_detail" style="overflow-y: auto;">
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
<link href="<?php echo base_url('assets/'); ?>vanilla-dataTables/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url('assets/'); ?>vanilla-dataTables/vanilla-dataTables.min.js" type="text/javascript"></script>
<link href="<?php echo base_url('assets/'); ?>dropzone/dropzone.min.css" type="text/css" rel="stylesheet" />
<script src="<?php echo base_url('assets/'); ?>dropzone/dropzone.min.js"></script>
<script>
$(document).ready(function(){
    $('#dataTable').DataTable({
        "lengthMenu": [[12, 24, 60, -1], [12, 24, 60, "All"]],
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
<script type="text/javascript">
    function daftar_nikah_per_kua(mitra_id, bulan, tahun){
        $("#ModalLoading").modal("show");
        var b = new XMLHttpRequest();
        b.open("POST", "<?php echo base_url()?>data_nikah/daftar_nikah_per_kua", true);
        b.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        b.onreadystatechange = function () {
            if (b.readyState == XMLHttpRequest.DONE && b.status == 200){
                var c = b.responseText;
                document.getElementById("isi_modal").innerHTML = c;
                //CKEDITOR.replace('message');
                $("#Modal_daftar_nikah").modal("show");
                $("#ModalLoading").modal("hide");
                var table = new DataTable("#dataNikah"); 
            }
        }
        b.send("mitra_id="+mitra_id+"&bulan="+bulan+"&tahun="+tahun);
    }
    function detail_data_nikah(id){
        $("#ModalLoading").modal("show");
        var b = new XMLHttpRequest();
        b.open("POST", "<?php echo base_url()?>data_nikah/detail_data_nikah", true);
        b.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        b.onreadystatechange = function () {
            if (b.readyState == XMLHttpRequest.DONE && b.status == 200){
                var c = b.responseText;
                document.getElementById("isi_modal_detail").innerHTML = c;
                //CKEDITOR.replace('message');
                $("#Modal_Detail_Nikah").modal("show");
                $("#ModalLoading").modal("hide");
            }
        }
        b.send("id="+id);
    }
    function data_nikah_unggah(){
        var b = new XMLHttpRequest();
        b.open("POST", "<?php echo base_url()?>data_nikah/data_nikah_unggah", true);
        b.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        b.onreadystatechange = function () {
            if (b.readyState == XMLHttpRequest.DONE && b.status == 200){
                var c = b.responseText;
                document.getElementById("Modal_Upoad_isi").innerHTML = c;
                $("#ModalLoading").modal("hide");
                $("#Modal_Upoad").modal("show");
                Dropzone.autoDiscover = false;
                var errors = false;
                new Dropzone("#myDropzone", { 
                  acceptedFiles: ".xlsx",
                  init: function() {
                    this.on("success", function(file, responseText){
                        location.reload();
                      //document.getElementById("pesan_impor_data").innerHTML=responseText;

                      //daftar_nikah_per_kua();
                      //data_ikm();
                      //tutup_modal_impor();
                    });
                  }
                });
                
            }
        }
        b.send();
    }
      function ganti_bulan(isi){
        document.getElementById("bulan").value=isi;
      }
    function buka_daftar(){
        $("#Modal_daftar_nikah").modal("show");
        $("#Modal_Detail_Nikah").modal("hide");
    }
</script>