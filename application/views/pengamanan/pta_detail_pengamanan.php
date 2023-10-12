<form name='f_etiket' id='f_etiket' >
    <div class="form-group">
    <table class="table table-bordered table-sm table-hover" >
        <?php
            foreach ($tiket as $m):
            echo "<tr><td class='bg-primary text-light'>Dari</td><td>".$m->name."</td></tr>";
            echo "<tr><td class='bg-primary text-light'>Email</td><td>".$m->email."</td></tr>";
            echo "<tr><td class='bg-primary text-light'>Tanggal</td><td>".$m->tanggal_indo."</td></tr>";
            echo "<tr><td class='bg-primary text-light'>Tentang</td><td>".$m->tentang."</td></tr>";
            echo "<tr><td class='bg-primary text-light'>Pesan</td><td>".$m->message."</td></tr>";

            echo "<tr><td class='bg-primary text-light'>Status</td><td><input type='hidden' id='id_e_tiket' name='id_e_tiket' value='".$m->id_e_tiket."'><select class='form-control' id='status' name='status'>";
            if($status==1){
                $select1=" selected='selected' ";
                $select2="";
                $select3="";
                $select4="";
                $select5="";
            }else
            if($status==2){
                $select1="";
                $select2=" selected='selected' ";
                $select3="";
                $select4="";
                $select5="";
            }else
            if($status==3){
                $select1="";
                $select2="";
                $select3=" selected='selected' ";
                $select4="";
                $select5="";
            }else
            if($status==4){
                $select1="";
                $select2="";
                $select3="";
                $select4=" selected='selected' ";
                $select5="";
            }else{
                $select1="";
                $select2="";
                $select3="";
                $select4="";
                $select5=" selected='selected' ";
            }
            echo "<option $select1 value='1'>Dilaporkan</option>";
            echo "<option $select2 value='2'>Dibaca</option>";
            echo "<option $select3 value='3'>Dalam Proses</option>";
            echo "<option $select4 value='4'>Selesai</option>";
            echo "<option $select5 value='5'>Ditolak</option>";
            echo "</select></td></tr>";
            echo "<tr><td class='bg-primary text-light'>Jawaban</td><td><textarea name='feedback' id='feedback'>".$m->feedback."</textarea></td></tr>";
            echo "<tr><td></td><td><span class='btn btn-primary btn-sm' onclick='etiket_update(".$m->id_e_tiket.")'>Simpan</span></td></tr>";
            echo "<tr><td colspan='2'><span class='btn btn-danger btn-sm' onclick='etiket_delete(".$m->id_e_tiket.")'>Hapus</span></td></tr>";
            endforeach; 
        ?>
    </table>
    </div>
</form>