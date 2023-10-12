<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profil extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Dokumen_m');
        $this->basic->squrity();
    }

    function index(){
        $data['title'] = 'Profil';
		$menu = array (
		'menu' => 'Pengguna',
		'submenu' => 'Profil',
		);
		_unsetsesiMenu();	_setsesiMenu($menu);
		
		
        $userid=(int)base64_decode($this->session->userdata('id_user'));
        
        $whereconditon='userid='.$userid;
		$pengguna=$this->Dokumen_m->get_data_where($whereconditon, "users");
		//var_dump($pengguna);
		$data["userid"]=base64_encode($pengguna[0]->userid);
		$data["pengadilan_id"]=$pengguna[0]->pengadilan_id;
		$data["fullname"]=$pengguna[0]->fullname;
		$data["mitra_id"]=$pengguna[0]->mitra_id;
		$data["username"]=$pengguna[0]->username;
		$data["group"]=$pengguna[0]->group;
		$data["email"]=$pengguna[0]->email;
		$data["group"]=$pengguna[0]->group;
        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('profil/profil', $data); 
        $this->load->view('footer');
    }
    function edit_profil(){
        $id=(int)base64_decode($this->input->post('id'));
		$whereconditon='userid='.$id;
		$pengguna=$this->Dokumen_m->get_data_where($whereconditon, "users");
		$data["userid"]=$pengguna[0]->userid;
		$data["fullname"]=$pengguna[0]->fullname;
		$data["username"]=$pengguna[0]->username;
		$data["email"]=$pengguna[0]->email;
        $this->load->view('profil/profil_edit', $data); 
    }
    function simpan_profil(){
        $userid=base64_decode($this->input->post('id'));
        $fullname=base64_decode($this->input->post('fullname'));
        $username=base64_decode($this->input->post('username'));
        $email=base64_decode($this->input->post('email'));
        $password=$this->input->post('password');
     	$insert=array(
							'fullname' =>$fullname
							,'username' =>$username
							,'password' =>$password
							,'email' =>$email
							,"diedit_oleh"=>base64_decode($this->session->userdata('username'))
							,"diedit_tanggal"=>date("Y-m-d h:i:s",time()),
						);
			//var_dump($insert);exit;
			$where="userid=".$userid;
	     	$this->Dokumen_m->update_data($where, "users", $insert);
			$infolog= infoLogin();
			$user_id= $infolog['userid'];
			$datastring=implode(",",$insert);
			insertLog('pengguna/edit Profil',$user_id,$datastring);
     }
}

