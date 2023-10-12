<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_pernikahan extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Data_pernikahan_m');
        $this->load->library('form_validation');
		$this->load->library('encrypt');
        $this->basic->squrity();
    }
    function index(){
        $infolog= infoLogin();
        $pengadilan_id=     $infolog['pengadilan_id'];
        $group_id= $infolog['group_id'];
        $instansi_id=   $infolog['instansi_id'];
        if(!($instansi_id==1 OR $instansi_id==2)){
            redirect(site_url('dashboard'));
        }
        $data['title'] = 'Data Pernikahan';
        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('data_pernikahan/data_pernikahan', $data);
        $this->load->view('footer');
	}
    function daftar_provinsi(){
        $data["daftar_provinsi"] = $this->Data_pernikahan_m->provinsi();
        $data["provinsi"] = $provinsi;
        $this->load->view('data_pernikahan/daftar_provinsi', $data);
    }
    function daftar_kabupaten_kota(){
        $provinsi= $this->input->post('provinsi');
        $data["daftar_kabupaten_kota"] = $this->Data_pernikahan_m->kabupaten_kota($provinsi);
        $data["kabupaten_kota"] = $provinsi;
        $this->load->view('data_pernikahan/daftar_kabupaten_kota', $data);
    }
    function daftar_kua(){
        $kabupaten_kota= $this->input->post('kabupaten_kota');
        $data["daftar_kua"] = $this->Data_pernikahan_m->kua($kabupaten_kota);
        $data["kabupaten_kota"] = $kabupaten_kota;
        $this->load->view('data_pernikahan/daftar_kua', $data);
    }
    function cari_data(){

        $kua= $this->input->post('kua');
        $nomor_akta_nikah= $this->input->post('nomor_akta_nikah');
        $nomor_akta_nikah=str_replace('/','_',$nomor_akta_nikah);
        $nomor_akta_nikah=str_replace(' ','',$nomor_akta_nikah);
        $add_serv=base64_decode('aHR0cDovL2xlZ2FsaXNhc2kuYmFkaWxhZy5uZXQvcmVzdF9zZXJ2ZXJfYWRtaW4vR2V0X2J1bmlrX3BhLw==').$nomor_akta_nikah.'/'.$kua.base64_decode('P0tVTkNJLUFQST1iM2FiMDc0OWY5MTAzNTc5YzU1MzQwMDhhYzM3MTVkMw==');
        $respon=file_get_contents($add_serv);
        $data['balasan']=json_decode($respon,true);
        $this->load->view('data_pernikahan/respon', $data);
    }
}

