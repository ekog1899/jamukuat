<?php $i = 1;
echo '<option value=""></option>';
foreach ($daftar_kua as $m):
    echo '<option value="'.$m->kode_kua.'">'.$m->nama_kua.'</option>';
    $i++; 
endforeach; 
?>