<?php $i = 1;
foreach ($daftar_provinsi as $m) :
    if($m->propinsi=="JAWA TENGAH"){
        $terpilih=' selected="selected"';
    }else{
        $terpilih=' ';
    }
    echo '<option'.$terpilih.'>'.$m->propinsi.'</option>';
    $i++; 
endforeach; 
?>