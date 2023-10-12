<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengamanan extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Pengamanan_m');
        $this->load->model('Pns_m');
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
    
        if($instansi_id == 3  and $group_id == 3){
            $this->polda();
        }else
        if($instansi_id==3 and ($group_id == 5 OR $group_id == 4 )){
            $this->polsek();
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

    function polda(){
        $data['title'] = 'Data Permohonan Pengamanan se PTA';
        $data['titlemenu'] = 'Polda Jateng';
        $data["pengamanan"] = $this->Pengamanan_m->get_pengamanan_all();
        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('pengamanan/list_pengamanan_pta', $data);
        $this->load->view('footer');
    }
	function pta(){
		$data['title'] = 'Data Permohonan Pengamanan se PTA';
        $data['titlemenu'] = 'Admin';
        $data["pengamanan"] = $this->Pengamanan_m->get_pengamanan_all();
        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('pengamanan/list_pengamanan_pta', $data);
        $this->load->view('footer');
	}
	function pa(){
        $infolog= infoLogin();
        $pengadilan_id=     $infolog['pengadilan_id'];
		$data['title'] = 'Pengamanan Bagi Pengadilan Agama';
        $data['titlemenu'] = 'Admin';
        $user_id=base64_decode($this->session->userdata('id_user'));
        $data["user_id"] =base64_decode($this->session->userdata('id_user'));
        $data["fullname"] =base64_decode($this->session->userdata('fullname'));
        $data["email"] =base64_decode($this->session->userdata('email'));
        $data["pengamanan"] = $this->Pengamanan_m->get_pengamanan_satker($pengadilan_id);
        //echo $pengadilan_id;exit;
        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('pengamanan/list_pengamanan', $data);
        $this->load->view('footer');
	}
    function polsek(){
        $infolog= infoLogin();
        //var_dump($infolog);exit;
        $mitra_id= $infolog['mitra_id'];
        $data['title'] = 'Pengamanan Bagi Kepolisian';
        $data['titlemenu'] = 'Admin';
        $user_id=base64_decode($this->session->userdata('id_user'));
        //$mitra_id=$this->get_mitra_id($user_id);
        //echo "$mitra_id";exit;
        $data["user_id"] =base64_decode($this->session->userdata('id_user'));
        $data["fullname"] =base64_decode($this->session->userdata('fullname'));
        $data["email"] =base64_decode($this->session->userdata('email'));
        $data["pengamanan"] = $this->Pengamanan_m->get_pengamanan_polsek($mitra_id);
        //print_r ($infolog);
        //exit();
        //echo base64_decode($this->session->userdata('pa_id'));
        //$this->load->view('pengamanan/header_pengamanan', $data);
        //$this->load->view('pengamanan/topbar_pengamanan', $data);
        //$this->load->view('pengamanan/list_pengamanan_polsek', $data);
        //$this->load->view('pengamanan/footer_pengamanan');
        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('pengamanan/list_pengamanan_polsek', $data);
        $this->load->view('footer');
    }
	function pengamanan_detail(){
		$id=base64_decode($this->input->post('id'));
        $data["pengamanan"] = $this->Pengamanan_m->get_pengamanan_byid($id);
        $this->load->view('pengamanan/detail_pengamanan', $data);
	}
    function pengamanan_detail_polsek(){
        $id=base64_decode($this->input->post('id'));
        $data["pengamanan"] = $this->Pengamanan_m->get_pengamanan_byid($id);
        $this->load->view('pengamanan/detail_pengamanan_polsek', $data);
    }
	function pengamanan_detail_pta(){
		$id_e_pengamanan=base64_decode($this->input->post('id'));
        $data["fullname"] =base64_decode($this->session->userdata('fullname'));
        $data["pengamanan"] = $this->Pengamanan_m->get_pengamanan_byid($id_e_pengamanan);
        $status= $this->Pengamanan_m->get_pengamanan_byid($id_e_pengamanan)[0]->status;
        $data["status"]= $this->Pengamanan_m->get_pengamanan_byid($id_e_pengamanan)[0]->status;
        if($status==1){
        	echo "edit";
        	$where="id_e_pengamanan=$id_e_pengamanan";
 			$update=array('status' =>2);
     		$this->Pengamanan_m->update_data($where, "e_pengamanan", $update);
     		$data["status"]=2;
        }
        $this->load->view('pengamanan/pta_detail_pengamanan', $data);
	}
	function pengamanan_delete(){
		$id=base64_decode($this->input->post('id'));
		$where="id=$id";
 		$this->Pengamanan_m->delete_data($where, 'data_permohonan_pengamanan'); 
	}
	function pengamanan_add(){
        $infolog= infoLogin();
        $pengadilan_id=     $infolog['pengadilan_id'];
        $user_id=base64_decode($this->session->userdata('id_user'));
        $data["user_id"] =base64_decode($this->session->userdata('id_user'));
        //$data["pa_id"] =;
        $data["pa_pemohon"] =base64_decode($this->session->userdata('fullname'));
        $data["pa_pemohon_id"] =$pengadilan_id;
        $data["email"] =base64_decode($this->session->userdata('email'));
        $data["jenis_pengamanan"] = $this->Pengamanan_m->get_jenis_pengamanan();
        $data["instansi_pengamanan"] = $this->Pengamanan_m->get_instansi_pengamanan($pengadilan_id);
        //echo "$pengadilan_id";exit;
        $data["nomor"] = $this->Pengamanan_m->get_nomor_perkara($pengadilan_id);
        $this->load->view('pengamanan/add_pengamanan', $data);
	}
	function pengamanan_update(){
		$id_e_pengamanan=base64_decode($this->input->post('id_e_pengamanan'));
        $feedback=base64_decode($this->input->post('feedback'));
        $status=base64_decode($this->input->post('status'));
		$update=array(
						'status' =>$status,
						'feedback' =>$feedback,
						'diedit_oleh' =>base64_decode($this->session->userdata('fullname')),
						'diedit_tanggal' =>date("Y-m-d H:i:s")
					);
		$where="id_e_pengamanan=".$id_e_pengamanan;
     	$this->Pengamanan_m->update_data($where, "e_pengamanan", $update);
	}
	function pengamanan_save(){
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
            'jenis_pengamanan_id' => base64_decode($this->input->post('jenis_pengamanan_id')),
            'jenis_pengamanan' => base64_decode($this->input->post('jenis_pengamanan')),
            'tanggal_pelaksanaan' => base64_decode($this->input->post('tanggal_pelaksanaan')),
            'keterangan' => base64_decode($this->input->post('keterangan'))
		);
		$this->Pengamanan_m->save_pengamanan($data);
        echo "Simpan Pengamanan Berhasil, Silahkan Edit Permohonan dan Upload E-Doc Permohonan serta Kirim Pemberitahuan ke Polres terkait";
        //kirim email
        	//belum_dibuat
        //kirim email
	}
    function upload_edoc(){
        $id=$this->input->post('id');
        $config['upload_path']          = 'uploads/pengamanan/';
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
                            'edoc' =>"uploads/pengamanan/".$nama_file
                            );

            $where="id=".$id;
           $this->Pengamanan_m->update_data($where, "data_permohonan_pengamanan", $update);
        }
    }
    function upload_edoc_jawaban(){
        $id=$this->input->post('id');
        $config['upload_path']          = 'uploads/pengamanan/';
        $config['allowed_types']        = 'pdf';
        $nama_file        = 'jwb_'.str_replace(" ","_",rand(10,99)."_".time().'_'.$_FILES["file"]['name']);
        $config['file_name']=$nama_file;
        $this->load->helper('url', 'form'); 

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file')){
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
               // $this->load->view('upload_form', $error);
        }else{
            $data = array('upload_data' => $this->upload->data());
            $update=array('edoc_jawaban' =>"uploads/pengamanan/".$nama_file);

            $where="id=".$id;
           $this->Pengamanan_m->update_data($where, "data_permohonan_pengamanan", $update);
        }
    }
    function pengamanan_edit_isi(){
        $id=$this->input->post('id');
        $DATA=$this->input->post('DATA');
        $field=$this->input->post('field');
         $update=array($field=>$DATA);
        $where="id=".$id;
        $this->Pengamanan_m->update_data($where, "data_permohonan_pengamanan", $update);
        echo "<p class='text-success'>Edit Data Berhasil</p>";
    }
    function pengamanan_kirim(){
        $id=$this->input->post('id');
        $data_permohonan_pengamanan=$this->Pengamanan_m->get_pengamanan_byid($id);
        if(count($data_permohonan_pengamanan)) {
            foreach($data_permohonan_pengamanan AS $data){
                $email_penerima=$data->email_satker;
                $wa_satker=$data->wa_satker;
                $edoc=base_url($data->edoc);
                $isi="<p>Yth. Kepala ".$data->nama_mitra."<br>di Tempat </p>";
                $isi.="<p>Dengan hormat, berikut ini Permohonan Pengamanan yang dimohonkan oleh ".ucwords(strtolower($data->pa_pemohon))."</p>
                ";
                $isi.="<table cellpadding=5>";
                $isi.="<tr><td>Nomor Surat</td><td>".$data->nomor_permohonan."</td></tr>
                ";
                $isi.="<tr><td>Tanggal Surat</td><td>".tanggale($data->tanggal_permohonan)."</td></tr>
                ";
                $isi.="<tr><td>Jenis Pengamanan</td><td>".$data->jenis_pengamanan."</td></tr>
                ";
                $isi.="<tr><td>Tanggal Pelaksanaan</td><td>".tanggale($data->tanggal_pelaksanaan)."</td></tr>
                ";
                $isi.="<tr><td>Keterangan</td><td>".$data->keterangan."</td></tr>
                ";
                $isi.="<tr><td>E-Doc Permohonan</td>
                <td><a style='text-decoration:none' href='". $edoc."' target='_blank' >
                <b>Unduh E-Doc Permohonan</b></a></td></tr>";
                $isi.="</table>";
                $isi.="<p>Demikian atas bantuan dan kerjasamanya diucapkan terima kasih</p>
                ";
                $isi.="<br><p>Email ini dikirim otomatis, mohon untuk tidak membalas email ini</p>
                ";
                //proses kirim email
                    $ci = get_instance();
                    $ci->load->library('Mailer');
                    $sendmail = array(
                      'email_penerima'=>$email_penerima,
                      'subjek'=>'Permohonan Pengamanan ',
                      'content'=>$isi
                      //'attachment'=>$attachment
                    );
                    $send = $ci->mailer->send($sendmail);
                //proses kirim email
                //proses kirim wa
                    $url_kirim="https://sindoro.pta-semarang.go.id/rimsan/?acckey=Y0urk3y4cc3525y573M";
                    $data_kirim["nohp"]=$wa_satker;
                    $data_kirim["isipsn"]=strip_tags($isi);
                    $this->post($url_kirim,$data_kirim);
                //proses kirim wa
                $update=array('status'=>1);
                $where="id=".$id;
                $this->Pengamanan_m->update_data($where, "data_permohonan_pengamanan", $update);
                echo "Pengiriman Selesai";
            }
        }
        //echo "$isi";
        //exit;
    }
    function pengamanan_kirim_jawaban(){
        $id=$this->input->post('id');
        $data_permohonan_pengamanan=$this->Pengamanan_m->get_pengamanan_byid_pa($id);
        //var_dump($data_permohonan_pengamanan);exit;
        if(count($data_permohonan_pengamanan)) {
            foreach($data_permohonan_pengamanan AS $data){
                $email_penerima=$data->email_pa;
                $wa_satker=$data->wa_pa;
                $edoc=base_url($data->edoc);
                $edoc_jawaban=base_url($data->edoc_jawaban);
                $isi="<p>Yth. Ketua ".ucwords(strtolower($data->pa_pemohon))."<br>di Tempat </p>";
                $isi.="<p>Dengan hormat, berikut ini jawaban atas Permohonan Pengamanan yang dimohonkan kepada ".ucwords(strtolower($data->nama_mitra))."</p>
                ";
                $isi.="<table cellpadding=5>";
                $isi.="<tr><td>Nomor Surat</td><td>".$data->nomor_permohonan."</td></tr>
                ";
                $isi.="<tr><td>Tanggal Surat</td><td>".tanggale($data->tanggal_permohonan)."</td></tr>
                ";
                $isi.="<tr><td>Jenis Pengamanan</td><td>".$data->jenis_pengamanan."</td></tr>
                ";
                $isi.="<tr><td>Tanggal Pelaksanaan</td><td>".tanggale($data->tanggal_pelaksanaan)."</td></tr>
                ";
                $isi.="<tr><td>Keterangan</td><td>".$data->keterangan."</td></tr>
                ";
                $isi.="<tr><td>E-Doc Permohonan</td>
                <td><a style='text-decoration:none' href='". $edoc."' target='_blank' >
                <b>Unduh E-Doc Permohonan</b></a></td></tr>";
                $isi.="<tr><td>E-Doc Jawaban</td>
                <td><a style='text-decoration:none' href='". $edoc_jawaban."' target='_blank' >
                <b>Unduh E-Doc Jawaban</b></a></td></tr>";
                $isi.="<tr><td>Catatan</td>
                <td>".$data->catatan."</td></tr>";
                $isi.="</table>";
                $isi.="<p>Demikian atas bantuan dan kerjasamanya diucapkan terima kasih</p>
                ";
                $isi.="<br><p>Email ini dikirim otomatis, mohon untuk tidak membalas email ini</p>
                ";
                //proses kirim email
                    $ci = get_instance();
                    $ci->load->library('Mailer');
                    $sendmail = array(
                      'email_penerima'=>$email_penerima,
                      'subjek'=>'Jawaban Permohonan Pengamanan ',
                      'content'=>$isi
                      //'attachment'=>$attachment
                    );
                    $send = $ci->mailer->send($sendmail);
                //proses kirim email
                //proses kirim wa
                    $url_kirim="https://sindoro.pta-semarang.go.id/rimsan/?acckey=Y0urk3y4cc3525y573M";
                    $data_kirim["nohp"]=$wa_satker;
                    $data_kirim["isipsn"]=strip_tags($isi);
                    $this->post($url_kirim,$data_kirim);
                //proses kirim wa
                $update=array('status'=>4);
                $where="id=".$id;
                $this->Pengamanan_m->update_data($where, "data_permohonan_pengamanan", $update);
                echo "$email_pa Pengiriman Jawaban Selesai";
            }
        }
        //echo "$isi";
        //exit;
    }
    function get_mitra_id($user_id){
        $mitra_id="";
        $data_mitra = $this->Pengamanan_m->get_mitra_id($user_id);
        foreach ($data_mitra as $m) : 
            $mitra_id=$m->mitra_id;
        endforeach; 
        return $mitra_id;
    }
    function post($url, $data){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
			// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','User-Agent: e-payment','Authorization:test'));
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response  = curl_exec($ch);
		$retry = 0;
		$_err = curl_errno($ch);
		$_errmsg = curl_error($ch);
		while(($_err != NULL || $_err > 0 || $response === false) && $retry < 3){
			$response = curl_exec($ch);
			$_err = curl_errno($ch);
			$_errmsg = curl_error($ch);
			$retry++;
		}
		if($_err != NULL || $_err > 0 || $response === false || $_err > 0){
			$response = array(
				'status' 	=> 'error',
				'message' 	=> $_errmsg
			);
		}
		curl_close($ch);
		return $response;
	}

    /* PNS POLRES BY MAS21 */

    public function pns_polres(){
    $infolog= infoLogin();
    $namafull= $infolog['fullname'];
    $pa_id= $infolog['pengadilan_id'];
    $mitra_id = $infolog['mitra_id'];
        //print_r ($mitra_id);
    $data['title']          = $namafull;
    $data['titlemenu']      = '';
    $whereconditon = $mitra_id;
    $data['pns']= $this->Pns_m->get_pns_mitraid($whereconditon);
        //print_r ($infolog);
        //exit();
    $this->load->view('header', $data);
    $this->load->view('topbar', $data);
    $this->load->view('pns/pns_polres', $data);
    $this->load->view('footer');
    }

    function pns_detail(){
        $id=base64_decode($this->input->post('id'));
        $data["pns"] = $this->Pns_m->get_pns_byid($id);
        $this->load->view('pns/detail_pns_polres', $data);
    }

    public function proses_pns_polres($id)
    {   
    $data['status_lapor']='1';
    $where = array('id' => $id );
    $res = $this->Pns_m->proses_pns_polres($where,'perkara_pendaftaran_pns',$data);
            //print_r($where);
            //exit();
    redirect('dashboard');

    }

    function pns_edit_isi(){
        $id=$this->input->post('id');
        $isi=$this->input->post('isi');
        $field=$this->input->post('field');
        $update=array($field=>$isi);
        $where="id=".$id;
        $this->Pns_m->update_data($where, "perkara_pendaftaran_pns", $update);
        echo "<p class='text-success'>Edit Data Berhasil</p>";
    }

    public function polres_putusan(){
    $infolog= infoLogin();
    $namafull= $infolog['fullname'];
    $pa_id=(int)base64_decode($this->session->userdata('pengadilan_id'));
    $mitra_id=(int)base64_decode($this->session->userdata('mitra_id'));

    $data['title']          = $namafull;
    $data['titlemenu']      = '';
    $whereconditon = $mitra_id;
    $data['pns']= $this->Pns_m->get_pns_putusan($whereconditon);
        // print_r($data['pns']);
        // exit();
        // foreach ($data['pns']->result_array() as $key) {
        //      echo $key['nama_pa'].'<br>';
        //     }
        //     exit();

        //print_r ($data['pns']);
        //exit();
    $this->load->view('header', $data);
    $this->load->view('topbar', $data);
    $this->load->view('pns/pns_polres_putusan', $data);
    $this->load->view('footer');
    }

    /* END PNS POLRES BY MAS21 */
		
}

