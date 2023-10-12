<form>
    <div class="form-group">
    <table class="table table-bordered table-sm table-hover" >
        <?php
            foreach ($pns as $m):
            echo "<tr><td class='bg-primary text-light' width='150px'>Nama</td><td><input class='form-control' value='".$m->nama."' onchange=edit_isi('nama',".$m->id.",this.value)></td></tr>";
            if($m->jenis_pihak==1){
                $jenis_pihak="Penggugat";
            }else{
                $jenis_pihak="Tergugat";
            }
            echo "<tr><td class='bg-primary text-light'>Jenis Pihak</td><td><input class='form-control' value='".$jenis_pihak."' readonly></td></tr>";
            echo "<tr><td class='bg-primary text-light'>NIK</td><td><input class='form-control' value='".$m->nik."' onchange=edit_isi('nik',".$m->id.",this.value)></td></tr>";
            echo "<tr><td class='bg-primary text-light'>NIP</td><td><input class='form-control' value='".$m->nip."' onchange=edit_isi('nip',".$m->id.",this.value)></td></tr>";
            echo "<tr><td class='bg-primary text-light'>Unit Kerja</td><td><select class='form-control'  onchange=edit_isi('unit_kerja',".$m->id.",this.value)>";
           
            echo "<option >--Pilih--</option>";
            foreach ($mitra as $u) :
                if($m->unit_kerja==$u->mitra_id || $m->unit_kerja==0){
                    $terpilih=" selected='selected' ";
                }else{
                    $terpilih="";
                }
                echo "<option $terpilih value='".$u->mitra_id."'>".$u->nama_satker."</option>";
            endforeach;
            echo "<option $terpilih >Unit Kerja berada di luar Pemda dan Polres di Jawa Tengah</option>";
            echo "</select>";
            echo "</td></tr>";
            echo "<tr><td class='bg-primary text-light'>Satuan Kerja</td><td><input class='form-control' value='".$m->satuan_kerja."' onchange=edit_isi('satuan_kerja',".$m->id.",this.value)></td></tr>";
            echo "<tr><td class='bg-primary text-light'>Pekerjaan</td><td><input class='form-control' value='".$m->pekerjaan."' onchange=edit_isi('pekerjaan',".$m->id.",this.value)></td></tr>";
            echo "<tr><td class='bg-primary text-light'>Alamat</td><td><input class='form-control' value='".$m->alamat."' onchange=edit_isi('alamat',".$m->id.",this.value)></td></tr>";
            echo "<tr><td class='bg-primary text-light'>Telepon</td><td><input class='form-control' value='".$m->telepon."' onchange=edit_isi('telepon',".$m->id.",this.value)></td></tr>";
            echo "<tr><td class='bg-primary text-light'>Status Izin Cerai</td><td><select class='form-control'  onchange=edit_isi('status_lapor',".$m->id.",this.value)>";
                if($m->status_lapor==1){
                    echo " <option selected='selected' value='1'>Sudah Lapor</option><option value='0'>Belum Lapor</option>";
                }else{
                    echo " <option selected='selected' value='0'>Belum Lapor</option><option value='1'>Sudah Lapor</option>";
                }
            echo "</select>";
            echo "</td></tr>";
            echo "<tr><td colspan='2' id='pesan'></td></tr>";
            endforeach; 
        ?>
    </table>
    </div>
</form>