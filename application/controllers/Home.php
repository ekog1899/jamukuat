<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct(){
		parent::__construct();	
		$this->load->model('home_m');		
	}

	public function index(){
		$data = $this->home_m->getData();
		//$this->load->view('daftar_pa',$data);	
		var_dump($data);		
	}
	
	public function detil_pa(){
		$kode_satker=476;
		$data = $this->home_m->getDetilPa($kode_satker);	
		var_dump($data);		
	}	
	
}
