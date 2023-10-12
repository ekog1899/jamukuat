			
            <?php $i = 1; ?>
            <?php foreach ($permohonan as $dt) : ?>
			<div class="card shadow mb-4">
                <div class="card-header py-3">
                    <!--ikitambahan-->
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo $dt->nama_mitra?> </h6>
                    <!--ikitambahan-->
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo $dt->perihal?> </h6>
                    <button class="btn text-success float-right border border-success mr-3" onclick="kirim_permohonan(<?php echo $dt->id?>)"><i class="fa fa-share-square"></i> Kirim</button> <button class="btn text-danger  float-right border border-danger mr-3" onclick="hapus_permohonan(<?php echo $dt->id?>)"><i class="fa fa-trash-alt"></i> Hapus Permohonan</button> <!--<button class="btn float-right border border-secondary mr-3" onclick="edit_permohonan(<?php echo $dt->id?>)"><i class="fa fa-edit"></i> Edit Permohonan</button> -->
                </div>
                <div class="card-body">
                	<table>
                		<tr><td>Tanggal Surat </td><td>:</td><td><?php echo tanggale($dt->tanggal)?></td></tr>
                		<tr><td>Catatan</td><td>:</td><td><?php echo $dt->catatan_singkat?></td></tr>
                	</table>
                    <table class="table table-bordered table-bordered table-sm  text-xsmall table-condensed" id="tbl_sidang_aanmaning" width="100%" cellspacing="1">
                        <tbody>
                            <thead>
                                <tr class="bg-primary text-light">                           
                                    <td style="width: 5%;" >No</td>
                                    <td style="width: 60%;" >Nama Dokumen </td>
                                    <td style="width: 20%;" class="text-center">Link</td>
                                    <td style="width: 15%;" ></td>
                                </tr>
                            </thead>
                            <?php
                            	$p_ambil="SELECT * FROM data_dokumen WHERE data_permohonan_id=".$dt->id;
								$exe_ambil=$this->db->query($p_ambil); 
								$nomonya=0;
								foreach($exe_ambil->result_array() as $h) {
									$nomonya++;
									?>
									<tr>                                      
                                    <td><?php echo $nomonya; ?></td>
                                    <td><?php echo  $h["nama_dokumen"]; ?></td>
                                    <td class="text-center"><a target="_blank" href="<?php echo base_url().$h["link"]?>" class="btn text-primary  border border-primary"><i class="fa fa-file-pdf"></i> Unduh</a></td>
                                    <td class="text-center"><button class="btn text-danger  border border-danger" onclick="hapus_dokumen(<?php echo $h["id"]?>)" ><i class="fa fa-trash-alt"></i> Hapus</button></td>
                                </tr>	

									<?php  
								}
							?> 							
                        </tbody>
                    </table>
                    <button class="btn text-primary  border border-primary" onclick="tampil_modalupload(<?php echo $dt->id?>)"><i class="fa fa-upload"></i> Tambah Dokumen</button>
                </div>
            </div>	

                            
                                <?php $i++; ?>
                            <?php endforeach; ?>
<hr>
                            <button class="btn text-primary border border-primary" onclick="tambah_permohonan(<?php echo $instansi_id?>)"><i class="fa fa-plus-circle"></i> Tambah Permohonan</button>