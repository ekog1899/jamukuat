<!-- Begin Page Content -->
<div class="container-fluid"> 
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DATA PKS (PA)</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col mr-2">
                   
                </div>
                <div class="col-auto">
                    <a href="#" onclick="pks_tambah()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> PKS Baru</a>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-hover"  id="dataTable" cellspacing="0">
                    <thead>
                        <tr class="bg-primary text-light">
                            <th style="width: 5%">No</th>
                            <th style="width: 30%">Instansi</th>
                            <th style="width: 25%">Tanggal & Nomor PKS</th>
                            <th style="width: 10%">Softcopy</th>
                            <th style="width: 15%">Status</th>
                            <th style="width: 5%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php
                        //var_dump($pks);
                            foreach ($pks as $m) : 
                            echo "<tr id='kolom_ke".$i."'>";
                            echo "<td>$i</td>";
                            echo "<td>$m->instansi</td>";
                            if($m->tanggal_indo=="00 0000"){
                                $tgl_pks="";
                            }else{
                                $tgl_pks=$m->tanggal_indo;
                            }
                            echo "<td>$tgl_pks<br>$m->nomor_pks</td>";
                            if(strlen($m->softcopy_pks)>=4){
                                echo "<td><a target='_blank' title='Unduh Softcopy PKS' href='".base_url($m->softcopy_pks)."'><span class='icon text-primary'><i class='fas fa-file-pdf'></i></span></a></td>";
                            }else{
                                echo "<td></td>";
                            }
                            echo "<td>$m->status_pks</td>";
                            echo "</td><td><a title='Detail' onclick='pks_detail(".$m->id.")' href='#kolom_ke".$i."'><span class='icon text-primary ml-3'><i class='fas fa-bars'></i></span></a></td>";
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
       <div class="modal" id="ModalPks">
        <div class="modal-dialog modal-xl" style="width: 100%; max-width: none; height: 100%; margin: 0;"> 
            <div class="modal-content" style="height: 100%; border: 0; border-radius: 0;">
                <!-- Modal Header -->
                <div class="modal-header"><span class='font-weight-bold text-primary'>PERJANJIAN KERJASAMA</span>
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
              <form id="myDropzoneDokumenEdoc" action="<?php echo base_url('pks/upload_edoc')?>" class="dropzone">
                     <input id="id_pks" name="id_pks" type="hidden" value="">
                  </form>
            </div>
             <script type="text/javascript">
               Dropzone.autoDiscover = false;
                var errors = false;
                new Dropzone("#myDropzoneDokumenEdoc", { 
                acceptedFiles: ".pdf",
                  init: function() {
                    this.on("success", function(file, responseText) {
                     var xx=document.getElementById("id_pks").value;
                     pks_detail(xx);
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
    function pks_tambah(){
        $("#ModalLoading").modal("show");
        var b = new XMLHttpRequest();
        b.open("POST", "<?php echo base_url()?>pks/pks_add", true);
        b.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        b.onreadystatechange = function () {
            if (b.readyState == XMLHttpRequest.DONE && b.status == 200){
                var c = b.responseText;
                document.getElementById("isi_modal").innerHTML = c;
                $("#ModalPks").modal("show");
                $("#ModalLoading").modal("hide");
                document.getElementById("instansi").focus();
            }
        }
        b.send("user_id=<?php echo $user_id?>");
    }

    function edit_isi(field,id, isi){
        var xhr = new XMLHttpRequest();
        xhr.open("POST","<?php echo base_url("pks/pks_edit_isi")?>", true); 
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                var pesan=xhr.responseText; 
                document.getElementById("pesan").innerHTML="<center>"+pesan+"</center>"
            }
        }
        xhr.send("field="+field+"&DATA="+isi+"&id="+id); 
    }
    function pks_detail(id){
        $("#ModalLoading").modal("show");
        var b = new XMLHttpRequest();
        b.open("POST", "<?php echo base_url()?>pks/pks_detail", true);
        b.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        b.onreadystatechange = function () {
            if (b.readyState == XMLHttpRequest.DONE && b.status == 200){
                var c = b.responseText;
                document.getElementById("isi_modal").innerHTML = c;
                $("#ModalPks").modal("show");
                $("#ModalLoading").modal("hide");
            }
        }
        b.send("id="+btoa(id));
    }
    function pks_edit(id){
        $("#ModalLoading").modal("show");
        var b = new XMLHttpRequest();
        b.open("POST", "<?php echo base_url()?>pks/pks_edit", true);
        b.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        b.onreadystatechange = function () {
            if (b.readyState == XMLHttpRequest.DONE && b.status == 200){
                var c = b.responseText;
                document.getElementById("isi_modal").innerHTML = c;
                $("#ModalPks").modal("show");
                $("#ModalLoading").modal("hide");
            }
        }
        b.send("id="+btoa(id));
    }
    function serialize(form){
        var field, l, s = []; if (typeof form == 'object' && form.nodeName == "FORM") {var len = form.elements.length; for (var i=0; i<len; i++) {field = form.elements[i]; if (field.name && !field.disabled && field.type != 'file' && field.type != 'reset' && field.type != 'submit' && field.type != 'button') {if (field.type == 'select-multiple') {l = form.elements[i].options.length; for (var j=0; j<l; j++) {if(field.options[j].selected) s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(btoa(field.options[j].value)); } } else if ((field.type != 'checkbox' && field.type != 'radio') || field.checked) {s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(btoa(field.value)); } } } } return s.join('&').replace(/%20/g, '+');
    }
    function pks_save(){
        $("#ModalLoading").modal("show");  
        //alert(message);return false;
        var xhr = new XMLHttpRequest();
        var data=serialize(f_pks);
        var url='<?php echo base_url("pks/pks_save")?>';
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
          if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
            var c=xhr.responseText;
            location.reload();
          }
        }
        xhr.send(data); 
    }
    function pks_delete(id){
        var conf = confirm("Apakah anda yakin akan menghapus data ini?");
        if(conf == true){
            $("#ModalLoading").modal("show");
            var b = new XMLHttpRequest();
            b.open("POST", "<?php echo base_url("pks/pks_delete")?>", true);
            b.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            b.onreadystatechange = function (){
                if (b.readyState == XMLHttpRequest.DONE && b.status == 200){
                    location.reload();
                }
            }
            b.send("id="+btoa(id));
        }
    }

    function tambah_edoc(id){ 
        document.getElementById("id_pks").value = id;
        $("#ModalUploadEdoc").modal("show");
        $("#ModalPks").modal("hide");
        //acak();
    }
</script>