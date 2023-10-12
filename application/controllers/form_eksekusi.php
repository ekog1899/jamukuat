<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class form_eksekusi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
    }

    public function form_penetapananmaning()
    {
		$data['title'] = 'Form Penetapan Anmanaing';
        $data['titlemenu'] = 'contoh ';
		
        $data["tahun"] = $this->Data_eksekusi_m->tahun_eks();
        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('perkaraeksekusi/daftar_pa', $data);
        $this->load->view('footer');
	}
	
	
	
}

