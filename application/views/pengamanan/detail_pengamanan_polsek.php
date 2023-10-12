<?php
foreach ($pengamanan as $m):
?>
<div class="row">
    <div class="col-6">
        <form>
            <div class="form-group">
            <table class="table table-bordered table-sm table-hover" >
                <?php
                    echo "<tr><td colspan=2>Permohonan</td></tr>";
                    echo "<tr><td class='bg-primary text-light'>Pengadilan Agama</td><td>".$m->pa_pemohon."</td></tr>";
                    echo "<tr><td class='bg-primary text-light'>Nomor Surat</td><td>".$m->nomor_permohonan."</td></tr>";
                    echo "<tr><td class='bg-primary text-light'>Tanggal Surat</td><td>".tanggale($m->tanggal_permohonan)."</td></tr>";
                    echo "<tr><td class='bg-primary text-light'>No Perk Eksekusi/ No Perkara</td><td>".$m->nomor_eksekusi."</td></tr>";
                    echo "<tr><td class='bg-primary text-light'>Jenis Pengamanan</td><td>".$m->jenis_pengamanan."</td></tr>";
                    echo "<tr><td class='bg-primary text-light'>Tanggal Pelaksanaan</td><td>".tanggale($m->tanggal_pelaksanaan)."</td></tr>";
                    echo "<tr><td class='bg-primary text-light'>Keterangan</td><td>".$m->keterangan."</td></tr>";
                    if(strlen($m->edoc)>=4){
                        $isi_div_edoc='<p><b>E-Doc Permohonan</b></p><embed src="'.base_url($m->edoc).'" width="100%" height="300px">';
                    }else{
                        $isi_div_edoc='';
                    }
                    echo "<tr><td colspan=2>Jawaban</td></tr>";
                    echo "<tr><td class='bg-primary text-light'>E-doc Jawaban</td><td>";
                    echo "<span class='btn text-primary  border border-primary btn-sm' onclick='tambah_edoc_jawaban(".$m->id.")'><i class='fa fa-upload'></i> Upload Dokumen Jawaban</span>";
                    echo "</td></tr>";
                    echo "<tr><td class='bg-primary text-light'>Catatan Jawaban</td><td><textarea class='form-control' onchange=edit_isi('catatan',".$m->id.",this.value)>".$m->catatan."</textarea></td></tr>";

                    if(strlen($m->edoc_jawaban)>=4){
                        $isi_div_edoc_jawaban='<p><b>E-Doc Jawaban</b></p><embed src="'.base_url($m->edoc_jawaban).'" width="100%" height="300px">';
                    }else{
                        $isi_div_edoc_jawaban='';
                    }

                    echo "<tr><td colspan=2>";
                    echo "<div id='pesan'><center></center></div>";
                    echo "<div><center><p>Silahkan Upload Dokumen Jawaban, isi Catatan Jawaban (apabila diperlukan) dan Kirim Jawaban</p>"; 
                    echo "<span class='btn btn-success btn-sm ml-2' onclick='kirim_jawaban(".$m->id.")'>Kirim Jawaban</span>";
                    echo "</center></div>";
                    echo "</td></tr>";
                    echo "<tr><td colspan=2></td></tr>";
                    echo "<tr><td class='bg-primary text-light'>Status</td><td><select class='form-control'  onchange=edit_isi('status',".$m->id.",this.value)>";
                    if($m->status==0){
                        echo "<option value=0 selected='selected'>Belum Dikirim</option>";
                        echo "<option value=1>Dikirim</option>";
                        echo "<option value=2>Dibaca</option>";
                        echo "<option value=3>Dalam Proses</option>";
                        echo "<option value=4>Selesai</option>";
                        echo "<option value=5>Ditolak</option>";
                    }else
                    if($m->status==1){
                        echo "<option value=0>Belum Dikirim</option>";
                        echo "<option value=1 selected='selected'>Dikirim</option>";
                        echo "<option value=2>Dibaca</option>";
                        echo "<option value=3>Dalam Proses</option>";
                        echo "<option value=4>Selesai</option>";
                        echo "<option value=5>Ditolak</option>";
                    }else
                    if($m->status==2){
                        echo "<option value=0>Belum Dikirim</option>";
                        echo "<option value=1>Dikirim</option>";
                        echo "<option value=2 selected='selected'>Dibaca</option>";
                        echo "<option value=3>Dalam Proses</option>";
                        echo "<option value=4>Selesai</option>";
                        echo "<option value=5>Ditolak</option>";
                    }else
                    if($m->status==3){
                        echo "<option value=0>Belum Dikirim</option>";
                        echo "<option value=1>Dikirim</option>";
                        echo "<option value=2>Dibaca</option>";
                        echo "<option value=3 selected='selected'>Dalam Proses</option>";
                        echo "<option value=4>Selesai</option>";
                        echo "<option value=5>Ditolak</option>";
                    }else
                    if($m->status==4){
                        echo "<option value=0>Belum Dikirim</option>";
                        echo "<option value=1>Dikirim</option>";
                        echo "<option value=2>Dibaca</option>";
                        echo "<option value=3>Dalam Proses</option>";
                        echo "<option value=4 selected='selected'>Selesai</option>";
                        echo "<option value=5>Ditolak</option>";
                    }else{
                        echo "<option value=0>Belum Dikirim</option>";
                        echo "<option value=1>Dikirim</option>";
                        echo "<option value=2>Dibaca</option>";
                        echo "<option value=3>Dalam Proses</option>";
                        echo "<option value=4>Selesai</option>";
                        echo "<option value=5 selected='selected'>Ditolak</option>";
                    }
                    echo "</select></td></tr>";
                    
                   
                ?>
            </table>
                <?php
                
                ?>
            </div>
        </form>
    </div>
    <div class="col-6">
        <?php echo $isi_div_edoc;?>
        <hr>
        <?php echo $isi_div_edoc_jawaban;?>
        <br>
        <br>
    </div>
    
</div>
<?php
 endforeach; 
?>