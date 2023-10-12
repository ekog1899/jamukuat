<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	public function __construct(){
		parent::__construct();		
			// $this->basic->squrity();
		$this->load->model('basic');
		$this->load->model('api_m');
	}


	public function jamukuat_02_2023(){
		$e=$_POST;
		$kd_satker=$e['id_satker_kirim'];
		$tanggal=$e['tanggal'];
		$d=json_decode($e['insert'], true);
		
		
		$q = $this->basic->get_data_where(array('tanggal' => $tanggal, 'kd_satker'=>$kd_satker),'log_kirim');
		
		if($q->num_rows()==0){

			foreach ($d['perkara_pihak_pns_putusan'] as $eju1) {

				$insss=array(
					'perkara_id' => $eju1['perkara_id'],
					'nomor_perkara' => $eju1['nomor_perkara'],
					'jenis_perkara' => $eju1['jenis_perkara_text'],
					'jenis_pihak' => $eju1['jenis_pihak'],
					'nama' => $eju1['nama'],
			 		'tanggal_putusan' => $eju1['tanggal_putusan'],
			 		'amar_putusan' => $eju1['amar_putusan'],
					'kd_satker' => $kd_satker
				);
				$this->basic->insert_data('perkara_putusan_pns',$insss);

			}

			foreach ($d['perkara_pihak_pns_pendaftaran'] as $eee) {

				$ins=array(
					'perkara_id' => $eee['perkara_id'],
					'nomor_perkara' => $eee['nomor_perkara'],
					'tanggal_pendaftaran' => $eee['tanggal_pendaftaran'],
					'jenis_perkara' => $eee['jenis_perkara_text'],
					'jenis_pihak' => $eee['jenis_pihak'],
					'nama' => $eee['nama'],
					'pekerjaan' => $eee['pekerjaan'],
					'alamat' => $eee['alamat'],
					'telepon' => $eee['telepon'],
					'tempat_lahir' => $eee['tempat_lahir'],
					'tanggal_lahir' => $eee['tanggal_lahir'],
					'jenis_indentitas' => $eee['jenis_indentitas'],
					'nomor_indentitas' => $eee['nomor_indentitas'],
					'tanggal_surat' => $eee['tanggal_surat'],
					'nomor_surat' => $eee['nomor_surat'],
					'nama_pejabat' => $eee['nama_pejabat'],
					'pejabat_pejabat' => $eee['pejabat_pejabat'],
		
					'izin_cerai' => $eee['izin_cerai'],
					'kd_satker' => $kd_satker
				);
				$this->basic->insert_data('perkara_pendaftaran_pns',$ins);

			}

			
			foreach ($d['perkara_tambahan'] as $lll) {

				$ins=array(
					'perkara_id' => $lll['perkara_id'],
					'nomor_perkara' => $lll['nomor_perkara'],
					'jenis_perkara_text' => $lll['jenis_perkara_text'],
					'jenis_perkara_id' => $lll['jenis_perkara_id'],
					'tanggal_pendaftaran' => $lll['tanggal_pendaftaran'],
					'tanggal_putusan' => $lll['tanggal_putusan'],
					'amar_putusan' => $lll['amar_putusan'],
					'para_pihak' => $lll['para_pihak'],
					'status_putusan_id' => $lll['status_putusan_id'],
					'kd_satker' => $kd_satker
				);
				$this->basic->insert_data('perkara',$ins);

			}

			foreach ($d['perkara_pihak1'] as $ooo) {

				$ins=array(
					'perkara_id' => $ooo['perkara_id'],
					'urutan' => $ooo['urutan'],
					'nama' => $ooo['nama'],
					'pekerjaan' => $ooo['pekerjaan'],
					'alamat' => $ooo['alamat'],
					'tempat_lahir' => $ooo['tempat_lahir'],
					'tanggal_lahir' => $ooo['tanggal_lahir'],
					'telepon' => $ooo['telepon'],
					'nomor_indentitas' => $ooo['nomor_indentitas'],
					'jenis_indentitas' => $ooo['jenis_indentitas'],
					'kd_satker' => $kd_satker
				);
				$this->basic->insert_data('perkara_pihak1',$ins);

			}

			foreach ($d['perkara_pihak2'] as $ppp) {

				$ins=array(
					'perkara_id' => $ppp['perkara_id'],
					'urutan' => $ppp['urutan'],
					'nama' => $ppp['nama'],
					'pekerjaan' => $ppp['pekerjaan'],
					'alamat' => $ppp['alamat'],
					'tempat_lahir' => $ppp['tempat_lahir'],
					'tanggal_lahir' => $ppp['tanggal_lahir'],
					'telepon' => $ppp['telepon'],
					'nomor_indentitas' => $ppp['nomor_indentitas'],
					'jenis_indentitas' => $ppp['jenis_indentitas'],
					'kd_satker' => $kd_satker
				);
				$this->basic->insert_data('perkara_pihak2',$ins);

			}


			foreach ($d['perkara'] as $ddd) {

				$ins=array(
					'perkara_id' => $ddd['perkara_id'],
					'nomor_perkara' => $ddd['nomor_perkara'],
					'jenis_perkara_text' => $ddd['jenis_perkara_text'],
					'jenis_perkara_id' => $ddd['jenis_perkara_id'],
					'tanggal_putusan' => $ddd['tanggal_putusan'],
					'amar_putusan' => $ddd['amar_putusan'],
					'amar_ikrar_talak' => $ddd['amar_ikrar_talak'],
					'tgl_ikrar_talak' => $ddd['tgl_ikrar_talak'],
					'tanggal_bht' => $ddd['tanggal_bht'],
					'nomor_akta_cerai' => $ddd['nomor_akta_cerai'],
					'tanggal_akta_cerai' => $ddd['tgl_akta_cerai'],
					'tgl_nikah' => $ddd['tgl_nikah'],
					'tgl_kutipan_akta_nikah' => $ddd['tgl_kutipan_akta_nikah'],
					'no_kutipan_akta_nikah' => $ddd['no_kutipan_akta_nikah'],
					'kua_tempat_nikah' => $ddd['kua_tempat_nikah'],
					'prodeo' => $ddd['id_pembiayaan'],
					'keadaan_istri' => $ddd['keadaan_istri'],
					'qobla_bada' => $ddd['qobla_bada'],
					'perceraian_ke' => $ddd['perceraian_ke'],
					'kd_satker' => $kd_satker
				);
				$this->basic->insert_data('perkara_akta_cerai',$ins);

			}


			foreach ($d['pihak'] as $kk) {
				if($kk['pihak_ke']=='1'){
					$where = array('perkara_id' => $kk['ids'], 'kd_satker' => $kd_satker);
					$edit = array('nama_pihak1' => $kk['nama'],
						'nik_pihak1' => $kk['nomor_indentitas'],
						'alamat_pihak1' => $kk['alamat'],
						'pekerjaan_pihak1' => $kk['pekerjaan'],
						'tempatlahir_pihak1' => $kk['tempat_lahir'],
						'tanggallahir_pihak1' => $kk['tanggal_lahir'],
						'difabel_pihak1' => $kk['difabel'],
						'tanggal'=> date('Y-m-d H:i:s')
					);
					$this->basic->update_data($where,'perkara_akta_cerai',$edit);
				}else{
					$where = array('perkara_id' => $kk['ids'], 'kd_satker' => $kd_satker);
					$edit = array('nama_pihak2' => $kk['nama'],
						'nik_pihak2' => $kk['nomor_indentitas'],
						'alamat_pihak2' => $kk['alamat'],
						'pekerjaan_pihak2' => $kk['pekerjaan'],
						'tempatlahir_pihak2' => $kk['tempat_lahir'],
						'tanggallahir_pihak2' => $kk['tanggal_lahir'],
						'difabel_pihak2' => $kk['difabel']
					);
					$this->basic->update_data($where,'perkara_akta_cerai',$edit);
				}

			}

			foreach ($d['perkara_tambahan_bht'] as $kkl) {
				
					$where = array('perkara_id' => $kkl['perkara_id'], 'kd_satker' => $kd_satker);
					$edit = array('tgl_bht' => $kkl['tanggal_bht']);
					$this->basic->update_data($where,'perkara',$edit);
			}

		$insa=array(
			'tanggal' => $tanggal,
			'tanggal_kirim' => date('Y-m-d H:i:s'),
			'kd_satker' => $kd_satker,
			'update_02_2023' => date('Y-m-d H:i:s')
		);
		$this->basic->insert_data('log_kirim',$insa);

		}
				
		$output= array("status" => true);

		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
		echo json_encode($output);

			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
	}


	public function cek_update_data(){
		$e=$_POST;
		$kd_satker=$e['kd_satker'];
		$d=json_decode($e['insert'], true);
		
		$q = $this->api_m->cek_update($kd_satker);
		
		if($q->num_rows()==1){

		$output= array("status" => "updated");

		}
		
		else{

		$output= array("status" => "belum");
		}

		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
		echo json_encode($output);
	}

	public function update_data(){
		$e=$_POST;
		$kd_satker=$e['id_satker_kirim'];
		$tanggal=$e['tanggal'];
		$d=json_decode($e['insert'], true);
		
		$q = $this->api_m->cek_update($kd_satker);
		
		if($q->num_rows()==0){

			foreach ($d['perkara_tambahan'] as $lll) {

				$ins=array(
					'perkara_id' => $lll['perkara_id'],
					'nomor_perkara' => $lll['nomor_perkara'],
					'jenis_perkara_text' => $lll['jenis_perkara_text'],
					'jenis_perkara_id' => $lll['jenis_perkara_id'],
					'tanggal_pendaftaran' => $lll['tanggal_pendaftaran'],
					'tanggal_putusan' => $lll['tanggal_putusan'],
					'amar_putusan' => $lll['amar_putusan'],
					'para_pihak' => $lll['para_pihak'],
					'status_putusan_id' => $lll['status_putusan_id'],
					'tgl_bht' => $lll['tanggal_bht'],
					'kd_satker' => $kd_satker
				);
				$this->basic->insert_data('perkara',$ins);

			}

			foreach ($d['perkara_pihak1'] as $ooo) {

				$ins=array(
					'perkara_id' => $ooo['perkara_id'],
					'urutan' => $ooo['urutan'],
					'nama' => $ooo['nama'],
					'pekerjaan' => $ooo['pekerjaan'],
					'alamat' => $ooo['alamat'],
					'tempat_lahir' => $ooo['tempat_lahir'],
					'tanggal_lahir' => $ooo['tanggal_lahir'],
					'telepon' => $ooo['telepon'],
					'nomor_indentitas' => $ooo['nomor_indentitas'],
					'jenis_indentitas' => $ooo['jenis_indentitas'],
					'kd_satker' => $kd_satker
				);
				$this->basic->insert_data('perkara_pihak1',$ins);

			}

			foreach ($d['perkara_pihak2'] as $ppp) {

				$ins=array(
					'perkara_id' => $ppp['perkara_id'],
					'urutan' => $ppp['urutan'],
					'nama' => $ppp['nama'],
					'pekerjaan' => $ppp['pekerjaan'],
					'alamat' => $ppp['alamat'],
					'tempat_lahir' => $ppp['tempat_lahir'],
					'tanggal_lahir' => $ppp['tanggal_lahir'],
					'telepon' => $ppp['telepon'],
					'nomor_indentitas' => $ppp['nomor_indentitas'],
					'jenis_indentitas' => $ppp['jenis_indentitas'],
					'kd_satker' => $kd_satker
				);
				$this->basic->insert_data('perkara_pihak2',$ins);

			}


		$insa=array(
			'update_02_2023' => date('Y-m-d H:i:s'),
		);
		$where = array('tanggal' => $tanggal, 'kd_satker' => $kd_satker);
		$this->basic->update_data($where,'log_kirim',$insa);

		$output= array("status" => true);

		}
		
		else{

		$output= array("status" => false);

		}
		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
		echo json_encode($output);

			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
	}

	public function update_sukses(){
		$e=$_POST;
		$kd_satker=$e['id_satker_kirim'];

		$insa=array(
			'update_02_2023' => date('Y-m-d H:i:s'),
		);
		$where = array('id' => $kd_satker);
		$this->basic->update_data($where,'pengadilan_agama',$insa);

		$output= array("status" => true);

		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
		echo json_encode($output);

	}

	
	public function jamukuat(){
		$e=$_POST;
		$kd_satker=$e['id_satker_kirim'];
		$tanggal=$e['tanggal'];
		$d=json_decode($e['insert'], true);
		
		
		$q = $this->basic->get_data_where(array('tanggal' => $tanggal, 'kd_satker'=>$kd_satker),'log_kirim');
		
		if($q->num_rows()==0){



			foreach ($d['putusan_pns'] as $eee) {

				$ins=array(
					'perkara_id' => $eee['perkara_id'],
					'nomor_perkara' => $eee['nomor_perkara'],
					'tanggal_putusan' => $eee['tanggal_putusan'],
					'jenis_perkara' => $eee['jenis_perkara'],
					'jenis_pihak' => $eee['jenis_pihak'],
					'nama' => $eee['nama'],
					'unit_kerja' => $eee['unit_kerja'],
					'unit_kerja_lain' => $eee['unit_kerja_lain'],
					'nip' => $eee['nip'],
					'satuan_kerja' => $eee['satuan_kerja'],
					'amar_putusan' => $eee['amar_putusan'],
					'kd_satker' => $kd_satker
				);
				$this->basic->insert_data('perkara_putusan_pns',$ins);

			}

			foreach ($d['pendaftaran_pns'] as $eee) {

				$ins=array(
					'perkara_id' => $eee['perkara_id'],
					'nomor_perkara' => $eee['nomor_perkara'],
					'tanggal_pendaftaran' => $eee['tanggal_pendaftaran'],
					'jenis_perkara' => $eee['jenis_perkara'],
					'jenis_pihak' => $eee['jenis_pihak'],
					'nama' => $eee['nama'],
					'unit_kerja' => $eee['unit_kerja'],
					'nip' => $eee['nip'],
					'satuan_kerja' => $eee['satuan_kerja'],
					'unit_kerja_lain' => $eee['unit_kerja_lain'],
					'izin_cerai' => $eee['izin_cerai'],
					'kd_satker' => $kd_satker
				);
				$this->basic->insert_data('perkara_pendaftaran_pns',$ins);

			}


			foreach ($d['perkara'] as $ddd) {

				$ins=array(
					'perkara_id' => $ddd['perkara_id'],
					'nomor_perkara' => $ddd['nomor_perkara'],
					'jenis_perkara_text' => $ddd['jenis_perkara_text'],
					'jenis_perkara_id' => $ddd['jenis_perkara_id'],
					'tanggal_putusan' => $ddd['tanggal_putusan'],
					'amar_putusan' => $ddd['amar_putusan'],
					'amar_ikrar_talak' => $ddd['amar_ikrar_talak'],
					'tgl_ikrar_talak' => $ddd['tgl_ikrar_talak'],
					'tanggal_bht' => $ddd['tanggal_bht'],
					'nomor_akta_cerai' => $ddd['nomor_akta_cerai'],
					'tanggal_akta_cerai' => $ddd['tgl_akta_cerai'],
					'tgl_nikah' => $ddd['tgl_nikah'],
					'tgl_kutipan_akta_nikah' => $ddd['tgl_kutipan_akta_nikah'],
					'no_kutipan_akta_nikah' => $ddd['no_kutipan_akta_nikah'],
					'kua_tempat_nikah' => $ddd['kua_tempat_nikah'],
					'prodeo' => $ddd['id_pembiayaan'],
					'keadaan_istri' => $ddd['keadaan_istri'],
					'qobla_bada' => $ddd['qobla_bada'],
					'perceraian_ke' => $ddd['perceraian_ke'],
					'kd_satker' => $kd_satker
				);
				$this->basic->insert_data('perkara_akta_cerai',$ins);

			}


			foreach ($d['pihak'] as $kk) {
				if($kk['pihak_ke']=='1'){
					$where = array('perkara_id' => $kk['ids'], 'kd_satker' => $kd_satker);
					$edit = array('nama_pihak1' => $kk['nama'],
						'nik_pihak1' => $kk['nomor_indentitas'],
						'alamat_pihak1' => $kk['alamat'],
						'pekerjaan_pihak1' => $kk['pekerjaan'],
						'tempatlahir_pihak1' => $kk['tempat_lahir'],
						'tanggallahir_pihak1' => $kk['tanggal_lahir'],
						'difabel_pihak1' => $kk['difabel'],
						'tanggal'=> date('Y-m-d H:i:s')
					);
					$this->basic->update_data($where,'perkara_akta_cerai',$edit);
				}else{
					$where = array('perkara_id' => $kk['ids'], 'kd_satker' => $kd_satker);
					$edit = array('nama_pihak2' => $kk['nama'],
						'nik_pihak2' => $kk['nomor_indentitas'],
						'alamat_pihak2' => $kk['alamat'],
						'pekerjaan_pihak2' => $kk['pekerjaan'],
						'tempatlahir_pihak2' => $kk['tempat_lahir'],
						'tanggallahir_pihak2' => $kk['tanggal_lahir'],
						'difabel_pihak2' => $kk['difabel']
					);
					$this->basic->update_data($where,'perkara_akta_cerai',$edit);
				}

			}

		$insa=array(
			'tanggal' => $tanggal,
			'tanggal_kirim' => date('Y-m-d H:i:s'),
			'kd_satker' => $kd_satker
		);
		$this->basic->insert_data('log_kirim',$insa);

		}
		
	
		
		$output= array("status" => true);

		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
		echo json_encode($output);

			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
	}



	public function cek_lapor_bkd(){
		$kd_satker=$this->input->post('kd_satker');
		// print_r($_POST);
		// exit();
		$insert = $this->api_m->cek_lapor_bkd($kd_satker)->result_array();

		$output= array("insert" => $insert,"jum"=>count($insert));

		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
		echo json_encode($output);

	}

	public function kirim_email(){
		$this->kirim_email_daftar();
		$this->kirim_email_putusan();
	}

	public function kirim_email_daftar(){

		$this->load->library('Mailer');
		$data=$this->api_m->get_data_daftar();
		foreach ($data->result_array() as $h) {

			if($h['email_satker']!=NULL OR $h['email_satker']!=""){

				$get_message = $this->api_m->get_data_where(array('id'=>'1'),'template_email')->row_array();

				$template_pesan=$get_message['pesan'];
				$cari = array("#nama_unit#","#nama_pihak#","#nip_pihak#","#satuan_kerja#","#nomor_perkara#","#jenis_perkara#","#izin_cerai#","#nama_pa#","#tanggal_pendaftaran#","#jenis_pihak#");
				if($h['izin_cerai']==0){
					$izin_cerai='Tidak Ada Izin Cerai';
				}else{
					$izin_cerai='Ada Izin Cerai';
				}
				if($h['jenis_pihak']==1){
					$jenis_pihak='Penggugat/Pemohon';
				}else{
					$jenis_pihak='Tergugat/Termohon';
				}

				$ganti = array($h['nama_satker'], $h['nama'], $h['nip'], $h['satuan_kerja'], $h['nomor_perkara'], $h['jenis_perkara'], $izin_cerai, $h['nama_pa'], tgl_indo($h['tanggal_pendaftaran']), $jenis_pihak);
				$message = str_replace($cari, $ganti, $template_pesan);


				$sendmail = array(
			  'email_penerima'=>$h['email_satker'],
			  'subjek'=>'Pemberitahuan Pendaftaran Perkara PNS',
			  'content'=>$message
			  //'attachment'=>$attachment
				);

//print_r($sendmail);

				$this->mailer->send($sendmail);

				 $where = array('id' => $h['ids']);
				 	$edit = array('kirim_email' => 1);
				 	$this->api_m->update_data($where,'perkara_pendaftaran_pns',$edit);
			

			}




		}
	}


	public function kirim_email_putusan(){
		$data=$this->api_m->get_data_putusan();
		foreach ($data->result_array() as $h) {

			if($h['email_satker']!=NULL OR $h['email_satker']!=""){

			$get_message = $this->api_m->get_data_where(array('id'=>'2'),'template_email')->row_array();
			$template_pesan=$get_message['pesan'];
			$cari = array("#nama_unit#","#nama_pihak#","#nip_pihak#","#satuan_kerja#","#nomor_perkara#","#jenis_perkara#","#amar_putusan#","#nama_pa#","#tanggal_putusan#","#jenis_pihak#");
			if($h['jenis_pihak']==1){
				$jenis_pihak='Penggugat/Pemohon';
			}else{
				$jenis_pihak='Tergugat/Termohon';
			}

			$ganti = array($h['nama_satker'], $h['nama'], $h['nip'], $h['satuan_kerja'], $h['nomor_perkara'], $h['jenis_perkara'], $h['amar_putusan'], $h['nama_pa'], tgl_indo($h['tanggal_putusan']),$jenis_pihak);
			$message = str_replace($cari, $ganti, $template_pesan);

			
			$sendmail = array(
			  'email_penerima'=>$h['email_satker'],
			  'subjek'=>'Pemberitahuan Putusan Perkara PNS',
			  'content'=>$message
			  //'attachment'=>$attachment
				);

//print_r($sendmail);

				$this->mailer->send($sendmail);


				$where = array('id' => $h['ids']);
				$edit = array('kirim_email' => 1);
				$this->api_m->update_data($where,'perkara_putusan_pns',$edit);

					//berhasil kirim
			
		}

		}
	}



}
