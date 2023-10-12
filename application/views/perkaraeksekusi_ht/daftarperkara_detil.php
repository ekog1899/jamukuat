
<!-- Begin Page Content -->
<div class="container-fluid">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/pikaday/pikaday.css">
    <script src="<?php echo base_url()?>assets/pikaday/moment.js"></script>
    <script src="<?php echo base_url()?>assets/pikaday/id.js"></script>
    <script src="<?php echo base_url()?>assets/pikaday/pikaday.js"></script>
    <link href="<?php echo base_url()?>assets/dropzone/dropzone.min.css" type="text/css" rel="stylesheet" />
  <script src="<?php echo base_url()?>assets/dropzone/dropzone.min.js"></script>
<!-- 
    <div class="form-group">
        <div class="col-lg-3" >
            <select name="selectbox" id="selectbox" class="form-control">
                <option value="0">Pilih Data </option>
                <option value="#anmaning">Anmaning</option>
                <option value="#myModal2">Cold Brewing Company</option>
                <option value="#myModal3">Jokers Wild Inc.</option>
            </select>
        </div>
    </div>

-->
    <!-- Page Heading -->
    <h4 class="h4 mb-2 text-gray-800">INFORMASI DETIL PERMOHONAN EKSEKUSI HAK TANGGUNGAN</h4>


    <!-- DataTales Example -->
    <?php echo  form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

    <?php echo  $this->session->flashdata('message'); ?>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="data_umum-tab" data-toggle="tab" href="#data_umum" role="tab" aria-controls="data_umum" aria-selected="false">Data Umum</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="blangko-tab" data-toggle="tab" href="#blangko" role="tab" aria-controls="blangko" aria-selected="false">Blangko Tambahan</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="atr_bpn-tab" data-toggle="tab" href="#atr_bpn" role="tab" aria-controls="atr_bpn" aria-selected="false">ATR/ BPN</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="kpknl-tab" data-toggle="tab" href="#kpknl" role="tab" aria-controls="kpknl" aria-selected="false">KPKNL</a>
        </li><!--
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="kepolisian-tab" data-toggle="tab" href="#kepolisian" role="tab" aria-controls="kepolisian" aria-selected="false">Kepolisian</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="pemda-tab" data-toggle="tab" href="#pemda" role="tab" aria-controls="pemda" aria-selected="false">Pemda</a>
        </li> 
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="bkd-tab" data-toggle="tab" href="#bkd" role="tab" aria-controls="bkd" aria-selected="false">BKD</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="dispermadesdukcapil-tab" data-toggle="tab" href="#dispermadesdukcapil" role="tab" aria-controls="dispermadesdukcapil" aria-selected="false">Dispermadesdukcapil</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="dp3akb-tab" data-toggle="tab" href="#dp3akb" role="tab" aria-controls="dp3akb" aria-selected="false">DP3AKB</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="kemendikbud-tab" data-toggle="tab" href="#kemendikbud" role="tab" aria-controls="kemendikbud" aria-selected="false">Kemendikbud</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="birohukum-tab" data-toggle="tab" href="#birohukum" role="tab" aria-controls="birohukum" aria-selected="false">Biro Hukum</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="biropemotdaks-tab" data-toggle="tab" href="#biropemotdaks" role="tab" aria-controls="biropemotdaks" aria-selected="false">Biropemotdaks</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="birohukum-tab" data-toggle="tab" href="#birohukum" role="tab" aria-controls="birohukum" aria-selected="false">Biro Hukum</a>
        </li>-->
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="data_umum" role="tabpanel" aria-labelledby="data_umum-tab"> 
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Umum</h6>
                </div>
                <div class="card-body">
                    <div class="table">
                        <table class="table table-bordered table-bordered table-sm table-condensed" id="dataTable" width="100%" cellspacing="1">
                            <tbody>
                                <?php foreach ($data as $m) : ?>
                                    <tr >
                                        <td class="bg-primary text-light" style="width: 35%" > Tanggal Permohonan</td>
                                        <td> <?php echo  $m->tanggale; ?></td>
                                    </tr >
                                    <tr >
                                        <td class="bg-primary text-light"> Nomor Eksekusi Hak Tanggungan</td>
                                        <td> <?php echo  $m->eksekusi_nomor_perkara; ?></td>
                                    </tr >
									
									
									<?php 
									$infolog= infoLogin();
				$user_id= $infolog['userid'];
				//$datastring=implode(",",$data);
				insertLog('DataeksekusiHT/detil',$user_id,$m->eksekusi_nomor_perkara);
									?>
                                    <tr >
                                        <td class="bg-primary text-light"> Jenis Eksekusi    </td>
                                        <td> <?php echo  $m->jenis_ht_text; ?></td>
                                    </tr >
                                    <tr >
                                        <td class="bg-primary text-light"> Tanggal Sertifikat</td>
                                        <td> <?php echo  tanggale($m->tgl_sertifikate); ?></td>
                                    </tr >
                                    <tr >
                                        <td class="bg-primary text-light"> No. Sertifikat</td>
                                        <td> <?php echo  $m->no_sertifikat; ?></td>
                                    </tr >
                                    <tr >
                                        <td class="bg-primary text-light"> Status Perkara</td>
                                        <td>
                                            <select class="form-control" onchange="update_status_ht('<?php echo $m->pa_id?>',<?php echo $m->ht_id?>, this.value)">
                                                <?php
                                                    if($m->status_eksekusi_text=="Selesai"){
                                                        $sel1="selected='selected'";
                                                        $sel0="";
                                                        $sel2="";
                                                        $sel3="";
                                                    }else
                                                    if($m->status_eksekusi_text=="Pencabutan Permohonan Eksekusi"){
                                                        $sel0="";
                                                        $sel2=" selected='selected' ";
                                                        $sel1="";
                                                        $sel3="";
                                                    }else
                                                    if($m->status_eksekusi_text=="Menggantung"){
                                                        $sel0="";
                                                        $sel1="";
                                                        $sel3=" selected='selected' ";
                                                        $sel2="";
                                                    }else{
                                                        $sel0=" selected='selected' ";
                                                        $sel1="";
                                                        $sel2="";
                                                        $sel3="";
                                                    }
                                                ?>
                                                <option <?php echo $sel0?> value="">Dalam Proses</option>
                                                <option <?php echo $sel1?> value="Selesai">Selesai</option>
                                                <option <?php echo $sel2?> value="Pencabutan Permohonan Eksekusi">Pencabutan Permohonan Eksekusi</option>
                                            </select>
                                        </td>
                                    </tr >

                                <?php endforeach; ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Arsip E-Doc</h6>
                </div>
                <div class="card-body">
                    
                    <div class="table"><button class="btn text-success border border-success" onclick="tambah_edoc()"><i class="fa fa-plus-circle"></i> Tambah  E-Doc</button></div>
                    <div class="table" id="isi_edoc">
                        
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pihak</h6>
                </div>
                <div class="card-body">
                    <div class="table">
                        <h6 class="m-0 font-weight-bold text-primary">Pemohon Eksekusi</h6>
                        <table class="table table-bordered table-bordered table-sm table-condensed" id="dataTable" width="100%" cellspacing="1">
                            <thead>
                                <tr class="bg-primary text-light" ><th width="5%">No</th> <th width="30%">Nama</th> <th width="40%">Alamat</th> <th width="10%"></th> </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no=0;
                                    foreach ($data_pihak1 as $m) :
                                    $no++;
                                    echo "<tr><td>$no</td><td>$m->pihak_nama</td><td></td><td></td></tr>";
                                    endforeach; 
                                ?> 
                            </tbody>
                        </table>
                        <h6 class="m-0 font-weight-bold text-primary">Termohon Eksekusi</h6>
                        <table class="table table-bordered table-bordered table-sm table-condensed" id="dataTable" width="100%" cellspacing="1">
                            <thead>
                                <tr class="bg-primary text-light" ><th width="5%">No</th> <th width="85%">Nama</th> <th width="10%"></th> </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no=0;
                                    foreach ($data_pihak2 as $m) :
                                    $no++;
                                    echo "<tr><td>$no</td><td>$m->pihak_nama</td><td></td></tr>";
                                    endforeach; 
                                ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Tanggal Eksekusi</h6>
                </div>
                <div class="card-body">
                    <div class="table">
                        <table class="table table-bordered table-bordered table-sm  text-xsmall table-condensed" id="dataTable" width="100%" cellspacing="1">
                            <tbody>
                                <?php foreach ($data as $m) : ?>
                                    <tr >
                                        <td class="bg-primary text-light"> Tanggal Penetapan Teguran Eksekusi  </td>
                                        <td> <?php echo tanggale($m->penetapan_teguran_eksekusi); ?></td>
                                    </tr >
                                    <tr >
                                        <td class="bg-primary text-light"> Nomor Penetapan Teguran Eksekusi</td>
                                        <td> <?= $m->nomor_penetapan_teguran_eksekusi; ?></td>
                                    </tr >
                                    <tr >
                                        <td class="bg-primary text-light"> Tanggal Pelaksanaan Teguran Eksekusi</td>
                                        <td> <?php echo tanggale($m->pelaksanaan_teguran_eksekusi); ?></td>
                                    </tr >
                                    <tr >
                                        <td class="bg-primary text-light"> Tanggal Penetapan Sita Eksekusi</td>
                                        <td> <?php echo tanggale($m->penetapan_sita_eksekusi); ?></td>
                                    </tr >
                                    <tr >
                                        <td class="bg-primary text-light"> Nomor Penetapan Sita Eksekusi</td>
                                        <td> <?= $m->nomor_penetapan_sita_eksekusi; ?></td>
                                    </tr >
                                    <tr >
                                        <td class="bg-primary text-light"> Tanggal Pelaksanaan Eksekusi</td>
                                        <td> <?php echo tanggale($m->pelaksanaan_sita_eksekusi); ?></td>
                                    </tr >
                                    <tr >
                                        <td class="bg-primary text-light"> Jurusita</td>
                                        <td> <?= $m->jurusita_nama; ?></td>
                                    </tr >
                                    <tr >
                                        <td class="bg-primary text-light"> Tanggal Penetapan Perintah Eksekusi Lelang</td>
                                        <td> <?= tanggale($m->penetapan_perintah_eksekusi_lelang); ?></td>
                                    </tr >
                                    <tr >
                                        <td class="bg-primary text-light"> Tanggal Pelaksanaan Eksekusi Lelang</td>
                                        <td> <?php echo tanggale($m->pelaksanaan_eksekusi_lelang); ?></td>
                                    </tr >
                                    <tr >
                                        <td class="bg-primary text-light"> Tanggal Penyerahan Hasil Lelang </td>
                                        <td> <?php echo tanggale($m->penyerahan_hasil_lelang); ?></td>
                                    </tr >
                                    <tr >
                                        <td class="bg-primary text-light"> Tanggal Penetapan Perintah Eksekusi Riil</td>
                                        <td> <?php echo tanggale($m->penetapan_perintah_eksekusi_rill); ?></td>
                                    </tr >
                                    <tr >
                                        <td class="bg-primary text-light"> Tanggal Pelaksanaan Eksekusi Riil</td>
                                        <td> <?php tanggale($m->pelaksanaan_eksekusi_rill); ?></td>
                                    </tr >
                                    <tr >
                                        <td class="bg-primary text-light"> Tanggal Penetapan Non-Eksekusi</td>
                                        <td> <?php echo tanggale($m->penetapan_noneksekusi); ?></td>
                                    </tr >
                                    <tr >
                                        <td class="bg-primary text-light"> Alasan Eksekusi</td>
                                        <td> <?= $m->alasan_eksekusi; ?></td>
                                    </tr >
                                    <tr >
                                        <td class="bg-primary text-light"> Keterangan Lain</td>
                                        <td> <?= $m->catatan_eksekusi; ?></td>
                                    </tr >                                    
                                <?php endforeach; ?>  
                            </tbody>
                        </table>
                     </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show " id="blangko" role="tabpanel" aria-labelledby="blangko-tab">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Blangko Dokumen</h6>
                </div>
                <div class="card-body">
                    <div class="table" id="pilihan_blangko">
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show " id="atr_bpn" role="tabpanel" aria-labelledby="atr_bpn-tab">
            <div><a href="https://lelang.go.id/accounts/login?no-cache=ibZsjDgHkcwJ4AhpRIYG" target="_blank"><img src="<?php echo base_url("assets/images/logobpn.webp")?>" title="Buka Web ATR/ BPN"></a></div>
            <div id="div_atr_dokumen"></div>
            
        </div>
        <div class="tab-pane fade show " id="kpknl" role="tabpanel" aria-labelledby="kpknl-tab">
            <div><a href="https://kkp2.atrbpn.go.id/Account/Login?returnUrl=http%3A%2F%2Fapp.atrbpn.go.id%2FAkun%2Fpertanahan%2FAdministrator%2FASN" target="_blank"><img src="<?php echo base_url("assets/images/logo_lelang.webp")?>" title="Buka Web Lelang"></a></div>
            <div id="div_kpknl_dokumen"></div>
        </div> 
    </div>




