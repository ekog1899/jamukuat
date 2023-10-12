
            <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-hover"  id="dataNikah" cellspacing="0">
                    <thead>
                        <tr class="bg-primary text-light">
                            <th>No</th>
                            <th>KUA</th>
                            <th>No Akta Nikah<br>Tanggal</th>
                            <th>Nama Suami<br>Status<br>Bukti Duda</th>
                            <th>Alamat</th>
                            <th>Nama Istri<br>Status<br>Bukti Janda</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php 
                            foreach ($data_nikah as $m) : 
                            echo "<tr id='kolom_ke".$i."'>";
                            echo "<td>$i</td>";
                            echo "<td>".str_replace("KUA ", " ",str_replace("KANTOR URUSAN AGAMA ", " ",str_replace("KANTOR URUSAN AGAMA KECAMATAN ", " ", strtoupper($m->nama_kua))))."</td>";
                            echo "<td><span class='text-primary' style='cursor:pointer' title='Detail Data' onclick='detail_data_nikah($m->data_nikah_id)'><b>$m->nomor_akta_nikah</b></span><br>$m->tanggalaktanikah</td>";
                            echo "<td>$m->nama_suami<br>$m->status_suami<br>$m->bukti_duda</td>";
                            echo "<td>$m->alamat_suami</td>";
                            echo "<td>".$m->nama_istri."<br>$m->status_istri<br>$m->bukti_janda</td>";
                            echo "<td>$m->alamat_istri</td>";
                            echo "</tr>";

                            $i++; 
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>

            </div>