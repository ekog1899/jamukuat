 <?php
    foreach ($help as $m) :
?>
<form name='f_help' id='f_help' >
    <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" class="form-control" id="judul" name="judul" placeholder="" value="<?php echo $m->judul?>">
        <input type="hidden" id="id" name="id" value="<?php echo $m->id?>">
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="instansi_id">Kategori Instansi</label>
                <select class="form-control" id="instansi_id" name="instansi_id">
                    <option value=""></option>
                    <?php
                        foreach ($instansi as $x) :
                            if($m->instansi_id==$x->instansi_id){
                                $terpilih=" selected='selected' ";
                            }else{
                                $terpilih="";
                            }
                            echo "<option ".$terpilih." value='".$x->instansi_id."'>".$x->nama_instansi."</option>";
                        endforeach; 
                    ?>
                </select>
            </div>
        </div>
        
        <div class="col">
            <div class="form-group">
                <label for="group_id">Group</label>
                <select class="form-control" id="group_id" name="group_id">
                    <option value=""></option>
                    <?php
                        foreach ($group as $y) :
                        if($m->group_id==$y->group_id){
                            $terpilih1=" selected='selected' ";
                        }else{
                            $terpilih1="";
                        }
                            echo "<option ".$terpilih1." value='".$y->group_id."'>".$y->nama_group."</option>";
                        endforeach; 
                    ?>
                </select>
            </div>
        </div>
    </div>
    
    <div class="form-group">
    <label for="message">Isi</label>
         <textarea name="isi" id="isi"><?php echo $m->isi?></textarea>
    </div>
    <div class="form-group">
        <label for="aktif">Status</label>
        <select class="form-control" id="aktif" name="aktif">
            <?php
                if($m->aktif=="Y"){
                    $pil1="selected='selected'";
                    $pil2="";
                }else{
                    $pil2="selected='selected'";
                    $pil1="";
                }

            ?>
            <option value="Y" <?php echo $pil1?>>Aktif</option>
            <option value="T"<?php echo $pil2?>>Non Aktif</option>
        </select>
    </div>
    <div class="form-group">
        <label for="urutan">Urutan</label>
        <input type="number" class="form-control" id="urutan" name="urutan" value="<?php echo $m->urutan?>">
    </div>
    <div class="row">
        <div class="col"><span class="btn btn-primary" onclick="help_update()">Simpan</span></div>
        <div class="col text-right"><span class="btn btn-danger" onclick="help_delete(<?php echo $m->id?>)">Hapus</span></div>
    </div>
 </form>
<?php
    endforeach;
?>