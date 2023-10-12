
            
            <div class="table-responsive">
                <table class="table table-striped table-hover" >
                    <tbody>
                        <?php $i = 1; ?>
                        <?php 
                            foreach ($data_nikah as $m) : 
                            echo "  <tr>
                                        <td width='200px'>KUA Kecamatan</td>
                                        <td>".$m->nama_kua."</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Akta Nikah</td>
                                        <td>".$m->nomor_akta_nikah."</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Akta Nikah</td>
                                        <td>".$m->tanggal_akta_nikah."</td>
                                    </tr>
                                    <tr>
                                        <td colspan='2'><b>Data Suami</b></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>".$m->nama_suami."</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td>".$m->tanggal_lahir_suami."</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>".$m->alamat_suami."</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>".$m->status_suami."</td>
                                    </tr>
                                    <tr>
                                        <td>Bukti Duda</td>
                                        <td>".$m->bukti_duda."</td>
                                    </tr>
                                    <tr>
                                        <td colspan='2'><b>Data Istri</b></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>".$m->nama_istri."</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td>".$m->tanggal_lahir_istri."</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>".$m->alamat_istri."</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>".$m->status_istri."</td>
                                    </tr>
                                    <tr>
                                        <td>Bukti Janda</td>
                                        <td>".$m->bukti_janda."</td>
                                    </tr> ";

                            $i++; 
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>