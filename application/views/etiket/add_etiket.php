<form name='f_etiket' id='f_etiket' >
    <div class="form-group">
    <label for="exampleInputEmail1">Tentang</label>
    <select id="tentang" name="tentang" class="form-control" ><option value="" selected="selected" disabled="disabled"></option><option value="User dan Hak Akses">User dan Hak Akses</option><option value="Data">Data</option></select>
    <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id?>">
    <input type="hidden" id="name" name="name" value="<?php echo $fullname?>">
    <input type="hidden" id="email" name="email" value="<?php echo $email?>">
    <small id="tentangHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group">
    <label for="message">Pesan</label>
         <textarea name="message" id="message"></textarea>
         <small id="messageHelp" class="form-text text-muted"></small> 
    </div>
    <span class="btn btn-primary" onclick="etiket_save()">Simpan</span>
 </form>