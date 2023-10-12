<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Monja extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Monja_model');
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
		'menu' => 'Monitoring',
		'submenu' => 'Monitoring User',
		);
		_unsetsesiMenu();	_setsesiMenu($menu);
		
		$valGroup= valGroup($group_id,$instansi_id,$pengadilan_id,$mitra_id);
			
        $q = urldecode($this->input->get('q', TRUE));
        $pengadilan = urldecode($this->input->get('pengadilan', TRUE));
        $group = urldecode($this->input->get('group', TRUE));
        $instansi = urldecode($this->input->get('instansi', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '' or $pengadilan <>'' or $group <>'' or $instansi <> ''   ) {
            $config['base_url'] = base_url() . 'Monja/index?pengadilan=' . urlencode($pengadilan).'&group=' . urlencode($group).'&instansi=' . urlencode($instansi).'&q=' . urlencode($q);
            $config['first_url'] = base_url() . 'Monja/index?pengadilan=' . urlencode($pengadilan).'&group=' . urlencode($group).'&instansi=' . urlencode($instansi).'&q=' . urlencode($q);
			
        } else {
            $config['base_url'] = base_url() . 'Monja/';
            $config['first_url'] = base_url() . 'Monja/';
        }

        $config['per_page'] = 40;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Monja_model->total_rows($q,$pengadilan,$group,$instansi,$group_id,$instansi_id,$pengadilan_id,$mitra_id);
        $users = $this->Monja_model->get_limit_data($config['per_page'], $start, $q,$pengadilan,$group,$instansi,$group_id,$instansi_id,$pengadilan_id,$mitra_id);
        $kontak = $this->Monja_model->datakontakkosong();
        $totaluser = $this->Monja_model->gettotalwhere($pengadilan_id,$group_id,$instansi_id,$mitra_id,'0');
        $userlain = $this->Monja_model->userlain();
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
		//insertLog($catLog,$userID,$contenLog)
		//$menustring=implode(",",$menu);
		//insertLog('pengguna',$user_id,$menustring);
		//var_dump();
		$this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('monja/monja_list', $data);
        $this->load->view('footer');
    }

    
}
