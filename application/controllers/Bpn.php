<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bpn extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Bpn_m');
        $this->load->library('form_validation');
		$this->load->library('encrypt');
        $this->basic->squrity();
    }
    function index(){
        $infolog= infoLogin();
        //var_dump($infolog);exit;
        $group_id= $infolog['group_id'];
        $instansi_id=   $infolog['instansi_id'];
        $pengadilan_id=     $infolog['pengadilan_id'];
        //echo "$instansi_id-";
        //echo "$group";
        if($instansi_id==5){
            $this->bpn();
        }else
        if($group_id==4 AND $instansi_id==1 AND $pengadilan_id>=475){
            $this->pa();
        }else
        if($group_id==1 AND $instansi_id==1 AND $pengadilan_id==0){
            $this->pta();
        }else{
        	redirect('dashboard');
        } 
	}
	function pta(){
		$data['title'] = 'Data Permohonan Ke ATR/BPN se PTA';
        $data['titlemenu'] = 'Admin';
        $data["bpn"] = $this->Bpn_m->get_bpn_all();
        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('bpn/list_bpn_pta', $data);
        $this->load->view('footer');
	}
	function pa(){
        $infolog= infoLogin();
        $pengadilan_id=     $infolog['pengadilan_id'];
		$data['title'] = 'ATR/BPN Bagi Pengadilan Agama';
        $data['titlemenu'] = 'Admin';
        $user_id=base64_decode($this->session->userdata('id_user'));
        $data["user_id"] =base64_decode($this->session->userdata('id_user'));
        $data["fullname"] =base64_decode($this->session->userdata('fullname'));
        $data["email"] =base64_decode($this->session->userdata('email'));
        $data["bpn"] = $this->Bpn_m->get_bpn_satker($pengadilan_id);
        //echo $pengadilan_id;exit;
        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('bpn/list_bpn', $data);
        $this->load->view('footer');
	}
    function bpn(){
        $infolog= infoLogin();
        //var_dump($infolog);exit;
        $mitra_id= $infolog['mitra_id'];
        $data['title'] = 'ATR/ BPN';
        $data['titlemenu'] = 'Admin';
        $user_id=base64_decode($this->session->userdata('id_user'));
        //$mitra_id=$this->get_mitra_id($user_id);
        //echo "$mitra_id";exit;
        $data["user_id"] =base64_decode($this->session->userdata('id_user'));
        $data["fullname"] =base64_decode($this->session->userdata('fullname'));
        $data["email"] =base64_decode($this->session->userdata('email'));
        $data["bpn"] = $this->Bpn_m->get_bpn_bpn($mitra_id);
        //echo base64_decode($this->session->userdata('pa_id'));
        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('bpn/list_bpn_bpn', $data);
        $this->load->view('footer');
    }
	function bpn_detail(){
		$id=base64_decode($this->input->post('id'));
        $data["bpn"] = $this->Bpn_m->get_bpn_byid($id);
        $data["soft"] = $this->Bpn_m->soft($id);
        $this->load->view('bpn/detail_bpn', $data);
	}
    function bpn_detail_bpn(){
        $id=base64_decode($this->input->post('id'));
        $data["bpn"] = $this->Bpn_m->get_bpn_byid($id);
        $data["soft"] = $this->Bpn_m->soft($id);
        $this->load->view('bpn/detail_bpn_bpn', $data);
    }
	function bpn_detail_pta(){
		$id_e_bpn=base64_decode($this->input->post('id'));
        $data["fullname"] =base64_decode($this->session->userdata('fullname'));
        $data["bpn"] = $this->Bpn_m->get_bpn_byid($id_e_bpn);
        $status= $this->Bpn_m->get_bpn_byid($id_e_bpn)[0]->status;
        $data["status"]= $this->Bpn_m->get_bpn_byid($id_e_bpn)[0]->status;
        if($status==1){
        	echo "edit";
        	$where="id_e_bpn=$id_e_bpn";
 			$update=array('status' =>2);
     		$this->Bpn_m->update_data($where, "e_bpn", $update);
     		$data["status"]=2;
        }
        $this->load->view('bpn/pta_detail_bpn', $data);
	}
	function bpn_delete(){
		$id=base64_decode($this->input->post('id'));
		$where="id=$id";
 		$this->Bpn_m->delete_data($where, 'data_permohonan'); 
	}
	function bpn_add(){
        $infolog= infoLogin();
        $pengadilan_id=     $infolog['pengadilan_id'];
        $user_id=base64_decode($this->session->userdata('id_user'));
        $data["user_id"] =base64_decode($this->session->userdata('id_user'));
        //$data["pa_id"] =;
        $data["pa_pemohon"] =base64_decode($this->session->userdata('fullname'));
        $data["pa_pemohon_id"] =$pengadilan_id;
        $data["email"] =base64_decode($this->session->userdata('email'));
        $data["jenis_bpn"] = $this->Bpn_m->get_jenis_bpn();
        $data["instansi_bpn"] = $this->Bpn_m->get_instansi_bpn($pengadilan_id);
        //echo "$pengadilan_id";exit;
        $data["nomor"] = $this->Bpn_m->get_nomor_perkara($pengadilan_id);
        $this->load->view('bpn/add_bpn', $data);
	}
	function bpn_update(){
		$id_e_bpn=base64_decode($this->input->post('id_e_bpn'));
        $feedback=base64_decode($this->input->post('feedback'));
        $status=base64_decode($this->input->post('status'));
		$update=array(
						'status' =>$status,
						'feedback' =>$feedback,
						'diedit_oleh' =>base64_decode($this->session->userdata('fullname')),
						'diedit_tanggal' =>date("Y-m-d H:i:s")
					);
		$where="id_e_bpn=".$id_e_bpn;
     	$this->Bpn_m->update_data($where, "e_bpn", $update);
	}
	function bpn_save(){
		$user_id=base64_decode($this->input->post('user_id')) ;
		$tentang=base64_decode($this->input->post('tentang')) ;
		$name=base64_decode($this->input->post('name')) ;
		$email=base64_decode($this->input->post('email')) ;
		$message=base64_decode($this->input->post('message')) ;
		$data = array(
			'tanggal_permohonan ' =>  base64_decode($this->input->post('tanggal_permohonan')),
			'nomor_permohonan' =>  base64_decode($this->input->post('nomor_permohonan')),
			'diinput_tanggal' =>  date("Y-m-d H:i:s"),
            'diinput_oleh' => base64_decode($this->input->post('user_id')),
            'pa_pemohon' => base64_decode($this->input->post('pa_pemohon')),
            'pa_pemohon_id' => base64_decode($this->input->post('pa_pemohon_id')),
            'mitra_id' => base64_decode($this->input->post('mitra_id')),
            'nama_mitra' => base64_decode($this->input->post('nama_mitra')),
            'email_satker' => base64_decode($this->input->post('email_satker')),
            'wa_satker' => base64_decode($this->input->post('wa_satker')),
            'nomor_eksekusi' => base64_decode($this->input->post('nomor_eksekusi')),
            'jenis_bpn_id' => base64_decode($this->input->post('jenis_bpn_id')),
            'jenis_bpn' => base64_decode($this->input->post('jenis_bpn')),
            'tanggal_pelaksanaan' => base64_decode($this->input->post('tanggal_pelaksanaan')),
            'keterangan' => base64_decode($this->input->post('keterangan'))
		);
		$this->Bpn_m->save_bpn($data);
        //kirim email
        	//belum_dibuat
        //kirim email
	}
    function upload_edoc(){
        $id=$this->input->post('id');
        $config['upload_path']          = 'uploads/bpn/';
        $config['allowed_types']        = 'pdf';
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
                            'edoc' =>"uploads/bpn/".$nama_file
                            );

            $where="id=".$id;
           $this->Bpn_m->update_data($where, "data_permohonan", $update);
        }
    }
    function upload_edoc_jawaban(){
        $id=$this->input->post('id');
        $config['upload_path']          = 'uploads/bpn/';
        $config['allowed_types']        = 'pdf';
        $nama_file        = 'bpn_jwb_'.str_replace(" ","_",rand(10,99)."_".time().'_'.$_FILES["file"]['name']);
        $config['file_name']=$nama_file;
        $this->load->helper('url', 'form'); 

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file')){
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
               // $this->load->view('upload_form', $error);
        }else{
            $data = array('upload_data' => $this->upload->data());
            $update=array('edoc_jawaban' =>"uploads/bpn/".$nama_file);

            $where="id=".$id;
           $this->Bpn_m->update_data($where, "data_permohonan", $update);
        }
    }
    function bpn_edit_isi(){
        $id=$this->input->post('id');
        $DATA=$this->input->post('DATA');
        $field=$this->input->post('field');
         $update=array($field=>$DATA);
        $where="id=".$id;
        $this->Bpn_m->update_data($where, "data_permohonan", $update);
        echo "<p class='text-success'>Edit Data Berhasil</p>";
    }
    function bpn_kirim(){
        $id=$this->input->post('id');
        $data_permohonan=$this->Bpn_m->get_bpn_byid($id);
        if(count($data_permohonan)) {
            foreach($data_permohonan AS $data){
                $email_penerima=$data->email_satker;
                $wa_satker=$data->wa_satker;
                $edoc=base_url($data->edoc);
                $isi="<p>Yth. Kepala ".$data->nama_mitra."<br>di Tempat </p>";
                $isi="<p>Assalamu alaikum Wr Wb</p>";
                $isi.="<p>Berikut ini Permohonan Bpn yang dimohonkan oleh ".ucwords(strtolower($data->pa_pemohon))."</p>";
                $isi.="<table cellpadding=5>";
                $isi.="<tr><td>Jenis Bpn</td><td>".$data->jenis_bpn."</td></tr>";
                $isi.="<tr><td>Nomor Eksekusi</td><td>".$data->nomor_eksekusi."</td></tr>";
                $isi.="<tr><td>Tanggal Pelaksanaan</td><td>".$data->tanggal_pelaksanaan_indo."</td></tr>";
                $isi.="<tr><td>E-Doc Permohonan</td><td><a style='text-decoration:none' href='". $edoc."' target='_blank' ><b>Unduh E-Doc</b></a></td></tr>";
                $isi.="<tr><td>Keterangan</td><td>".$data->keterangan."</td></tr>";
                $isi.="</table>";
                $isi.="<p>Atas Perhatian dan kerjasamanya diucapkan terima kasih</p>";
                $isi.="<p>Wassalam</p>";
                $isi.="<br><p>Email ini dikirim otomatis, mohon untuk tidak membalas email ini</p>";
                //proses kirim email
                    $ci = get_instance();
                    $ci->load->library('Mailer');
                    $sendmail = array(
                      'email_penerima'=>$email_penerima,
                      'subjek'=>'Permohonan Bpn ',
                      'content'=>$isi
                      //'attachment'=>$attachment
                    );
                    $send = $ci->mailer->send($sendmail);
                //proses kirim email
                //proses kirim wa

                //proses kirim wa
                $update=array('status'=>1);
                $where="id=".$id;
                $this->Bpn_m->update_data($where, "data_permohonan", $update);
                echo "<p class='text-success'>Pengiriman Selesai</p>";
            }
        }
        //echo "$isi";
        //exit;
    }
    function get_mitra_id($user_id){
        $mitra_id="";
        $data_mitra = $this->Bpn_m->get_mitra_id($user_id);
        foreach ($data_mitra as $m) : 
            $mitra_id=$m->mitra_id;
        endforeach; 
        return $mitra_id;
    }
		
}

