<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Blangko_eksekusi extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Dokumen_m');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->model('Dokumen_m');
		$this->basic->squrity();
	}

	function index(){
		//echo $this->Dokumen_m->akhir_id();
		$data_header['title'] = 'Master BLangko';
		$jenis_blangko=$this->Dokumen_m->get_all_data("jenis_blangko_eksekusi");
		$data["jenis_blangko"]= $jenis_blangko;
		$this->load->view('blangko/header', $data_header);
		$this->load->view('blangko/blangko_eksekusi', $data);
		$this->load->view('blangko/footer');
	}
	function list_kategori(){
		$list="";
		$jenis_blangko=$this->Dokumen_m->get_all_data("jenis_blangko_eksekusi");
		foreach ($jenis_blangko as $row){
			$list.="<button onclick='buka_daftar(".$row->jenis_blangko_id.")' class='w3-padding-8 w3-button w3-border-bottom w3-block w3-left-align w3-dark-grey'>".$row->jenis_blangko_nama."</button>";
			$list.="<div id='".$row->jenis_blangko_id."' class='w3-hide w3-border'><div class='w3-container'>";
			$list.= $this->list_dokumen($row->jenis_blangko_id);
			$list.= "</div></div>";
		}
		echo $list;
	}
	function list_dokumen($jenis_blangko_id){
		$isi="";
		$where='jenis_blangko_id='.$jenis_blangko_id;
		$data_blangko=$this->Dokumen_m->get_data_where($where,"template_dokumen_eksekusi");
		//var_dump($data_blangko);
		$nomor=0;
		foreach ($data_blangko as $row){
			$nomor++;
			$isi.="<p title='Pilih Blangko' style='cursor:pointer' onclick='edit_blangko(".$row->id.")'>$nomor. ". $row->nama."</p>";

		}
		return $isi;
	}
	function tambah(){
    	$id=$this->Dokumen_m->akhir_id();
		$jenis_blangko_id=$this->input->post('jenis_blangko_id');
        $nama_file=str_replace(" ", "_",$_FILES["file"]['name']);
        $nama= trim(str_replace(".rtf", "",$_FILES["file"]['name']));
        $config['upload_path']		= 'template_eksekusi/';
        $config['allowed_types']	= 'rtf';
        $nama_file = str_replace( array( '\'', '"', ',' , ';', '<', '>' ), ' ', $nama_file);
        $nama_file	=$id."_".strtolower($nama_file);
        $config['file_name']=$nama_file;
        $kode=str_replace(".rtf", "",$nama_file);

        $this->load->helper('url', 'form'); 

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file')){
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
               // $this->load->view('upload_form', $error);
        }else{
        	//echo $id;exit;
        	$data = array('upload_data' => $this->upload->data());
			$insert=array(
               				'kode' =>$kode
               				,'nama' =>$nama
               				,'jenis_blangko_id' =>$jenis_blangko_id
               				);
         	$this->Dokumen_m->insert_data("template_dokumen_eksekusi",$insert);
         	echo json_encode($insert);
        }
	}
	function get_data_blangko(){
		$id=base64_decode($this->input->post('id'));
		$whereconditon='id='.$id;
		$data=$this->Dokumen_m->get_data_where($whereconditon, "template_dokumen_eksekusi");
     	echo json_encode($data);
	}

	function edit(){
		$id=$this->input->post('template_id');
		$whereconditon='id='.$id;
		$data=$this->Dokumen_m->get_data_where($whereconditon, "template_dokumen_eksekusi");
        $config['upload_path']		= 'template_eksekusi/';
        $config['allowed_types']	= 'rtf';
        $config['file_name']		=$data[0]->kode.".rtf";
        //echo $data[0]->kode."rtf";exit;

        $this->load->helper('url', 'form'); 
        unlink("template_eksekusi/".$data[0]->kode.".rtf");
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file')){
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
               // $this->load->view('upload_form', $error);
        }else{
        	//$id=$this->Dokumen_m->akhir_id();
        	//echo $id;exit;
        	$data = array('upload_data' => $this->upload->data());
			//$edit=array('kode' =>$nama_file);
         	//$this->Dokumen_m->update_data($whereconditon, "template_dokumen_eksekusi", $edit);
         	//echo json_encode($insert);
        }
	}
	function hapus_blangko(){
		$id=base64_decode($this->input->post('id'));
		$whereconditon='id='.$id;
		$data=$this->Dokumen_m->get_data_where($whereconditon, "template_dokumen_eksekusi");
		$hapus=$this->Dokumen_m->delete_data($whereconditon, "template_dokumen_eksekusi");
        unlink("template_eksekusi/".$data[0]->kode.".rtf");
	}
	function ubah(){
		$id=base64_decode($this->input->post('id'));
		$isi=base64_decode($this->input->post('isi'));
		$tabel=base64_decode($this->input->post('tabel'));
		$field=base64_decode($this->input->post('field'));
		$whereconditon='id='.$id;
		$edit=array($field =>$isi);
        $this->Dokumen_m->update_data($whereconditon, $tabel, $edit);
	}

}
