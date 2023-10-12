<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dispensasi extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('encryption');
	}
	function index(){
		$this->load->view('data_perkara/data_dispensasi_kawin');
	}
	function data_tahun(){
		$data["tahun"]= $this->input->post('tahun');
		$this->load->view('data_perkara/data_dispensasi_kawin_data_tahun',$data);
	}
	function ambil_data(){
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
				$sql="SELECT year(b.tanggal_putusan) AS tahun ,(select count(perkara_id) FROM perkara WHERE jenis_perkara_id=362 AND  year(tanggal_pendaftaran)=year(b.tanggal_putusan)) AS diterima ,SUM(IF(b.status_putusan_id=67 OR b.status_putusan_id=7 OR b.status_putusan_id=85 , 1, 0)) AS dicabut ,count(b.perkara_id) AS diputus ,SUM(IF(b.status_putusan_id=62, 1, 0)) AS dikabulkan ,SUM(IF(b.status_putusan_id=63 OR b.status_putusan_id=92, 1, 0)) AS ditolak ,SUM(IF(b.status_putusan_id=64, 1, 0)) AS tidak_diterima , SUM(IF(b.status_putusan_id=65 OR b.status_putusan_id=93 , 1, 0)) AS gugur ,SUM(IF(b.status_putusan_id=66, 1, 0)) AS coret FROM perkara_putusan AS b LEFT JOIN perkara AS a USING(perkara_id) WHERE a.jenis_perkara_id=362 AND year(b.tanggal_putusan)>=2020 GROUP BY year(b.tanggal_putusan) ";
				$query = base64_encode($sql);
				$post = array("req" => $query);
				$url = $h['ip_satker'].'/api_monitoring/get_data_api';
				$q = $this->posting($url,$post);
				$y=json_decode($q);
				if(count($y)){
					foreach($y AS $data){
						$update="REPLACE INTO  data_dispensasi_kawin VALUES (".$id_pa.", ".$data->tahun.", ".$data->diterima.", ".$data->dicabut.", ".$data->diputus.", ".$data->dikabulkan.", ".$data->ditolak.", ".$data->tidak_diterima.", ".$data->gugur.", ".$data->coret.", '".date("Y-m-d H:i:s")."') ";
						$q = $this ->db ->query($update);
					}
				}else{
					echo $h["nama"]." - Gagal dihubungi<br>";
				}
			}
			return true;
		}
		catch (Exception $e){
			return false;
			log_message('error', $e);
		}
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
}
