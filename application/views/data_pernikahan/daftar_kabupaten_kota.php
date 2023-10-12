<?php $i = 1;
echo '<option value=""></option>';
foreach ($daftar_kabupaten_kota as $m) :
    echo '<option>'.$m->kab_kota.'</option>';
    $i++; 
endforeach; 
?>