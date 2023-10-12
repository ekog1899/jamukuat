<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Panduan extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Help_m');
        $this->load->library('form_validation');
		$this->load->library('encrypt');
    }
    function index(){
        $data['title'] = 'Panduan Aplikasi Jamu Kuat (Kerjasama Mewujudkan Keadilan Masyarakat Pengadilan Tinggi Agama Semarang)';
        $this->load->view('help/help_index', $data);
	}
    function detail($instansi_id,$group_id){
        $where_condisi="instansi_id=$instansi_id";
        $nama_instansi = $this->Help_m->get_data_where($where_condisi,"master_kategori_instansi")[0]->nama_instansi;
        $where_condisi1="group_id=$group_id";
        $nama_group = $this->Help_m->get_data_where($where_condisi1,"master_group")[0]->nama_group;
        $data['title'] = 'Panduan Jamu Kuat bagi '.$nama_instansi." - ".$nama_group;
        $data["panduan"]=$this->Help_m->get_panduan($instansi_id,$group_id);
        $this->load->view('help/help_contoh', $data);
        
    }
}

