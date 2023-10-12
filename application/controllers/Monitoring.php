<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller {
    public function __construct(){
		parent::__construct();
        $this->load->model('Api_m');
        $this->load->model('Dokumen_m');
       $this->basic->squrity();
	   valMenu();
	}


    public function index(){
        $group=(int)base64_decode($this->session->userdata('group'));
        $instansi_id=(int)base64_decode($this->session->userdata('instansi_id'));
       

        $data['title']          = 'Dashboard';
        $data['titlemenu']      = 'Monitoring';
        $menu = array (
            'menu' => 'Monitoring',
            'submenu' => '',
            );
            _unsetsesiMenu();	_setsesiMenu($menu);
        // $data['ac']= $this->Api_m->monitoring_ac();
        // $data['pns']= $this->Api_m->monitoring_pns();
        // $data['capil']= $this->Api_m->monitoring_capil();
        // $data['bkd']= $this->Api_m->monitoring_bkd();
        // $data['kirim_data']= $this->Api_m->kirim_data();

        $data['list_pa']= $this->Api_m->get_data("pengadilan_agama");


        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('monitoring/monitoring', $data);
        $this->load->view('footer');
    }

    public function detail_monitoring_ac($kd_satker){

        $data['title']          = 'Dashboard';
        $data['titlemenu']      = 'Detail Petikan Putusan/Penetepan atau Petikan Akta Cerai';

        $get_pa=$this->Api_m->get_data_where(array('id'=>$kd_satker),'pengadilan_agama')->row_array();
        $data['nama_pa']=$get_pa['nama'];
        $data['ac']= $this->Api_m->detail_monitoring_ac($kd_satker);

        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('monitoring/detail_monitoring_ac', $data);
        $this->load->view('footer');
    }

    public function detail_monitoring_perkara($kd_satker){
        if($_POST['jenis_perkara']=='undefined' OR $_POST['jenis_perkara']==''){
                $jenis_perkara_dipilih='undefined';
                $jenis_perkara_query='';
            }else{
                $jenis_perkara_dipilih=$_POST['jenis_perkara'];
                $jenis_perkara_query='and jenis_perkara_text like "%'.$_POST['jenis_perkara'].'%"';

            }
        if($_POST['kd_satker']!=''){
            $kd_satker=$_POST['kd_satker'];
        }

        $data['title']          = 'Dashboard';
        $data['titlemenu']      = 'Detail Perkara';

        $get_pa=$this->Api_m->get_data_where(array('id'=>$kd_satker),'pengadilan_agama')->row_array();

        $data['jenis_perkara']=$this->Api_m->get_jenis_perkara($kd_satker);
        $data['jenis_perkara_dipilih']=$jenis_perkara_dipilih;
        $data['nama_pa']=$get_pa['nama'];
        $data['kd_satker']=$kd_satker;
        $data['ac']= $this->Api_m->detail_monitoring_perkara($kd_satker,$jenis_perkara_query);

        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('monitoring/detail_monitoring_perkara', $data);
        $this->load->view('footer');
    }

        public function detail_monitoring_pns($kd_satker){
       

        $data['title']          = 'Dashboard';
        $data['titlemenu']      = 'Detail Data Pendaftaran PNS';
        $get_pa=$this->Api_m->get_data_where(array('id'=>$kd_satker),'pengadilan_agama')->row_array();
        $data['nama_pa']=$get_pa['nama'];
        $data['pns']= $this->Api_m->detail_monitoring_pns_pendaftaran($kd_satker);

        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('monitoring/detail_monitoring_pns_pendaftaran', $data);
        $this->load->view('footer');
    }

    public function detail_monitoring_pns_put($kd_satker){
       

        $data['title']          = 'Dashboard';
        $data['titlemenu']      = 'Detail Data Putusan PNS';
        $get_pa=$this->Api_m->get_data_where(array('id'=>$kd_satker),'pengadilan_agama')->row_array();
        $data['nama_pa']=$get_pa['nama'];
        $data['pns']= $this->Api_m->detail_monitoring_pns_putusan($kd_satker);

        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('monitoring/detail_monitoring_pns_putusan', $data);
        $this->load->view('footer');
    }

    public function detail_monitoring_capil($kd_satker){
       

        $data['title']          = 'Dashboard';
        $data['titlemenu']      = 'Detail Data Aksi Balik Disdukcapil';
        $get_pa=$this->Api_m->get_data_where(array('id'=>$kd_satker),'pengadilan_agama')->row_array();
        $data['nama_pa']=$get_pa['nama'];
        $data['capil']= $this->Api_m->detail_monitoring_capil($kd_satker);

        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('monitoring/detail_monitoring_capil', $data);
        $this->load->view('footer');
    }

    public function detail_monitoring_bkd_pa($kd_satker){
       

        $data['title']          = 'Dashboard';
        $data['titlemenu']      = 'Detail Data AKSI BALIK BKPSDM';
        $get_pa=$this->Api_m->get_data_where(array('id'=>$kd_satker),'pengadilan_agama')->row_array();
        $data['nama_pa']=$get_pa['nama'];
        $data['pns']= $this->Api_m->detail_monitoring_bkd_pa($kd_satker);

        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('monitoring/detail_monitoring_bkd', $data);
        $this->load->view('footer');
    }

    public function cetak(){
        $group=(int)base64_decode($this->session->userdata('group'));
        $instansi_id=(int)base64_decode($this->session->userdata('instansi_id'));
       

        $data['title']          = 'Dashboard';
        $data['titlemenu']      = 'Monitoring';
        
        // $data['ac']= $this->Api_m->monitoring_ac();
        // $data['pns']= $this->Api_m->monitoring_pns();
        // $data['capil']= $this->Api_m->monitoring_capil();
        // $data['bkd']= $this->Api_m->monitoring_bkd();
        // $data['kirim_data']= $this->Api_m->kirim_data();

        $data['list_pa']= $this->Api_m->get_data("pengadilan_agama");


        $this->load->view('monitoring/cetak_monitoring', $data);
    }

    public function monitoring_pns(){
        $group=(int)base64_decode($this->session->userdata('group'));
        $instansi_id=(int)base64_decode($this->session->userdata('instansi_id'));

        if(empty($_POST['dari']) and empty($_POST['sampai'])){
            
            $data['dari']=date('Y-m').'-01';
            $data['sampai']=date('Y-m-d');
        }else{
            $data['dari']=$_POST['dari'];
            $data['sampai']=$_POST['sampai'];
            
        }
               
        $data['title']          = 'Monitoring Pengisian Data Izin Cerai PNS/POLRI Satker';    
        $data['list_pa']= $this->Api_m->monitoring_data_pns($data['dari'],$data['sampai']);

        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('monitoring/monitoring_pns', $data);
        $this->load->view('footer');
    }

    public function detail_monitoring_pns2(){

        $kd_satker= $this->uri->segment(3);
        $dari= $this->uri->segment(4);
        $sampai= $this->uri->segment(5);
        
        $nama_pa=$this->nama_pa($kd_satker);
        $data['title']          = 'Data PNS/POLRI '.$nama_pa;    
        $data['list_data']= $this->Api_m->monitoring_pns2($kd_satker,$dari,$sampai);
        //exit();
        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('monitoring/detail_monitoring_pns', $data);
        $this->load->view('footer');
    }

    public function detail_monitoring_pns_dikirim_mitra(){

        $kd_satker= $this->uri->segment(3);
        $dari= $this->uri->segment(4);
        $sampai= $this->uri->segment(5);
        
        $nama_pa=$this->nama_pa($kd_satker);
        $data['title']          = 'Data PNS/POLRI '.$nama_pa.' yang dikirim ke Mitra';    
        $data['list_data']= $this->Api_m->monitoring_pns_dikirim_mitra($kd_satker,$dari,$sampai);
        //exit();
        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('monitoring/detail_monitoring_pns_dikirim_mitra', $data);
        $this->load->view('footer');
    }

    public function detail_monitoring_pns_blm_dikirim_mitra(){

        $kd_satker= $this->uri->segment(3);
        $dari= $this->uri->segment(4);
        $sampai= $this->uri->segment(5);
        
        $nama_pa=$this->nama_pa($kd_satker);
        $data['title']          = 'Data PNS/POLRI '.$nama_pa.' yang belum dikirim ke Mitra';    
        $data['list_data']= $this->Api_m->monitoring_pns_blm_dikirim_mitra($kd_satker,$dari,$sampai);
        //exit();
        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('monitoring/detail_monitoring_pns_blm_dikirim_mitra', $data);
        $this->load->view('footer');
    }

    function nama_pa($id_pengadilan){
        $whereconditon="id=$id_pengadilan";
        $table="pengadilan_agama";
        $this->load->model('data_perkara_m');
        $nama_pa = $this->data_perkara_m->get_data_where($whereconditon, $table)[0]->nama;
        return ucwords(strtolower($nama_pa));
    }


}