<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_perkara extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('data_perkara_m');
        $this->load->library('form_validation');
		$this->load->library('encrypt');
        $this->basic->squrity();
    }
    function jenis_perkara($jenis_perkara_id){
        if($jenis_perkara_id==362){
            $jenis_perkara="Dispensasi Kawin";
        }else
        if($jenis_perkara_id==363){
            $jenis_perkara="Wali Adhol";
        }else
        if($jenis_perkara_id==360){
            $jenis_perkara="Pengesahan Perkawinan/Istbat Nikah";
        }else
        if($jenis_perkara_id==341){
            $jenis_perkara="Izin Poligami";
        }
        return $jenis_perkara;
    } 
    function index(){
       //buat tabel status_putusan
            if ($this->db->table_exists('status_putusan')){
              $sudah_ada_tabel='';
            }else{
              $query = $this->db->query("CREATE TABLE `status_putusan` (`id` int(11) unsigned NOT NULL COMMENT 'Primary key (by system)', `jenis_perkara_id` int(11) unsigned NOT NULL COMMENT 'Id Jenis Perkara: merujuk ke tabel jenis_perkara kolom id', `kode` varchar(20) DEFAULT NULL COMMENT 'Kode Status Putusan: isaian bebas', `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Nama Status Putusan: isaian bebas', `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Keterangan: isaian bebas', `aktif` char(1) NOT NULL DEFAULT 'Y' COMMENT 'Status Aktif: pilihan Y=Ya; T=Tidak', `urutan` int(11) unsigned NOT NULL COMMENT 'Urutan berdasarkan jenis_proses_id', `satuan` tinyint(4) DEFAULT NULL COMMENT '1.Time/Hari,2.Nominal/Rupiah,3.checkbox,4.Uraian;', `jenis_pengadilan` tinyint(1) NOT NULL DEFAULT '1', `diedit_oleh` varchar(30) DEFAULT NULL COMMENT 'Diedit Oleh: (by system)', `diedit_tanggal` datetime DEFAULT NULL COMMENT 'Diedit Tanggal: (by system)', `diinput_oleh` varchar(30) DEFAULT NULL COMMENT 'Diinput Oleh: (by system)', `diinput_tanggal` datetime DEFAULT NULL COMMENT 'Diinput Tanggal: (by system)', `diperbaharui_oleh` varchar(30) DEFAULT NULL COMMENT 'Diperbaharui Oleh: (by system)', `diperbaharui_tanggal` datetime DEFAULT NULL COMMENT 'Diperbaharui Tanggal: (by system)', PRIMARY KEY (`id`), KEY `perkara_id` (`jenis_perkara_id`), KEY `nama` (`nama`), KEY `kode` (`kode`) ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Referensi Status Putusan'"); 
          }
       //buat tabel status_putusan
        $infolog= infoLogin();
        $pengadilan_id = $infolog['pengadilan_id'];
        $group_id= $infolog['group_id'];
        $instansi_id = $infolog['instansi_id'];
        if(!($instansi_id==1 OR $instansi_id==2 OR $instansi_id==8 OR $instansi_id==11)){
            redirect(site_url('dashboard'));
        }
        //var_dump($infolog);exit;
        $jenis_perkara=$this->jenis_perkara($jenis_perkara_id);
        $nama_pa=$this->nama_pa($pengadilan_id);
        if($pengadilan_id>=1){
            $data['title']  = strtoupper('Data Perkara Diputus pada '.$nama_pa);
        }else{
            $data['title']  = strtoupper('Data Perkara Diputus pada Pengadilan Agama se Pengadilan Tinggi Agama Semarang');
        }
        $data['titlemenu'] = 'Admin';
        $user_id=base64_decode($this->session->userdata('id_user'));
        $data["user_id"] =base64_decode($this->session->userdata('id_user'));
        $data["pengadilan_id"] =$pengadilan_id;
        $data["instansi_id"] =$instansi_id;
        $data['group_id'] = $group_id;
        $data["fullname"] =base64_decode($this->session->userdata('fullname'));
        $data["email"] =base64_decode($this->session->userdata('email'));
        $data["data_perkara"] = $this->data_perkara_m->get_data_perkara_per_pa($pengadilan_id);

        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('data_perkara/list_data_perkara', $data);
        $this->load->view('footer');
        //echo "$instansi_id-";
        //echo "$group";
        /*if($instansi_id==4){
            $this->data_perkara();
        }else
        if($group_id==4 AND $instansi_id==1 AND $pengadilan_id>=475){
            $this->pa();
        }else
        if($group_id==1 AND $instansi_id==1 AND $pengadilan_id==0){
            $this->pta();
        }else{
        	redirect('dashboard');
        } */
	}
    function daftar_perkara(){
        //if(!isset($jenis_perkara_id)){
        //    redirect(site_url('dashboard'));
        //}
        $pa_id= $this->input->post('pa_id');
        $jenis_perkara_id= $this->input->post('jenis_perkara');
        $bulan= $this->input->post('bulan');
        $tahun= $this->input->post('tahun');
        $infolog= infoLogin();
        $pengadilan_id=     $infolog['pengadilan_id'];
        $group_id= $infolog['group_id'];
        $instansi_id=   $infolog['instansi_id'];
        //echo $pengadilan_id;
        //var_dump($infolog);exit;
        $jenis_perkara=$this->jenis_perkara($jenis_perkara_id);
        $nama_pa=$this->nama_pa($pa_id);

        if($pengadilan_id>=1){
            $data['title']  = strtoupper('Data Perkara '.$jenis_perkara.' yang diputus pada '.$nama_pa."<br>Bulan ".bulan($bulan)." $tahun");
        }else{
            $data['title']  = strtoupper('Data Perkara '.$jenis_perkara." yang diputus pada Pengadilan Agama se Pengadilan Tinggi Agama Semarang<br>Bulan ".bulan($bulan)." $tahun");
        }
        
        $data['titlemenu'] = 'Admin';
        $user_id=base64_decode($this->session->userdata('id_user'));
        $data["user_id"] =base64_decode($this->session->userdata('id_user'));
        $data["pengadilan_id"] =$pengadilan_id;
        $data["fullname"] =base64_decode($this->session->userdata('fullname'));
        $data["email"] =base64_decode($this->session->userdata('email'));
        if($pengadilan_id != 511){
            $data["data_perkara"] = $this->data_perkara_m->get_daftar_perkara_per_pa_per_jenis_perkara($pengadilan_id, $bulan, $tahun, $jenis_perkara_id);
        }else{
            $data["data_perkara"] = $this->data_perkara_m->get_daftar_perkara_per_pa_per_jenis_perkara($pa_id, $bulan, $tahun, $jenis_perkara_id);
        }
        // echo "</p>".$pa_id." ".$bulan." ".$tahun." ".$jenis_perkara_id."</p>";
        $infolog= infoLogin();
        $user_id= $infolog['userid'];
        $datastring=implode(",",$data);
        insertLog('KUA/daftar_perkara',$user_id,$datastring);

        $this->load->view('data_perkara/list_daftar_perkara', $data);
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
        $data["data_perkara"] = $this->data_perkara_m->get_detail_perkara($id);

        $infolog= infoLogin();
        $user_id= $infolog['userid'];
        $datastring=implode(",",$data);
        insertLog('KUA/detail_perkara',$user_id,$datastring);

        $this->load->view('data_perkara/list_detail_perkara', $data);
    }
	function nama_pa($id_pengadilan){
        $whereconditon="id=$id_pengadilan";
        $table="pengadilan_agama";
        $nama_pa = $this->data_perkara_m->get_data_where($whereconditon, $table)[0]->nama;
        return ucfirst(strtolower($nama_pa));
	}
		
}