</div>

  <!-- The Modal -->
  <div class="modal" id="ModalDokumen">
    <div class="modal-dialog modal-xl" style="width: 100%; max-width: none; height: 100%; margin: 0;"> 
        <div class="modal-content" style="height: 100%; border: 0; border-radius: 0;">
            <!-- Modal Header -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body" id="isi_modal" style="overflow-y: auto;">
              Modal body..
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <?php echo "<button class='btn btn-primary' onclick=kirim_post('".base_url("dokumen/cetak")."') type=button>Cetak</button> ";?>
            </div>
      </div>
    </div>
  </div>
   <!-- The Modal -->
  <!-- The Modal -->
    <div class="modal" id="ModalUpload">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body" id="isi_modal_upload">
                <h5>Silahkan Isikan Nama Dokumen dan Pilih Dokumen</h5>
                <p>Nama Dokumen<br>
              <input id="nama_file" onchange="document.getElementById('file_nama').value=this.value" name="nama_file" class="form-control"></p>
              <hr>
              <form id="myDropzoneDokumen" action="<?php echo base_url()?>dokumen/do_upload" class="dropzone">
                     <input id="id_file" name="id_file" type="hidden">
                     <input id="file_nama" name="file_nama" type="hidden">
                     <input id="data_permohonan_id" name="data_permohonan_id" type="hidden">
                  </form>
            </div>
             <script type="text/javascript">
               Dropzone.autoDiscover = false;
                var errors = false;
                new Dropzone("#myDropzoneDokumen", { 
                //  acceptedFiles: ".pdf, .doc,.docx,.rtf",
                  init: function() {
                    this.on("success", function(file, responseText) {
                     //var xx=document.getElementById("id_w").value;
                      refresh();
                      $("#ModalUpload").modal("hide");
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
   <!-- The Modal -->
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
                <h5>Silahkan Isikan Keterangan dan Pilih Dokumen</h5>
                <p>Keterangan<br>
              <input id="keterangan_edoc"  onchange="document.getElementById('Edoc_file_nama').value=this.value" name="nama_file" name="keterangan_edoc" class="form-control"></p>
              <hr>
              <form id="myDropzoneDokumenEdoc" action="<?php echo base_url()?>dokumen/do_uploadEdoc" class="dropzone">
                     <input id="Edoc_pa_id" name="Edoc_pa_id" type="hidden" value="<?php echo base64_decode($satker)?>">
                     <input id="Edoc_ht_id" name="Edoc_ht_id" type="hidden" value="<?php echo $ht_id?>">
                     <input id="Edoc_file_nama" name="Edoc_file_nama" type="hidden">
                  </form>
            </div>
             <script type="text/javascript">
               Dropzone.autoDiscover = false;
                var errors = false;
                new Dropzone("#myDropzoneDokumenEdoc", { 
                acceptedFiles: ".pdf, .doc,.docx,.rtf",
                  init: function() {
                    this.on("success", function(file, responseText) {
                     //var xx=document.getElementById("id_w").value;
                      edoc_list();
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
  <div class="modal" id="ModalUpload1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" id="isi_modal_upload1">
            <h5>Tambah Permohonan</h5>
            <p>Kepada <br>
                <div id="dive_mitra_bpn_id">
                <select id="mitra_bpn_id" name="mitra_bpn_id" onchange="pilih_mitra(this.value)">
                <option value=""></option>
                    <?php foreach ($bpn as $m) : ?>
                    <option value="<?php echo $m->mitra_id?>^<?php echo $m->nama_satker?>^<?php echo $m->email_satker?>^<?php echo $m->wa_satker?>"><?php echo $m->nama_satker?></option>
                    <?php endforeach; ?>   
                </select>
                </div>
                <div id="dive_mitra_kpknl_id">
                <select id="mitra_kpknl_id" name="mitra_kpknl_id" onchange="pilih_mitra(this.value)">
                <option value=""></option>
                    <?php foreach ($kpknl as $m) : ?>
                    <option value="<?php echo $m->mitra_id?>^<?php echo $m->nama_satker?>^<?php echo $m->email_satker?>^<?php echo $m->wa_satker?>"><?php echo $m->nama_satker?></option>
                    <?php endforeach; ?>   
                </select>
                </div>
            </p>
            <p>Perihal<br>
                <input type="hidden" id="instansine" name="instansine">
            <input type="hidden"  id="mitra_id" name="mitra_id"></p>
            <input type="hidden"  id="nama_mitra" name="nama_mitra"></p>
            <input type="hidden"  id="email_satker" name="email_satker"></p>
            <input type="hidden"  id="wa_satker" name="wa_satker"></p>
          <input id="perihale" name="perihale" class="form-control"></p>
          <p>Tanggal Surat<br>
          <input type="date" name="tanggale" id="tanggale" class="form-control"></p>
          <p>Catatan<br>
          <textarea class="form-control" id="catatan_singkate" name="catatan_singkate"></textarea></p>
          <hr>
       
        </div> 
        <!-- Modal footer -->
        <div class="modal-footer">
            <button class="btn btn-primary" onclick="simpan_permohonan()">Simpan</button>
        </div>
        
      </div>
    </div> 
    </div> 
   <!-- The Modal -->
   <p id="kodene" style="display:none"><input type="" id="kodene_sie" ><input type="" id="isi_kodene_sie" ></p>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/notifier/css/notifier.min.css">  
    <script src="<?php echo base_url()?>assets/notifier/js/notifier.min.js" type="text/javascript"></script> 
<script>
   $(document).ready(function() {
        $('#pilihan_blangko').load('<?php echo base_url()?>data_eksekusi_ht/list_blangko');
        // $('select').select2();
   }); 
</script>
<script type="text/javascript">
    acak();
    dokumen_soft(1, "div_atr_dokumen");
    dokumen_soft(2, "div_kpknl_dokumen");
    function refresh(){
        dokumen_soft(1, "div_atr_dokumen");
        dokumen_soft(2, "div_kpknl_dokumen");
    }
    function dokumen_soft(id,div){
        var b = new XMLHttpRequest();
        b.open("POST", "<?php echo base_url()?>dokumen/permohonan", true);
        b.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        b.onreadystatechange = function () {
            if (b.readyState == XMLHttpRequest.DONE && b.status == 200) {
                var c = b.responseText;
                document.getElementById(div).innerHTML = c;
            }
        }
        b.send("ht_id=" + btoa("<?php echo $ht_id?>")+"&pa_id=<?php echo $satker?>"+"&instansi_id=" + btoa(id));
    }
    
    function pilih_mitra(isi){
        let myArray = isi.split("^");
        document.getElementById("mitra_id").value=myArray[0];
        document.getElementById("nama_mitra").value=myArray[1];
        document.getElementById("email_satker").value=myArray[2];
        document.getElementById("wa_satker").value=myArray[3];
    }
    function simpan_permohonan(){
        var mitra_id=document.getElementById("mitra_id").value;
        var nama_mitra=document.getElementById("nama_mitra").value;
        var email_satker=document.getElementById("email_satker").value;
        var wa_satker=document.getElementById("wa_satker").value;
        var instansine=document.getElementById("instansine").value;
        var tanggale=document.getElementById("tanggale").value;
        var perihale=document.getElementById("perihale").value;
        var catatan_singkate=document.getElementById("catatan_singkate").value;
            var b = new XMLHttpRequest();
            b.open("POST", "<?php echo base_url()?>dokumen/permohonan_simpan", true);
            b.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            b.onreadystatechange = function () {
                if (b.readyState == XMLHttpRequest.DONE && b.status == 200) {
                    var c = b.responseText;
                    //document.getElementById(div).innerHTML = c;
                    refresh();
                     $("#ModalUpload1").modal("hide");
                }
            }
            b.send("instansine=" + btoa(instansine)+"&tanggale=" + btoa(tanggale)+"&perihale=" + btoa(perihale)+"&catatan_singkate=" + btoa(catatan_singkate)+"&ht_id=" + btoa("<?php echo $ht_id?>")+"&pa_id=" + btoa(<?php echo $satker?>)+"&mitra_id=" + btoa(mitra_id)+"&nama_mitra=" + btoa(nama_mitra)+"&wa_satker=" + btoa(wa_satker)+"&email_satker=" + btoa(email_satker));
    }
    function tampil_modal(id){
        var a =document.getElementById("kodene_sie").value;
        var aa =document.getElementById("isi_kodene_sie").value;
            var b = new XMLHttpRequest();
            b.open("POST", "<?php echo base_url()?>dokumen/tampilan_blangko", true);
            b.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            b.onreadystatechange = function () {
                if (b.readyState == XMLHttpRequest.DONE && b.status == 200) {
                    var c = b.responseText;
                    document.getElementById("isi_modal").innerHTML = c;
                     $("#ModalDokumen").modal("show");
                     //refresh();
                }
            }
            b.send("ht_id=" + btoa("<?php echo $ht_id?>")+"&pa_id=" + btoa(<?php echo $satker?>)+"&id=" + btoa(id)+"&"+a+"="+aa);
    }
    function tampil_modalupload(id){ 
        document.getElementById("data_permohonan_id").value = id;
        document.getElementById("nama_file").value = "";
        $("#ModalUpload").modal("show");
        //acak();
                
    }
    function tambah_permohonan(id){ 
                    document.getElementById("instansine").value = id;
                    document.getElementById("tanggale").value = "";
    document.getElementById("mitra_bpn_id").value = "";
    document.getElementById("mitra_kpknl_id").value = "";
    if(id>1){
        $('#dive_mitra_bpn_id').hide();
        $('#dive_mitra_kpknl_id').show(); 
    }else{
        $('#dive_mitra_bpn_id').show();
        $('#dive_mitra_kpknl_id').hide();
    }
                    document.getElementById("catatan_singkate").value = "";
                     $("#ModalUpload1").modal("show");
                     //acak();
                
    }
    function acak(){
            var b = new XMLHttpRequest();
            b.open("GET", "<?php echo base_url()?>dokumen/kode", true);
            b.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            b.onreadystatechange = function () {
                if (b.readyState == XMLHttpRequest.DONE && b.status == 200) {
                    var c = b.responseText;
                    document.getElementById("kodene").innerHTML = c;
                    
                }
            }
            b.send();
    }
</script>
<script type="text/javascript">
function serialize(form){ 
    var field, l, s = [];
    if (typeof form == 'object' && form.nodeName == "FORM") {
        var len = form.elements.length;
        for (var i=0; i<len; i++) {
            field = form.elements[i];
            if (field.name && !field.disabled && field.type != 'file' && field.type != 'reset' && field.type != 'submit' && field.type != 'button') {
                if (field.type == 'select-multiple') {
                    l = form.elements[i].options.length; 
                    for (var j=0; j<l; j++) {
                        if(field.options[j].selected)
                            s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(field.options[j].value);
                    }
                } else if ((field.type != 'checkbox' && field.type != 'radio') || field.checked) {
                    s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(field.value);
                }
            }
        }
    }
    return s.join('&').replace(/%20/g, '+');
}

function kirim_post(url){ 
    document.getElementById("loader").style='display:block' ;
    var xhr = new XMLHttpRequest();
    var data=serialize(frm_cetak);  
    xhr.open("POST",url, true); 
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
            var str=xhr.responseText ;
            document.getElementById("loader").style='display:none' ; 
            document.getElementById("success").style='display:block' ;  
            var res = str.split("^");
            if(res[1])
            {
                document.getElementById("success").innerHTML=res[0];
                window.location.href ="<?php echo base_url()?>"+res[1];
            }else
            {
                document.getElementById("success").innerHTML=str;
            }
            acak();

        }
    }
    xhr.send(data); 
}

function edit_isi(pa_id, var_nomor, isi){
    var xhr = new XMLHttpRequest();
    var ht_id=document.getElementById('ht_id').value;
    xhr.open("POST","<?php echo base_url('dokumen/update_data')?>", true); 
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
            var pesan=xhr.responseText; 
            notifier.show('Pesan!', pesan, '', '',5000);
            acak();
        }
    }
    xhr.send("var_nomor="+var_nomor+"&DATA="+isi+"&ht_id="+ht_id+"&pa_id="+pa_id); 
}
function hapus_dokumen(id) {
    var conf = confirm("Apakah anda yakin akan menghapus data ini?");
    if (conf == true) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST","<?php echo base_url('dokumen/hapus_dokumen')?>", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                refresh();
            }
        }
        xhr.send("id=" + btoa(id));
    }
}
function hapus_permohonan(id) {
    var conf = confirm("Apakah anda yakin akan menghapus data ini?");
    if (conf == true) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST","<?php echo base_url('dokumen/hapus_permohonan')?>", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                refresh();
            }
        }
        xhr.send("id=" + btoa(id));
    }
}

