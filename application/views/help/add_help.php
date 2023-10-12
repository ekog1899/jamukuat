<form name='f_help' id='f_help' >
    <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" class="form-control" id="judul" name="judul" placeholder="">
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="instansi_id">Kategori Instansi</label>
                <select class="form-control" id="instansi_id" name="instansi_id">
                    <option value=""></option>
                    <?php
                        foreach ($instansi as $x) :
                            echo "<option value='".$x->instansi_id."'>".$x->nama_instansi."</option>";
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
                            echo "<option value='".$y->group_id."'>".$y->nama_group."</option>";
                        endforeach; 
                    ?>
                </select>
            </div>
        </div>
    </div>
    
    <div class="form-group">
    <label for="message">Isi</label>
         <textarea name="isi" id="isi"></textarea>
    </div>
    <div class="form-group">
        <label for="aktif">Status</label>
        <select class="form-control" id="aktif" name="aktif">
            <option value="Y">Aktif</option>
            <option value="T">Non Aktif</option>
        </select>
    </div>
    <div class="form-group">
        <label for="urutan">Urutan</label>
        <input type="number" class="form-control" id="urutan" name="urutan" value="99">
    </div>
    <span class="btn btn-primary" onclick="help_save()">Simpan</span>
 </form>