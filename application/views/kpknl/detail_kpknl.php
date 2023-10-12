<?php
foreach ($kpknl as $m):
?>
<div class="row">
    <div class="col-6">
        <form>
            <div class="form-group">
            <table class="table table-bordered table-sm table-hover" >
                
                <?php
                    echo "<tr><td colspan=2>Permohonan</td></tr>";
                    echo "<tr><td class='bg-primary text-light'>Pengadilan Agama</td><td>".$m->pa_pemohon."</td></tr>";
                    echo "<tr><td class='bg-primary text-light'>Perihal</td><td>".$m->perihal."</td></tr>";
                    echo "<tr><td class='bg-primary text-light'>Tanggal </td><td>".$m->tanggal_indo."</td></tr>";
                    echo "<tr><td class='bg-primary text-light'>EDoc</td><td>";

                    echo $softnya;
                    echo "</td></tr>";
                    echo "<tr><td class='bg-primary text-light'>Catatan</td><td>".$m->catatan_singkat."</td></tr>"; 
                    echo "<tr><td colspan=2>Jawaban</td></tr>";
                    echo "<tr><td class='bg-primary text-light'>Catatan Jawaban</td><td>".$m->catatan."</td></tr>";

                    if(strlen($m->edoc_jawaban)>=4){
                        $isi_div_edoc_jawaban='<p><b>E-Doc Jawaban</b></p><embed src="'.base_url($m->edoc_jawaban).'" width="100%" height="300px">';
                    }else{
                        $isi_div_edoc_jawaban='';
                    }

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
                echo "<div id='pesan'><center></center></div>";
                echo "<div><center>";
                
                echo "</center></div>";
                ?>
            </div>
        </form>
    </div>
    <div class="col-6">
        <?php echo $isi_div_edoc_jawaban;?>
        <br>
        <br>
    </div>
    
</div>
<?php
 endforeach; 
?>