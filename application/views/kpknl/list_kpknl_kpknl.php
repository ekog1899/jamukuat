<!-- Begin Page Content -->
<div class="container-fluid"> 
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DATA PERMOHONAN KEPADA KPKNL</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col mr-2">   
                    <span class="icon text-dark"><i class="fas fa-envelope"></i></span> : Belum Dibaca,   
                    <span class="icon text-warning ml-3"><i class="fas fa-envelope-open-text"></i></span> : Sudah dibaca, 
                    <span class="icon text-info ml-3"><i class="fas fa-spinner"></i></span> : Dalam Proses, 
                    <span class="icon text-success  ml-3"><i class="fas fa-check-circle"></i></span> : Selesai, 
                    <span class="icon text-danger ml-3"><i class="fas fa-ban"></i></span> : Ditolak
                </div>
                <div class="col-auto">
                    
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-hover"  id="dataTable" cellspacing="0">
                    <thead>
                        <tr class="bg-primary text-light">
                            <th style="width: 5%">No</th>
                            <th style="width: 16%">Perihal</th>
                            <th style="width: 16%">Tanggal</th>
                            <th>Pengadilan Agama</th>
                            <th style="width: 5%">Status</th>
                            <th style="width: 5%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php 
                            foreach ($kpknl as $m) : 
                            echo "<tr id='kolom_ke".$i."'>";
                            echo "<td>$i</td>";
                            echo "<td>$m->perihal</td>";
                            echo "<td>$m->tanggal_indo</td>";
                            echo "<td>". ucwords(strtolower($m->pa_pemohon))."</td>";
                            echo "<td class='text-center'>";
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
                            echo "</td><td><a title='Detail' onclick='kpknl_detail(".$m->id.")' href='#kolom_ke".$i."'><span class='icon text-primary ml-3'><i class='fas fa-bars'></i></span></a></td>";
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
<link href="<?php echo base_url('assets/dropzone/dropzone.min.css')?>" type="text/css" rel="stylesheet" />
<script src="<?php echo base_url('assets/dropzone/dropzone.min.js')?>"></script>
  <!-- The ModalEdoc -->
    <div class="modal" id="ModalUploadEdoc">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body" id="isi_modal_uploadEdoc">
                <h5>Silahkan  Pilih Dokumen</h5>
              <hr>
              <form id="myDropzoneDokumenEdoc" action="<?php echo base_url('kpknl/upload_edoc_jawaban')?>" class="dropzone">
                     <input id="id" name="id" type="hidden" value="">
                  </form>
            </div>
             <script type="text/javascript">
               Dropzone.autoDiscover = false;
                var errors = false;
                new Dropzone("#myDropzoneDokumenEdoc", { 
                acceptedFiles: ".pdf",
                  init: function() {
                    this.on("success", function(file, responseText) {
                     var xx=document.getElementById("id").value;
                     kpknl_detail(xx);
                      $("#ModalUploadEdoc").modal("hide");
                    });
                  }
                });
              </script>
            <!-- Modal footer -->
            <div class="modal-footer">
                
            </div>
            
          </div>
        </div> 
    </div> 
   <!-- The ModalEdoc -->
    <!-- The Modal -->
        <div class="modal" id="ModalKpknl">
        <div class="modal-dialog modal-xl" style="width: 100%; max-width: none; height: 100%; margin: 0;"> 
            <div class="modal-content" style="height: 100%; border: 0; border-radius: 0;">
                <!-- Modal Header -->
                <div class="modal-header"><span class='font-weight-bold text-primary'>Kpknl</span>
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
    <script src="<?php echo base_url('assets/slim_select/slimselect.min.js') ?>"></script>
<link href="<?php echo base_url('assets/slim_select/slimselect.min.css') ?>" rel="stylesheet"></link>
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
</script>
<script type="text/javascript"> 
    function kpknl_detail(id){
        $("#ModalLoading").modal("show");
        var b = new XMLHttpRequest();
        b.open("POST", "<?php echo base_url()?>kpknl/kpknl_detail_kpknl", true);
        b.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        b.onreadystatechange = function () {
            if (b.readyState == XMLHttpRequest.DONE && b.status == 200){
                var c = b.responseText;
                document.getElementById("isi_modal").innerHTML = c;
                $("#ModalKpknl").modal("show");
                $("#ModalLoading").modal("hide");
            }
        }
        b.send("id="+btoa(id));
    } 
    function serialize(form){
        var field, l, s = []; if (typeof form == 'object' && form.nodeName == "FORM") {var len = form.elements.length; for (var i=0; i<len; i++) {field = form.elements[i]; if (field.name && !field.disabled && field.type != 'file' && field.type != 'reset' && field.type != 'submit' && field.type != 'button') {if (field.type == 'select-multiple') {l = form.elements[i].options.length; for (var j=0; j<l; j++) {if(field.options[j].selected) s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(btoa(field.options[j].value)); } } else if ((field.type != 'checkbox' && field.type != 'radio') || field.checked) {s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(btoa(field.value)); } } } } return s.join('&').replace(/%20/g, '+');
    } 
    function tambah_edoc_jawaban(id){ 
        document.getElementById("id").value = id;
        $("#ModalUploadEdoc").modal("show");
        $("#ModalKpknl").modal("hide");
        //acak();
    }
    function edit_isi(field,id, isi){
        var xhr = new XMLHttpRequest();
        xhr.open("POST","<?php echo base_url("kpknl/kpknl_edit_isi")?>", true); 
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                var pesan=xhr.responseText; 
                document.getElementById("pesan").innerHTML="<center>"+pesan+"</center>"
            }
        }
        xhr.send("field="+field+"&DATA="+isi+"&id="+id); 
    }
</script>