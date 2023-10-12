<center><h6 class="m-0 font-weight-bold text-primary">EDIT PENGGUNA</h6></center>
<br />
<form action="<?php echo base_url('Pengguna/simpan_pengguna');?>" method="POST">
  <!--<div class="form-group row">
    <label for="group" class="col-sm-2 col-form-label">Instansi</label>
    <div class="col-sm-10">
      <select id="group" name="group"  class="form-control">
            <option value="">--pilih instansi--</option>
            <option value="0">PTA</option>
            <option value="1">Pengadilan Agama</option>
            <option value="3">ATR/ BPN</option>
            <option value="4">KPKNL</option>
            <option value="5">Polda</option>
            <option value="6">Polres</option>
            <option value="7">Polsek</option>
            <option value="8">Propinsi</option>
            <option value="9">Kabupaten/ Kota</option>
            <option value="10">Kecamatan</option>
            <option value="11">Kelurahan/ Desa</option>
            <?php
            for ($h = 0; $h < count($instansi); ++$h){
          if($group===$instansi[$h]->group_id){
            $key='selected=""';
          }else {
            $key='';
          }
          echo '<option value="'.$instansi[$h]->group_id.'" '.$key.'>'.$instansi[$h]->nama_group.'</option>';
        }
            ?>
      </select>
    </div>
  </div>-->
  <input type="hidden" id="id" name="id" value="<?php echo $userid?>">
 
  <!---<div class="form-group row">
    <label for="fullname" class="col-sm-2 col-form-label">Nama Satker</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $fullname?>">
    </div>
  </div>--->
  <div class="form-group row">
    <label for="username" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="username" id="username" value="<?php echo $username?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="password" id="password" value="<?php echo $password?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="email" id="email" value="<?php echo $email?>">
    </div>
  </div>

      <input type="hidden" class="form-control" name="aksi" value="edit">
  <div class="form-group row">
    <label for="submit" class="col-sm-2 col-form-label"> </label>
    <div class="col-sm-10">
      <button class="btn btn-primary" onclick="simpan_pengguna()">Simpan</button>
    </div>
  </div>
</form>