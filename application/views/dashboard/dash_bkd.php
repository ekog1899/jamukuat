<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
         <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?> <?php echo $titlemenu; ?></h1>
        <div class="row" style="margin-bottom: 10px">       
        <div class="col-md-4 text-center">
            <div style="margin-top: 8px" id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
        
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="col-auto">
            <a href="<?php echo base_url('Dashboard/bkd_putusan');?>"><button class="btn btn-primary pull-right">Perkara Putusan PNS</button></a>
        </div>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">PERKARA PENDAFTARAN PNS</h6>
		</div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered table-sm table-hover" id="datauser"  cellspacing="0">
    <thead>
        <tr class="bg-primary text-light">
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Nama<br>NIP<br>Jenis Pihak</th>
            <th style="text-align: center;">No. Perkara<br>Tgl. Daftar Perkara</th>
            <th style="text-align: center;">Jenis Perkara</th>
            <th style="text-align: center;">Pengadilan Agama</th>   
            <th style="text-align: center;">Izin Cerai di SIPP</th>                 
            <th style="text-align: center;">Izin Cerai</th>
            <th style="text-align: center;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
                        <?php
                        //var_dump($pns);exit();
                            foreach ($pns as $m) : 
                            echo "<tr id='kolom_ke".$i."'>";
                            echo "<td>$i</td>";
                            if($m->jenis_pihak==1){
                                $jenis_pihak="Penggugat";
                            }else{
                                $jenis_pihak="Tergugat";
                            }
                            echo "<td>$m->nama_pihak<br>NIP. $m->nip<br>Sebagai : <strong>$jenis_pihak</strong></td>";
                            if($m->tanggal_daftar=="00 0000"){
                                $tgl_pendaftaran="";
                            }else{
                                $tgl_pendaftaran=$m->tanggal_daftar;
                            }
                            echo "<td><b>$m->nomor_perkara</b><br>$tgl_pendaftaran</td>";
                            echo "<td>$m->jenis_perkara</td>";
                            echo "<td>$m->nama_pa</td>";
                            
                            if($m->izin_cerai==0){
                                $izin_cerai="Tidak Ada";
                            }else{
                                $izin_cerai="Ada";
                            }
                            echo "<td>$izin_cerai</td>";
                            if($m->status_lapor==1){
                                $status_lapor="<a href='#'><button type='button' class='btn btn-success'>Sudah Lapor</button></a>";
                            }else{
                                $status_lapor="<a href='#'><button type='button' class='btn btn-danger'>Belum Lapor</button></a>";
                            }
                            echo "<td>$status_lapor</td>";
                            echo "<td><a title='Detail' onclick='pns_detail(".$m->idnya.")' href='#kolom_ke".$i."'><span class='icon text-primary ml-3'><i class='fas fa-bars'></i></span></a></td>";
                            echo "</tr>";

                            $i++; 
                            endforeach; 
                        ?>
    </tbody>
</table>
            </div>
        </div>
    </div>

    <div class="row">

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
    <!-- The Modal -->
    <div class="modal" id="ModalPns">
        <div class="modal-dialog modal-xl" style="width: 100%; max-width: none; height: 100%; margin: 0;"> 
            <div class="modal-content" style="height: 100%; border: 0; border-radius: 0;">
                <!-- Modal Header -->
                <div class="modal-header"><span class='font-weight-bold text-primary'>DATA PNS</span>
                  <button type="button" id="detailclose" class="close " data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body" id="isi_modal" style="overflow-y: auto;">
                </div>
          </div>
        </div>
        </div>
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
              <form id="myDropzoneDokumenEdoc" action="<?php echo base_url('pns/upload_edoc')?>" class="dropzone">
                     <input id="id_pns" name="id_pns" type="hidden" value="">
                  </form>
            </div>
             <script type="text/javascript">
               Dropzone.autoDiscover = false;
                var errors = false;
                new Dropzone("#myDropzoneDokumenEdoc", { 
                acceptedFiles: ".pdf,.doc,.docx,.rtf,.zip,.rar",
                  init: function() {
                    this.on("success", function(file, responseText) {
                     var xx=document.getElementById("id_pns").value;
                     pns_detail(xx);
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

<!-- Page level custom scripts -->
<!--<link href="<?php echo base_url('assets/'); ?>vanilla-dataTables/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url('assets/'); ?>vanilla-dataTables/vanilla-dataTables.min.js" type="text/javascript"></script>
<link href="<?php echo base_url('assets/'); ?>slim_select/slimselect.min.css" rel="stylesheet" />
<script src="<?php echo base_url('assets/'); ?>slim_select/slimselect.min.js"></script>-->

<script>
$(document).ready(function(){
    $('#datauser').DataTable({
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
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
</script>
<script type="text/javascript">
/*var dataTable = new DataTable("#datauser", {
    searchable: true,
    perPage: 25,
    perPageSelect: [25, 50, 75, 100, 250, 1000]
});*/

function pns_detail(id){
        $("#ModalLoading").modal("show");
        var b = new XMLHttpRequest();
        b.open("POST", "<?php echo base_url()?>dashboard/pns_detail", true);
        b.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        b.onreadystatechange = function () {
            if (b.readyState == XMLHttpRequest.DONE && b.status == 200){
                var c = b.responseText;
                document.getElementById("isi_modal").innerHTML = c;
                $("#ModalPns").modal("show");
                $("#ModalLoading").modal("hide");
            }
        }
        b.send("id="+btoa(id));
    }

    function serialize(form){
        var field, l, s = []; if (typeof form == 'object' && form.nodeName == "FORM") {var len = form.elements.length; for (var i=0; i<len; i++) {field = form.elements[i]; if (field.name && !field.disabled && field.type != 'file' && field.type != 'reset' && field.type != 'submit' && field.type != 'button') {if (field.type == 'select-multiple') {l = form.elements[i].options.length; for (var j=0; j<l; j++) {if(field.options[j].selected) s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(btoa(field.options[j].value)); } } else if ((field.type != 'checkbox' && field.type != 'radio') || field.checked) {s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(btoa(field.value)); } } } } return s.join('&').replace(/%20/g, '+');
    }

    function edit_isi(field, id, isi){
        var xhr = new XMLHttpRequest();
        xhr.open("POST","<?php echo base_url("pns/pns_edit_isi")?>", true); 
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                var pesan=xhr.responseText; 
                document.getElementById("pesan").innerHTML="<center>"+pesan+"</center>"
            }
        }
        xhr.send("field="+field+"&isi="+isi+"&id="+id); 
    }

    function tambah_edoc(id){ 
        document.getElementById("id_pns").value = id;
        $("#ModalUploadEdoc").modal("show");
        $("#ModalPns").modal("hide");
        //acak();
    }

    document.getElementById("detailclose").onclick = function () {
        location.href = "<?php echo base_url('dashboard/dashboard_bkd')?>";
    };
</script>