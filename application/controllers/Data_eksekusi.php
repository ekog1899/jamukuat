<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_eksekusi extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Data_eksekusi_m');
        $this->load->library('form_validation');
		$this->load->library('encrypt');
        $this->basic->squrity();
    }
    // '101/'+row.id + '/'+tahun+'/M@gelang'
    function index(){
		$group=(int)base64_decode($this->session->userdata('group'));
		
		$infolog= infoLogin();
		$group_id= $infolog['group_id'];
		$instansi_id= 	$infolog['instansi_id'];
		$pengadilan_id= 	$infolog['pengadilan_id'];
		$mitra_id= 	$infolog['mitra_id'];
		$user_id= $infolog['userid'];
		
		$menu = array (
            'menu' => 'Perkara Eksekusi',
            'submenu' => 'Data Eksekusi',
            );
			 _unsetsesiMenu();	_setsesiMenu($menu);
		
        if($group_id==1 OR $group_id==2){
            $this->pta();
        }else
        if($group_id==4){
        	//echo $this->session->userdata('pa_id');exit;
        	$tujuan=base64_encode('101/'.$pengadilan_id.'/0/M@gelang');
            redirect("data_eksekusi/daftarperkara_list/".$tujuan);
        }else{
        	redirect("dashboard"); 
        }
	}
    public function pta(){
    	
		$data['title'] = 'DAFTAR PERKARA EKSEKUSI ';
        $data['titlemenu'] = 'Admin';
		
        $data["tahun"] = $this->Data_eksekusi_m->tahun_eks();
        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('perkaraeksekusi/daftar_pa', $data);
        $this->load->view('footer');
	}
	
	
	public function ambil_data(){	
		$tahun=$_GET['tahun'];		
		if($tahun==0){
			$data= $this->Data_eksekusi_m->get_all_pa();			 
		}else{
			$data= $this->Data_eksekusi_m->get_all_pa_filter($tahun);
		}
		
		//header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
		echo json_encode($data);        
    }


	public function daftarperkara_list(){
		$submenu = $this->uri->segment(3);
		$decode = base64_decode($submenu);
		$tmp1 = explode('/', $decode);
		if(count($tmp1)!=4){
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">data gagal diambil </div>');
			redirect('/data_eksekusi');			
		}
		
		$data['title'] = 'DAFTAR PERKARA EKSEKUSI PER SATKER';
        $data['titlemenu'] = 'Admin';
		
        $this->load->view('header', $data);
        $this->load->view('topbar', $data);			  
     
	  	if(isset($tmp1[1],$tmp1[2])){
			$tahun= $tmp1[2]; 
			$satker= $tmp1[1];		
			$data['data']= $this->Data_eksekusi_m->daftarperkara_list($satker,$tahun);		
			$detilsatker= $this->Data_eksekusi_m->vpengadilan($satker);
			$data['namasatker']=$detilsatker['nama'];		
			$data['satker']=$satker;	
		
			if (!empty ($data)){	
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">berhasil</div>');
			}else {			
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">gagal</div>');
			}
		
			//var_dump($decode, $satker, $tahun, $data, $tmp1);
			$this->load->view('perkaraeksekusi/daftarperkara_list', $data	);
		  
	  	}else {
		  	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">gagal</div>');     
		}
	 	$this->load->view('footer');
	// var_dump($data);
	}
   
	///update 2023
		public function daftarperkara_detil(){
			$infolog= infoLogin();
			$pengadilan_id=$infolog['pengadilan_id'];

			$data['title'] = 'Dashboard';
	        $data['titlemenu'] = 'Admin';
			$data['tabdataumum']='active';
			
	        $this->load->view('header', $data);
	        $this->load->view('topbar', $data);
			
			$submenu = $this->uri->segment(3);
			
			$decode = $this->encrypt->decode(base64_decode($submenu));
			$tmp1 = explode('/', $decode);
			if(count($tmp1)!=3){
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">data gagal diambil </div>');
				redirect('/data_eksekusi');			
			}
			
		  	if(isset($tmp1[1],$tmp1[2])){
			  	$satker= $tmp1[1]; 
			  	$idPkr= $tmp1[2];			
				 
				$data['data']= $this->Data_eksekusi_m->daftarperkara_detil($satker,$idPkr);
				$data['data2']= $this->Data_eksekusi_m->daftarperkara_pihak($satker,$idPkr);
				$data['bpn']= $this->Data_eksekusi_m->get_mitra(5,$pengadilan_id);
				$data['kpknl']= $this->Data_eksekusi_m->get_mitra(4,$pengadilan_id);
				//$data['sidangaanmaning']= $this->Data_eksekusi_m->get_sidangaanmaning($satker,$idPkr);
				$data['satker']= $satker;
				$data['idperkara']= $idPkr;				
				$data['perkara_id']= $idPkr;				
				if (!empty ($data)){	
				//$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">berhasil</div>');		
				}else {			
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">gagal</div>');
				}		
				
				
			 	$this->load->view('perkaraeksekusi/daftarperkara_detil', $data	);
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">gagal</div>');	 
			}		
				$this->load->view('footer');
		}
	///update 2023

	public function preview(){
		$submenu = $this->uri->segment(3);		
		$decode = $this->encrypt->decode(base64_decode($submenu));
		$tmp1 = explode('/', $decode);
		if(count($tmp1)!=3){
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">data gagal diambil </div>');
			redirect('/data_eksekusi');			
		}

		if(isset($tmp1[1],$tmp1[2])){
			$satker= $tmp1[1]; 
			$idPkr= $tmp1[2];		
			$data_perkara= $this->Data_eksekusi_m->daftarperkara_detil($satker,$idPkr);
			$data_pihak= $this->Data_eksekusi_m->daftarperkara_pihak($satker,$idPkr);
	  	}

	  	$nama_pa=$this->Data_eksekusi_m->vpengadilan($satker);
		$data["source_file"] = "template/aanmaning/1_penetapan_aanmaning.rtf";
		$data['nomor_register_eksekusi'] = $data_perkara[0]->nomor_register_eksekusi;
		$data['nama_pa'] = $nama_pa;
		$data['eksekusi_nomor_perkara'] = $data_perkara[0]->eksekusi_nomor_perkara;
		//$data['tanggal_putusan_perkara_eksekusi'] = $data_perkara[0]->tanggal_putusan_perkara_eksekusi;
		//$data['pemohon_nama'] = $data_perkara[0]->pemohon_nama;
		//$data['termohon_eksekusi'] = $data_perkara[0]->termohon_eksekusi;
		$data['eksekusi_amar_putusan'] = $data_perkara[0]->eksekusi_amar_putusan;
		//$data['surat_permohon_eksekusi'] = $data_perkara[0]->surat_permohon_eksekusi;
		$data['permohonan_eksekusi'] = $data_perkara[0]->permohonan_eksekusi;
		//$data['hari_aanmaning'] = $data_perkara[0]->hari_aanmaning;
		//$data['tanggal_aanmaning'] = $data_perkara[0]->tanggal_aanmaning;
		//$data['jam_aanmaning'] = $data_perkara[0]->jam_aanmaning;
		$data['kota_pa'] = str_replace("PENGADILAN AGAMA ","",$nama_pa);
		//$data['tanggal_penetapan_aanmaning'] = $data_perkara[0]->tanggal_penetapan_aanmaning;
 
		$this->load->view('perkaraeksekusi/preview', $data);
	}
	
	function simpan_aan(){		
		$satker=$this->input->post('pa_id') ;
		$idPkr=$this->input->post('perkara_id') ;
		$url2 = '102/'.$satker.'/'.$idPkr;		
		$enc = base64_encode($this->encrypt->encode($url2));		
		$cekdataaan= $this->Data_eksekusi_m->get_aanmaning($satker,$idPkr);
		
		if (!empty($cekdataaan)){		
			$this->session->set_flashdata('message', '<div id="notifikasi" class="alert alert-danger" role="alert">data sudah ada  </div>');
			redirect ('data_eksekusi/daftarperkara_detil/'.$enc.'#aanmaning');
		}else{		
			$data = array(
				
				'pa_id' =>  $this->input->post('pa_id'),
				'perkara_id' =>  $this->input->post('perkara_id'),
				'tanggal_penetapan_aanmaning' =>  $this->input->post('tanggal_penetapan_aanmaning'),
				'tanggal_aanmaning' =>  $this->input->post('tanggal_aanmaning'),
				'jam_aanmaning' =>  $this->input->post('jam_aanmaning'),
				'diinput_tanggal' => date("Y-m-d H:i:s")
			);
			$this->Data_eksekusi_m->simpan_aanmaning($data);	
			$this->session->set_flashdata('message', '<div id="notifikasi" class="alert alert-success" role="alert">berhasil disimpan </div>');
			redirect ('data_eksekusi/daftarperkara_detil/'.$enc.'#aanmaning');
		}
		
	}
	
	function simpan_aansidang(){		
		$satker=$this->input->post('pa_id') ;
		$idPkr=$this->input->post('perkara_id') ;
		$url2 = '102/'.$satker.'/'.$idPkr;		
		$enc = base64_encode($this->encrypt->encode($url2));
		$this->form_validation->set_rules('tanggal_aanmaning', 'tanggal_aanmaning', 'required');
		$this->form_validation->set_rules('jam_aanmaning', 'jam_aanmaning', 'required');

		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('message', '<div id="notifikasi" class="alert alert-danger" role="alert">gagal di edit  </div>');
		}else{
			$data = array(				
				'pa_id' =>  $this->input->post('pa_id'),
				'perkara_id' =>  $this->input->post('perkara_id'),				
				'tanggal_aanmaning' =>  $this->input->post('tanggal_aanmaning'),
				'jam_aanmaning' =>  $this->input->post('jam_aanmaning'),
				'diinput_tanggal' => date("Y-m-d H:i:s")
			);
			$this->Data_eksekusi_m->simpan_aansidang($data);	
			$this->session->set_flashdata('message', '<div id="notifikasi" class="alert alert-success" role="alert">berhasil disimpan </div>');
			redirect ('data_eksekusi/daftarperkara_detil/'.$enc.'#aanmaning');
		}
	}
	
	function update_aan(){		
		$satker=$this->input->post('pa_id') ;
		$idPkr=$this->input->post('perkara_id');
		$url2 = '102/'.$satker.'/'.$idPkr;
		$enc = base64_encode($this->encrypt->encode($url2));
		
		$this->form_validation->set_rules('tanggal_penetapan_aanmaning', 'tanggal_penetapan_aanmaning', 'required');
		$this->form_validation->set_rules('tanggal_aanmaning', 'tanggal_aanmaning', 'required');
		$this->form_validation->set_rules('jam_aanmaning', 'jam_aanmaning', 'required');
		
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('message', '<div id="notifikasi" class="alert alert-danger" role="alert">gagal di edit  </div>');	
		}else{
			$data=array(
				"pa_id"=>$satker,
				"perkara_id"=>$idPkr,
				"tanggal_penetapan_aanmaning"=>$_POST['tanggal_penetapan_aanmaning'],
				"tanggal_aanmaning"=>$_POST['tanggal_aanmaning'],
				"jam_aanmaning"=>$_POST['jam_aanmaning'],
				'diperbaharui_tanggal' => date("Y-m-d H:i:s")
			);
			
			$this->Data_eksekusi_m->update_aanmaning($satker, $idPkr, $data);
			$this->session->set_flashdata('message', '<div id="notifikasi" class="alert alert-success" role="alert">berhasil disimpan </div>');
		}	
		redirect ('data_eksekusi/daftarperkara_detil/'.$enc.'#aanmaning');
	}
	
	function update_aansidang(){		
		$satker=$this->input->post('pa_id') ;
		$idPkr=$this->input->post('perkara_id');
		$idSidang=$this->input->post('id');
		
		$url2 = '102/'.$satker.'/'.$idPkr;
		$enc = base64_encode($this->encrypt->encode($url2));
				
		$this->form_validation->set_rules('tanggal_aanmaning', 'tanggal_aanmaning', 'required');
		$this->form_validation->set_rules('jam_aanmaning', 'jam_aanmaning', 'required');
		
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('message', '<div id="notifikasi" class="alert alert-danger" role="alert">gagal di edit  </div>');
		}else{
			$data=array(
				"id"=>$idSidang,
				"pa_id"=>$satker,
				"perkara_id"=>$idPkr,
				"tanggal_aanmaning"=>$_POST['tanggal_aanmaning'],
				"jam_aanmaning"=>$_POST['jam_aanmaning'],
				'diperbaharui_tanggal' => date("Y-m-d H:i:s")
			);
			$this->db->where('id', $idSidang);
			$this->db->where('pa_id', $satker);
			$this->db->where('perkara_id', $idPkr );
			$this->db->update('perkara_eksekusi_aanmaning_sidang ',$data);
			
			$ambilid= $this->db->query('select * FROM perkara_eksekusi_aanmaning_sidang WHERE pa_id='.$satker.' and perkara_id='.$idPkr.' ORDER by id ASC LIMIT 1 ')->row_array();
			$ambil2=$ambilid['id'];
			
			if($ambil2  ==   $idSidang){			
				$data2=array(				
					"pa_id"=>$satker,
					"perkara_id"=>$idPkr,
					"tanggal_aanmaning"=>$_POST['tanggal_aanmaning'],
					"jam_aanmaning"=>$_POST['jam_aanmaning'],
					'diperbaharui_tanggal' => date("Y-m-d H:i:s")
				);
		
				$this->db->where('pa_id', $satker);
				$this->db->where('perkara_id', $idPkr );
				$this->db->update('perkara_eksekusi_aanmaning ',$data2);		
			}	
					
			$this->session->set_flashdata('message', '<div id="notifikasi" class="alert alert-success" role="alert">berhasil di ubah '.$ambilid['idsidang'].' </div>');
		}	
		redirect ('data_eksekusi/daftarperkara_detil/'.$enc.'#aanmaning');
	}
	public function list_blangko(){
		$list="";
		$this->load->model('Dokumen_m');
		$jenis_blangko=$this->Dokumen_m->get_all_data("jenis_blangko_eksekusi");
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
		$data_blangko=$this->Dokumen_m->get_data_where($where,"template_dokumen_eksekusi");
		//var_dump($data_blangko);
		$nomor=0;
		foreach ($data_blangko as $row){
			$nomor++;
			$isi.="<p title='Pilih Blangko' style='cursor:pointer' onclick='tampil_modal(".$row->id.")'>$nomor. ". $row->nama."</p>";

		}
		return $isi;
	}
	//iki tambahan 2023
		public function kirim(){
			$id=$this->input->post('id');
			$this->load->model('Dokumen_m');
			$where='id='.$id;
			$datane=$this->Dokumen_m->get_data_where($where,"data_permohonan");
			$data_lampiran=$this->Dokumen_m->get_data_where("data_permohonan_id=$id","data_dokumen");
			//var_dump($datane);
			//echo "<h1></h1>";
	        if(count($datane)) {
	            foreach($datane AS $data){
	                $email_penerima=$data->email_satker;
	                $wa_satker=$data->wa_satker;
	                //$edoc=base_url($data->edoc);
	                $isi="<p>Yth. Kepala ".$data->nama_mitra."<br>di Tempat </p>";
	                $isi.="<p>Dengan hormat, berikut ini Permohonan yang dimohonkan oleh ".ucwords(strtolower($data->pa_pemohon))."</p>";
	                $isi.="<table cellpadding=5>";
	                $isi.="<tr><td>Perihal</td><td>".$data->perihal."</td></tr>"; 
	                $isi.="<tr><td>Tanggal Surat</td><td>".tanggale($data->tanggal)."</td></tr>";
	                $isi.="<tr><td>Keterangan</td><td>".$data->catatan_singkat."</td></tr>";
	                if(count($data_lampiran)){
	                	 $isi.="<tr><td valign='top'>Lampiran</td><td>"; 
	            		foreach($data_lampiran AS $datalampiran){
	            			$isi.="<a target='_blank' href='".base_url($datalampiran->link)."'>- ".$datalampiran->nama_dokumen."</a><br>";
	            		}
	            		 $isi.="</td></tr>"; 
	            	}
	                $isi.="</table>";
	                $isi.="<p>Demikian atas bantuan dan kerjasamanya diucapkan terima kasih</p>
                ";
	                $isi.="<br><p>Email ini dikirim otomatis, mohon untuk tidak membalas email ini</p>";
	                //proses kirim email
	                    $ci = get_instance();
	                    $ci->load->library('Mailer');
	                    $sendmail = array(
	                      'email_penerima'=>$email_penerima,
	                      'subjek'=>'Permohonan '.$data->perihal,
	                      'content'=>$isi
	                      //'attachment'=>$attachment
	                    );
	                    $send = $ci->mailer->send($sendmail);
	                    //echo "<p>Penerima : $email_penerima</p>";
	                    //echo "<p>Isi : $isi</p>";
	                    //echo "<p>$send</p>";
	                //proses kirim email 
	                //proses kirim email
	                //proses kirim wa

	                //proses kirim wa
	                $this->Dokumen_m->jalankan_data_sql("UPDATE data_permohonan SET status =1 WHERE id=$id");
	                echo "<p class='text-success'>Pengiriman Selesai kepada $email_penerima</p>";
	            }
	        }
		}
	//iki tambahan 2023
}

