<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Etiket extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Etiket_m');
        $this->load->library('form_validation');
		$this->load->library('encrypt');
        $this->basic->squrity();
    }
    function index(){
		
		$menu = array (
            'menu' => 'E-Tiket',
            'submenu' => '',
            );
            _unsetsesiMenu();	_setsesiMenu($menu);
		$infolog= infoLogin();
		$group_id= $infolog['group_id'];	
		
        if($group_id==1 OR $group_id==2){
            $this->pta();
        }else{
        	$this->satker();
        }
	}
	function pta(){
		$data['title'] = 'E-Tiket';
        $data['titlemenu'] = 'Admin';
        $data["tiket"] = $this->Etiket_m->get_etiket_all();
        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('etiket/list_etiket_pta', $data);
        $this->load->view('footer');
	}
	function satker(){
		$data['title'] = 'E-Tiket';
        $data['titlemenu'] = 'Admin';
        $user_id=base64_decode($this->session->userdata('id_user'));
        $data["user_id"] =base64_decode($this->session->userdata('id_user'));
        $data["fullname"] =base64_decode($this->session->userdata('fullname'));
        $data["email"] =base64_decode($this->session->userdata('email'));
        $data["tiket"] = $this->Etiket_m->get_etiket_satker($user_id);
        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('etiket/list_etiket', $data);
        $this->load->view('footer');
	}
	function etiket_detail(){
		$id_e_tiket=base64_decode($this->input->post('id'));
        $data["tiket"] = $this->Etiket_m->get_etiket_byid($id_e_tiket);
        $this->load->view('etiket/detail_etiket', $data);
	}
	function etiket_detail_pta(){
		$id_e_tiket=base64_decode($this->input->post('id'));
        $data["fullname"] =base64_decode($this->session->userdata('fullname'));
        $data["tiket"] = $this->Etiket_m->get_etiket_byid($id_e_tiket);
        $status= $this->Etiket_m->get_etiket_byid($id_e_tiket)[0]->status;
        $data["status"]= $this->Etiket_m->get_etiket_byid($id_e_tiket)[0]->status;
        if($status==1){
        	echo "edit";
        	$where="id_e_tiket=$id_e_tiket";
 			$update=array('status' =>2);
     		$this->Etiket_m->update_data($where, "e_tiket", $update);
     		$data["status"]=2;
        }
        $this->load->view('etiket/pta_detail_etiket', $data);
	}
	function etiket_delete(){
		$id_e_tiket=base64_decode($this->input->post('id'));
		$where="id_e_tiket=$id_e_tiket";
 		$this->Etiket_m->delete_data($where, 'e_tiket'); 
	}
	function etiket_add(){
        $user_id=base64_decode($this->session->userdata('id_user'));
        $data["user_id"] =base64_decode($this->session->userdata('id_user'));
        $data["fullname"] =base64_decode($this->session->userdata('fullname'));
        $data["email"] =base64_decode($this->session->userdata('email'));
        $this->load->view('etiket/add_etiket', $data);
	}
	function etiket_update(){
		$id_e_tiket=base64_decode($this->input->post('id_e_tiket'));
        $feedback=base64_decode($this->input->post('feedback'));
        $status=base64_decode($this->input->post('status'));
		$update=array(
						'status' =>$status,
						'feedback' =>$feedback,
						'diedit_oleh' =>base64_decode($this->session->userdata('fullname')),
						'diedit_tanggal' =>date("Y-m-d H:i:s")
					);
		$where="id_e_tiket=".$id_e_tiket;
     	$this->Etiket_m->update_data($where, "e_tiket", $update);
	}
	function etiket_save(){
		$user_id=base64_decode($this->input->post('user_id')) ;
		$tentang=base64_decode($this->input->post('tentang')) ;
		$name=base64_decode($this->input->post('name')) ;
		$email=base64_decode($this->input->post('email')) ;
		$message=base64_decode($this->input->post('message')) ;
		$data = array(
			'tanggal ' =>  date("Y-m-d"),
			'user_id' =>  $user_id,
			'tentang' =>  $tentang,
			'name' =>  $name,
			'email' =>  $email,
			'message' =>  $message,
			'diinput_tanggal' =>  date("Y-m-d H:i:s")
		);
		$this->Etiket_m->save_etiket($data);
        //kirim email
        	//belum_dibuat
        //kirim email
	}
		
}

