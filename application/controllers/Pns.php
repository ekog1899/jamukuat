<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pns extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Pns_m');
        $this->load->library('form_validation');
        $this->load->library('encrypt');
        $this->basic->squrity();
    }
    function index(){        
        $menu = array (
            'menu' => 'PNS',
            'submenu' => '',
            );
        
        _unsetsesiMenu();
        _setsesiMenu($menu);
        $infolog= infoLogin();
        $group_id= $infolog['group_id'];
        $instansi_id=   $infolog['instansi_id'];
        $id_user = $infolog['userid'];
        
        if($group_id==1 OR $group_id==2){
            $this->pta();
        }else
        if($group_id ==3 and $id_user==1524){
            $this->polda();
        }else{
            $this->satker();
        }
    }
    function pta(){
        //redirect('Dashboard');
        $infolog= infoLogin();
        $pengadilan_id=     $infolog['pengadilan_id'];
        $username=     $infolog['username'];
        $data['kd_satker'] = $pengadilan_id;
        $data['username'] = $username;
        $data['title'] = 'DATA PNS';
        $data['titlemenu'] = $infolog['fullname'];
        $data["pns"] = $this->Pns_m->get_pns_all();
        //print_r($infolog);
        //exit();
        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('pns/list_pns', $data);
        $this->load->view('footer');
    }
    function polda(){
        $infolog= infoLogin();
        $pengadilan_id=     $infolog['pengadilan_id'];
        $username=     $infolog['username'];
        $data['kd_satker'] = $pengadilan_id;
        $data['username'] = $username;
        $data['title'] = 'DATA PNS';
        $data['titlemenu'] = $infolog['fullname'];
        $data["pns"] = $this->Pns_m->get_pns_polda();
        //print_r($infolog);
        //exit();
        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('pns/list_pns', $data);
        $this->load->view('footer');
    }
    function satker(){
        $infolog= infoLogin();
        //var_dump($infolog);exit;
        $pengadilan_id=     $infolog['pengadilan_id'];
        $username=     $infolog['username'];
        $data['kd_satker'] = $pengadilan_id;
        $data['username'] = $username;
        $data['title'] = 'DATA PNS';
        $data['titlemenu'] = $infolog['fullname'];
        $data["pns"] = $this->Pns_m->get_pns_satker($pengadilan_id);
        //print_r($data["pns"]);
        //exit();
        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('pns/list_pns', $data);
        $this->load->view('footer');
    }
    function pns_detail(){
        $id=base64_decode($this->input->post('id'));
        $data["pns"] = $this->Pns_m->get_pns_byid($id);
        $this->load->view('pns/detail_pns', $data);
    }
    function pns_edit(){
        $id=base64_decode($this->input->post('id'));
        $infolog = infoLogin();
        $pa_id = $infolog['pengadilan_id'];
        $data["pns"] = $this->Pns_m->get_pns_byid($id);
        $data["mitra"] = $this->Pns_m->get_master_unit_kerja($pa_id);
        $this->load->view('pns/edit_pns', $data);
    }
    function pns_detail_pta(){
        $id=base64_decode($this->input->post('id'));
        $data["pns"] = $this->Pns_m->get_pns_byid($id);
        $this->load->view('pns/pta_detail_pns', $data);
    }
    function pns_delete(){
        $id=base64_decode($this->input->post('id'));
        $where="id=$id";
        $this->Pns_m->delete_data($where, 'perkara_pendaftaran_pns'); 
    }
    function pns_add(){
        $infolog= infoLogin();
        $username=     $infolog['username'];
        $pengadilan_id=     $infolog['pengadilan_id'];
        $data['pa_id'] = $pengadilan_id;
        $data['username'] = $username;
        $data["statuse"] = $this->Pns_m->get_master_status();
        $this->load->view('pns/add_pns', $data);
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
    function pns_save(){
        $pa_id=base64_decode($this->input->post('pa_id')) ;
        $instansi=base64_decode($this->input->post('instansi')) ;
        $tanggal_pns=base64_decode($this->input->post('tanggal_pns')) ;
        $nomor_pns=base64_decode($this->input->post('nomor_pns')) ;
        $isi_pns=base64_decode($this->input->post('isi_pns')) ;
        $status_pns_id=base64_decode($this->input->post('status_pns_id')) ;
        $data = array(
            'pa_id' =>  $pa_id,
            'instansi' =>  $instansi,
            'tanggal_pns' =>  $tanggal_pns,
            'nomor_pns' =>  $nomor_pns,
            'isi_pns' =>  $isi_pns,
            'status_pns_id' =>  $status_pns_id,
            'diinput_tanggal' =>  date("Y-m-d H:i:s")
        );
        $this->Pns_m->save_pns($data);
        //kirim email
            //belum_dibuat
        //kirim email
    }

    function upload_edoc(){
        $id=$this->input->post('id_pns');
        $path2='uploads/pns/';
        if (!is_dir($path2)) {
               mkdir('./' . $path2, 0777, TRUE);
             }
        $config['upload_path']          = 'uploads/pns/';
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
                            'softcopy_izin' =>"uploads/pns/".$nama_file
                            );

            $where="id=".$id;


        $infolog= infoLogin();
        $user_id= $infolog['userid'];
        $datastring=implode(",",$data);
        insertLog('BKDPOLRES/Upload_data',$user_id,$datastring);

           $this->Pns_m->update_data($where, "perkara_pendaftaran_pns", $update);
        }
    }
        
}

