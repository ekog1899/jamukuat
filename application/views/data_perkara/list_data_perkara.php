<!-- Begin Page Content -->
<div class="container-fluid"> 
        <div class="card-body">
            <div class="row">
            
                <div class="col mr-2"><h6 class="m-0 font-weight-bold text-primary"><?php echo $title?></h6>Untuk  mendapatkan Daftar Perkara, klik pada jumlah perkara
                    <!-- <span class="icon text-dark"><i class="fas fa-exclamation-circle"></i></span> : Belum Dikirim,     
                    <span class="icon text-dark"><i class="fas fa-envelope"></i></span> : Belum Dibaca,   
                    <span class="icon text-warning ml-3"><i class="fas fa-envelope-open-text"></i></span> : Sudah dibaca, 
                    <span class="icon text-info ml-3"><i class="fas fa-spinner"></i></span> : Dalam Proses, 
                    <span class="icon text-success  ml-3"><i class="fas fa-check-circle"></i></span> : Selesai, 
                    <span class="icon text-danger ml-3"><i class="fas fa-ban"></i></span> : Ditolak -->
                </div>
                <div class="col-auto">
                   <!-- <a href="#" onclick="kpknl_tambah()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Kpknl Baru</a>-->
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-hover"  id="dataTable" cellspacing="0">
                    <thead>
                        <tr class="bg-primary text-light">
                            <th>No</th>
                            <?php 
                                if(($instansi_id == 8 or $instansi_id == 2) and $group_id == 3){
                                    echo "<th>Nama Satker</th>";
                                }
                                ?>
                            <th>Bulan</th>
                            <th style="text-align: center;">Tahun</th>
                            <th style="text-align: center;">Dispensasi Kawin</th>
                            <?php
                            if($instansi_id==1 OR $instansi_id==2){
                            ?>
                            <th style="text-align: center;">Wali Adhol</th>
                            <th style="text-align: center;">Itsbat Nikah</th>
                            <th style="text-align: center;">Izin Poligami</th>
                            <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php
                            $c_nm = 'as'; 
                            foreach ($data_perkara as $m) : 
                            echo "<tr id='kolom_ke".$i."'>";
                            echo "<td style='text-align: center;'>$i</td>";
                            if(($instansi_id == 8 or $instansi_id == 2) and $group_id == 3){
                                echo "<td style='text-align: left;'>$m->nama</td>";
                            }
                            echo "<td><span style='display:none'>$m->bulan</span>$m->namabulan</td>";
                            echo "<td style='text-align: center;'>$m->tahun</td>";
                            if(($instansi_id == 8 or $instansi_id == 2) and $group_id == 3){                                
                                echo "<td style='text-align: center;'><a href='#kolom_ke".$i."' title='Daftar Perkara Dispensasi Kawin diputus bulan $m->namabulan $m->tahun ' onclick='daftar_perkara($m->kd_satker, 362, $m->bulan, $m->tahun)'>$m->dispensasi_kawin</a></td>";
                            }else{
                                echo "<td style='text-align: center;'><a href='#kolom_ke".$i."' title='Daftar Perkara Dispensasi Kawin diputus bulan $m->namabulan $m->tahun' onclick='daftar_perkara($pengadilan_id, 362, $m->bulan, $m->tahun)'>$m->dispensasi_kawin</a></td>";
                            }
                            if($instansi_id==1 OR $instansi_id==2){
                                if($group_id != 3){
                                    echo "<td style='text-align: center;'><a href='#kolom_ke".$i."' title='Daftar Perkara Wali Adhol diputus bulan $m->namabulan $m->tahun' onclick='daftar_perkara($pengadilan_id, 363, $m->bulan, $m->tahun)'>$m->wali_adhol</a></td>";
                                    echo "<td style='text-align: center;'><a href='#kolom_ke".$i."' title='Daftar Perkara Itsbat Nikah diputus bulan $m->namabulan $m->tahun' onclick='daftar_perkara($pengadilan_id, 360, $m->bulan, $m->tahun)'>$m->itsbat_nikah</a></td>";
                                    echo "<td style='text-align: center;'><a href='#kolom_ke".$i."' title='Daftar Perkara Izin Poligami diputus bulan $m->namabulan $m->tahun' onclick='daftar_perkara($pengadilan_id, 341, $m->bulan, $m->tahun)'>$m->izin_poligami</a></td>";
                                }else{
                                    echo "<td style='text-align: center;'><a href='#kolom_ke".$i."' title='Daftar Perkara Wali Adhol diputus bulan $m->namabulan $m->tahun' onclick='daftar_perkara($m->kd_satker, 363, $m->bulan, $m->tahun)'>$m->wali_adhol</a></td>";
                                    echo "<td style='text-align: center;'><a href='#kolom_ke".$i."' title='Daftar Perkara Itsbat Nikah diputus bulan $m->namabulan $m->tahun' onclick='daftar_perkara($m->kd_satker, 360, $m->bulan, $m->tahun)'>$m->itsbat_nikah</a></td>";
                                    echo "<td style='text-align: center;'><a href='#kolom_ke".$i."' title='Daftar Perkara Izin Poligami diputus bulan $m->namabulan $m->tahun' onclick='daftar_perkara($m->kd_satker, 341, $m->bulan, $m->tahun)'>$m->izin_poligami</a></td>";
                                }
                            }
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
        <div class="modal" id="Modal_Daftar_Perkara">
        <div class="modal-dialog modal-xl" style="width: 100%; max-width: none; height: 100%; margin: 0;"> 
            <div class="modal-content" style="height: 100%; border: 0; border-radius: 0;">
                <!-- Modal Header -->
                <div class="modal-header">
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
        <div class="modal" id="Modal_Detail_Perkara">
        <div class="modal-dialog modal-xl" style="width: 100%; max-width: none; height: 100%; margin: 0;"> 
            <div class="modal-content" style="height: 100%; border: 0; border-radius: 0;">
                <!-- Modal Header -->
                <div class="modal-header">
                  <button type="button" class="close " onclick="buka_daftar()">&times;</button>
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
    function daftar_perkara(pa_id, jenis_perkara, bulan, tahun){
        // alert(pa_id);
        $("#ModalLoading").modal("show");
        var b = new XMLHttpRequest();
        b.open("POST", "<?php echo base_url()?>data_perkara/daftar_perkara", true);
        b.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        b.onreadystatechange = function () {
            if (b.readyState == XMLHttpRequest.DONE && b.status == 200){
                var c = b.responseText;
                document.getElementById("isi_modal").innerHTML = c;
                //CKEDITOR.replace('message');
                $("#Modal_Daftar_Perkara").modal("show");
                $("#ModalLoading").modal("hide");
                var table = new DataTable("#dataPerkara"); 
            }
        }
        b.send("pa_id="+pa_id+"&jenis_perkara="+jenis_perkara+"&bulan="+bulan+"&tahun="+tahun);
    }
    function detail_perkara(id){
        $("#ModalLoading").modal("show");
        var b = new XMLHttpRequest();
        b.open("POST", "<?php echo base_url()?>data_perkara/detail_perkara", true);
        b.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        b.onreadystatechange = function () {
            if (b.readyState == XMLHttpRequest.DONE && b.status == 200){
                var c = b.responseText;
                document.getElementById("isi_modal_detail").innerHTML = c;
                //CKEDITOR.replace('message');
                $("#Modal_Detail_Perkara").modal("show");
                $("#ModalLoading").modal("hide");
            }
        }
        b.send("id="+id);
    }
    function buka_daftar(){
        $("#Modal_Daftar_Perkara").modal("show");
        $("#Modal_Detail_Perkara").modal("hide");
    }
</script>