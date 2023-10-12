<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Data_eksekusi_ht extends CI_Controller{
	function __construct(){
		parent::__construct();
   		$this->basic->squrity();
		$this->load->model('Data_eksekusi_ht_m');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
	}

	function index(){
		$infolog= infoLogin();
		$group_id= $infolog['group_id'];
		$instansi_id= 	$infolog['instansi_id'];
		$pengadilan_id= base64_encode($infolog['pengadilan_id']);

		$menu = array (
            'menu' => 'Perkara Eksekusi',
            'submenu' => 'Data Eksekusi HT',
            );
			 _unsetsesiMenu();	_setsesiMenu($menu);
        if($group_id==1 OR $group_id<=2){
            $this->pta();
        }else
        if($group_id>=4){
            redirect("data_eksekusi_ht/daftarperkara_list/".$pengadilan_id);
        }else{
        	redirect("dashboard");
        }
	}
	function pta(){
		$data['title'] = 'Data Perkara Eksekusi Hak Tanggungan';
		$data['titlemenu'] = 'Admin';
		$data["perkara"] = $this->Data_eksekusi_ht_m->data_perkara_ht();
		$this->load->view('perkaraeksekusi_ht/header_ht', $data);
		$this->load->view('topbar', $data);
		$this->load->view('perkaraeksekusi_ht/daftar_pa', $data);
		$this->load->view('footer');
	}


	public function ambil_data(){
		$tahun=$_GET['tahun'];
		if($tahun==0){
			$data= $this->Data_eksekusi_ht_m->get_all_pa();

		}
		else{
			$data= $this->Data_eksekusi_ht_m->get_all_pa_filter($tahun);
		}

		if(!empty($data)){

		}else{


		}
		//header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
		echo json_encode($data);

	}


	public function daftarperkara_list($pengadilan_id){
		$satker=$pengadilan_id;
		$nama_satker= $this->Data_eksekusi_ht_m->vpengadilan($satker)["nama"];
		$data['title'] = 'Daftar Perkara Eksekusi Tanggungan '.$nama_satker;
		$data['titlemenu'] = 'Admin';

		$this->load->view('perkaraeksekusi_ht/header_ht', $data);
		$this->load->view('topbar', $data);
		$data['data']= $this->Data_eksekusi_ht_m->daftarperkara_list($satker);
		//var_dump($this->Data_eksekusi_ht_m->daftarperkara_list($satker));exit;
		$data['namasatker']=$nama_satker;
		$data['satker']=$satker;
		$this->load->view('perkaraeksekusi_ht/daftarperkara_list', $data);
		$this->load->view('footer');
	}


	public function daftarperkara_detil($pa_id,$ht_id){
		$satker=base64_decode($pa_id);
		$ht_id=base64_decode($ht_id);
		$data['title'] = 'INFORMASI DETIL PERMOHONAN EKSEKUSI HAK TANGGUNGAN';
		$data['titlemenu'] = 'Admin';

		$this->load->view('perkaraeksekusi_ht/header_ht', $data);
		$this->load->view('topbar', $data);

		//$submenu = $this->uri->segment(3);
		$data['data']= $this->Data_eksekusi_ht_m->daftarperkara_detil($satker,$ht_id);
		$data['data_pihak1']= $this->Data_eksekusi_ht_m->daftarperkara_pihak($satker,$ht_id,1);
		$data['data_pihak2']= $this->Data_eksekusi_ht_m->daftarperkara_pihak($satker,$ht_id,2);
		$data['bpn']= $this->Data_eksekusi_ht_m->get_mitra(5,$satker);
		$data['kpknl']= $this->Data_eksekusi_ht_m->get_mitra(4,$satker);
		//$data['aanmaning']= $this->Data_eksekusi_ht_m->get_aanmaning($satker,$idPkr);
		$data['satker']= $satker;
		$data['ht_id']= $ht_id;
		$this->load->view('perkaraeksekusi_ht/daftarperkara_detil', $data);
	
		$this->load->view('footer');
	}
	public function list_blangko(){
		$list="";
		$this->load->model('Dokumen_m');
		$jenis_blangko=$this->Dokumen_m->get_all_data("jenis_blangko");
		foreach ($jenis_blangko as $row){
			$list.='<div class="card">
					    <div class="card-header bg-primary">
					      <a class="card-link text-white" data-toggle="collapse" href="#collapse'.$row->jenis_blangko_id.'">
					        '.$row->jenis_blangko_nama.'
					      </a>
					    </div>
					    <div id="collapse'.$row->jenis_blangko_id.'" class="collapse" data-parent="#accordion">
					      <div class="card-body">';
			$list.= $this->list_dokumen($row->jenis_blangko_id);
			$list.='</div> </div> </div>';
		}
		echo '<div id="accordion">'.$list.'</div>';
	}
	public function list_dokumen($jenis_blangko_id){
		$isi="";
		$this->load->model('Dokumen_m');
		$where='jenis_blangko_id='.$jenis_blangko_id;
		$data_blangko=$this->Dokumen_m->get_data_where($where,"template_dokumen");
		//var_dump($data_blangko);
		$nomor=0;
		foreach ($data_blangko as $row){
			$nomor++;
			$isi.="<p title='Pilih Blangko' style='cursor:pointer' onclick='tampil_modal(".$row->id.")'>$nomor. ". $row->nama."</p>";

		}
		return $isi;
	}

	function simpan_aan(){
		$data = array(
			'pa_id' => $this->input->post('pa_id'),
			'perkara_id' => $this->input->post('perkara_id'),
			'tanggal_penetapan_aanmaning' => $this->input->post('tanggal_penetapan_aanmaning'),
			'tanggal_aanmaning' => $this->input->post('tanggal_aanmaning'),
			'jam_aanmaning' => $this->input->post('jam_aanmaning'),
			'diinput_tanggal' => date("Y-m-d H:i:s")
		);
		$this->Data_eksekusi_ht_m->simpan_aanmaning($data);
		redirect("data_ekseksi/");
	}


}

