<form>
    <div class="form-group">
    <table class="table table-bordered table-sm table-hover" >
        <?php
            foreach ($tiket as $m):
            echo "<tr><td class='bg-primary text-light'>Dari</td><td>".$m->name."</td></tr>";
            echo "<tr><td class='bg-primary text-light'>Email</td><td>".$m->email."</td></tr>";
            echo "<tr><td class='bg-primary text-light'>Tanggal</td><td>".$m->tanggal_indo."</td></tr>";
            echo "<tr><td class='bg-primary text-light'>Tentang</td><td>".$m->tentang."</td></tr>";
            echo "<tr><td class='bg-primary text-light'>Pesan</td><td>".$m->message."</td></tr>";

            echo "<tr><td class='bg-primary text-light'>Status</td><td>";
            if($m->status==1){
                echo "Dilaporkan";
            }else
            if($m->status==2){
                echo "Dibaca";
            }else
            if($m->status==3){
                echo "Dalam Proses";
            }else
            if($m->status==4){
                echo "Selesai";
            }else{
                echo "Ditolak";
            }
            echo "</td></tr>";
            if(strlen($m->feedback)>=3){
                echo "<tr><td class='bg-primary text-light'>Jawaban</td><td>".$m->feedback."</td></tr>";
            }
            if(strlen($m->feedback)>=3){
                echo "<tr><td class='bg-primary text-light'>Dijawab oleh</td><td>".$m->diedit_oleh."</td></tr>";
            }
            if(strlen($m->feedback)>=3){
                echo "<tr><td class='bg-primary text-light'>Dijawab pada</td><td>".$m->diedit_tanggal."</td></tr>";
            }
            if($m->status==1){
                echo "<tr><td colspan='2'><span class='btn btn-danger btn-sm' onclick='etiket_delete(".$m->id_e_tiket.")'>Hapus</span></td></tr>";
            }
            endforeach; 
        ?>
    </table>
    </div>
</form>