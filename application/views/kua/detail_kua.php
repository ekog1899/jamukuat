<form>
    <div class="form-group">
    <table class="table table-bordered table-sm table-hover" >
        <?php
            foreach ($kua as $k):
            echo "<input type='hidden' id='id' name='id' value=".$k->id.">";
            echo "<tr><td class='bg-primary text-light' width='150px'>Nomor Perkara</td><td width='5px'>:</td><td>".$k->nomor_perkara."</td></tr>";
            echo "<tr>
            <td class='bg-primary text-light' width='150px'>Nama</td>
            <td width='5px'>:</td>
            <td>".$k->nama_pihak1."</td>
            </tr>";
            echo "<tr>
            <td class='bg-primary text-light'>NIK</td>
            <td>:</td>
            <td>".$k->nik_pihak1."</td>
            </tr>";
            echo "<tr>
            <td class='bg-primary text-light'>Tempat/<br>Tanggal Lahir</td>
            <td>:</td>
            <td>".$k->tempatlahir_pihak1." / ".$k->tgl_lahir_pihak1."</td>
            </tr>";
            echo "<tr>
            <td class='bg-primary text-light'>Alamat</td>
            <td>:</td>
            <td>".$k->alamat_pihak1."</td>
            </tr>";
            echo "<tr>
            <td class='bg-primary text-light'></td>
            <td></td>
            <td><strong>Sebagai Penggugat/Pemohon</strong></td>
            </tr>";
            echo "<tr>
            <td class='bg-primary text-light'>Nama</td>
            <td>:</td>
            <td>".$k->nama_pihak2."</td>
            </tr>";
            echo "<tr>
            <td class='bg-primary text-light'>NIK</td>
            <td>:</td>
            <td>".$k->nik_pihak2."</td>
            </tr>";
            echo "<tr>
            <td class='bg-primary text-light'>Tempat/<br>Tanggal Lahir</td>
            <td>:</td>
            <td>".$k->tempatlahir_pihak2." / ".$k->tgl_lahir_pihak2."</td>
            </tr>";
            echo "<tr>
            <td class='bg-primary text-light'>Alamat</td>
            <td>:</td>
            <td>".$k->alamat_pihak2."</td>
            </tr>";
            echo "<tr>
            <td class='bg-primary text-light'></td>
            <td></td>
            <td><strong>Sebagai Tergugat/Termohon</strong></td>
            </tr>"; 
        ?>
    </table>
    <table class="table table-bordered table-sm table-hover" >
        <?php
        if($k->jenis_perkara_id==347){

            echo "<tr><td class='bg-primary text-light' width='150px'>Amar Putusan</td><td width='5px'>:</td><td>".$k->amar_putusan."</td></tr>";
        }else{

            echo "<tr><td class='bg-primary text-light' width='150px'>Tanggal<br>Ikrar Talak</td><td width='5px'>:</td><td>".$k->tgl_ikrartalak."</td></tr>";
            echo "<tr><td class='bg-primary text-light'>Amar Ikrar Talak</td><td>:</td><td>".$k->amar_ikrar_talak."</td></tr>";
        }
        ?>
    </table>
    <table class="table table-bordered table-sm table-hover" >
        <?php
            echo "<tr><td class='bg-primary text-light' width='150px'>Tanggal Inkrah</td><td>:</td><td>".$k->tgl_bht."</td></tr>";
            if($k->perceraian_ke==null){
                echo "<tr><td class='bg-primary text-light'>Perceraian Ke-</td><td width='5px'>:</td><td>-</td></tr>";
            }else{
            echo "<tr><td class='bg-primary text-light'>Perceraian Ke-</td><td width='5px'>:</td><td>".$k->perceraian_ke."</td></tr>";
            }
            echo "<tr><td class='bg-primary text-light'>Keadaan Istri</td><td width='5px'>:</td>";
            if($k->qobla_bada==0){
                echo "<td>Qobla Dukhul</td>";
            }elseif($k->qobla_bada==1){
                echo "<td>Ba'da Dukhul</td>";
            }else{
                echo "<td>-</td>";
            }
            echo "</tr>";
            echo "<tr><td class='bg-primary text-light'>Kondisi Istri</td><td width='5px'>:</td>";
            if($k->keadaan_istri==1){
                echo "<td>Suci</td>";
            }elseif($k->keadaan_istri==2){
                echo "<td>Haid</td>";
            }elseif($k->keadaan_istri==3){
                echo "<td>Hamil</td>";
            }elseif($k->keadaan_istri==4){
                echo "<td>Tidak diketahui</td>";
            }else{
                echo "<td>-</td>";
            }
            echo "</tr>";
        ?>
    </table>
    <div class="input-group-append">
        <?php
    echo "<a target='_blank' title='Cetak Pdf' class='btn btn-danger' href='".base_url("kua/kua_detail_pdf/".$k->id)."'><i class='fas fa-print' title='cetak pdf'> Cetak</i></a>";
            endforeach;
            ?>
            </div>
    </div>
</form>