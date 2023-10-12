<div class="container">
<div class="row right">
    <a class="btn btn-primary" target="_blank" href="<?php echo base_url("assets/tempate_buku_nikah.xlsx")?>" title="Download Template"><i class="fa fa-download" aria-hidden="true"></i> Download Template Data Nikah</a>
</div>
<br>
<div class="row">
    <p style="text-align:left">Untuk Mengupload data Pemberitahuan Nikah :<br>1. Pastikan Data yang diupload berekstensi .xlsx<br>2. Pilih Periode Nikah (Bulan dan Tahun)<br>3. Pilih File yang sudah terisi Data, dengan mengklik <b>Drag File Disini</b></p>
</div>
<div class="row">
    <p style="text-align:left">Periode : 
        <select style="padding:4px" onchange="ganti_bulan(this.value)">
            <?php
                $bulan=(int)date("m");
                for($i=1;$i<=12;$i++){
                    if($i==$bulan){
                        $selected=" selected='selected' ";
                    }else{
                        $selected="";
                    }
                    echo '<option value="'.$i.'" '.$selected.'>'.bulan($i).'</option>';
                }
            ?>
        </select>
        <input type="number" value="<?php echo date("Y")?>" style="width:75px" class="w3-margin-left" onchange="ganti_tahun(this.value)">
</p>
</div>
<div class="row">
    <form id='myDropzone' action="<?php echo base_url("data_nikah/data_nikah_unggah_prosess")?>" class='dropzone' style="width: 100%">
        <input name="bulan" id="bulan" type="hidden" value="<?php echo $bulan?>"><input name="tahun" id="tahun" type="hidden" value="<?php echo date("Y")?>"><input name="id" id="id" type="hidden" value="<?php echo $mitra_id?>"></form>
</div>
</div>