function update_status_ht(pa_id,ht_id,isi) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST","<?php echo base_url('dokumen/update_eksekusi_ht')?>", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
            }
        }
        xhr.send("pa_id=" + btoa(pa_id)+"&ht_id=" + btoa(ht_id)+"&isi=" + btoa(isi));
}
function edit_permohonan(id) {
    alert("dalam proses");
}
function edoc_list(){
        var b = new XMLHttpRequest();
        b.open("POST", "<?php echo base_url()?>dokumen/edoc_list_ht", true);
        b.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        b.onreadystatechange = function () {
            if (b.readyState == XMLHttpRequest.DONE && b.status == 200) {
                var c = b.responseText;
                document.getElementById("isi_edoc").innerHTML = c;
            }
        }
        b.send("ht_id=" + btoa("<?php echo $ht_id?>")+"&pa_id=<?php echo $satker?>");
    }
function tambah_edoc(){ 
        document.getElementById("keterangan_edoc").value = "";
        $("#ModalUploadEdoc").modal("show");
        //acak();
                
}
function hapus_edoc(id) {
    var conf = confirm("Apakah anda yakin akan menghapus E-Doc ini?");
    if (conf == true) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST","<?php echo base_url('dokumen/edoc_hapus_ht')?>", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                edoc_list();
            }
        }
        xhr.send("id=" + btoa(id));
    }
}
    edoc_list();

function kirim_permohonan(id) { 
    var conf = confirm("Apakah anda yakin akan menghapus data ini?");
    if (conf == true) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST","<?php echo base_url("data_eksekusi/kirim")?>", true); 
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                var pesan=xhr.responseText;
                notifier.show('Pesan!', pesan, '', '',5000);
            }
        }
        xhr.send("id="+id); 
      }
}
</script>
<!-- /.container-fluid -->
