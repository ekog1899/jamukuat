<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kua extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Dashboard_model');
        $this->load->model('Api_m');
        $this->load->library('Pdf');
        $this->basic->squrity();
    }

    public function index(){
        $pa_id=(int)base64_decode($this->session->userdata('pengadilan_id'));
        $mitra_id=(int)base64_decode($this->session->userdata('mitra_id'));
        //print_r(infoLogin());
        //print_r($pa_id);

        $infolog= infoLogin();
        $fullname= $infolog['fullname'];
       if(!empty($_POST['tahun'])){
            $tahun=$_POST['tahun'];
       }else{
            $tahun=date('Y');
       }

       // echo $tahun;
       // exit();
        $data['title']          = 'Dashboard';
        $data['titlemenu']      = $fullname;
       
        //$data['kua']=$this->Api_m->get_kua($mitra_id,$pa_id);
        $data['kua']=$this->Api_m->get_rekap_kua($tahun,$mitra_id,$pa_id);

            // print_r($data['kua']);
            // exit();
            // foreach ($data['kua']->result_array() as $key) {
            //  echo $key['nama_pa'].'<br>';
            // }
            // exit();
        $data['tahun']=$tahun;
     
				$infolog= infoLogin();
				$user_id= $infolog['userid'];
				$datastring=implode(",",$data);
				insertLog('KUA/Tahun',$user_id,$datastring);
				
		//print_r($infolog);

        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        //$this->load->view('kua/dash_kua_new', $data);
        $this->load->view('kua/dash_kua_rekap', $data);
        $this->load->view('footer');
    }

    function rentang_data(){
        $this->form_validation->set_rules('dari', 'dari', 'required');
        $this->form_validation->set_rules('sampai', 'sampai', 'required');

        if ($this->form_validation->run() == false)
        {
            $pa_id=(int)base64_decode($this->session->userdata('pengadilan_id'));
            $mitra_id=(int)base64_decode($this->session->userdata('mitra_id'));
       
            $data['title']          = 'Dashboard';
            $data['titlemenu']      = 'KUA';
       
            $data['kua']=$this->Api_m->get_kua($mitra_id,$pa_id);
   
            $this->load->view('header', $data);
            $this->load->view('topbar', $data);
            $this->load->view('kua/dash_kua_new', $data);
            $this->load->view('footer');
        }
        else
        {
            $pa_id=(int)base64_decode($this->session->userdata('pengadilan_id'));
            $mitra_id=(int)base64_decode($this->session->userdata('mitra_id'));
            $dari=$_POST['dari'];
            $sampai=$_POST['sampai'];
            $data['kua'] = $this->Api_m->get_kua_new($mitra_id,$pa_id,$dari,$sampai);
             //print_r($data['kua']);
             //exit();
            $this->load->view('header', $data);
            $this->load->view('topbar', $data);
            $this->load->view('kua/list_data_kua', $data);
            $this->load->view('footer');
        }
    }

    function kua_detail(){
        $pa_id=(int)base64_decode($this->session->userdata('pengadilan_id'));
        $mitra_id=(int)base64_decode($this->session->userdata('mitra_id'));
        $id=base64_decode($this->input->post('id'));
        $data["kua"] = $this->Api_m->get_kuadata_byid($mitra_id,$pa_id,$id);
        //print_r($data["kua"]);
        //exit();
		
		
        $this->load->view('kua/detail_kua', $data);
    }

    function kua_detail_pdf(){
        $pa_id=(int)base64_decode($this->session->userdata('pengadilan_id'));
        $mitra_id=(int)base64_decode($this->session->userdata('mitra_id'));
        $id= $this->uri->segment(3, 0);
        $data["kua"] = $this->Api_m->get_kuadata_byid($mitra_id,$pa_id,$id);
        //print_r($data["kua"]);
        //exit();
        $this->load->view('kua/detail_kua_pdf', $data);
    }

    function detail_perkara(){

        $tahun = $this->uri->segment(3);
        $bulan = $this->uri->segment(4);

        $infolog= infoLogin();
        $fullname= $infolog['fullname'];
        $data['titlemenu']      = $fullname;
        $pa_id=(int)base64_decode($this->session->userdata('pengadilan_id'));
        $mitra_id=(int)base64_decode($this->session->userdata('mitra_id'));
        $id= $this->uri->segment(3, 0);
        $data["kua"] = $this->Api_m->get_kua_rekap_detail($tahun,$bulan,$mitra_id,$pa_id);
        //print_r($data["kua"]);
        //exit();

        //echo $bulan;exit();
                $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        //$this->load->view('kua/dash_kua_new', $data);
        $this->load->view('kua/dash_kua_detail', $data);
				$infolog= infoLogin();
				$user_id= $infolog['userid'];
				
				$datalog['tahun']=$tahun;
				$datalog['bulan']=$bulan;
				$datalog['nama']=$fullname;
				
				$datastring=implode(",",$datalog);
				insertLog('KUA/Bulan',$user_id,$datastring);
        $this->load->view('footer');
    }

    public function kua_kemenag(){


        $mitra_id = $this->uri->segment(3);

        $pa_id = $this->uri->segment(4);
       
     //   $pa_id=(int)base64_decode($this->session->userdata('pengadilan_id'));

        $data['title']          = 'Dashboard';
        $data['titlemenu']      = 'KUA';
       
            $data['kua']=$this->Api_m->get_kua($mitra_id,$pa_id);

            // print_r($data['kua']);
            // exit();
            // foreach ($data['kua']->result_array() as $key) {
            //  echo $key['nama_pa'].'<br>';
            // }
            // exit();

        $infolog= infoLogin();
        $user_id= $infolog['userid'];
        $datastring=implode(",",$data);
        insertLog('Kemenag/kua',$user_id,$datastring);
     
        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('dashboard/dash_kua', $data);
       // $this->load->view('kua/dash_kua_new', $data);
        $this->load->view('footer');
    }
    
        
}

