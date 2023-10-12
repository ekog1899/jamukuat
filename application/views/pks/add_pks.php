<form name='f_pks' id='f_pks' >
    <div class="form-group">
    <label for="exampleInputEmail1">Instansi Terkait</label>
    <input type="text" class="form-control" id="instansi" name="instansi" placeholder="">
    <input type="hidden" id="pa_id" name="pa_id" value="<?php echo $pa_id?>">
    <input type="hidden" id="diinput_oleh" name="diinput_oleh" value="<?php echo $username?>">
    </div>
    <div class="form-group">
    <label for="tanggal_pks">Tanggal PKS</label>
        <input type="date" class="form-control" id="tanggal_pks" name="tanggal_pks" placeholder="">
    </div>
    <div class="form-group">
    <label for="tanggal_pks">Nomor PKS</label>
        <input type="text" class="form-control" id="nomor_pks" name="nomor_pks" placeholder="">
    </div>
    <div class="form-group">
    <label for="status_pks_id">Status</label>
        <select id="status_pks_id" name="status_pks_id" class="form-control">
            <option value="" selected="selected"></option>
            <?php
                foreach ($statuse as $m) :
                    echo " <option value='".$m->status_pks_id."'>".$m->status_pks."</option>";
                endforeach;     
            ?>
        </select>
    </div>
    <div class="form-group">
    <label for="tanggal_pks">Isi PKS</label>
        <textarea class="form-control" id="isi_pks" name="isi_pks"></textarea>
    </div>
    <span class="btn btn-primary" onclick="pks_save()">Simpan</span>
 </form>