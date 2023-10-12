<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Help extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Help_m');
        $this->load->library('form_validation');
		$this->load->library('encrypt');
    }
    function index(){
        $data['title'] = 'Managemen Help';
        $data['titlemenu'] = 'Admin';
        $data["help"] = $this->Help_m->get_help_all();
        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('help/list_help', $data);
        $this->load->view('footer');
	}
    function help_add(){
        $data["group"] = $this->Help_m->get_group();
        $data["instansi"] = $this->Help_m->get_instansi();
        $this->load->view('help/add_help', $data);
    }
    function help_edit(){
        $id=base64_decode($this->input->post('id'));
        $data["help"] = $this->Help_m->get_help_byid($id);
        $data["group"] = $this->Help_m->get_group();
        $data["instansi"] = $this->Help_m->get_instansi();
        $this->load->view('help/edit_help', $data);
    }
    function help_delete(){
        $id=base64_decode($this->input->post('id'));
        $whereconditon="id=$id";
        $tableName="help";
        $this->Help_m->delete_data($whereconditon,$tableName);
    }
    function help_save(){
        $judul=base64_decode($this->input->post('judul')) ;
        $isi=base64_decode($this->input->post('isi')) ;
        $group_id=base64_decode($this->input->post('group_id'));
        $instansi_id=base64_decode($this->input->post('instansi_id'));
        $urutan=base64_decode($this->input->post('urutan')) ;
        $aktif=base64_decode($this->input->post('aktif')) ;
        $data = array(
            'judul' =>  $judul,
            'isi' =>  $isi,
            'aktif' =>  $aktif,
            'instansi_id' =>  $instansi_id,
            'group_id' =>  $group_id,
            'aktif' =>  $aktif,
            'urutan' =>  $urutan
        );
        $this->Help_m->save_help($data);
        //kirim email
            //belum_dibuat
        //kirim email
    }
    function help_update(){
        $id=base64_decode($this->input->post('id')) ;
        $judul=base64_decode($this->input->post('judul')) ;
        $isi=base64_decode($this->input->post('isi')) ;
        $group_id=base64_decode($this->input->post('group_id'));
        $instansi_id=base64_decode($this->input->post('instansi_id'));
        $urutan=base64_decode($this->input->post('urutan')) ;
        $aktif=base64_decode($this->input->post('aktif')) ;
        $data = array(
            'judul' =>  $judul,
            'isi' =>  $isi,
            'aktif' =>  $aktif,
            'instansi_id' =>  $instansi_id,
            'group_id' =>  $group_id,
            'aktif' =>  $aktif,
            'urutan' =>  $urutan
        );
        $whereconditon="id=$id";
        $this->Help_m->update_data($whereconditon,"help",$data);
        //kirim email
            //belum_dibuat
        //kirim email
    }
}

