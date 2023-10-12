<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi extends CI_Controller {
	public function __construct(){
		parent::__construct();		
		$this->load->model('api_m');
		$this->load->model('Dokumen_m');
	}

	public function index($kode){
		
		$d = base64_decode($kode);
		$get=explode('_', $d);
		$perkara_id=$get[0];
		$kd_satker=$get[1];

		// print_r($get);
		// exit();
        $get_perkara=$this->Dokumen_m->get_data_where2(array('perkara_id'=>$perkara_id, 'kd_satker'=>$kd_satker),'perkara_akta_cerai');
        if($get_perkara->num_rows()==1){
        	$get_cetak=$get_perkara->row_array();
        	$data['nomor_akta_cerai']=$get_cetak['nomor_akta_cerai'];
        	$data['tanggal_akta_cerai']=$get_cetak['tanggal_akta_cerai'];
        	$data['nama_pihak1']=$get_cetak['nama_pihak1'];
        	$data['nik_pihak1']=$get_cetak['nik_pihak1'];
        	$data['alamat_pihak1']=$get_cetak['alamat_pihak1'];
        	$data['nama_pihak2']=$get_cetak['nama_pihak2'];
        	$data['nik_pihak2']=$get_cetak['nik_pihak2'];
        	$data['alamat_pihak2']=$get_cetak['alamat_pihak2'];
                $data['ketemu']=1;
        $this->load->view('header_verifikasi', $data);
        $this->load->view('verifikasi', $data);
        $this->load->view('footer');
        }else{
                $data['ketemu']=0;
        $this->load->view('header_verifikasi', $data);
        $this->load->view('verifikasi', $data);
        $this->load->view('footer');
        }

	}

}
