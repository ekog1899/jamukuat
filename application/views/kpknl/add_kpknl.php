
<form name='f_pengamanan' id='f_pengamanan' role='form'>
    <div class="form-group" style="display: none;">
        <label for="tanggal_permohonan">Tanggal Surat</label>
        <input type="date" class="form-control" id="tanggal_permohonan" name="tanggal_permohonan" placeholder="">
    </div>
    <div class="form-group" style="display: none;">
        <label for="nomor_permohonan">Nomor Surat</label>
        <input type="text" class="form-control" id="nomor_permohonan" name="nomor_permohonan" placeholder="">
    </div>
    <div class="form-group" style="display: none">
        <label for="exampleInputEmail1">Tentang</label>
        <input type="text" class="form-control" id="tentang" name="tentang" placeholder="">
        <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id?>">
        <input type="hidden" id="pa_pemohon" name="pa_pemohon" value="<?php echo $pa_pemohon?>">
        <input type="hidden" id="pa_pemohon_id" name="pa_pemohon_id" value="<?php echo $pa_pemohon_id?>">
        <input type="hidden" id="pa_pemohon_id" name="pa_pemohon_id" value="<?php echo $pa_pemohon_id?>">
        <input type="hidden" id="jenis_pengamanan_id" name="jenis_pengamanan_id" value="">
        <input type="hidden" id="jenis_pengamanan" name="jenis_pengamanan" value="">
     </div>
    <div class="form-group">
        <label for="pilihan_jenis_pengamanan">Jenis Pengamanan</label>
        <select  class="form-control" class="form-control" id="pilihan_jenis_pengamanan" onchange="pilih_jenis_pengamanan(this.value)">
            <option value=""></option>
            <?php
                foreach ($jenis_pengamanan as $m):
                    echo '<option value="'.$m->jenis_pengamanan_id.'^'.$m->jenis_pengamanan.'">'.$m->jenis_pengamanan.'</option>';
                endforeach; 
            ?>
        </select>
        <input  type="hidden" id="pa_pemohon_id" name="pa_pemohon_id" value="<?php echo $pa_pemohon_id?>">
        <input type="hidden" id="pa_pemohon" name="pa_pemohon" value="<?php echo $pa_pemohon?>">
        <input type="hidden" id="mitra_id" name="mitra_id" value="">
        <input type="hidden" id="nama_mitra" name="nama_mitra" value="">
        <input type="hidden" id="email_satker" name="email_satker" value="">
        <input type="hidden" id="wa_satker" name="wa_satker" value="">
    </div>
    <div class="form-group">
        <label for="pilihan_instansi">Instansi</label>
        <select  id="pilihan_instansi" onchange="pilih_instansi(this.value)">
            <option value="-"></option>
            <?php
                foreach ($instansi_pengamanan as $m):
                    echo '<option value="'.$m->mitra_id .'^'.$m->nama_satker .'^'.$m->email_satker .'^'.$m->wa_satker .'">'.$m->nama_satker.'</option>';
                endforeach; 
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="nomor_eksekusi">Nomor Perkara Eksekusi</label>
         <select  id="nomor_eksekusi" name="nomor_eksekusi">
            <option value="-"></option>
            <?php
                foreach ($nomor as $m):
                    echo '<option value="'.$m->nomor .'">'.$m->nomor.'</option>';
                endforeach; 
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="tanggal_pelaksanaan">Tanggal Pelaksanaan</label>
        <input type="date" class="form-control" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan" placeholder="">
    </div>
    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
    </div>
    <span class="btn btn-primary" onclick="pengamanan_save()">Simpan</span>
 </form>