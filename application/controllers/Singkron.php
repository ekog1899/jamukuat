<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Singkron extends CI_Controller {
		
		public function __construct(){
			parent::__construct();		
			// $this->default->squrity(); 
			//$this->basic->squrity();
			$this->load->library('encryption');
		}
		function besih($teks){
			$teks= html_entity_decode($teks, ENT_QUOTES, "UTF-8");
			$teks= filter_var($teks, FILTER_SANITIZE_STRING);
			$teks= str_replace("’", "", $teks);
			$teks= str_replace("'", "", $teks);
			$teks = preg_replace('/[\x00-\x1F\x7F\xA0]/u', '', $teks);
			$teks=preg_replace('/[^A-Za-z0-9\  ]/', '', $teks);
			return addslashes($teks);
		}
		function posting($url, $data){
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','User-Agent: e-payment','Authorization:test'));
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
			curl_setopt($ch, CURLOPT_TIMEOUT, 60);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response  = curl_exec($ch);
			$retry = 0;
			$_err = curl_errno($ch);
			$_errmsg = curl_error($ch);
			while(($_err != NULL || $_err > 0 || $response === false) && $retry < 3){
				$response = curl_exec($ch);
				$_err = curl_errno($ch);
				$_errmsg = curl_error($ch);
				$retry++;
			}
			if($_err != NULL || $_err > 0 || $response === false || $_err > 0){
				$response = array(
				'status' 	=> 'error',
				'message' 	=> $_errmsg
				);
			}
			curl_close($ch);
			return $response;
		}
		function index(){
			echo "";
		} 
		function eksekusi_ht(){
			try{
				$group=(int)base64_decode($this->session->userdata('group'));
		        if($group==0 OR $group==2){
		            $list_satker = $this->basic->get_data('pengadilan_agama');
		        }else{
		        	$wherere="id=".(int)base64_decode($this->session->userdata('pa_id'));
		            $list_satker = $this->basic->get_data_where($wherere,'pengadilan_agama');
		        }
				
				foreach($list_satker->result_array() as $h){
					$id_pa=$h["id"];
					echo $h["nama"]."- ".$h['ip_satker']."<br>";
					//perkara_eksekusi
						$query = base64_encode("SELECT * FROM perkara_eksekusi_ht");
						$post = array("req" => $query);
						$url = $h['ip_satker'].'/api_monitoring/get_data_api';
						$q = $this->posting($url,$post);
						$y=json_decode($q);
						//var_dump($y);
						if(count($y)){
							foreach($y AS $data){
								echo "Proses ".$data->eksekusi_nomor_perkara."<br>";
								$q = $this ->db ->query("SELECT pa_id FROM  perkara_eksekusi_ht WHERE pa_id=$id_pa AND ht_id=".$data->ht_id);
								$jumlahnya=$q->num_rows();
						        $simpan = array(
										'alur_perkara_id' => $data->alur_perkara_id
										,'nomor_perkara_pn' => $data->nomor_perkara_pn
										,'putusan_pn' => $data->putusan_pn
										,'nomor_perkara_banding' => $data->nomor_perkara_banding
										,'putusan_banding' => $data->putusan_banding
										,'nomor_perkara_kasasi' => $data->nomor_perkara_kasasi
										,'putusan_kasasi' => $data->putusan_kasasi
										,'nomor_perkara_pk' => $data->nomor_perkara_pk
										,'putusan_pk' => $data->putusan_pk
										,'eksekusi_putusan' => $data->eksekusi_putusan
										,'nomor_urut_perkara_eksekusi' => $data->nomor_urut_perkara_eksekusi
										,'eksekusi_nomor_perkara' => $data->eksekusi_nomor_perkara
										,'eksekusi_amar_putusan' => $data->eksekusi_amar_putusan
										,'pihak_pemohon_eksekusi' => $data->pihak_pemohon_eksekusi
										,'permohonan_eksekusi' => $data->permohonan_eksekusi
										,'pemohon_eksekusi' => $data->pemohon_eksekusi
										,'para_pihak' => $data->para_pihak
										,'penetapan_teguran_eksekusi' => $data->penetapan_teguran_eksekusi
										,'nomor_penetapan_teguran_eksekusi' => $data->nomor_penetapan_teguran_eksekusi
										,'pelaksanaan_teguran_eksekusi' => $data->pelaksanaan_teguran_eksekusi
										,'penetapan_sita_eksekusi' => $data->penetapan_sita_eksekusi
										,'nomor_penetapan_sita_eksekusi' => $data->nomor_penetapan_sita_eksekusi
										,'pelaksanaan_sita_eksekusi' => $data->pelaksanaan_sita_eksekusi
										,'jurusita_id' => $data->jurusita_id
										,'jurusita_nama' => $data->jurusita_nama
										,'penetapan_perintah_eksekusi_lelang' => $data->penetapan_perintah_eksekusi_lelang
										,'pelaksanaan_eksekusi_lelang' => $data->pelaksanaan_eksekusi_lelang
										,'penyerahan_hasil_lelang' => $data->penyerahan_hasil_lelang
										,'penetapan_perintah_eksekusi_rill' => $data->penetapan_perintah_eksekusi_rill
										,'pelaksanaan_eksekusi_rill' => $data->pelaksanaan_eksekusi_rill
										,'penetapan_noneksekusi' => $data->penetapan_noneksekusi
										,'alasan_eksekusi' => $data->alasan_eksekusi
										,'catatan_eksekusi' => $data->catatan_eksekusi
										,'prodeo_eksekusi' => $data->prodeo_eksekusi
										,'status_eksekusi_id' => $data->status_eksekusi_id
										,'jenis_ht_id' => $data->jenis_ht_id
										,'jenis_ht_text' => $data->jenis_ht_text
										,'tgl_sertifikat' => $data->tgl_sertifikat
										,'no_sertifikat' => $data->no_sertifikat
										,'tanggal_cabut_ht' => $data->tanggal_cabut_ht
										,'diedit_oleh' => $data->diedit_oleh
										,'diedit_tanggal' => $data->diedit_tanggal
										,'diinput_oleh' => $data->diinput_oleh
										,'diinput_tanggal' => $data->diinput_tanggal
										,'diperbaharui_oleh' => $data->diperbaharui_oleh
										,'diperbaharui_tanggal' => $data->diperbaharui_tanggal);

						        if($jumlahnya==1){

						        	$whereconditon="pa_id=$id_pa AND ht_id=".$data->ht_id;
						        	$this->db->where($whereconditon);
									$res = $this->db->update("perkara_eksekusi_ht", $simpan); 
									echo "Mengupdate dengan kriteria  ".$whereconditon."<br>";
						        }else{

						        	$simpan = array(
								        'pa_id' => $id_pa
										,'ht_id' => $data->ht_id
										,'alur_perkara_id' => $data->alur_perkara_id
										,'nomor_perkara_pn' => $data->nomor_perkara_pn
										,'putusan_pn' => $data->putusan_pn
										,'nomor_perkara_banding' => $data->nomor_perkara_banding
										,'putusan_banding' => $data->putusan_banding
										,'nomor_perkara_kasasi' => $data->nomor_perkara_kasasi
										,'putusan_kasasi' => $data->putusan_kasasi
										,'nomor_perkara_pk' => $data->nomor_perkara_pk
										,'putusan_pk' => $data->putusan_pk
										,'eksekusi_putusan' => $data->eksekusi_putusan
										,'nomor_urut_perkara_eksekusi' => $data->nomor_urut_perkara_eksekusi
										,'eksekusi_nomor_perkara' => $data->eksekusi_nomor_perkara
										,'eksekusi_amar_putusan' => $data->eksekusi_amar_putusan
										,'pihak_pemohon_eksekusi' => $data->pihak_pemohon_eksekusi
										,'permohonan_eksekusi' => $data->permohonan_eksekusi
										,'pemohon_eksekusi' => $data->pemohon_eksekusi
										,'para_pihak' => $data->para_pihak
										,'penetapan_teguran_eksekusi' => $data->penetapan_teguran_eksekusi
										,'nomor_penetapan_teguran_eksekusi' => $data->nomor_penetapan_teguran_eksekusi
										,'pelaksanaan_teguran_eksekusi' => $data->pelaksanaan_teguran_eksekusi
										,'penetapan_sita_eksekusi' => $data->penetapan_sita_eksekusi
										,'nomor_penetapan_sita_eksekusi' => $data->nomor_penetapan_sita_eksekusi
										,'pelaksanaan_sita_eksekusi' => $data->pelaksanaan_sita_eksekusi
										,'jurusita_id' => $data->jurusita_id
										,'jurusita_nama' => $data->jurusita_nama
										,'penetapan_perintah_eksekusi_lelang' => $data->penetapan_perintah_eksekusi_lelang
										,'pelaksanaan_eksekusi_lelang' => $data->pelaksanaan_eksekusi_lelang
										,'penyerahan_hasil_lelang' => $data->penyerahan_hasil_lelang
										,'penetapan_perintah_eksekusi_rill' => $data->penetapan_perintah_eksekusi_rill
										,'pelaksanaan_eksekusi_rill' => $data->pelaksanaan_eksekusi_rill
										,'penetapan_noneksekusi' => $data->penetapan_noneksekusi
										,'alasan_eksekusi' => $data->alasan_eksekusi
										,'catatan_eksekusi' => $data->catatan_eksekusi
										,'prodeo_eksekusi' => $data->prodeo_eksekusi
										,'status_eksekusi_id' => $data->status_eksekusi_id
										,'status_eksekusi_text' => $data->status_eksekusi_text
										,'jenis_ht_id' => $data->jenis_ht_id
										,'jenis_ht_text' => $data->jenis_ht_text
										,'tgl_sertifikat' => $data->tgl_sertifikat
										,'no_sertifikat' => $data->no_sertifikat
										,'tanggal_cabut_ht' => $data->tanggal_cabut_ht
										,'diedit_oleh' => $data->diedit_oleh
										,'diedit_tanggal' => $data->diedit_tanggal
										,'diinput_oleh' => $data->diinput_oleh
										,'diinput_tanggal' => $data->diinput_tanggal
										,'diperbaharui_oleh' => $data->diperbaharui_oleh
										,'diperbaharui_tanggal' => $data->diperbaharui_tanggal);
						        	$res = $this->db->insert("perkara_eksekusi_ht", $simpan);
									echo "Membuat Baru dengan kriteria  ";
						        }

						        //perkara_detail
						        //perkara_detail

							}
						}
					//perkara_eksekusi
					//detail
						$query = base64_encode("SELECT * FROM perkara_eksekusi_detil_ht");
						$post = array("req" => $query);
						$url = $h['ip_satker'].'/api_monitoring/get_data_api';
						$q = $this->posting($url,$post);
						$y=json_decode($q);
						if(count($y)){
							foreach($y AS $data) {	
								$q = $this ->db ->query("SELECT pa_id FROM  perkara_eksekusi_detil_ht WHERE pa_id=$id_pa AND id=".$data->id);
								$jumlahnya=$q->num_rows();
						        $simpan = array(
								        'pa_id' => $id_pa
										,'id' => $data->id
										,'ht_id' => $data->ht_id
										,'alur_perkara_id' => $data->alur_perkara_id
										,'status_pihak_id' => $data->status_pihak_id
										,'status_pihak_text' => $data->status_pihak_text
										,'permohonan_eksekusi' => $data->permohonan_eksekusi
										,'pihak_asal' => $data->pihak_asal
										,'pihak_asal_text' => $data->pihak_asal_text
										,'pihak_id' => $data->pihak_id
										,'pihak_nama' => $data->pihak_nama
										,'pihak_diwakili' => $data->pihak_diwakili
										,'pemohon_id' => $data->pemohon_id
										,'pemohon_nama' => $data->pemohon_nama
										,'pemohon_pekerjaan' => $data->pemohon_pekerjaan
										,'pemohon_alamat' => $data->pemohon_alamat
										,'pemohon_tanggal_surat' => $data->pemohon_tanggal_surat
										,'pemohon_nomor_surat' => $data->pemohon_nomor_surat
										,'pemohon_eksekusi' => $data->pemohon_eksekusi
										,'pemberitahuan_putusan_pn' => $data->pemberitahuan_putusan_pn
										,'pemberitahuan_putusan_banding' => $data->pemberitahuan_putusan_banding
										,'pemberitahuan_putusan_kasasi' => $data->pemberitahuan_putusan_kasasi
										,'pemberitahuan_putusan_pk' => $data->pemberitahuan_putusan_pk
										,'diedit_oleh' => $data->diedit_oleh
										,'diedit_tanggal' => $data->diedit_tanggal
										,'diinput_oleh' => $data->diinput_oleh
										,'diinput_tanggal' => $data->diinput_tanggal
										,'diperbaharui_oleh' => $data->diperbaharui_oleh
										,'diperbaharui_tanggal' => $data->diperbaharui_tanggal);

						        if($jumlahnya==1){
						        	$whereconditon="pa_id=$id_pa AND id=".$data->id;
						        	$this->db->where($whereconditon);
									$res = $this->db->update("perkara_eksekusi_detil_ht", $simpan); 
						        }else{ 
						        	$res = $this->db->insert("perkara_eksekusi_detil_ht", $simpan);
						        } 
						        
							}
						}
					//detail
					//
					 // 
					//}  
					
					

				}
			return true;
			}
			catch (Exception $e){
				return false;
				log_message('error', $e);
			}
		}
		function eksekusi(){
			try{
				$group=(int)base64_decode($this->session->userdata('group'));
		        if($group==0 OR $group==2){
		            $list_satker = $this->basic->get_data('pengadilan_agama');
		        }else{
		        	$wherere="id=".(int)base64_decode($this->session->userdata('pa_id'));
		            $list_satker = $this->basic->get_data_where($wherere,'pengadilan_agama');
		        }
				foreach($list_satker->result_array() as $h){
					$id_pa=$h["id"];
					echo $h["nama"]."- ".$h['ip_satker']."<br>";
					//eksekusi
						$query = base64_encode("SELECT * FROM perkara_eksekusi");
						$post = array("req" => $query);
						$url = $h['ip_satker'].'/api_monitoring/get_data_api';
						$q = $this->posting($url,$post);
						$y=json_decode($q);
						if(count($y)){
							foreach($y AS $data) {	
								$q = $this ->db ->query("SELECT pa_id FROM  perkara_eksekusi WHERE pa_id=$id_pa AND perkara_id=".$data->perkara_id);
								$jumlahnya=$q->num_rows();
						        $simpan = array(
								        'pa_id' =>$id_pa
										,'perkara_id' => $data->perkara_id
										,'alur_perkara_id' => $data->alur_perkara_id
										,'nomor_perkara_pn' => $data->nomor_perkara_pn
										,'putusan_pn' => $data->putusan_pn
										,'nomor_perkara_banding' => $data->nomor_perkara_banding
										,'putusan_banding' => $data->putusan_banding
										,'nomor_perkara_kasasi' => $data->nomor_perkara_kasasi
										,'putusan_kasasi' => $data->putusan_kasasi
										,'nomor_perkara_pk' => $data->nomor_perkara_pk
										,'putusan_pk' => $data->putusan_pk
										,'eksekusi_putusan' => $data->eksekusi_putusan
										,'eksekusi_nomor_perkara' => $data->eksekusi_nomor_perkara
										,'nomor_urut_perkara_eksekusi' => $data->nomor_urut_perkara_eksekusi
										,'nomor_register_eksekusi' => $data->nomor_register_eksekusi
										,'eksekusi_amar_putusan' => $data->eksekusi_amar_putusan
										,'pihak_pemohon_eksekusi' => $data->pihak_pemohon_eksekusi
										,'permohonan_eksekusi' => $data->permohonan_eksekusi
										,'pemohon_eksekusi' => $data->pemohon_eksekusi
										,'para_pihak' => $data->para_pihak
										,'penetapan_teguran_eksekusi' => $data->penetapan_teguran_eksekusi
										,'nomor_penetapan_teguran_eksekusi' => $data->nomor_penetapan_teguran_eksekusi
										,'pelaksanaan_teguran_eksekusi' => $data->pelaksanaan_teguran_eksekusi
										,'penetapan_sita_eksekusi' => $data->penetapan_sita_eksekusi
										,'nomor_penetapan_sita_eksekusi' => $data->nomor_penetapan_sita_eksekusi
										,'pelaksanaan_sita_eksekusi' => $data->pelaksanaan_sita_eksekusi
										,'jurusita_id' => $data->jurusita_id
										,'jurusita_nama' => $data->jurusita_nama
										,'penetapan_perintah_eksekusi_lelang' => $data->penetapan_perintah_eksekusi_lelang
										,'pelaksanaan_eksekusi_lelang' => $data->pelaksanaan_eksekusi_lelang
										,'penyerahan_hasil_lelang' => $data->penyerahan_hasil_lelang
										,'penetapan_perintah_eksekusi_rill' => $data->penetapan_perintah_eksekusi_rill
										,'pelaksanaan_eksekusi_rill' => $data->pelaksanaan_eksekusi_rill
										,'penetapan_noneksekusi' => $data->penetapan_noneksekusi
										,'alasan_eksekusi' => $data->alasan_eksekusi
										,'catatan_eksekusi' => $data->catatan_eksekusi
										,'prodeo_eksekusi' => $data->prodeo_eksekusi
										,'status_eksekusi_id' => $data->status_eksekusi_id
										,'diterima_permohonan' => $data->diterima_permohonan
										,'panggilan_parapihak' => $data->panggilan_parapihak
										,'penetapan_ketua' => $data->penetapan_ketua
										,'sk_objek_tidak_punya_kekuatan_hukum' => $data->sk_objek_tidak_punya_kekuatan_hukum
										,'surat_tergugat_objek_non_executable' => $data->surat_tergugat_objek_non_executable
										,'panggilan_pihak_non_executable' => $data->panggilan_pihak_non_executable
										,'upaya_kesepakatan_kompensasi' => $data->upaya_kesepakatan_kompensasi
										,'penetapan_ketua_kompensasi' => $data->penetapan_ketua_kompensasi
										,'upaya_hukum_kma' => $data->upaya_hukum_kma
										,'penetapan_kma_kompensasi' => $data->penetapan_kma_kompensasi
										,'uangpaksa_putusan_hakim' => $data->uangpaksa_putusan_hakim
										,'uangpaksa_penetapan_ketua' => $data->uangpaksa_penetapan_ketua
										,'surat_ketua_tergugat_uangpaksa' => $data->surat_ketua_tergugat_uangpaksa
										,'surat_peringatan_uangpaksa' => $data->surat_peringatan_uangpaksa
										,'perintah_ketua_saksi_administratif' => $data->perintah_ketua_saksi_administratif
										,'sanksi_administratif_dari_pejabat' => $data->sanksi_administratif_dari_pejabat
										,'pengumuman_ketua_panitera_js' => $data->pengumuman_ketua_panitera_js
										,'pengumuman_media' => $data->pengumuman_media
										,'surat_presiden' => $data->surat_presiden
										,'surat_lembaga_perwakilan_rakyat' => $data->surat_lembaga_perwakilan_rakyat
										,'tanggal_cabut_eks' => $data->tanggal_cabut_eks
										,'diedit_oleh' => $data->diedit_oleh
										,'diedit_tanggal' => $data->diedit_tanggal
										,'diinput_oleh' => $data->diinput_oleh
										,'diinput_tanggal' => $data->diinput_tanggal
										,'diperbaharui_oleh' => $data->diperbaharui_oleh
										,'diperbaharui_tanggal' => $data->diperbaharui_tanggal);


						        if($jumlahnya==1){
						        	$whereconditon="pa_id=$id_pa AND perkara_id=".$data->perkara_id;
						        	$this->db->where($whereconditon);
									$res = $this->db->update("perkara_eksekusi", $simpan); 
						        }else{

						        	$simpan = array(
								        'pa_id' => $id_pa
										,'perkara_id' => $data->perkara_id
										,'alur_perkara_id' => $data->alur_perkara_id
										,'nomor_perkara_pn' => $data->nomor_perkara_pn
										,'putusan_pn' => $data->putusan_pn
										,'nomor_perkara_banding' => $data->nomor_perkara_banding
										,'putusan_banding' => $data->putusan_banding
										,'nomor_perkara_kasasi' => $data->nomor_perkara_kasasi
										,'putusan_kasasi' => $data->putusan_kasasi
										,'nomor_perkara_pk' => $data->nomor_perkara_pk
										,'putusan_pk' => $data->putusan_pk
										,'eksekusi_putusan' => $data->eksekusi_putusan
										,'eksekusi_nomor_perkara' => $data->eksekusi_nomor_perkara
										,'nomor_urut_perkara_eksekusi' => $data->nomor_urut_perkara_eksekusi
										,'nomor_register_eksekusi' => $data->nomor_register_eksekusi
										,'eksekusi_amar_putusan' => $data->eksekusi_amar_putusan
										,'pihak_pemohon_eksekusi' => $data->pihak_pemohon_eksekusi
										,'permohonan_eksekusi' => $data->permohonan_eksekusi
										,'pemohon_eksekusi' => $data->pemohon_eksekusi
										,'para_pihak' => $data->para_pihak
										,'penetapan_teguran_eksekusi' => $data->penetapan_teguran_eksekusi
										,'nomor_penetapan_teguran_eksekusi' => $data->nomor_penetapan_teguran_eksekusi
										,'pelaksanaan_teguran_eksekusi' => $data->pelaksanaan_teguran_eksekusi
										,'penetapan_sita_eksekusi' => $data->penetapan_sita_eksekusi
										,'nomor_penetapan_sita_eksekusi' => $data->nomor_penetapan_sita_eksekusi
										,'pelaksanaan_sita_eksekusi' => $data->pelaksanaan_sita_eksekusi
										,'jurusita_id' => $data->jurusita_id
										,'jurusita_nama' => $data->jurusita_nama
										,'penetapan_perintah_eksekusi_lelang' => $data->penetapan_perintah_eksekusi_lelang
										,'pelaksanaan_eksekusi_lelang' => $data->pelaksanaan_eksekusi_lelang
										,'penyerahan_hasil_lelang' => $data->penyerahan_hasil_lelang
										,'penetapan_perintah_eksekusi_rill' => $data->penetapan_perintah_eksekusi_rill
										,'pelaksanaan_eksekusi_rill' => $data->pelaksanaan_eksekusi_rill
										,'penetapan_noneksekusi' => $data->penetapan_noneksekusi
										,'alasan_eksekusi' => $data->alasan_eksekusi
										,'catatan_eksekusi' => $data->catatan_eksekusi
										,'prodeo_eksekusi' => $data->prodeo_eksekusi
										,'status_eksekusi_id' => $data->status_eksekusi_id
										,'status_eksekusi_text' => $data->status_eksekusi_text
										,'diterima_permohonan' => $data->diterima_permohonan
										,'panggilan_parapihak' => $data->panggilan_parapihak
										,'penetapan_ketua' => $data->penetapan_ketua
										,'sk_objek_tidak_punya_kekuatan_hukum' => $data->sk_objek_tidak_punya_kekuatan_hukum
										,'surat_tergugat_objek_non_executable' => $data->surat_tergugat_objek_non_executable
										,'panggilan_pihak_non_executable' => $data->panggilan_pihak_non_executable
										,'upaya_kesepakatan_kompensasi' => $data->upaya_kesepakatan_kompensasi
										,'penetapan_ketua_kompensasi' => $data->penetapan_ketua_kompensasi
										,'upaya_hukum_kma' => $data->upaya_hukum_kma
										,'penetapan_kma_kompensasi' => $data->penetapan_kma_kompensasi
										,'uangpaksa_putusan_hakim' => $data->uangpaksa_putusan_hakim
										,'uangpaksa_penetapan_ketua' => $data->uangpaksa_penetapan_ketua
										,'surat_ketua_tergugat_uangpaksa' => $data->surat_ketua_tergugat_uangpaksa
										,'surat_peringatan_uangpaksa' => $data->surat_peringatan_uangpaksa
										,'perintah_ketua_saksi_administratif' => $data->perintah_ketua_saksi_administratif
										,'sanksi_administratif_dari_pejabat' => $data->sanksi_administratif_dari_pejabat
										,'pengumuman_ketua_panitera_js' => $data->pengumuman_ketua_panitera_js
										,'pengumuman_media' => $data->pengumuman_media
										,'surat_presiden' => $data->surat_presiden
										,'surat_lembaga_perwakilan_rakyat' => $data->surat_lembaga_perwakilan_rakyat
										,'tanggal_cabut_eks' => $data->tanggal_cabut_eks
										,'diedit_oleh' => $data->diedit_oleh
										,'diedit_tanggal' => $data->diedit_tanggal
										,'diinput_oleh' => $data->diinput_oleh
										,'diinput_tanggal' => $data->diinput_tanggal
										,'diperbaharui_oleh' => $data->diperbaharui_oleh
										,'diperbaharui_tanggal' => $data->diperbaharui_tanggal);
						        	$res = $this->db->insert("perkara_eksekusi", $simpan);
						        }
							}
						}
					//eksekusi
					 // 
					//}  
					//detail
						$query = base64_encode("SELECT * FROM perkara_eksekusi_detil");
						$post = array("req" => $query);
						$url = $h['ip_satker'].'/api_monitoring/get_data_api';
						$q = $this->posting($url,$post);
						$y=json_decode($q);
						if(count($y)){
							foreach($y AS $data) {	
								$q = $this ->db ->query("SELECT pa_id FROM  perkara_eksekusi_detil WHERE pa_id=$id_pa AND id=".$data->id);
								$jumlahnya=$q->num_rows();
						        $simpan = array(
								        'pa_id' => $id_pa
										,'id' => $data->id
										,'perkara_id' => $data->perkara_id
										,'alur_perkara_id' => $data->alur_perkara_id
										,'status_pihak_id' => $data->status_pihak_id
										,'status_pihak_text' => $data->status_pihak_text
										,'permohonan_eksekusi' => $data->permohonan_eksekusi
										,'pihak_asal' => $data->pihak_asal
										,'pihak_asal_text' => $data->pihak_asal_text
										,'pihak_id' => $data->pihak_id
										,'pihak_nama' => $data->pihak_nama
										,'pihak_diwakili' => $data->pihak_diwakili
										,'pemohon_id' => $data->pemohon_id
										,'pemohon_nama' => $data->pemohon_nama
										,'pemohon_pekerjaan' => $data->pemohon_pekerjaan
										,'pemohon_alamat' => $data->pemohon_alamat
										,'pemohon_tanggal_surat' => $data->pemohon_tanggal_surat
										,'pemohon_nomor_surat' => $data->pemohon_nomor_surat
										,'pemohon_eksekusi' => $data->pemohon_eksekusi
										,'pemberitahuan_putusan_pn' => $data->pemberitahuan_putusan_pn
										,'pemberitahuan_putusan_banding' => $data->pemberitahuan_putusan_banding
										,'pemberitahuan_putusan_kasasi' => $data->pemberitahuan_putusan_kasasi
										,'pemberitahuan_putusan_pk' => $data->pemberitahuan_putusan_pk
										,'diedit_oleh' => $data->diedit_oleh
										,'diedit_tanggal' => $data->diedit_tanggal
										,'diinput_oleh' => $data->diinput_oleh
										,'diinput_tanggal' => $data->diinput_tanggal
										,'diperbaharui_oleh' => $data->diperbaharui_oleh
										,'diperbaharui_tanggal' => $data->diperbaharui_tanggal);


						        if($jumlahnya==1){
						        	$whereconditon="pa_id=$id_pa AND id=".$data->id;
						        	$this->db->where($whereconditon);
									$res = $this->db->update("perkara_eksekusi_detil", $simpan); 
						        }else{ 
						        	$res = $this->db->insert("perkara_eksekusi_detil", $simpan);
						        }
							}
						}
					//detail
					
					

				}
			return true;
			}
			catch (Exception $e){
				return false;
				log_message('error', $e);
			}
		}
		function pihak(){
			try{
				$group=(int)base64_decode($this->session->userdata('group'));
		        if($group==0 OR $group==2){
		            $list_satker = $this->basic->get_data('pengadilan_agama');
		        }else{
		        	$wherere="id=".(int)base64_decode($this->session->userdata('pa_id'));
		            $list_satker = $this->basic->get_data_where($wherere,'pengadilan_agama');
		        }
				foreach($list_satker->result_array() as $h){
					$id_pa=$h["id"];
					echo $h["nama"]."- ".$h['ip_satker']."<br>";
					$query = base64_encode("SELECT * FROM pihak WHERE id IN (SELECT pihak_id FROM perkara_eksekusi_detil) OR id IN (SELECT pihak_id FROM perkara_eksekusi_detil_ht)");
					$post = array("req" => $query);
					$url = $h['ip_satker'].'/api_monitoring/get_data_api';
					$q = $this->posting($url,$post);
					$y=json_decode($q);
					if(count($y)){
						foreach($y AS $data) {	
							$q = $this ->db ->query("SELECT pa_id FROM  pihak WHERE pa_id=$id_pa AND id=".$data->id);
							$jumlahnya=$q->num_rows();
					        $simpan = array(
							        'id' => $data->id
									,'pa_id' => $id_pa
									,'jenis_pihak_id' => $data->jenis_pihak_id
									,'jenis_indentitas' => $data->jenis_indentitas
									,'nomor_indentitas' => $data->nomor_indentitas
									,'nama' => $data->nama
									,'tempat_lahir' => $data->tempat_lahir
									,'tanggal_lahir' => $data->tanggal_lahir
									,'jenis_kelamin' => $data->jenis_kelamin
									,'golongan_darah' => $data->golongan_darah
									,'alamat' => $data->alamat
									,'rtrw' => $data->rtrw
									,'kelurahan' => $data->kelurahan
									,'kecamatan' => $data->kecamatan
									,'kabupaten_id' => $data->kabupaten_id
									,'kabupaten' => $data->kabupaten
									,'propinsi_id' => $data->propinsi_id
									,'propinsi' => $data->propinsi
									,'telepon' => $data->telepon
									,'fax' => $data->fax
									,'email' => $data->email
									,'agama_id' => $data->agama_id
									,'agama_nama' => $data->agama_nama
									,'status_kawin' => $data->status_kawin
									,'pekerjaan' => $data->pekerjaan
									,'pendidikan_id' => $data->pendidikan_id
									,'pendidikan' => $data->pendidikan
									,'warga_negara_id' => $data->warga_negara_id
									,'warga_negara' => $data->warga_negara
									,'nama_ayah' => $data->nama_ayah
									,'nama_ibu' => $data->nama_ibu
									,'keterangan' => $data->keterangan
									,'foto' => $data->foto
									,'difabel' => $data->difabel
									,'diedit_oleh' => $data->diedit_oleh
									,'diedit_tanggal' => $data->diedit_tanggal
									,'diinput_oleh' => $data->diinput_oleh
									,'diinput_tanggal' => $data->diinput_tanggal
									,'diperbaharui_oleh' => $data->diperbaharui_oleh
									,'diperbaharui_tanggal' => $data->diperbaharui_tanggal);



					        if($jumlahnya==1){
					        	$whereconditon="pa_id=$id_pa AND id=".$data->id;
					        	$this->db->where($whereconditon);
								$res = $this->db->update("pihak", $simpan); 
					        }else{
					        	$res = $this->db->insert("pihak", $simpan);
					        }
						}
					}
					//
					 // 
					//}  
					
					

				}
			return true;
			}
			catch (Exception $e){
				return false;
				log_message('error', $e);
			}
		}
		function singkron_all(){
			$this->eksekusi_ht();
			$this->eksekusi();
			$this->pihak();
		}
	}
