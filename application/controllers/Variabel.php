<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Variabel extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Dokumen_m');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
        $this->basic->squrity();
	}

	function index(){
		//echo $this->Dokumen_m->akhir_id();
		$data_header['title'] = 'Master Variabel';
		$variabel=$this->Dokumen_m->get_all_data("jenis_blangko");
		$data["variabel"]= $variabel;
		$this->load->view('blangko/header', $data_header);
		$this->load->view('variabel/variabel', $data);
		$this->load->view('blangko/footer');
	}
	function list_variabel(){
		$data["variabel"]=$this->Dokumen_m->get_master_variabel_data();
		$this->load->view('variabel/list_variabel', $data);
	}
	function tambah(){
		$data['master_variabel_jenis']=$this->Dokumen_m->get_all_data("master_variabel_jenis");
		$data['master_variabel_model']=$this->Dokumen_m->get_all_data("master_variabel_model");
		$data['master_variabel_fungsi_nama']=$this->Dokumen_m->get_all_data("master_variabel_fungsi_nama");
		$data['var_id']= '';
		$data['var_nomor']= '';
		$data['var_keterangan']= '';
		$data['var_model']= '';
		$data['var_jenis']= '';
		$data['var_tabel']= '';
		$data['var_field']= '';
		$data['var_sql_data']= '';
		$data['var_fungsi_nama']= '';
		$data['var_default_data']= '';
		$this->load->view('variabel/tambah_variabel', $data);
	}
	function edit(){
		$data['master_variabel_jenis']=$this->Dokumen_m->get_all_data("master_variabel_jenis");
		$data['master_variabel_model']=$this->Dokumen_m->get_all_data("master_variabel_model");
		$data['master_variabel_fungsi_nama']=$this->Dokumen_m->get_all_data("master_variabel_fungsi_nama");
		$var_id=base64_decode($this->input->post('id'));
		$where='var_id='.$var_id;
		$data_blangko=$this->Dokumen_m->get_data_where($where,"master_variabel");
		$data['var_id']= $var_id;
		$data['var_nomor']= $data_blangko[0]->var_nomor;
		$data['var_keterangan']= $data_blangko[0]->var_keterangan;
		$data['var_model']= $data_blangko[0]->var_model;
		$data['var_jenis']= $data_blangko[0]->var_jenis;
		$data['var_tabel']= $data_blangko[0]->var_tabel;
		$data['var_field']= $data_blangko[0]->var_field;
		$data['var_sql_data']= $data_blangko[0]->var_sql_data;
		$data['var_fungsi_nama']= $data_blangko[0]->var_fungsi_nama;
		$data['var_default_data']= $data_blangko[0]->var_default_data;
		$this->load->view('variabel/tambah_variabel', $data);
	}
	function tambah_simpan(){
		$var_nomor=$this->input->post('var_nomor');
		$var_keterangan=$this->input->post('var_keterangan');
		$var_model=$this->input->post('var_model');
		$var_jenis=$this->input->post('var_jenis');
		$var_tabel=$this->input->post('var_tabel');
		$var_field=$this->input->post('var_field');
		$var_sql_data=$this->input->post('var_sql_data');
		$var_fungsi_nama=$this->input->post('var_fungsi_nama');
		$var_default_data=$this->input->post('var_default_data');

		$insert=array(
						'var_nomor' =>$var_nomor
						,'var_keterangan' =>$var_keterangan
						,'var_model' =>$var_model
						,'var_jenis' =>$var_jenis
						,'var_tabel' =>$var_tabel
						,'var_field' =>$var_field
						,'var_sql_data' =>$var_sql_data
						,'var_fungsi_nama' =>$var_fungsi_nama
						,'var_default_data' =>$var_default_data
					);
		//var_dump($insert);
     	$this->Dokumen_m->insert_data("master_variabel",$insert);
	}
	function edit_simpan(){
		$var_id=$this->input->post('var_id');
		$var_nomor=$this->input->post('var_nomor');
		$var_keterangan=$this->input->post('var_keterangan');
		$var_model=$this->input->post('var_model');
		$var_jenis=$this->input->post('var_jenis');
		$var_tabel=$this->input->post('var_tabel');
		$var_field=$this->input->post('var_field');
		$var_sql_data=$this->input->post('var_sql_data');
		$var_fungsi_nama=$this->input->post('var_fungsi_nama');
		$var_default_data=$this->input->post('var_default_data');
		$where='var_id='.$var_id;
		$insert=array(
						'var_nomor' =>$var_nomor
						,'var_keterangan' =>$var_keterangan
						,'var_model' =>$var_model
						,'var_jenis' =>$var_jenis
						,'var_tabel' =>$var_tabel
						,'var_field' =>$var_field
						,'var_sql_data' =>$var_sql_data
						,'var_fungsi_nama' =>$var_fungsi_nama
						,'var_default_data' =>$var_default_data
					);
     	$this->Dokumen_m->update_data($where, "master_variabel", $insert);
	}
	function hapus(){
		$id=base64_decode($this->input->post('id'));
		$whereconditon='var_id='.$id;
		$hapus=$this->Dokumen_m->delete_data($whereconditon, "master_variabel");
		echo $hapus;
	}
}
