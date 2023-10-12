<p class="w3-right"><button class="w3-btn w3-round w3-red w3-small" onclick="tutup_modal()">X</button>
<form class="w3-container" id="f_variabel" name="f_variabel"> 
	<input class="w3-input w3-border" name="var_id" id="var_id" type="hidden" value="<?php echo @$var_id ?>">
	<p><label>Nomor</label><input class="w3-input w3-border" name="var_nomor" id="var_nomor" value="<?php echo $var_nomor?>"></p>
	<p><label>Nama</label><input class="w3-input w3-border" name="var_keterangan" id="var_keterangan" value="<?php echo $var_keterangan?>"></p>
	<p>Bentuk Inputan<br>
		<select class="w3-select w3-border w3-white" id="var_jenis" name="var_jenis">
			<option value="" selected=""></option>
			<?php
				for ($i = 0; $i < count($master_variabel_jenis); ++$i){
					if($master_variabel_jenis[$i]->nama==$var_jenis){
						$terpilih="selected='selected'";
					}else{
						$terpilih="";
					}
					echo "<option $terpilih value='".$master_variabel_jenis[$i]->nama."'>".$master_variabel_jenis[$i]->nama."</option>";
				}
			?>
		</select>
	</p> 
	<p>Model<br>
		<span id="model">
			<select class="w3-select w3-border w3-white" name="var_model" id="var_model" onchange="pilih_model_variabel(this.value)">
				<option value="" selected=""></option>
				<?php
					for ($i = 0; $i < count($master_variabel_model); ++$i){
						if($master_variabel_model[$i]->var_model==$var_model){
							$terpilih="selected='selected'";
						}else{
							$terpilih="";
						}
						echo "<option $terpilih value='".$master_variabel_model[$i]->var_model."'>".$master_variabel_model[$i]->keterangan."</option>";
					}
				?>
			</select>
		</span> 
	</p> 
	<p><label>Tabel</label>
		<select name="var_tabel" id="var_tabel" class="w3-select w3-border w3-white">
			<option value=""></option>
			<option selected="selected" value="<?php echo $var_tabel?>"><?php echo $var_tabel?></option>
			<option value="data_teks">data_teks</option>
			<option value="perkara_eksekusi_ht">perkara_eksekusi_ht</option>
			<option value="perkara_eksekusi">perkara_eksekusi</option>
		</select>

	</p> 
	<p>Field<br>
		<select name="var_field" id="var_field" class="w3-select w3-border w3-white">
			<option value=""></option>
			<option selected="selected" value="<?php echo $var_field?>"><?php echo $var_field?></option>

			<option value="DATA">DATA</option>
			<option value='EKSEKUSI' disabled>EKSEKUSI HT</option>
			<option value='nomor_perkara_pn'>nomor_perkara_pn</option>
			<option value='putusan_pn'>putusan_pn</option>
			<option value='nomor_perkara_banding'>nomor_perkara_banding</option>
			<option value='putusan_banding'>putusan_banding</option>
			<option value='nomor_perkara_kasasi'>nomor_perkara_kasasi</option>
			<option value='putusan_kasasi'>putusan_kasasi</option>
			<option value='nomor_perkara_pk'>nomor_perkara_pk</option>
			<option value='putusan_pk'>putusan_pk</option>
			<option value='eksekusi_putusan'>eksekusi_putusan</option>
			<option value='nomor_urut_perkara_eksekusi'>nomor_urut_perkara_eksekusi</option>
			<option value='eksekusi_nomor_perkara'>eksekusi_nomor_perkara</option>
			<option value='eksekusi_amar_putusan'>eksekusi_amar_putusan</option>
			<option value='pihak_pemohon_eksekusi'>pihak_pemohon_eksekusi</option>
			<option value='permohonan_eksekusi'>permohonan_eksekusi</option>
			<option value='pemohon_eksekusi'>pemohon_eksekusi</option>
			<option value='para_pihak'>para_pihak</option>
			<option value='penetapan_teguran_eksekusi'>penetapan_teguran_eksekusi</option>
			<option value='nomor_penetapan_teguran_eksekusi'>nomor_penetapan_teguran_eksekusi</option>
			<option value='pelaksanaan_teguran_eksekusi'>pelaksanaan_teguran_eksekusi</option>
			<option value='penetapan_sita_eksekusi'>penetapan_sita_eksekusi</option>
			<option value='nomor_penetapan_sita_eksekusi'>nomor_penetapan_sita_eksekusi</option>
			<option value='pelaksanaan_sita_eksekusi'>pelaksanaan_sita_eksekusi</option>
			<option value='jurusita_id'>jurusita_id</option>
			<option value='jurusita_nama'>jurusita_nama</option>
			<option value='penetapan_perintah_eksekusi_lelang'>penetapan_perintah_eksekusi_lelang</option>
			<option value='pelaksanaan_eksekusi_lelang'>pelaksanaan_eksekusi_lelang</option>
			<option value='penyerahan_hasil_lelang'>penyerahan_hasil_lelang</option>
			<option value='penetapan_perintah_eksekusi_rill'>penetapan_perintah_eksekusi_rill</option>
			<option value='pelaksanaan_eksekusi_rill'>pelaksanaan_eksekusi_rill</option>
			<option value='penetapan_noneksekusi'>penetapan_noneksekusi</option>
			<option value='alasan_eksekusi'>alasan_eksekusi</option>
			<option value='catatan_eksekusi'>catatan_eksekusi</option>
			<option value='prodeo_eksekusi'>prodeo_eksekusi</option>
			<option value='status_eksekusi_id'>status_eksekusi_id</option>
			<option value='status_eksekusi_text'>status_eksekusi_text</option>
			<option value='jenis_ht_id'>jenis_ht_id</option>
			<option value='jenis_ht_text'>jenis_ht_text</option>
			<option value='tgl_sertifikat'>tgl_sertifikat</option>
			<option value='no_sertifikat'>no_sertifikat</option>
			<option value='tanggal_cabut_ht'>tanggal_cabut_ht</option>
			<option value='EKSEKUSI' disabled>EKSEKUSI </option>
			<option value='nomor_perkara_pn'>nomor_perkara_pn</option>
			<option value='putusan_pn'>putusan_pn</option>
			<option value='nomor_perkara_banding'>nomor_perkara_banding</option>
			<option value='putusan_banding'>putusan_banding</option>
			<option value='nomor_perkara_kasasi'>nomor_perkara_kasasi</option>
			<option value='putusan_kasasi'>putusan_kasasi</option>
			<option value='nomor_perkara_pk'>nomor_perkara_pk</option>
			<option value='putusan_pk'>putusan_pk</option>
			<option value='eksekusi_putusan'>eksekusi_putusan</option>
			<option value='eksekusi_nomor_perkara'>eksekusi_nomor_perkara</option>
			<option value='nomor_urut_perkara_eksekusi'>nomor_urut_perkara_eksekusi</option>
			<option value='nomor_register_eksekusi'>nomor_register_eksekusi</option>
			<option value='eksekusi_amar_putusan'>eksekusi_amar_putusan</option>
			<option value='pihak_pemohon_eksekusi'>pihak_pemohon_eksekusi</option>
			<option value='permohonan_eksekusi'>permohonan_eksekusi</option>
			<option value='pemohon_eksekusi'>pemohon_eksekusi</option>
			<option value='para_pihak'>para_pihak</option>
			<option value='penetapan_teguran_eksekusi'>penetapan_teguran_eksekusi</option>
			<option value='nomor_penetapan_teguran_eksekusi'>nomor_penetapan_teguran_eksekusi</option>
			<option value='pelaksanaan_teguran_eksekusi'>pelaksanaan_teguran_eksekusi</option>
			<option value='penetapan_sita_eksekusi'>penetapan_sita_eksekusi</option>
			<option value='nomor_penetapan_sita_eksekusi'>nomor_penetapan_sita_eksekusi</option>
			<option value='pelaksanaan_sita_eksekusi'>pelaksanaan_sita_eksekusi</option>
			<option value='jurusita_id'>jurusita_id</option>
			<option value='jurusita_nama'>jurusita_nama</option>
			<option value='penetapan_perintah_eksekusi_lelang'>penetapan_perintah_eksekusi_lelang</option>
			<option value='pelaksanaan_eksekusi_lelang'>pelaksanaan_eksekusi_lelang</option>
			<option value='penyerahan_hasil_lelang'>penyerahan_hasil_lelang</option>
			<option value='penetapan_perintah_eksekusi_rill'>penetapan_perintah_eksekusi_rill</option>
			<option value='pelaksanaan_eksekusi_rill'>pelaksanaan_eksekusi_rill</option>
			<option value='penetapan_noneksekusi'>penetapan_noneksekusi</option>
			<option value='alasan_eksekusi'>alasan_eksekusi</option>
			<option value='catatan_eksekusi'>catatan_eksekusi</option>
			<option value='prodeo_eksekusi'>prodeo_eksekusi</option>
			<option value='status_eksekusi_id'>status_eksekusi_id</option>
			<option value='status_eksekusi_text'>status_eksekusi_text</option>
			<option value='diterima_permohonan'>diterima_permohonan</option>
			<option value='panggilan_parapihak'>panggilan_parapihak</option>
			<option value='penetapan_ketua'>penetapan_ketua</option>
			<option value='sk_objek_tidak_punya_kekuatan_hukum'>sk_objek_tidak_punya_kekuatan_hukum</option>
			<option value='surat_tergugat_objek_non_executable'>surat_tergugat_objek_non_executable</option>
			<option value='panggilan_pihak_non_executable'>panggilan_pihak_non_executable</option>
			<option value='upaya_kesepakatan_kompensasi'>upaya_kesepakatan_kompensasi</option>
			<option value='penetapan_ketua_kompensasi'>penetapan_ketua_kompensasi</option>
			<option value='upaya_hukum_kma'>upaya_hukum_kma</option>
			<option value='penetapan_kma_kompensasi'>penetapan_kma_kompensasi</option>
			<option value='uangpaksa_putusan_hakim'>uangpaksa_putusan_hakim</option>
			<option value='uangpaksa_penetapan_ketua'>uangpaksa_penetapan_ketua</option>
			<option value='surat_ketua_tergugat_uangpaksa'>surat_ketua_tergugat_uangpaksa</option>
			<option value='surat_peringatan_uangpaksa'>surat_peringatan_uangpaksa</option>
			<option value='perintah_ketua_saksi_administratif'>perintah_ketua_saksi_administratif</option>
			<option value='sanksi_administratif_dari_pejabat'>sanksi_administratif_dari_pejabat</option>
			<option value='pengumuman_ketua_panitera_js'>pengumuman_ketua_panitera_js</option>
			<option value='pengumuman_media'>pengumuman_media</option>
			<option value='surat_presiden'>surat_presiden</option>
			<option value='surat_lembaga_perwakilan_rakyat'>surat_lembaga_perwakilan_rakyat</option>
			<option value='tanggal_cabut_eks'>tanggal_cabut_eks</option>

		</select>
	</p>
	<p>SQL Tampil<br>
		<textarea class="w3-input w3-border" id="var_sql_data" name="var_sql_data" rows="5"><?php echo $var_sql_data?></textarea>
	</p>
	<p>Data Default<br>
		<textarea class="w3-input w3-border" id="var_default_data" name="var_default_data" rows="5"><?php echo $var_default_data?></textarea>
	</p>
	<p><label>Nama Fungsi</label>
		<select class="w3-select w3-border w3-white" id="var_fungsi_nama" name="var_fungsi_nama">
			<option value="" selected=""></option>
				<?php
					for ($i = 0; $i < count($master_variabel_fungsi_nama); ++$i){
						if($master_variabel_fungsi_nama[$i]->nama==$var_fungsi_nama){
							$terpilih="selected='selected'";
						}else{
							$terpilih="";
						}
						echo "<option $terpilih value='".$master_variabel_fungsi_nama[$i]->nama."'>".$master_variabel_fungsi_nama[$i]->nama."</option>";
					}
				?>
		</select>
	</p> 
	<p>
		<?php
		if($var_id==""){?>
			<a onclick="kirim_post('<?php echo base_url('variabel/tambah_simpan')?>')" class="w3-button w3-green">Simpan</a>
		<?php	
		}else{?>
			<a onclick="kirim_post('<?php echo base_url('variabel/edit_simpan')?>')" class="w3-button w3-green">Simpan</a>
			<a onclick="hapus_variabel(<?php echo @$var_id ?>)" class="w3-button w3-red w3-right">Hapus</a>
		<?php	
		}?>
		
	</p>
</form>