<form>
    <div class="form-group">
    <table class="table table-bordered table-sm table-hover" >
        <?php
            foreach ($pks as $m):
            echo "<tr><td class='bg-primary text-light' width='150px'>Instansi</td><td><input class='form-control' value='".$m->instansi."' onchange=edit_isi('instansi',".$m->id.",this.value)></td></tr>";
            echo "<tr><td class='bg-primary text-light'>Tanggal PKS</td><td><input type='date' class='form-control' value='".$m->tanggal_pks."' onchange=edit_isi('tanggal_pks',".$m->id.",this.value)></td></tr>";
            echo "<tr><td class='bg-primary text-light'>Nomor PKS</td><td><input class='form-control' value='".$m->nomor_pks."' onchange=edit_isi('nomor_pks',".$m->id.",this.value)></td></tr>";
            
            echo "<tr><td class='bg-primary text-light'>Isi PKS</td><td><textarea class='form-control' onchange=edit_isi('isi_pks',".$m->id.",this.value)>".$m->isi_pks."</textarea></td></tr>";
            echo "<tr><td class='bg-primary text-light'>Status</td><td><select class='form-control'  onchange=edit_isi('status_pks_id',".$m->id.",this.value)>";
            foreach ($statuse as $mm) :
                if($m->status_pks_id==$mm->status_pks_id){
                    $terpilih=" selected='selected' ";
                }else{
                    $terpilih="";
                }
                echo " <option $terpilih value='".$mm->status_pks_id."'>".$mm->status_pks."</option>";
            endforeach; 
            echo "</select>";
            echo "</td></tr>";
            echo "<tr><td colspan='2' id='pesan'></td></tr>";
            endforeach; 
        ?>
    </table>
    </div>
</form>