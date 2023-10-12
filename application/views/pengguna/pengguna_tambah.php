<center><h6 class="m-0 font-weight-bold text-primary">TAMBAH PENGGUNA</h6></center>
<br />
<form  action="<?php echo base_url('Pengguna/simpan_pengguna');?>" method="POST">
  <!--<div class="form-group row">
    <label for="group" class="col-sm-2 col-form-label">Instansi</label>
    <div class="col-sm-10">
      <select id="group" name="group"  class="form-control">
            <option value="">--pilih instansi--</option>
            <?php
        		for ($h = 0; $h < count($instansi); ++$h){
        			
					echo '<option value="'.$instansi[$h]->group_id.'" '.$key.'>'.$instansi[$h]->nama_group.'</option>';
				}
            ?>
      </select>
    </div>
  </div>-->
  <input type="hidden" id="pa_id" name="pa_id" value="<?php echo $pa_id?>">
  <div class="form-group row">
    <label for="fullname" class="col-sm-2 col-form-label">Instansi</label>
    <div class="col-sm-10">
      <select id="mitra_id" name="mitra_id"  class="form-control" required>
            <option value="" disabled="">--pilih instansi--</option>
            <?php
                for ($i = 0; $i < count($mitra2); ++$i){

                    echo '<option value="'.$mitra2[$i]->mitra_id.'" '.$terpilih.'>'.$mitra2[$i]->nama_satker.'</option>';
                }
            ?>
      </select>
    </div>
  </div>
  <!---<div class="form-group row">
    <label for="fullname" class="col-sm-2 col-form-label">Nama Satker</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="fullname" name="fullname" placeholder="isi nama satker" value="">
    </div>
  </div>-->
  <div class="form-group row">
    <label for="username" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="username" id="username" placeholder="isi username" value="">
    </div>
  </div>
  <div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="password" id="password" value="<?php echo random_string('alnum',6) ?>">
      <span style="color: red">*/ password akan generate secara default silahkan edit jika tidak berkenan</span>
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="email" id="email" placeholder="isi alamat email" value="">
    </div>
  </div>

      <input type="hidden" class="form-control" name="aksi" value="tambah">
  <div class="form-group row">
    <label for="submit" class="col-sm-2 col-form-label"> </label>
    <div class="col-sm-10">
      <button class="btn btn-primary" onclick="simpan_pengguna()">Simpan</button>
    </div>
  </div>
</form>
