<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library('form_validation');
		valMenu();
    }

    public function index()
    {
		
		$infolog= infoLogin();
		$group_id= $infolog['group_id'];
		$instansi_id= 	$infolog['instansi_id'];
		$pengadilan_id= 	$infolog['pengadilan_id'];
		$mitra_id= 	$infolog['mitra_id'];
		$user_id= $infolog['userid'];
		
		
		$menu = array (
		'menu' => 'Pengguna',
		'submenu' => 'Manajemen Pengguna',
		);
		_unsetsesiMenu();	_setsesiMenu($menu);
		
		$valGroup= valGroup($group_id,$instansi_id,$pengadilan_id,$mitra_id);
			
        $q = urldecode($this->input->get('q', TRUE));
        $pengadilan = urldecode($this->input->get('pengadilan', TRUE));
        $group = urldecode($this->input->get('group', TRUE));
        $instansi = urldecode($this->input->get('instansi', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '' or $pengadilan <>'' or $group <>'' or $instansi <> ''   ) {
            $config['base_url'] = base_url() . 'Users/index?pengadilan=' . urlencode($pengadilan).'&group=' . urlencode($group).'&instansi=' . urlencode($instansi).'&q=' . urlencode($q);
            $config['first_url'] = base_url() . 'Users/index?pengadilan=' . urlencode($pengadilan).'&group=' . urlencode($group).'&instansi=' . urlencode($instansi).'&q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'Users/';
            $config['first_url'] = base_url() . 'Users/';
        }

        $config['per_page'] = 40;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Users_model->total_rows($q,$pengadilan,$group,$instansi,$group_id,$instansi_id,$pengadilan_id,$mitra_id);
        $users = $this->Users_model->get_limit_data($config['per_page'], $start, $q,$pengadilan,$group,$instansi,$group_id,$instansi_id,$pengadilan_id,$mitra_id);
        $kontak = $this->Users_model->datakontakkosong();
        $totaluser = $this->Users_model->gettotalwhere($pengadilan_id,$group_id,$instansi_id,$mitra_id,'0');
        $userlain = $this->Users_model->userlain();
//var_dump($totaluser);
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'users_data' => $users,
            'q' => $q,
			'title'=> 'Manajemen Pengguna',
            'pengadilan' => $pengadilan,
            'group' => $group,
            'instansi' => $instansi,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'group_id' => $group_id,
			'instansi_id'=>$instansi_id,
            'valGroup' => $valGroup,
            'totaluser' => $totaluser,
            'kontak' => $kontak,
            'userlain' => $userlain,
			
        );
		
		
		$this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('users/users_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $data = array(
		'userid' => $row->userid,
		'pengadilan_id' => $row->pengadilan_id,
		'fullname' => $row->fullname,
		'handphone' => $row->handphone,
		'mitra_id' => $row->mitra_id,
		'username' => $row->username,
		'nip' => $row->nip,
		'password' => $row->password,
		'has_change_password' => $row->has_change_password,
		'group_id' => $row->group_id,
		'instansi_id' => $row->instansi_id,
		'email' => $row->email,
		'block' => $row->block,
		'diinput_oleh' => $row->diinput_oleh,
		'diinput_tanggal' => $row->diinput_tanggal,
		'diedit_oleh' => $row->diedit_oleh,
		'diedit_tanggal' => $row->diedit_tanggal,
		'last_login' => $row->last_login,
	    );
            $this->load->view('users/users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function create() 
    {
		
		
		$infolog= infoLogin();
		$group_id= $infolog['group_id'];

		
		$instansi_id= 	$infolog['instansi_id'];
		$pengadilan_id= 	$infolog['pengadilan_id'];
		$mitra_id= 	$infolog['mitra_id'];
		if ($group_id > 4 and $instansi_id > 1) {
			toast('error','&nbsp; Anda tidak memiliki hak akses !');
			redirect(site_url('users'));
			

		}
			$valGroup= valGroup($group_id,$instansi_id,$pengadilan_id,$mitra_id);
		
		
        $data = array(
            'button' => 'Create',
            'action' => site_url('users/create_action'),
         'valGroup' => $valGroup,
			
	    'userid' => set_value('userid'),
	    'pengadilan_id' => set_value('pengadilan_id'),
	    'fullname' => set_value('fullname'),
	    'handphone' => set_value('handphone'),
	    'mitra_id' => set_value('mitra_id'),
	    'username' => set_value('username'),
	    'nip' => set_value('nip'),
	   
	    'group_id' => set_value('group_id'),
	    'instansi_id' => set_value('instansi_id'),
	    'email' => set_value('email'),

	    
	);
	
	
		$this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('users/users_form', $data);
        $this->load->view('footer');
      
    }
    
    public function create_action() 
    {
		$infolog= infoLogin();
		$user_id= $infolog['userid'];
		$currentdate= date('Y-m-d H:i:s');
		$this->_rules();
	
        if ($this->form_validation->run() == FALSE) {
			toast('error','&nbsp; Pastikan diisi sesuai ketentuan!');
            $this->create();
        } else {
            $data = array(
		'pengadilan_id' => $this->input->post('pengadilan_id',TRUE),
		'fullname' => $this->input->post('fullname',TRUE),
		'handphone' => $this->input->post('handphone',TRUE),
		'mitra_id' => $this->input->post('mitra_id',TRUE),
		'username' => $this->input->post('username',TRUE),
		'nip' => $this->input->post('nip',TRUE),
		
		'group_id' => $this->input->post('group_id',TRUE),
		'instansi_id' => $this->input->post('instansi_id',TRUE),
		'email' => $this->input->post('email',TRUE),
		'diinput_tanggal' => $currentdate,
		
		'password' => (base64_encode($this->input->post('username',TRUE).'1234')),
		'diinput_oleh' => $user_id,
		
		


	    );

            $this->Users_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
			//$infolog= infoLogin();
			//$user_id= $infolog['userid'];
			$datastring=implode(",",$data);
			insertLog('pengguna/tambah',$user_id,$datastring);
            redirect(site_url('users'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Users_model->get_by_id($id);
		$infolog= infoLogin();
		$group_id= $infolog['group_id'];
		$userid =$infolog['userid'];
		$instansi_id= 	$infolog['instansi_id'];
		$pengadilan_id= 	$infolog['pengadilan_id'];
		$mitra_id= 	$infolog['mitra_id'];

		
		if(($userid == decrypt_url($id)) || ($group_id ==1) ||  ($instansi_id ==1)  ){
		
	
		$valGroup= valGroup($group_id,$instansi_id,$pengadilan_id,$mitra_id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('users/update_action'),
				 'valGroup' => $valGroup,
				 'groupsesi'=>$group_id,
			
		'userid' => set_value('userid', encrypt_url($row->userid)),
		'pengadilan_id' => set_value('pengadilan_id', $row->pengadilan_id),
		'fullname' => set_value('fullname', $row->fullname),
		'handphone' => set_value('handphone', $row->handphone),
		'mitra_id' => set_value('mitra_id', $row->mitra_id),
		'username' => set_value('username', $row->username),
		'nip' => set_value('nip', $row->nip),

		'group_id' => set_value('group_id', $row->group_id),
		'instansi_id' => set_value('instansi_id', $row->instansi_id),
		'email' => set_value('email', $row->email),
		
		
	    );
		$this->load->view('header', $data);
        $this->load->view('topbar', $data);
       $this->load->view('users/users_form', $data);
        $this->load->view('footer');
		
		
           
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
		
		}else {
			
			toast('error','&nbsp; Anda tidak memiliki hak akses !');    
			redirect(site_url('users'));
		
		}
    }
    
    public function update_action() 
    {
		$infolog= infoLogin();
		$user_id= $infolog['userid'];
		$group_id= $infolog['group_id'];
		
		if($group_id > ($this->input->post('group_id',TRUE)) ){
			toast('error','&nbsp; Pastikan diisi sesuai ketentuanA!');
			redirect(site_url('users'));
		}
		
		$currentdate= date('Y-m-d H:i:s');
	
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
			toast('error','&nbsp; Cek kembali inputan anda!');
            $this->update($this->input->post('userid', TRUE));
        } else {
            $data = array(
		'pengadilan_id' => $this->input->post('pengadilan_id',TRUE),
		'fullname' => $this->input->post('fullname',TRUE),
		'handphone' => $this->input->post('handphone',TRUE),
		'mitra_id' => $this->input->post('mitra_id',TRUE),
		'username' => $this->input->post('username',TRUE),
		'nip' => $this->input->post('nip',TRUE),
		
		'group_id' => $this->input->post('group_id',TRUE),
		
		'instansi_id' => $this->input->post('instansi_id',TRUE),
		'email' => $this->input->post('email',TRUE),
		'diedit_oleh' => $user_id,
		'diedit_tanggal' => $currentdate,
	    );

            $this->Users_model->update($this->input->post('userid', TRUE), $data);
			toast('success','&nbsp; update Berhasil!');
			//$infolog= infoLogin();
			//$user_id= $infolog['userid'];
			$datastring=implode(",",$data);
			insertLog('pengguna/update',$user_id,$datastring);
            redirect(site_url('users'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $this->Users_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }



public function aktif($userid){
		
		$req = $this->uri->segment(4);
		$infolog= infoLogin();
		$group_id= $infolog['group_id'];
		if ( $group_id ==1  and $req=='block' ){
			
			$this->Users_model->update($userid, ['block' => 1]);
			toast('success','&nbsp; Berhasil dinonaktifkan !'); 
			redirect(site_url('Users/index'));
		}
		
		elseif ( $group_id ==1  and $req =='aktif' ){
			$this->Users_model->update($userid, ['block' => 0]);
			toast('success','&nbsp; Berhasil diaktifkan !'); 
            redirect(site_url('Users/index'));
}
		else {
			
			toast('error','&nbsp; Anda tidak memiliki hak akses !');         
		 //  toast('danger','Perhatian! ','Gagal ubah ! ');
		   
		redirect(site_url('Users/index'));

		}
}

    public function _rules() 
    {
		
		$infolog= infoLogin();
		$group_id= $infolog['group_id'];
		$instansi_id= 	$infolog['instansi_id'];
		$pengadilan_id= 	$infolog['pengadilan_id'];
		$mitra_id= 	$infolog['mitra_id'];
		
		$iduser = $this->input->post('userid');
			$row = $this->Users_model->get_by_id($iduser);
		
			$cekemail=$row->email;
			$cekusername=$row->username;
			$cekhandphone=$row->handphone;
			$inputemail = $this->input->post('email');
			$inputusername = $this->input->post('username');
			$inputhandphone = $this->input->post('handphone');
			
	uniq('users','email',$inputemail,$cekemail,'required|trim|required|valid_email|xss_clean');
	uniq('users','username',$inputusername,$cekusername,'required|trim|xss_clean');
	uniq('users','handphone',$inputhandphone,$cekhandphone,'required|numeric|trim|xss_clean');
	
	$this->form_validation->set_rules('fullname', ' ', 'trim|required');

	if ( $instansi_id>1){
				$this->form_validation->set_rules('mitra_id', ' ', 'trim|required');
	}
	
	if ($group_id>1 ){
				$this->form_validation->set_rules('pengadilan_id', ' ', 'trim|required');
	}
	$this->form_validation->set_rules('group_id', ' ', 'trim|required');
	$this->form_validation->set_rules('instansi_id', ' ', 'trim|required');
	$this->form_validation->set_rules('nip', ' ', 'trim|required');
	$this->form_validation->set_rules('userid', 'userid', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


 public function sendinfo($iduser)
    {
		 _sendEmail(decrypt_url($iduser),'sendinfo');
		
		// toast('success','&nbsp; Email berhasil dikirim  !');
		redirect(site_url('users'));
	}
}
