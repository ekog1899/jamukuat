<form>
    <div class="form-group">
    <div class="row "></div>
    <table class="table table-bordered table-sm table-hover" >
        <?php
            foreach ($pks as $m):
            echo "<tr><td class='bg-primary text-light' width='150px'>Instansi</td><td>".$m->instansi."</td></tr>";
            echo "<tr><td class='bg-primary text-light'>Tanggal PKS</td><td>".$m->tanggal_indo."</td></tr>";
            echo "<tr><td class='bg-primary text-light'>Nomor PKS</td><td>".$m->nomor_pks."</td></tr>";
            echo "<tr><td class='bg-primary text-light'>Softcopy</td><td>";
            if(strlen($m->softcopy_pks)>=4){
                echo "
                        <a target='_blank' title='Unduh Softcopy PKS' href='".base_url($m->softcopy_pks)."'><span class='icon text-primary'>Unduh</span></a>";
            }else{
                echo "";
            }
            echo "</td></tr>";
            echo "<tr><td class='bg-primary text-light'>Isi PKS</td><td>".$m->isi_pks."</td></tr>";
            echo "<tr><td class='bg-primary text-light'>Status</td><td>".$m->status_pks."</td></tr>";
            
            endforeach; 
        ?>
    </table>
    </div>
</form>