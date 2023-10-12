<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(){
		parent::__construct();		
		$this->load->model('api_m');
	}

	
	public function capil($mitra_id){
			$capil=$this->api_m->get_capil($mitra_id);
			foreach ($capil->result_array() as $key) {
				echo $key['nama'].'<br>';
			}
	}


	public function kua($mitra_id){
			$kua=$this->api_m->get_kua($mitra_id);
			// foreach ($kua->result_array() as $key) {
			// 	echo $key['nama'].'<br>';
			// }
			print_r($kua->result_array());
			//print_r($kua);
	}




}
