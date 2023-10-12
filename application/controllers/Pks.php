<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pks extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Pks_m');
        $this->load->library('form_validation');
		$this->load->library('encrypt');
        $this->basic->squrity();
    }
    function index(){
		
		$menu = array (
            'menu' => 'PKS',
            'submenu' => '',
            );
            _unsetsesiMenu();	_setsesiMenu($menu);
		$infolog= infoLogin();
		$group_id= $infolog['group_id'];	
		
        if($group_id==1 OR $group_id==2){
            $this->pta();
        }else{
        	$this->satker();
        }
	}
	function pta(){
		$data['title'] = 'Data PKS Se Jawa Tengah';
        $data['titlemenu'] = 'Admin';
        $data["pks"] = $this->Pks_m->get_pks_all();
        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('pks/list_pks_pta', $data);
        $this->load->view('footer');
	}
	function satker(){
        $infolog= infoLogin();
        //var_dump($infolog);exit;
        $pengadilan_id=     $infolog['pengadilan_id'];
        $username=     $infolog['username'];
		$data['pa_id'] = $pengadilan_id;
        $data['username'] = $username;
        $data['title'] = 'Data PKS Satker';
        $data['titlemenu'] = 'Admin';
        $data["pks"] = $this->Pks_m->get_pks_satker($pengadilan_id);
        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('pks/list_pks', $data);
        $this->load->view('footer');
	}
	function pks_detail(){
		$id=base64_decode($this->input->post('id'));
        $data["pks"] = $this->Pks_m->get_pks_byid($id);
        $this->load->view('pks/detail_pks', $data);
	}
    function pks_edit(){
        $id=base64_decode($this->input->post('id'));
        $data["pks"] = $this->Pks_m->get_pks_byid($id);
        $data["statuse"] = $this->Pks_m->get_master_status();
        $this->load->view('pks/edit_pks', $data);
    }
	function pks_detail_pta(){
        $id=base64_decode($this->input->post('id'));
        $data["pks"] = $this->Pks_m->get_pks_byid($id);
        $this->load->view('pks/pta_detail_pks', $data);
	}
	function pks_delete(){
		$id=base64_decode($this->input->post('id'));
		$where="id=$id";
 		$this->Pks_m->delete_data($where, 'data_pks'); 
	}
	function pks_add(){
        $infolog= infoLogin();
        $username=     $infolog['username'];
        $pengadilan_id=     $infolog['pengadilan_id'];
        $data['pa_id'] = $pengadilan_id;
        $data['username'] = $username;
        $data["statuse"] = $this->Pks_m->get_master_status();
        $this->load->view('pks/add_pks', $data);
	}
	function pks_edit_isi(){
        $id=$this->input->post('id');
        $DATA=$this->input->post('DATA');
        $field=$this->input->post('field');
         $update=array($field=>$DATA);
        $where="id=".$id;
        $this->Pks_m->update_data($where, "data_pks", $update);
        echo "<p class='text-success'>Edit Data Berhasil</p>";
    }
	function pks_save(){
		$pa_id=base64_decode($this->input->post('pa_id')) ;
		$instansi=base64_decode($this->input->post('instansi')) ;
		$tanggal_pks=base64_decode($this->input->post('tanggal_pks')) ;
		$nomor_pks=base64_decode($this->input->post('nomor_pks')) ;
		$isi_pks=base64_decode($this->input->post('isi_pks')) ;
        $status_pks_id=base64_decode($this->input->post('status_pks_id')) ;
		$data = array(
			'pa_id' =>  $pa_id,
			'instansi' =>  $instansi,
			'tanggal_pks' =>  $tanggal_pks,
			'nomor_pks' =>  $nomor_pks,
			'isi_pks' =>  $isi_pks,
            'status_pks_id' =>  $status_pks_id,
			'diinput_tanggal' =>  date("Y-m-d H:i:s")
		);
		$this->Pks_m->save_pks($data);
        //kirim email
        	//belum_dibuat
        //kirim email
	}

    function upload_edoc(){
        $id=$this->input->post('id_pks');
        $config['upload_path']          = 'uploads/pks/';
        $config['allowed_types']        = 'pdf|doc|rtf|docx|zip|rar';
        $nama_file        = str_replace(" ","_",rand(10,99)."_".time().'_'.$_FILES["file"]['name']);
        $config['file_name']=$nama_file;
        $this->load->helper('url', 'form'); 

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file')){
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
               // $this->load->view('upload_form', $error);
        }else{
            $data = array('upload_data' => $this->upload->data());
            $update=array(
                            'softcopy_pks' =>"uploads/pks/".$nama_file
                            );

            $where="id=".$id;
           $this->Pks_m->update_data($where, "data_pks", $update);
        }
    }
		
}

