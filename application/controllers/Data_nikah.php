<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_nikah extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('data_nikah_m');
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
        if($instansi_id==1){
            if($group_id==4){
                $this->daftar_pa();    
            }else{
                $this->daftar_pta();
            }
        }else
        if($instansi_id==2){
            if($group_id==4){
                $this->daftar_kemenag();    
            }else
            if($group_id==5){
                $this->daftar_kua();  
            }else{
                $this->daftar_kanwil();  
            }
        }
	}
    function daftar_kua(){
        $infolog= infoLogin();
        $pengadilan_id  =$infolog['pengadilan_id'];
        $group_id       =$infolog['group_id'];
        $instansi_id    =$infolog['instansi_id'];
        $mitra_id    =$infolog['mitra_id'];
        $data['title']  = strtoupper('Data Pernikahan');
        $data['titlemenu'] = 'Admin';
        $data['mitra_id'] = $mitra_id;
        $user_id=base64_decode($this->session->userdata('id_user'));
        $data["user_id"] =base64_decode($this->session->userdata('id_user'));
        $data["pengadilan_id"] =$pengadilan_id;
        $data["fullname"] =base64_decode($this->session->userdata('fullname'));
        $data["email"] =base64_decode($this->session->userdata('email'));
        $data["data_nikah"] = $this->data_nikah_m->get_daftar_nikah_per_kua($mitra_id);
        $data["akses"]="kua";
        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('data_nikah/list_data_nikah_kua', $data);
        $this->load->view('footer');
    }

    function daftar_nikah_per_kua(){
        $mitra_id= $this->input->post('mitra_id');
        $bulan= $this->input->post('bulan');
        $tahun= $this->input->post('tahun');
        $infolog= infoLogin();
        $pengadilan_id=     $infolog['pengadilan_id'];
        $group_id= $infolog['group_id'];
        $instansi_id=   $infolog['instansi_id'];
        
        $data['titlemenu'] = 'Admin';
        $data['title'] = 'Daftar Pernikahan ';
        $user_id=base64_decode($this->session->userdata('id_user'));
        $data["user_id"] =base64_decode($this->session->userdata('id_user'));
        $data["pengadilan_id"] =$pengadilan_id;
        $data["fullname"] =base64_decode($this->session->userdata('fullname'));
        $data["email"] =base64_decode($this->session->userdata('email'));
        $data["data_nikah"] = $this->data_nikah_m->daftar_nikah_per_kua($mitra_id, $bulan, $tahun);
        //var_dump($this->data_nikah_m->daftar_nikah_per_kua($mitra_id, $bulan, $tahun));
        $this->load->view('data_nikah/daftar_nikah_per_kua', $data);
    }
    function detail_data_nikah(){
        $id= $this->input->post('id');
        $infolog= infoLogin();
        $pengadilan_id=     $infolog['pengadilan_id'];
        $group_id= $infolog['group_id'];
        $instansi_id=   $infolog['instansi_id'];
        $mitra_id=   $infolog['mitra_id'];
        
        $data['titlemenu'] = 'Admin';
        $data['title'] = 'Detail Data Pernikahan ';
        $user_id=base64_decode($this->session->userdata('id_user'));
        $data["user_id"] =base64_decode($this->session->userdata('id_user'));
        $data["pengadilan_id"] =$pengadilan_id;
        $data["fullname"] =base64_decode($this->session->userdata('fullname'));
        $data["email"] =base64_decode($this->session->userdata('email'));
        $data["data_nikah"] = $this->data_nikah_m->detail_data_nikah($id);
        //var_dump($this->data_nikah_m->daftar_nikah_per_kua($mitra_id, $bulan, $tahun));
        $this->load->view('data_nikah/detail_data_nikah', $data);
    }
    function data_nikah_unggah(){
        $infolog= infoLogin();

        $data["mitra_id"]=   $infolog['mitra_id'];
        $this->load->view('data_nikah/data_nikah_unggah', $data);
    }
    function data_nikah_unggah_prosess(){
        $infolog= infoLogin();
        $mitra_id=   $infolog['mitra_id'];
        $id=$this->input->post('id');
        $tahun=$this->input->post('tahun');
        $bulan=$this->input->post('bulan');
        $config['upload_path']          = 'uploads/data_nikah/';
        $config['allowed_types']        = 'xlsx';
        $nama_file= $id.'_'.$tahun.'_'.$bulan.str_replace(" ","_",rand(10,99)."_".time().'.xlsx');
        $filename='uploads/data_nikah/'.$nama_file;
        if (file_exists($filename)) {
            unlink($filename);
        }
        $config['file_name']=$nama_file;
        $this->load->helper('url', 'form'); 
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file')){
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
               // $this->load->view('upload_form', $error);
        }else{
            require_once "assets/SimpleXLSX.php";
            //include("applications/third_party/SimpleXLSX.php");
            //$this->load->library('SimpleXLSX');
            if($x = SimpleXLSX::parse($filename)){
            $fields = $x->rows();
        }
        $c = 0;//
        $i=0;
        foreach($fields as $row){
            $sql_input="REPLACE INTO data_nikah
                                (
                                mitra_id
                                ,nomor_akta_nikah
                                ,tanggal_akta_nikah
                                ,nama_suami
                                ,tanggal_lahir_suami
                                ,alamat_suami
                                ,status_suami
                                ,bukti_duda
                                ,tanggal_surat_bukti_duda
                                ,nama_istri
                                ,tanggal_lahir_istri
                                ,alamat_istri
                                ,status_istri
                                ,bukti_janda
                                ,tanggal_surat_bukti_janda
                                ,diinput_tanggal
                                ) VALUES
                                (
                                '$mitra_id'
                                ,'".$row[2]."'
                                ,'".substr(trim($row[1]),0,10)."'
                                ,'".$row[3]."'
                                ,'".substr(trim($row[4]),0,10)."'
                                ,'".$row[5]."'
                                ,'".$row[6]."'
                                ,'".$row[7]."'
                                ,'".substr(trim($row[8]),0,10)."'
                                ,'".$row[9]."'
                                ,'".substr(trim($row[10]),0,10)."'
                                ,'".$row[11]."'
                                ,'".$row[12]."'
                                ,'".$row[13]."'
                                ,'".substr(trim($row[14]),0,10)."'
                                ,'".date("Y-m-d H:i:s")."'
                                )";
             if($c >=6){
                 $this->data_nikah_m->proses($sql_input);
                 $i = $i + 1;
              }
             $c = $c + 1;
        } 
        }
    }
    function daftar_pa(){
        $infolog= infoLogin();
        //var_dump($infolog);
        $pengadilan_id  =$infolog['pengadilan_id'];
        $group_id       =$infolog['group_id'];
        $instansi_id    =$infolog['instansi_id'];
        $mitra_id    =$infolog['mitra_id'];
        $data['title']  = strtoupper('Data Pernikahan');
        $data['titlemenu'] = 'Admin';
        $data['mitra_id'] = $mitra_id;
        $user_id=base64_decode($this->session->userdata('id_user'));
        $data["user_id"] =base64_decode($this->session->userdata('id_user'));
        $data["pengadilan_id"] =$pengadilan_id;
        $data["fullname"] =base64_decode($this->session->userdata('fullname'));
        $data["email"] =base64_decode($this->session->userdata('email'));
        $data["data_nikah"] = $this->data_nikah_m->get_daftar_nikah_pa($pengadilan_id);
        $data["akses"]="pa";
        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('data_nikah/list_data_nikah_pa', $data);
        $this->load->view('footer');
    }
    function detail_perkara(){
        //if(!isset($jenis_perkara_id)){
        //    redirect(site_url('dashboard'));
        //}
        $id= $this->input->post('id');
        $infolog= infoLogin();
        $pengadilan_id=     $infolog['pengadilan_id'];
        $group_id= $infolog['group_id'];
        $instansi_id=   $infolog['instansi_id'];
        //echo $pengadilan_id;
        //var_dump($infolog);exit;
        
        $data['titlemenu'] = 'Admin';
        $user_id=base64_decode($this->session->userdata('id_user'));
        $data["user_id"] =base64_decode($this->session->userdata('id_user'));
        $data["pengadilan_id"] =$pengadilan_id;
        $data["fullname"] =base64_decode($this->session->userdata('fullname'));
        $data["email"] =base64_decode($this->session->userdata('email'));
        //$data["data_nikah"] = $this->data_nikah_m->get_detail_perkara($id);

        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('data_nikah/list_data_nikah', $data);
        $this->load->view('footer');
    }
	function nama_pa($id_pengadilan){
        $whereconditon="id=$id_pengadilan";
        $table="pengadilan_agama";
        $nama_pa = $this->data_nikah_m->get_data_where($whereconditon, $table)[0]->nama;
        return ucfirst(strtolower($nama_pa));
	}
		
}

