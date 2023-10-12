<form>
    <div class="form-group">
    <div class="row "></div>
    <table class="table table-bordered table-sm table-hover" >
        <?php
            foreach ($pks as $m):
            echo "<tr><td colspan='2'><span class='btn btn-primary btn-sm text-right' onclick='pks_edit(".$m->id.")'>Edit</span></td></tr>";
            echo "<tr><td class='bg-primary text-light' width='150px'>Instansi</td><td>".$m->instansi."</td></tr>";
            echo "<tr><td class='bg-primary text-light'>Tanggal PKS</td><td>".$m->tanggal_indo."</td></tr>";
            echo "<tr><td class='bg-primary text-light'>Nomor PKS</td><td>".$m->nomor_pks."</td></tr>";
            echo "<tr><td class='bg-primary text-light'>Softcopy</td><td>";
            echo "<div class='row'>";
            if(strlen($m->softcopy_pks)>=4){
                echo "
                        <div class='col'>
                        <a target='_blank' title='Unduh Softcopy PKS' href='".base_url($m->softcopy_pks)."'><span class='icon text-primary'>Unduh</span></a>
                        </div> ";
            }else{
                echo "";
            }
            echo "<div class='col text-right'>
                        <span class='btn btn-primary btn-sm' onclick='tambah_edoc(".$m->id.")'>Unggah</span>
                        </div>";
            echo "</div>";
            echo "</td></tr>";
            echo "<tr><td class='bg-primary text-light'>Isi PKS</td><td>".$m->isi_pks."</td></tr>";
            echo "<tr><td class='bg-primary text-light'>Status</td><td>".$m->status_pks."</td></tr>";
            echo "<tr><td colspan='2'><span class='btn btn-danger btn-sm' onclick='pks_delete(".$m->id.")'>Hapus</span></td></tr>";
            
            endforeach; 
        ?>
    </table>
    </div>
</form>