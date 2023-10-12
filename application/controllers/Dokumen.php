<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Dokumen extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Dokumen_m');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
        $this->basic->squrity();
	}

	public function index(){
		$data_header['title'] = 'Master Variabel';
		$data["variabel"]=$this->Dokumen_m->get_all_data("master_variabel");
		$this->load->view('dokumen/header', $data_header);
		$this->load->view('dokumen/variabel', $data);
		$this->load->view('dokumen/footer');
	}
	public function blangko(){
		$data_header['title'] = 'Master BLangko';
		$data["variabel"]=$this->Dokumen_m->get_all_data("jenis_blangko");
		$this->load->view('dokumen/header', $data_header);
		$this->load->view('dokumen/blangko', $data);
		$this->load->view('dokumen/footer');
	}
	public function blangko_list($jenis_eksekusi){
		$data["variabel"]=$this->Dokumen_m->get_all_data("jenis_blangko");
		$this->load->view('dokumen/header', $data_header);
		$this->load->view('dokumen/blangko', $data);
		$this->load->view('dokumen/footer');
	}
	public function kode(){
		$a=$this->security->get_csrf_token_name();
		$b=$this->security->get_csrf_hash();;
		$isi='<input type="" id="kodene_sie" value="'.$a.'"><input type="" id="isi_kodene_sie" value="'.$b.'">';
		echo $isi;
	}
	public function update_data(){
		if(is_null($this->input->post('perkara_id'))){
			$var_nomor= $this->input->post('var_nomor');
			$data=array('DATA'=>$this->input->post('DATA'));
			$DATA=$this->input->post('DATA');
			$ht_id= $this->input->post('ht_id');
			$pa_id= $this->input->post('pa_id');
			$where="var_nomor='".$var_nomor."'";
			$datanya=$this->Dokumen_m->get_data_where($where, "master_variabel");
			$var_tabel=$datanya[0]->var_tabel;
			$var_field=$datanya[0]->var_field;
			if($var_tabel<>"" AND $var_field<>""){
				if($var_tabel=="data_teks"){
					$whereconditon="var_nomor='$var_nomor' AND ht_id=$ht_id AND pa_id=$pa_id ";
					//echo $whereconditon;
					$sql="REPLACE INTO data_teks (var_nomor, pa_id, ht_id, DATA) VALUES ('$var_nomor','$pa_id','$ht_id','$DATA')";
				}else{
					$whereconditon=" ht_id=$ht_id AND pa_id=$pa_id ";
					//echo $whereconditon;
					$sql="UPDATE $var_tabel SET $var_field='$DATA' WHERE $whereconditon";
				}

				$this->Dokumen_m->jalankan_data_sql($sql);
				echo "Edit Data HT sudah dilakukan";
			}
		}else{
			$var_nomor= $this->input->post('var_nomor');
			$data=array('DATA'=>$this->input->post('DATA'));
			$DATA=$this->input->post('DATA');
			$perkara_id= $this->input->post('perkara_id');
			$pa_id= $this->input->post('pa_id');
			$where="var_nomor='".$var_nomor."'";
			$datanya=$this->Dokumen_m->get_data_where($where, "master_variabel");
			$var_tabel=$datanya[0]->var_tabel;
			$var_field=$datanya[0]->var_field;
			if($var_tabel<>"" AND $var_field<>""){
				if($var_tabel=="data_teks"){
					$whereconditon="var_nomor='$var_nomor' AND perkara_id=$perkara_id AND pa_id=$pa_id ";
					//echo $whereconditon;
					$sql="REPLACE INTO data_teks (var_nomor, pa_id, perkara_id, DATA) VALUES ('$var_nomor','$pa_id','$perkara_id','$DATA')";
				}else{
					$whereconditon=" perkara_id=$perkara_id AND pa_id=$pa_id ";
					//echo $whereconditon;
					$sql="UPDATE $var_tabel SET $var_field='$DATA' WHERE $whereconditon";
				}
				$this->Dokumen_m->jalankan_data_sql($sql);
				echo "Edit Data sudah dilakukan";
			}

		}
	}
	public function tampilan_blangko(){		
		$db_host2="xxx";
		$id_sidang="xxx";
		$template_id= base64_decode($this->input->post('id'));
		$ht_id= base64_decode($this->input->post('ht_id'));
		$pa_id= base64_decode($this->input->post('pa_id'));
		//$template_id=base64_decode($template_id);
		//$ht_id=base64_decode($ht_id);
		//$pa_id=base64_decode($pa_id);
		$where='id='.$template_id;
		$data_blangko=$this->Dokumen_m->get_data_where($where,"template_dokumen");
		$source_file="template/".$data_blangko[0]->kode.".rtf";
		$template=file_get_contents($source_file);
		$kode_dokumen=$data_blangko[0]->kode;
		$variabel = $this->variabel_dokumen($template);
		$jml_variabel= count($variabel);$no=0;
		echo "<form name='frm_cetak' id='frm_cetak' action='".base_url("dokumen/cetak")."' method=POST>";
		//$a=$this->security->get_csrf_token_name();
		//$b=$this->security->get_csrf_hash();		
		echo "<input type='hidden' name='".$a."' value='".$b."'>";
		echo "<input type='hidden' name='template_id' value='".$template_id."'>";
		echo "<input type='hidden' name='ht_id' id='ht_id' value='".$ht_id."'>";
		echo "<center><b>File Blangko : ".$kode_dokumen."</b></center>";
		echo "<table class='table table-striped'><tr><th style='width:300px;'>Keterangan</th><th>Data</th></tr>";
		for ($variabel_posisi = 0; $variabel_posisi < $jml_variabel; $variabel_posisi++){
			$no++; 
			$variabelnya=$variabel[$variabel_posisi]; 
			//echo $variabelnya."<br>";
			$where='var_nomor='.$variabelnya;
			$data_variabel=$this->Dokumen_m->get_data_where($where,"master_variabel");
			if(count($data_variabel)==0){
				echo "Variabel <b>".$variabelnya."</b> belum tersedia";
			}else{
				$var_model=@$data_variabel[0]->var_model;
				$var_sumber_sipp=$data_variabel[0]->var_sumber_sipp;
				$var_sql_data=$data_variabel[0]->var_sql_data;
				$var_tabel=$data_variabel[0]->var_tabel;
				$var_field=$data_variabel[0]->var_field;
				$var_cek_sidang=$data_variabel[0]->var_cek_sidang;
				$var_fungsi_nama=$data_variabel[0]->var_fungsi_nama;
				$var_default_data=$data_variabel[0]->var_default_data;
				$var_keterangan=$data_variabel[0]->var_keterangan;
				$var_nomor=$data_variabel[0]->var_nomor;
				$var_jenis=$data_variabel[0]->var_jenis;
				if($var_model<>"tanya_jawab"){
					//echo "string";
					$isi="";
					//echo $var_sql_data;exit;
					$isi=$this->isi_variabel($variabelnya, $ht_id, $var_model,  $var_jenis, $var_sumber_sipp, $var_sql_data, $var_tabel, $var_field,  $var_fungsi_nama,$var_keterangan,$pa_id);
						
						if($isi==""){
							$default_data=$var_default_data;

							$variabel_default_data = $this->variabel_dokumen($default_data);
							$jml_variabel_default_data= count($variabel_default_data);
							$no_default_data=0;
							for ($variabel_posisi_default_data = 0; $variabel_posisi_default_data < $jml_variabel_default_data; $variabel_posisi_default_data++) {
								$no++; 
								$variabelnya_default_data=$variabel_default_data[$variabel_posisi_default_data];
								$where='var_nomor='.$variabelnya_default_data;
								//exit;
								$h_info_default_data=$this->Dokumen_m->get_data_where($where,"master_variabel");
								if(count($h_info_default_data)==0){
									//echo "Variabel <b>".$variabelnya_default_data."</b> belum tersedia";
									$default_data="";
								}else{ 
									$var_keterangan_default_data=$h_info_default_data[0]->var_keterangan;
									
									$var_jenis_default_data=$h_info_default_data[0]->var_jenis;
									$var_model_default_data=$h_info_default_data[0]->var_model;
									$var_sumber_sipp_default_data=$h_info_default_data[0]->var_sumber_sipp;
									$var_sql_data_default_data=$h_info_default_data[0]->var_sql_data;
									$var_tabel_default_data=$h_info_default_data[0]->var_tabel;
									$var_field_default_data=$h_info_default_data[0]->var_field;
									$var_cek_sidang_default_data=$h_info_default_data[0]->var_cek_sidang;
									$var_fungsi_nama_default_data=$h_info_default_data[0]->var_fungsi_nama;
									$isi_default_data=$this->isi_variabel($variabelnya_default_data, $ht_id, $var_model_default_data,  $var_jenis_default_data, $var_sumber_sipp_default_data, $var_sql_data_default_data, $var_tabel_default_data, $var_field_default_data,  $var_fungsi_nama_default_data, $var_keterangan_default_data,$pa_id);

									$default_data=str_replace("#".$variabelnya_default_data."#",$isi_default_data, $default_data);
								 


								}	
							}
							$isi=$default_data;
						}
					if(!empty($var_tabel)){
						$fungsi="onchange=edit_isi($pa_id,'".$variabelnya."',this.value)";
					}
					echo "<tr><td valign='top'>".@$var_keterangan."</td><td valign='top'>";

					if($var_jenis=='textarea'){
						$tinggi=strlen($isi)/60;
						/////////////////////AMAR
						if($h_info["var_nomor"]=='0065'){
							$tinggi=10;
							$fungsi="onchange=edit_isi($pa_id,'".$variabelnya."',this.value)";

						}else{
							$fungsi="onchange=edit_isi($pa_id,'".$variabelnya."',this.value)";
							//$tinggi=6;
							?>
							<textarea class="form-control" <?php echo @$fungsi?> style="min-height:50px" rows="<?php echo $tinggi?>" id="<?php echo $var_nomor?>" name="<?php echo $var_nomor?>"><?php echo stripslashes(str_replace(";;",";",$isi))?></textarea>
							<?php
						}
					}else
					if($var_fungsi_nama=="tanggal_indonesia"){
						$fungsi="onBlur=edit_isi($pa_id,'".$variabelnya."',this.value)";	
						?>

						<script> 
							var picker_<?php echo $var_nomor?> = new Pikaday({
								field: document.getElementById('picker_<?php echo $var_nomor?>'),
								format: 'DD MMMM YYYY', 
								firstDay: 1, 
								minDate: new Date('1900-01-01'),
								maxDate: new Date('2025-12-31'),
								disableWeekends:'true', 		
								i18n: {
									previousMonth : 'Bulan Sebelum',
									nextMonth : 'Bulan Berikut',
									months : ['Januari','Pebruari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember'],
									weekdays : ['Ahad','Senin','Selasa','Rabu','Kamis','Jum at','Sabtu'],
									weekdaysShort : ['Mg','Sen','Sel','Rab','Kam','Jum','Sab'] 
								}

							}); 
						</script>
						<input class="form-control" type="date"  <?php echo @$fungsi?> id="picker_<?php echo $var_nomor?>" name="<?php echo $var_nomor?>" value="<?php echo stripslashes($isi)?>">
							<?php 
					}else{
						$fungsi="onchange=edit_isi($pa_id,'".$variabelnya."',this.value)";
						?><input class="form-control" <?php echo @$fungsi?> id="<?php echo $var_nomor?>" name="<?php echo $var_nomor?>" value="<?php echo stripslashes($isi)?>">
						<?php 

					}
					echo "</td></tr>";
				}else{
					echo "Variabel Tanya Jawab Dalam Proses";
				}
			}
		}
		echo "</table>" ;
		echo "<center>"; 
		echo '<div  id="loader" class="loader" style="display:none"></div>';
		echo '<div  id="success"   style="display:none"></div><br>';
		$nama_form='frm_cetak';
		$tujuan='_dokumen_cetak';
		
			//echo "<a href='perkara_detail?perkara_id=".$perkara_id."' class='w3-btn w3-red'><< Kembali</a> </center>" ;
		echo "</form><br><br><br><br>" ;
	}
	public function tampilan_blangko_eksekusi(){		
		$db_host2="xxx";
		$id_sidang="xxx";
		$template_id= base64_decode($this->input->post('id'));
		$perkara_id= base64_decode($this->input->post('perkara_id'));
		$pa_id= base64_decode($this->input->post('pa_id'));
		//$template_id=base64_decode($template_id);
		//$perkara_id=base64_decode($perkara_id);
		//$pa_id=base64_decode($pa_id);
		$where='id='.$template_id;
		$data_blangko=$this->Dokumen_m->get_data_where($where,"template_dokumen_eksekusi");
		$source_file="template_eksekusi/".$data_blangko[0]->kode.".rtf";
		$template=file_get_contents($source_file);
		$kode_dokumen=$data_blangko[0]->kode;
		$variabel = $this->variabel_dokumen($template);
		$jml_variabel= count($variabel);$no=0;
		echo "<form name='frm_cetak' id='frm_cetak' action='".base_url("dokumen/cetak")."' method=POST>";
		//$a=$this->security->get_csrf_token_name();
		//$b=$this->security->get_csrf_hash();		
		echo "<input type='hidden' name='".$a."' value='".$b."'>";
		echo "<input type='hidden' name='template_id' value='".$template_id."'>";
		echo "<input type='hidden' name='perkara_id' id='perkara_id' value='".$perkara_id."'>";
		echo "<center><b>File Blangko : ".$kode_dokumen."</b></center>";
		echo "<table class='table table-striped'><tr><th style='width:300px;'>Keterangan</th><th>Data</th></tr>";
		for ($variabel_posisi = 0; $variabel_posisi < $jml_variabel; $variabel_posisi++){
			$no++; 
			$variabelnya=$variabel[$variabel_posisi]; 
			//echo $variabelnya."<br>";
			$where='var_nomor='.$variabelnya;
			$data_variabel=$this->Dokumen_m->get_data_where($where,"master_variabel");
			if(count($data_variabel)==0){
				echo "Variabel <b>".$variabelnya."</b> belum tersedia";
			}else{
				$var_model=@$data_variabel[0]->var_model;
				$var_sumber_sipp=$data_variabel[0]->var_sumber_sipp;
				$var_sql_data=$data_variabel[0]->var_sql_data;
				$var_tabel=$data_variabel[0]->var_tabel;
				$var_field=$data_variabel[0]->var_field;
				$var_cek_sidang=$data_variabel[0]->var_cek_sidang;
				$var_fungsi_nama=$data_variabel[0]->var_fungsi_nama;
				$var_default_data=$data_variabel[0]->var_default_data;
				$var_keterangan=$data_variabel[0]->var_keterangan;
				$var_nomor=$data_variabel[0]->var_nomor;
				$var_jenis=$data_variabel[0]->var_jenis;
				if($var_model<>"tanya_jawab"){
					//echo "string";
					$isi="";
					//echo $var_sql_data;exit;
					$isi=$this->isi_variabel_eksekusi($variabelnya, $perkara_id, $var_model,  $var_jenis, $var_sumber_sipp, $var_sql_data, $var_tabel, $var_field,  $var_fungsi_nama,$var_keterangan,$pa_id);
						
						if($isi==""){
							$default_data=$var_default_data;

							$variabel_default_data = $this->variabel_dokumen($default_data);
							$jml_variabel_default_data= count($variabel_default_data);
							$no_default_data=0;
							for ($variabel_posisi_default_data = 0; $variabel_posisi_default_data < $jml_variabel_default_data; $variabel_posisi_default_data++) {
								$no++; 
								$variabelnya_default_data=$variabel_default_data[$variabel_posisi_default_data];
								$where='var_nomor='.$variabelnya_default_data;
								//exit;
								$h_info_default_data=$this->Dokumen_m->get_data_where($where,"master_variabel");
								if(count($h_info_default_data)==0){
									//echo "Variabel <b>".$variabelnya_default_data."</b> belum tersedia";
									$default_data="";
								}else{ 
									$var_keterangan_default_data=$h_info_default_data[0]->var_keterangan;
									
									$var_jenis_default_data=$h_info_default_data[0]->var_jenis;
									$var_model_default_data=$h_info_default_data[0]->var_model;
									$var_sumber_sipp_default_data=$h_info_default_data[0]->var_sumber_sipp;
									$var_sql_data_default_data=$h_info_default_data[0]->var_sql_data;
									$var_tabel_default_data=$h_info_default_data[0]->var_tabel;
									$var_field_default_data=$h_info_default_data[0]->var_field;
									$var_cek_sidang_default_data=$h_info_default_data[0]->var_cek_sidang;
									$var_fungsi_nama_default_data=$h_info_default_data[0]->var_fungsi_nama;
									$isi_default_data=$this->isi_variabel_eksekusi($variabelnya_default_data, $perkara_id, $var_model_default_data,  $var_jenis_default_data, $var_sumber_sipp_default_data, $var_sql_data_default_data, $var_tabel_default_data, $var_field_default_data,  $var_fungsi_nama_default_data, $var_keterangan_default_data,$pa_id);

									$default_data=str_replace("#".$variabelnya_default_data."#",$isi_default_data, $default_data);
								 


								}	
							}
							$isi=$default_data;
						}
					if(!empty($var_tabel)){
						$fungsi="onchange=edit_isi($pa_id,'".$variabelnya."',this.value)";
					}
					echo "<tr><td valign='top'>".@$var_keterangan."</td><td valign='top'>";

					if($var_jenis=='textarea'){
						$tinggi=strlen($isi)/60;
						/////////////////////AMAR
						if($h_info["var_nomor"]=='0065'){
							$tinggi=10;
							$fungsi="onchange=edit_isi($pa_id,'".$variabelnya."',this.value)";

						}else{
							$fungsi="onchange=edit_isi($pa_id,'".$variabelnya."',this.value)";
							//$tinggi=6;
							?>
							<textarea class="form-control" <?php echo @$fungsi?> style="min-height:50px" rows="<?php echo $tinggi?>" id="<?php echo $var_nomor?>" name="<?php echo $var_nomor?>"><?php echo stripslashes(str_replace(";;",";",$isi))?></textarea>
							<?php
						}
					}else
					if($var_fungsi_nama=="tanggal_indonesia"){
						$fungsi="onBlur=edit_isi($pa_id,'".$variabelnya."',this.value)";	
						?>

						<script> 
							var picker_<?php echo $var_nomor?> = new Pikaday({
								field: document.getElementById('picker_<?php echo $var_nomor?>'),
								format: 'DD MMMM YYYY', 
								firstDay: 1, 
								minDate: new Date('1900-01-01'),
								maxDate: new Date('2025-12-31'),
								disableWeekends:'true', 		
								i18n: {
									previousMonth : 'Bulan Sebelum',
									nextMonth : 'Bulan Berikut',
									months : ['Januari','Pebruari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember'],
									weekdays : ['Ahad','Senin','Selasa','Rabu','Kamis','Jum at','Sabtu'],
									weekdaysShort : ['Mg','Sen','Sel','Rab','Kam','Jum','Sab'] 
								}

							}); 
						</script>
						<input class="form-control" type="date"  <?php echo @$fungsi?> id="picker_<?php echo $var_nomor?>" name="<?php echo $var_nomor?>" value="<?php echo stripslashes($isi)?>">
							<?php 
					}else{
						$fungsi="onchange=edit_isi($pa_id,'".$variabelnya."',this.value)";
						?><input class="form-control" <?php echo @$fungsi?> id="<?php echo $var_nomor?>" name="<?php echo $var_nomor?>" value="<?php echo stripslashes($isi)?>">
						<?php 

					}
					echo "</td></tr>";
				}else{
					echo "Variabel Tanya Jawab Dalam Proses";
				}
			}
		}
		echo "</table>" ;
		echo "<center>"; 
		echo '<div  id="loader" class="loader" style="display:none"></div>';
		echo '<div  id="success"   style="display:none"></div><br>';
		$nama_form='frm_cetak';
		$tujuan='_dokumen_cetak';
		
			//echo "<a href='perkara_detail?perkara_id=".$perkara_id."' class='w3-btn w3-red'><< Kembali</a> </center>" ;
		echo "</form><br><br><br><br>" ;
	}
	function variabel_dokumen($isi_dokumen){ 
		$matches = array(); 
		$pattern = "/#([0-9]*)#/";  
		preg_match_all($pattern, $isi_dokumen, $matches); 
		$variabel_unik=array_unique($matches[1]);
		return array_merge($variabel_unik);
		//var_dump($array_merge($variabel_unik));
	}

	function isi_variabel($variabelnya, $ht_id, $var_model, $var_jenis, $var_sumber_sipp, $var_sql_data, $var_tabel, $var_field, $var_fungsi_nama, $var_keterangan,$pa_id){	
		$isi="";
		if(!empty($var_tabel) AND !empty($var_field) AND $var_sumber_sipp==1 ){
			$where="ht_id=$ht_id AND pa_id='$pa_id'";
			$isi=$this->Dokumen_m->pilih_data($var_tabel,$var_field,$where)["DATA"];
			//echo "$isi";
		}else
		if(!empty($var_tabel) AND !empty($var_field) AND $var_sumber_sipp==0 ){
			$where="ht_id=$ht_id AND pa_id='$pa_id' AND var_nomor='$variabelnya'";
			//echo "ht_id=$ht_id AND pa_id='$pa_id' AND var_nomor='$variabelnya'";
			$isi=$this->Dokumen_m->pilih_data($var_tabel,$var_field,$where)["DATA"];
			//echo "$isi";
		}else
		if($var_model=='sql'){
			//echo $var_sql_data;exit;
			$var_sql_data=str_replace("#pa_id#", $pa_id,$var_sql_data);
			$var_sql_data=str_replace("#ht_id#", $ht_id,$var_sql_data);
			//$a=str_replace()
			//echo $var_sql_data;
			$isi=$this->Dokumen_m->pilih_data_sql($var_sql_data)["DATA"];
			 
		}else{
			$isi="mbuh"; 
		
		}
 
			//isi 
			$isi=str_replace("<<"," ",$isi);
			$isi=$this->clean($isi);
			$isi = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $isi); 
			$isi=str_replace("XXXXXXXXXX","XXXXX",$isi);
			$isi=str_replace("XXXXXXXXXX","XXXXX",$isi);
			$isi=str_replace("ZZZZZZZZZZ","ZZZZZ",$isi);
			$isi=str_replace("ZZZZZZZZZZ","ZZZZZ",$isi);
			$isi=str_replace("ZZZZZ",chr(9),$isi);
			$isi=str_replace("XXXXX",chr(13),$isi);
			$isi=str_replace(" ,",",",$isi);
			$isi=str_replace(" ;",";",$isi);
			$isi=str_replace("; ",";",$isi);
			$isi=str_replace("( ","(",$isi);
			$isi=str_replace(" )",")",$isi);
			//$isi = preg_replace('/[\000-\031\200-\377]/', '', $isi);
			//$isi = preg_replace('/[[:^print:]]/', "", $isi);

			if($var_fungsi_nama=='hijriah'){ 
				$isi=trim(convertToHijriah($isi));
			}
			if($var_fungsi_nama=='nama_hari'){ 
				$isi=trim(convertToHijriah($isi));
			}
			if($var_fungsi_nama=='tanggal_indonesia'){ 
				//$isi=trim($this->convertKeTglIndo($isi));
				$isi=$isi;
			}
			if($var_fungsi_nama=='format_uang'){ 
				$isi=trim($this->format_uang($isi));
			}
			if($var_fungsi_nama=='huruf_besar_awal_kata'){ 
				$isi=trim(huruf_besar_awal_kata($isi));
			}

			if($var_fungsi_nama=='terbilang_rupiah'){ 
				$isi=trim($this->terbilang_rupiah($isi));
			}

			//isi 	
		 
		return $isi;
	}
	function isi_variabel_eksekusi($variabelnya, $perkara_id, $var_model, $var_jenis, $var_sumber_sipp, $var_sql_data, $var_tabel, $var_field, $var_fungsi_nama, $var_keterangan,$pa_id){	
		$isi="";
		if(!empty($var_tabel) AND !empty($var_field) AND $var_sumber_sipp==1 ){
			$where="perkara_id=$perkara_id AND pa_id='$pa_id'";
			$isi=$this->Dokumen_m->pilih_data($var_tabel,$var_field,$where)["DATA"];
			//echo "$isi";
		}else
		if(!empty($var_tabel) AND !empty($var_field) AND $var_sumber_sipp==0 ){
			$where="perkara_id=$perkara_id AND pa_id='$pa_id' AND var_nomor='$variabelnya'";
			//echo "perkara_id=$perkara_id AND pa_id='$pa_id' AND var_nomor='$variabelnya'";
			$isi=$this->Dokumen_m->pilih_data($var_tabel,$var_field,$where)["DATA"];
			//echo "$isi";
		}else
		if($var_model=='sql'){
			//echo $var_sql_data;exit;
			$var_sql_data=str_replace("#pa_id#", $pa_id,$var_sql_data);
			$var_sql_data=str_replace("#perkara_id#", $perkara_id,$var_sql_data);
			//$a=str_replace()
			//echo $var_sql_data;
			$isi=$this->Dokumen_m->pilih_data_sql($var_sql_data)["DATA"];
			 
		}else{
			$isi="mbuh"; 
		
		}
 
			//isi 
			$isi=str_replace("<<"," ",$isi);
			$isi=$this->clean($isi);
			$isi = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $isi); 
			$isi=str_replace("XXXXXXXXXX","XXXXX",$isi);
			$isi=str_replace("XXXXXXXXXX","XXXXX",$isi);
			$isi=str_replace("ZZZZZZZZZZ","ZZZZZ",$isi);
			$isi=str_replace("ZZZZZZZZZZ","ZZZZZ",$isi);
			$isi=str_replace("ZZZZZ",chr(9),$isi);
			$isi=str_replace("XXXXX",chr(13),$isi);
			$isi=str_replace(" ,",",",$isi);
			$isi=str_replace(" ;",";",$isi);
			$isi=str_replace("; ",";",$isi);
			$isi=str_replace("( ","(",$isi);
			$isi=str_replace(" )",")",$isi);
			//$isi = preg_replace('/[\000-\031\200-\377]/', '', $isi);
			//$isi = preg_replace('/[[:^print:]]/', "", $isi);

			if($var_fungsi_nama=='hijriah'){ 
				$isi=trim(convertToHijriah($isi));
			}
			if($var_fungsi_nama=='nama_hari'){ 
				$isi=trim(convertToHijriah($isi));
			}
			if($var_fungsi_nama=='tanggal_indonesia'){ 
				//$isi=trim($this->convertKeTglIndo($isi));
				$isi=$isi;
			}
			if($var_fungsi_nama=='format_uang'){ 
				$isi=trim($this->format_uang($isi));
			}
			if($var_fungsi_nama=='huruf_besar_awal_kata'){ 
				$isi=trim(huruf_besar_awal_kata($isi));
			}

			if($var_fungsi_nama=='terbilang_rupiah'){ 
				$isi=trim($this->terbilang_rupiah($isi));
			}

			//isi 	
		 
		return $isi;
	}
	function terbilang_rupiah($bilangan)
		{
			  $bilangan=str_replace(".00", "", $bilangan);	
			   $angka = array('0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0',
        '0', '0', '0');
			    $kata = array('', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh',
			        'delapan', 'sembilan');
			    $tingkat = array('', 'ribu', 'juta', 'milyar', 'triliun');

			    $panjang_bilangan = strlen($bilangan);

			    /* pengujian panjang bilangan */
			    if ($panjang_bilangan > 15)
			    {
			        $kalimat = "Diluar Batas";
			        return $kalimat;
			    }

			    /* mengambil angka-angka yang ada dalam bilangan,
			    dimasukkan ke dalam array */
			    for ($i = 1; $i <= $panjang_bilangan; $i++)
			    {
			        $angka[$i] = substr($bilangan, -($i), 1);
			    }

			    $i = 1;
			    $j = 0;
			    $kalimat = "";


			    /* mulai proses iterasi terhadap array angka */
			    while ($i <= $panjang_bilangan)
			    {
			        $subkalimat = "";
			        $kata1 = "";
			        $kata2 = "";
			        $kata3 = "";

			        /* untuk ratusan */
			        if ($angka[$i + 2] != "0")
			        {
			            if ($angka[$i + 2] == "1")
			            {
			                $kata1 = "seratus";
			            }
			            else
			            {
			                $kata1 = $kata[$angka[$i + 2]] . " ratus";
			            }
			        }

			        /* untuk puluhan atau belasan */
			        if ($angka[$i + 1] != "0")
			        {
			            if ($angka[$i + 1] == "1")
			            {
			                if ($angka[$i] == "0")
			                {
			                    $kata2 = "sepuluh";
			                }
			                elseif ($angka[$i] == "1")
			                {
			                    $kata2 = "sebelas";
			                }
			                else
			                {
			                    $kata2 = $kata[$angka[$i]] . " belas";
			                }
			            }
			            else
			            {
			                $kata2 = $kata[$angka[$i + 1]] . " puluh";
			            }
			        }

			        /* untuk satuan */
			        if ($angka[$i] != "0")
			        {
			            if ($angka[$i + 1] != "1")
			            {
			                $kata3 = $kata[$angka[$i]];
			            }
			        }

			        /* pengujian angka apakah tidak nol semua,
			        lalu ditambahkan tingkat */
			        if (($angka[$i] != "0") or ($angka[$i + 1] != "0") or ($angka[$i + 2] != "0"))
			        {
			            $subkalimat = "$kata1 $kata2 $kata3 " . $tingkat[$j] . " ";
			        }

			        /* gabungkan variabe sub kalimat (untuk satu blok 3 angka)
			        ke variabel kalimat */
			        $kalimat = $subkalimat . $kalimat;
			        $i = $i + 3;
			        $j = $j + 1;

			    }

			    /* mengganti satu ribu jadi seribu jika diperlukan */
			    if (($angka[5] == "0") and ($angka[6] == "0"))
			    {
			        $kalimat = str_replace("satu ribu", "seribu", $kalimat);
			    }

			    return str_replace("  "," ",str_replace("  "," ",trim($kalimat . " rupiah")));
			}
	function clean($text){
		$text = str_replace(chr(194),"",$text);
	    $text = str_replace(chr(13),"XXXXX",$text);
	    $text = str_replace("\n","XXXXX",$text);
	    $text = str_replace(chr(9),"ZZZZZ",$text);
	    $text = str_replace("\t","ZZZZZ",$text);
		$text = html_entity_decode($text, ENT_QUOTES, "UTF-8");
		// $text = str_replace("MENETAPKAN:","MENETAPKAN:"."\\pard"."\\qc"."\\sa100",$text);
		$text = str_replace("MENETAPKAN:"," ",$text);
		$text = str_replace("MENETAPKAN :"," ",$text);
		$text = str_replace("M E N E T A P K A N :"," ",$text);
		$text = str_replace("M E N G A D I L I"," ",$text);
		$text = str_replace("MENUNTUT :"," ",$text);
		$text = str_replace("  "," ",$text);
		$text = str_replace("<ol>","",$text);		
		$text = str_replace("</li>","",$text);
		$text = str_replace("<li>","",$text);
		$text = str_replace("<li >","",$text);
		$text = str_replace("</ol>","",$text);
		// $text = str_replace("</p>","\\par",$text);
		$text = str_replace("<strong>","",$text);
		$text = str_replace("</strong>","",$text);
		$text = str_replace("<p>","",$text);		
		$text = str_replace("<p >","",$text);		
		$text = filter_var($text, FILTER_SANITIZE_STRING);
		$text = str_replace('&#39;',"'",$text);
		$text = str_replace('&#34;','"',$text);
		$text = str_replace('&#160;',' ',$text);
		$text = str_replace(';','; ',$text);
	    $text = str_replace('&nsbp',' ',$text);
		$text = str_replace('MENGADILI','',$text);
	    $text = str_replace('Mengadili','',$text);
	    $text = str_replace("&nbsp; ","",$text);
	    $text = str_replace("</p>","",$text);
	    $text = str_replace('”'," ",$text);		
	    $text = str_replace('“'," ",$text);
		$text = trim($text);

		return $text;
	}

	function cetak(){
		$this->load->helper('file');

		$ht_id= $this->input->post('ht_id');
		$template_id= $this->input->post('template_id');
		$where='id='.$template_id;
		$data_blangko=$this->Dokumen_m->get_data_where($where,"template_dokumen");
		$rtf="";
		//echo "Menggunakan Blangko ".$data_blangko[0]->kode.".rtf<br>";
		$source_file="template/".$data_blangko[0]->kode.".rtf";
		$rtf=file_get_contents($source_file);
		//$pos=$this->input->post();
		//var_dump($pos);exit;
			foreach($this->input->post() as $key=>$value){
				$where="var_nomor='".$key."'";
				$data_variabel=$this->Dokumen_m->get_data_where($where,"master_variabel");
				if(count($data_variabel<>0)){
					if($data_variabel[0]->var_fungsi_nama=="tanggal_indonesia"){
						$value=$this->convertKeTglIndo($value);
					}
				}
				//echo $key. "-" .$value."<br>";
				//var_dump($h);exit;
				//echo $h["key"];exit;
				if($key==5058 OR $key==5059 OR $key==5060 OR $key==5061 OR $key==8100 OR $key==8101 OR $key==5062 OR $key==5063 OR $key==5064 OR $key==5065 OR $key==20000 OR $key==20001 OR $key==20002 OR $key==20003){
						//lama
						//$value=str_replace("&nbsp;"," ", $value);
						//$value=str_replace(";;",";", $value);
						//$value=str_replace("^"," \par \pard\li3254\sa200\sl360\slmult1\qj ", $value);
						//$value=str_replace("|"," \par \pard\sa200\sl360\slmult1\qj\lang33 ", $value);
						//$rtf= str_replace("#".$key."#",$value,$rtf) ; 
						//lama
						
						//Baru
						$value=str_replace("&nbsp;"," ", $value);
						$value=str_replace("   "," ", $value);
						$value=str_replace("  "," ", $value);
						$isinya=explode("|",$value);
						$jml_tanya_jawab=count($isinya);
						$tabelnya="";
						for ($tanya_jawab_posisi = 0; $tanya_jawab_posisi < $jml_tanya_jawab-1; $tanya_jawab_posisi++) 
						{
							$data_baris=$isinya[$tanya_jawab_posisi];
							$pecah_tanya_jawab=explode("^",$data_baris);
							$tabelnya.='\trowd\cellx3800\cellx8500\intbl '.trim($pecah_tanya_jawab[0]);
							$tabelnya.='\cell\intbl \cell\row \trowd\cellx3800\cellx8500\intbl\cell\intbl '.trim($pecah_tanya_jawab[1]).'\cell\row'; 
						}
						$tabelnya.='\pard\par';
						$rtf= str_replace("#".$key."#",$tabelnya,$rtf) ;
					//Baru 
				}else
				{

					$value=str_replace(";;",";", $value);
					$value=str_replace(chr(13),";", $value);
					$value=str_replace(chr(10),";", $value);
					//$value=str_replace(chr(9),"\tab ", $value);
				//	$value=str_replace('\t',"\tab ", $value);
					$value=str_replace('\n',";", $value);
					$value=str_replace('; ;',";", $value);
					$value=str_replace(';;',";", $value);
					$value=str_replace(';;',";", $value);
					$value=str_replace('.;',";", $value);
					$value=str_replace(';;',";", $value);
					$value=str_replace('-;',";", $value);
					$value=str_replace(';',";\par ", $value);
					$value=str_replace("ï¿½","'", $value);
					$value=str_replace(" ,","", $value);
					$value=str_replace("\'ef\'bf\'bd\'ef\'bf\'bd\'ef\'bf\'bd\loch\f1","", $value);
					$rtf= str_replace("#".$key."#",$value,$rtf) ;
					//echo "Merubah #$key# menjadi  $value<br>";
				}
			}
			//$nama_file_hasil=str_replace("/","_",@$nomor_perkara)."_".@$jenis_blangko_nama."_".date("Y-m-d").".rtf";
			$nama_file_hasil=$ht_id."preview.rtf";
			//replace karakter khusus
			$rtf= str_replace("\'ef\'bf\'bd\loch\f1","",$rtf) ;
			$rtf= str_replace("\'ef\'bf\'bd","",$rtf) ;
			if ( ! write_file("./hasil/$nama_file_hasil", $rtf)){
			     echo 'Berhasil';
			}else{
			     echo 'Gagal';
			}
			//$tulis=write_file('hasil/'.$nama_file_hasil, $rtf, 'r+');
			//var_dump($tulis);
			//replace karakter khusus
			//echo $rtf;
			//exit;
			$hasil_lokasi="hasil/".$nama_file_hasil;
			//$hasil=file_put_contents($hasil_lokasi,$rtf);
			//echo '<br><center><a href="'.$hasil_lokasi.'" class="w3-btn  w3-small w3-green">.:: Unduh Ulang ::.</a><center>';
			echo '^'.$hasil_lokasi;
		
	}
	function cetak_eksekusi(){
		$this->load->helper('file');

		$perkara_id= $this->input->post('perkara_id');
		$template_id= $this->input->post('template_id');
		$where='id='.$template_id;
		$data_blangko=$this->Dokumen_m->get_data_where($where,"template_dokumen_eksekusi");
		$rtf="";
		//echo "Menggunakan Blangko ".$data_blangko[0]->kode.".rtf<br>";
		$source_file="template_eksekusi/".$data_blangko[0]->kode.".rtf";
		$rtf=file_get_contents($source_file);
		//$pos=$this->input->post();
		//var_dump($pos);exit;
			foreach($this->input->post() as $key=>$value){
				$where="var_nomor='".$key."'";
				$data_variabel=$this->Dokumen_m->get_data_where($where,"master_variabel");
				if(count($data_variabel<>0)){
					if($data_variabel[0]->var_fungsi_nama=="tanggal_indonesia"){
						$value=$this->convertKeTglIndo($value);
					}
				}
				//echo $key. "-" .$value."<br>";
				//var_dump($h);exit;
				//echo $h["key"];exit;
				if($key==5058 OR $key==5059 OR $key==5060 OR $key==5061 OR $key==8100 OR $key==8101 OR $key==5062 OR $key==5063 OR $key==5064 OR $key==5065 OR $key==20000 OR $key==20001 OR $key==20002 OR $key==20003){
						//lama
						//$value=str_replace("&nbsp;"," ", $value);
						//$value=str_replace(";;",";", $value);
						//$value=str_replace("^"," \par \pard\li3254\sa200\sl360\slmult1\qj ", $value);
						//$value=str_replace("|"," \par \pard\sa200\sl360\slmult1\qj\lang33 ", $value);
						//$rtf= str_replace("#".$key."#",$value,$rtf) ; 
						//lama
						
						//Baru
						$value=str_replace("&nbsp;"," ", $value);
						$value=str_replace("   "," ", $value);
						$value=str_replace("  "," ", $value);
						$isinya=explode("|",$value);
						$jml_tanya_jawab=count($isinya);
						$tabelnya="";
						for ($tanya_jawab_posisi = 0; $tanya_jawab_posisi < $jml_tanya_jawab-1; $tanya_jawab_posisi++) 
						{
							$data_baris=$isinya[$tanya_jawab_posisi];
							$pecah_tanya_jawab=explode("^",$data_baris);
							$tabelnya.='\trowd\cellx3800\cellx8500\intbl '.trim($pecah_tanya_jawab[0]);
							$tabelnya.='\cell\intbl \cell\row \trowd\cellx3800\cellx8500\intbl\cell\intbl '.trim($pecah_tanya_jawab[1]).'\cell\row'; 
						}
						$tabelnya.='\pard\par';
						$rtf= str_replace("#".$key."#",$tabelnya,$rtf) ;
					//Baru 
				}else
				{

					$value=str_replace(";;",";", $value);
					$value=str_replace(chr(13),";", $value);
					$value=str_replace(chr(10),";", $value);
					//$value=str_replace(chr(9),"\tab ", $value);
				//	$value=str_replace('\t',"\tab ", $value);
					$value=str_replace('\n',";", $value);
					$value=str_replace('; ;',";", $value);
					$value=str_replace(';;',";", $value);
					$value=str_replace(';;',";", $value);
					$value=str_replace('.;',";", $value);
					$value=str_replace(';;',";", $value);
					$value=str_replace('-;',";", $value);
					$value=str_replace(';',";\par ", $value);
					$value=str_replace("ï¿½","'", $value);
					$value=str_replace(" ,","", $value);
					$value=str_replace("\'ef\'bf\'bd\'ef\'bf\'bd\'ef\'bf\'bd\loch\f1","", $value);
					$rtf= str_replace("#".$key."#",$value,$rtf) ;
					//echo "Merubah #$key# menjadi  $value<br>";
				}
			}
			//$nama_file_hasil=str_replace("/","_",@$nomor_perkara)."_".@$jenis_blangko_nama."_".date("Y-m-d").".rtf";
			$nama_file_hasil=$perkara_id."vpreview.rtf";
			//replace karakter khusus
			//$rtf= str_replace("\'ef\'bf\'bd\loch\f1","",$rtf) ;
			//$rtf= str_replace("\'ef\'bf\'bd","",$rtf) ;
			if ( ! write_file("./hasil/$nama_file_hasil", $rtf)){
			    // echo 'Berhasil';
			}else{
			    // echo 'Gagal';
			}
			//$tulis=write_file('hasil/'.$nama_file_hasil, $rtf, 'r+');
			//var_dump($tulis);
			//replace karakter khusus
			//echo $rtf;
			//exit;
			$hasil_lokasi="hasil/".$nama_file_hasil;
			//$hasil=file_put_contents($hasil_lokasi,$rtf);
			//echo '<br><center><a href="'.$hasil_lokasi.'" class="w3-btn  w3-small w3-green">.:: Unduh Ulang ::.</a><center>';
			echo '^'.$hasil_lokasi;
		
	}
    public function convertKeTglIndo($tgl){
    	# contoh: 21 April 2014
	    if (!$this->validateDate($tgl)) return $tgl; 
	    $tanggal_ = substr($tgl,8,2);
	    if($tanggal_>=10){
	    	$tanggal = $tanggal_;
	    }elseif($tanggal_<10){
	    	$tanggal = substr($tgl,9,2);
	    }
	    $bulan_ =  $this->getBulanFull(substr($tgl,5,2));
	    $tahun_ =  substr($tgl,0,4);
	    return  $tanggal.' '.$bulan_.' '.$tahun_;

	}
	function validateDate($date){
	    if (empty($date)) return false;
	    $date = str_replace('/', '-', $date);
		$d = DateTime::createFromFormat('Y-m-d', $date);
	    return $d && $d->format('Y-m-d') == $date;
	}
	public function  getBulanFull($bln){
	    switch  ($bln){
	        case 1: return  "Januari"; break;
	        case 2: return  "Februari"; break;
	        case 3: return  "Maret"; break;
	        case 4: return  "April"; break;
	        case 5: return  "Mei"; break;
	        case 6: return  "Juni"; break;
	        case 7: return  "Juli"; break;
	        case 8: return  "Agustus"; break;
	        case 9: return  "September"; break;
	        case 10: return "Oktober"; break;
	        case 11: return "November"; break;
	        case 12: return "Desember"; break;
	    }
	}
	function format_uang($nilai){
			if((int)$nilai==0)
			{
				$nilai=0;
			}else
			{
				$nilai=number_format($nilai, 0, ',', '.');
			}
			return $nilai.",00";
	}
	function do_upload(){
		$data_permohonan_id=$this->input->post('data_permohonan_id');
		$nama_dokumen=$this->input->post('file_nama');
        $config['upload_path']          = 'uploads/';
        $config['allowed_types']        = 'pdf|doc|docx|rtf';
        $nama_file        = str_replace(" ","_",rand(10,99)."_".time().'_'.$_FILES["file"]['name']);
        $config['file_name']=$nama_file;
        $this->load->helper('url', 'form'); 

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file')){
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
               // $this->load->view('upload_form', $error);
        }else{
        	$data = array('upload_data' => $this->upload->data());
			$insert=array(
               				'nama_dokumen' =>$nama_dokumen
               				,'data_permohonan_id' =>$data_permohonan_id
               				,'link' =>'uploads/'.$nama_file
               				);
         	$this->Dokumen_m->insert_data("data_dokumen",$insert);
        }
    }
	function permohonan_simpan(){ 
		if($this->input->post('ht_id')){
			$insert=array(
				'perihal'=>base64_decode($this->input->post('perihale'))
				,'catatan_singkat'=>base64_decode($this->input->post('catatan_singkate'))
				,'tanggal'=>base64_decode($this->input->post('tanggale'))
				,'instansi_id'=>base64_decode($this->input->post('instansine'))
				,'ht_id'=>base64_decode($this->input->post('ht_id'))
				,'pa_id'=>base64_decode($this->input->post('pa_id'))
				,'mitra_id'=>base64_decode($this->input->post('mitra_id'))
				,'nama_mitra'=>base64_decode($this->input->post('nama_mitra'))
				,'email_satker'=>base64_decode($this->input->post('email_satker'))
				,'wa_satker'=>base64_decode($this->input->post('wa_satker'))
				,'pa_pemohon'=>base64_decode($this->session->userdata('fullname'))
			);
		}else{
			$insert=array(
				'perihal'=>base64_decode($this->input->post('perihale'))
				,'catatan_singkat'=>base64_decode($this->input->post('catatan_singkate'))
				,'tanggal'=>base64_decode($this->input->post('tanggale'))
				,'instansi_id'=>base64_decode($this->input->post('instansine'))
				,'perkara_id'=>base64_decode($this->input->post('perkara_id'))
				,'pa_id'=>base64_decode($this->input->post('pa_id'))
				,'mitra_id'=>base64_decode($this->input->post('mitra_id'))
				,'nama_mitra'=>base64_decode($this->input->post('nama_mitra'))
				,'email_satker'=>base64_decode($this->input->post('email_satker'))
				,'wa_satker'=>base64_decode($this->input->post('wa_satker'))
				,'pa_pemohon'=>base64_decode($this->session->userdata('fullname'))
			);
		}
		
 		$this->Dokumen_m->insert_data("data_permohonan",$insert);
 		echo base64_decode($this->input->post('instansine'));         
    }

	public function permohonan(){
		$instansi_id=base64_decode($this->input->post('instansi_id'));
		$ht_id=base64_decode($this->input->post('ht_id'));
		$pa_id=base64_decode($this->input->post('pa_id'));
		$where="instansi_id=$instansi_id AND ht_id=$ht_id AND pa_id=$pa_id";
		$data["permohonan"]=$this->Dokumen_m->get_data_where($where, "data_permohonan");
		$data["instansi_id"]=$instansi_id;
		$this->load->view('dokumen/permohonan', $data);
	}
	function hapus_dokumen(){
		$this->load->helper("file");
		$id=base64_decode($this->input->post('id'));
		$where="id=$id";
		$file=$this->Dokumen_m->get_data_where($where, "data_dokumen")[0]->link;
		$hapus=unlink($file);
		var_dump($hapus);
 		$this->Dokumen_m->delete_data($where, 'data_dokumen');   
    }
	function hapus_permohonan(){;
		$id=base64_decode($this->input->post('id'));
		$where="id=$id";
 		$this->Dokumen_m->delete_data($where, 'data_permohonan');   
 		$this->Dokumen_m->delete_data($where, 'data_dokumen');   
    }
    function update_eksekusi_ht(){
    	$pa_id=base64_decode($this->input->post('pa_id'));
    	$ht_id=base64_decode($this->input->post('ht_id'));
    	$isi=base64_decode($this->input->post('isi'));
    	$insert=array(
							'status_eksekusi_text' =>$isi
						);
		//var_dump($insert);
		$where="pa_id=".$pa_id." AND ht_id=$ht_id";
     	$this->Dokumen_m->update_data($where, "perkara_eksekusi_ht", $insert);
    }
    function update_eksekusi(){
    	$pa_id=base64_decode($this->input->post('pa_id'));
    	$perkara_id=base64_decode($this->input->post('perkara_id'));
    	$isi=base64_decode($this->input->post('isi'));
    	$insert=array(
							'status_eksekusi_text' =>$isi
						);
		//var_dump($insert);
		$where="pa_id=".$pa_id." AND perkara_id=$perkara_id";
     	$this->Dokumen_m->update_data($where, "perkara_eksekusi", $insert);
    }

	public function permohonan_eksekusi(){
		$instansi_id=base64_decode($this->input->post('instansi_id'));
		$perkara_id=base64_decode($this->input->post('perkara_id'));
		$pa_id=base64_decode($this->input->post('pa_id'));
		$where="instansi_id=$instansi_id AND perkara_id=$perkara_id AND pa_id=$pa_id";
		$data["permohonan"]=$this->Dokumen_m->get_data_where($where, "data_permohonan");
		$data["instansi_id"]=$instansi_id;
		$this->load->view('dokumen/permohonan', $data);
	}
	public function edoc_list_ht(){
		 
		$ht_id=base64_decode($this->input->post('ht_id'));
		$pa_id=base64_decode($this->input->post('pa_id'));
		$where="ht_id=$ht_id AND pa_id=$pa_id";
		$data["edoc"]=$this->Dokumen_m->get_data_where($where, "perkara_eksekusiht_edoc");
		$data["instansi_id"]=$instansi_id;
		$this->load->view('perkaraeksekusi_ht/edoc_list_ht', $data);
	}

	function do_uploadEdoc(){
		$keterangan=$this->input->post('Edoc_file_nama');
		$pa_id=$this->input->post('Edoc_pa_id');
		$ht_id=$this->input->post('Edoc_ht_id');
        $config['upload_path']          = 'edoc/';
        $config['allowed_types']        = 'pdf|doc|docx|rtf';
        $nama_file        = "ht_".str_replace(" ","_",rand(10,99)."_".time().'_'.$_FILES["file"]['name']);
        $config['file_name']=$nama_file;
        $this->load->helper('url', 'form'); 

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file')){
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
               // $this->load->view('upload_form', $error);
        }else{
        	$data = array('upload_data' => $this->upload->data());
			$insert=array(
               				'pa_id' =>$pa_id
               				,'ht_id' =>$ht_id
               				,'keterangan' =>$keterangan
               				,'edoc_url' =>'edoc/'.$nama_file
               				);
         	$this->Dokumen_m->insert_data("perkara_eksekusiht_edoc",$insert);
        }
    }

	function edoc_hapus_ht(){
		$this->load->helper("file");
		$id=base64_decode($this->input->post('id'));
		$where="id=$id";
		$file=$this->Dokumen_m->get_data_where($where, "perkara_eksekusiht_edoc")[0]->edoc_url;
		$hapus=unlink($file);
		var_dump($hapus);
 		$this->Dokumen_m->delete_data($where, 'perkara_eksekusiht_edoc');   
    }

	public function edoc_list(){
		$perkara_id=base64_decode($this->input->post('perkara_id'));
		$pa_id=base64_decode($this->input->post('pa_id'));
		$where="perkara_id=$perkara_id AND pa_id=$pa_id";
		$data["edoc"]=$this->Dokumen_m->get_data_where($where, "perkara_eksekusi_edoc");
		$data["instansi_id"]=$instansi_id;
		$this->load->view('perkaraeksekusi/edoc_list', $data);
	}

	function do_uploadEdocEks(){ 
		$keterangan=$this->input->post('Edoc_file_nama');
		$pa_id=$this->input->post('Edoc_pa_id');
		$perkara_id=$this->input->post('Edoc_perkara_id');
        $config['upload_path']          = 'edoc/';
        $config['allowed_types']        = 'pdf|doc|docx|rtf';
        $nama_file        = str_replace(" ","_",rand(10,99)."_".time().'_'.$_FILES["file"]['name']);
        $config['file_name']=$nama_file;
        $this->load->helper('url', 'form'); 

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file')){
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
               // $this->load->view('upload_form', $error);
        }else{
        	$data = array('upload_data' => $this->upload->data());
			$insert=array(
               				'pa_id' =>$pa_id
               				,'perkara_id' =>$perkara_id
               				,'keterangan' =>$keterangan
               				,'edoc_url' =>'edoc/'.$nama_file
               				);
         	$this->Dokumen_m->insert_data("perkara_eksekusi_edoc",$insert);
        }
    }
    
	function edoc_hapus(){
		$this->load->helper("file");
		$id=base64_decode($this->input->post('id'));
		$where="id=$id";
		$file=$this->Dokumen_m->get_data_where($where, "perkara_eksekusi_edoc")[0]->edoc_url;
		$hapus=unlink($file);
		var_dump($hapus);
 		$this->Dokumen_m->delete_data($where, 'perkara_eksekusi_edoc');   
    }
    
}
