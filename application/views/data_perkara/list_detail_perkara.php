
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-hover"   cellspacing="0">
                   
                    <tbody>
                        <?php $i = 1; ?>
                        <?php 
                            foreach ($data_perkara as $m) : 
                            echo "<tr><td style='width:200px' class='bg-primary text-light'>Nomor Perkara</td><td>$m->nomor_perkara</td></tr>";
                            echo "<tr><td  class='bg-primary text-light'>Tanggal Pendaftaran</td><td>$m->tanggalpendaftaran</td></tr>";
                            echo "<tr><td  class='bg-primary text-light'>Jenis Perkara</td><td>$m->jenis_perkara_text</td></tr>";
                            echo "<tr><td  class='bg-primary text-light'>Para Pihak</td><td>$m->para_pihak</td></tr>";
                            echo "<tr><td  class='bg-primary text-light'>Tanggal Putusan</td><td>$m->tanggalputusan</td></tr>";
                            echo "<tr><td  class='bg-primary text-light'>Putusan</td><td>$m->putusan</td></tr>";
                            echo "<tr><td  class='bg-primary text-light'>Amar Putusan</td><td>$m->amar_putusan</td></tr>";

                            $i++; 
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>