<form>
    <div class="form-group">
    <div class="row "></div>
    <table class="table table-bordered table-sm table-hover" >
        <?php
            foreach ($pns as $m):
            #echo "<tr><td colspan='2'><span class='btn btn-primary btn-sm text-right' onclick='pns_edit(".$m->id.")'>Edit</span></td></tr>";
            echo "<tr><td class='bg-primary text-light' width='150px'>Nama</td><td>".$m->nama."</td></tr>";
            if($m->jenis_pihak==1){
                $jenis_pihak="Penggugat";
            }else{
                $jenis_pihak="Tergugat";
            }
            echo "<tr><td class='bg-primary text-light'>Jenis Pihak</td><td>$jenis_pihak</td></tr>";
            echo "<tr><td class='bg-primary text-light'>NIK</td><td>".$m->nik."</td></tr>";
            echo "<tr><td class='bg-primary text-light'>NIP</td><td>".$m->nip."</td></tr>";
            echo "<tr><td class='bg-primary text-light'>Unit Kerja</td><td>".$m->nama_satker."</td></tr>";
            echo "<tr><td class='bg-primary text-light'>Satuan Kerja</td><td>".$m->satuan_kerja."</td></tr>";
            echo "<tr><td class='bg-primary text-light'>Pekerjaan</td><td>".$m->pekerjaan."</td></tr>";
            echo "<tr><td class='bg-primary text-light'>Alamat</td><td>".$m->alamat."</td></tr>";
            echo "<tr><td class='bg-primary text-light'>Telepon</td><td>".$m->telepon."</td></tr>";
            if($m->status_lapor==1){
                $status_lapor="Sudah Lapor";
            }else{
                $status_lapor="Belum Lapor";
            }
             echo "<tr><td class='bg-primary text-light'>Status Izin Cerai</td><td><select class='form-control'  onchange=edit_isi('status_lapor',".$m->id.",this.value)>";
                if($m->status_lapor==1){
                    echo " <option selected='selected' value='1'>Sudah Lapor</option><option value='0'>Belum Lapor</option>";
                }else{
                    echo " <option selected='selected' value='0'>Belum Lapor</option><option value='1'>Sudah Lapor</option>";
                }
            echo "</select>";
            echo "</td></tr>";
            echo "<tr><td class='bg-primary text-light'>Softcopy</td><td>";
            echo "<div class='row'>";
            if(strlen($m->softcopy_izin)>=4){
                echo "
                        <div class='col'>
                        <a target='_blank' title='Unduh Softcopy Izin' href='".base_url($m->softcopy_izin)."'><span class='icon text-primary'>Unduh</span></a>
                        </div> ";
            }else{
                echo "<div style='color:red;' class='col'>Belum Upload</div>";
            }
            echo "<div class='col text-right'>
                        <span class='btn btn-primary btn-sm' onclick='tambah_edoc(".$m->id.")'>Unggah</span>
                        </div>";
            echo "</td></tr>";
            #echo "<tr><td colspan='2'><span class='btn btn-danger btn-sm' onclick='pns_delete(".$m->id.")'>Hapus</span></td></tr>";
            echo "<tr><td colspan='2' id='pesan'></td></tr>";
            
            endforeach; 
        ?>
    </table>
    </div>
</form>