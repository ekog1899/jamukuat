
            <div class="row">
            
                <div class="col mr-2"><h6 class="m-0 font-weight-bold text-primary"><?php echo $title?></h6>Untuk  mendapatkan Detail Perkara, klik pada Nomor Perkara
                    <!-- <span class="icon text-dark"><i class="fas fa-exclamation-circle"></i></span> : Belum Dikirim,     
                    <span class="icon text-dark"><i class="fas fa-envelope"></i></span> : Belum Dibaca,   
                    <span class="icon text-warning ml-3"><i class="fas fa-envelope-open-text"></i></span> : Sudah dibaca, 
                    <span class="icon text-info ml-3"><i class="fas fa-spinner"></i></span> : Dalam Proses, 
                    <span class="icon text-success  ml-3"><i class="fas fa-check-circle"></i></span> : Selesai, 
                    <span class="icon text-danger ml-3"><i class="fas fa-ban"></i></span> : Ditolak -->
                </div>
                <div class="col-auto">
                   <!-- <a href="#" onclick="kpknl_tambah()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Kpknl Baru</a>-->
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-hover"  id="dataPerkara" cellspacing="0">
                    <thead>
                        <tr class="bg-primary text-light">
                            <th>No</th>
                            <?php
                                if($pengadilan_id>=1){
                                    echo "";
                                }else{
                                    echo "<th>Pengadilan Agama</th>";
                                }
                            ?>
                            <th>Nomor Perkara</th>
                            <th style="text-align: center;">Tgl Pendaftaran</th>
                            <th style="text-align: center;">Para Pihak</th>
                            <th style="text-align: center;">Tanggal Putus</th>
                            <th style="text-align: center;">Putusan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php 
                            foreach ($data_perkara as $m) : 
                            echo "<tr id='kolom_ke".$i."'>";
                            echo "<td>$i</td>";
                            if($pengadilan_id>=1){
                                echo "";
                            }else{
                                echo "<td>$m->nama_pa</td>";
                            }
                            echo "<td><a href='#' title='Detail Perkara' onclick='detail_perkara($m->id)'>$m->nomor_perkara</a></td>";
                            echo "<td style='text-align: center;'>$m->tanggalpendaftaran</td>";
                            echo "<td>$m->para_pihak</td>";
                            echo "<td style='text-align: center;'>$m->tanggalputusan</td>";
                            echo "<td style='text-align: center;'>$m->putusan</td>";
                            echo "</tr>";

                            $i++; 
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>