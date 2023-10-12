<form id="form_pengguna" name="form_pengguna" method="POST">
  <input type="hidden" id="id" name="id" value="<?php echo $userid?>">
  <div class="form-group row text-danger text-center" id="error">
    
  </div>
  <div class="form-group row">
    <label for="fullname" class="col-sm-5 col-form-label">Nama Satker</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $fullname?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="username" class="col-sm-5 col-form-label">Username</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" name="username" id="username" value="<?php echo $username?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="password" class="col-sm-5 col-form-label">Password</label>
    <div class="col-sm-7">
      <input type="password" class="form-control" name="password" id="password">
    </div>
  </div>
  <div class="form-group row">
    <label for="password1" class="col-sm-5 col-form-label">Ulangi Password</label>
    <div class="col-sm-7">
      <input type="password" class="form-control" name="password1" id="password1">
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-sm-5 col-form-label">Email</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" name="email" id="email" value="<?php echo $email?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="submit" class="col-sm-5 col-form-label"> </label>
    <div class="col-sm-7">
      <a class="btn btn-primary" onclick="simpan_profil()">Simpan</a>
    </div>
  </div>
</form>