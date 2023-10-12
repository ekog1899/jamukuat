<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    

                    <!-- DataTales Example -->
					<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <!--<?= $this->session->flashdata('message'); ?>-->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DAFTAR PERKARA EKSEKUSI <?=$namasatker?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm table-hover table-condensed" id="dataTable" width="100%" cellspacing="1">
                                    <thead>
                                        <tr class="bg-primary text-light">
                                            <th>No</th>
                                            
                                            <th>Nomor Perkara</th>
                                            <th>Nomor Permohonan Eksekusi</th>
                                            <th>Tanggal Permohonan</th>
                                            <th>Status</th>
                                            <th>Link</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        
                                   
										
										<?php $i = 1; ?>
									<?php foreach ($data as $m) : ?>
                                        <tr >
                                            <td><?= $i; ?></td>
                                            
                                            <td> <?= $m->nomorPkr; ?></td>
                                            <td> <?= $m->nomorRekEks; ?></td>
                                        
                                            <td> <?= date('d F Y', strtotime($m->tglPermohonan)); ?></td>
                                            <?php 
											$url2 = '102/'.$satker.'/'.$m->idPkr;
											$enc = base64_encode($this->encrypt->encode($url2));
											
											?>
											
                                            <td>
                                                <?php
                                                    if(strlen($m->status_eksekusi_text)<=6){
                                                        $status="Dalam Proses";
                                                    }else{
                                                        $status=$m->status_eksekusi_text;
                                                    }
                                                    echo $status;
                                                ?>
                                            
                                            </td>
											
                                            <td> <a href="<?php echo base_url('data_eksekusi/daftarperkara_detil/'.$enc.'') ?>">[ Detil ]</a></td>
                                        </tr >
                                    <?php $i++; ?>
									<?php endforeach; ?>  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->