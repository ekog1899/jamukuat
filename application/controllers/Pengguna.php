<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengguna extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Dokumen_m');
        $this->load->library('form_validation');
        $this->basic->squrity();
        $this->basic->hanya_admin();
    }

    function index(){ 
redirect(site_url('users'));	
    	$group=(int)base64_decode($this->session->userdata('group'));
    	$pa_id=(int)base64_decode($this->session->userdata('pa_id'));
        //$data['users_data'] = $this->Users_m->get_all();
        $data['title'] = 'Data Pengguna';
        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('pengguna/pengguna', $data);
        $this->load->view('footer');
        //print_r($this->session->userdata);
        //print_r($pa_id);
    }
    function injek(){
        $q=$this->db->query("SELECT * FROM pengadilan_agama");
        $data=array();
        foreach ($q->result_array() as $d){
           $SQL="INSERT INTO users (pengadilan_id,fullname,username,password,`group`) values (".$d["id"].",'".$d["nama"]."','".$d["kode"]."','".base64_encode($d["kode"])."',1)";
           $y=$this->db->query($SQL);
       }
   }

   function injek_mitra(){
    $q=$this->db->query("SELECT * FROM master_mitra WHERE instansi_id=1");
    $data=array();
    foreach ($q->result_array() as $d){
       $SQL="INSERT INTO users (mitra_id,fullname,username,password,`group`) values (".$d["mitra_id"].",'".$d["nama_satker"]."','".$d["kode_satker"]."','".base64_encode($d["kode_satker"])."',3)";
       $y=$this->db->query($SQL);
   }
}
function injek_kpknl(){
    $q=$this->db->query("SELECT * FROM master_mitra WHERE instansi_id=2");
    $data=array();
    foreach ($q->result_array() as $d){
       $SQL="INSERT INTO users (mitra_id,fullname,username,password,`group`) values (".$d["mitra_id"].",'".$d["nama_satker"]."','".str_replace(" ","-",strtolower($d["nama_satker"]))."','".base64_encode(str_replace(" ","-",strtolower($d["nama_satker"])))."',4)";
       $y=$this->db->query($SQL);
   }
}

function pengguna_list(){
    $data["pengguna"]= $this->Dokumen_m->get_all_data("users");
    $this->load->view('pengguna/pengguna_list', $data); 
}
function pengguna_list2(){
 $group=(int)base64_decode($this->session->userdata('group'));
 $pa_id=(int)base64_decode($this->session->userdata('pa_id'));
 // echo $pa_id;
 // exit();
 if ($group==0){
  // $data["pengguna"]= $this->Dokumen_m->get_all_data("users");
  //-------------------anang
   $data["pengguna2"]= $this->Dokumen_m->get_data_where5();
  //-------------------anang
}else {
			//$whereconditon='pengadilan_id='.$pa_id;
   $whereconditon=$pa_id;
        	//$data["pengguna"]= $this->Dokumen_m->get_data_where3($whereconditon);
   $data["pengguna2"]= $this->Dokumen_m->get_data_where4($whereconditon);
        	// foreach ($data["pengguna2"]->result_array() as $key) {
        	// 	echo $key['username'];
        	// }
}
		//exit();

$this->load->view('pengguna/pengguna_list', $data); 
}
function hapus_pengguna(){
    $id=base64_decode($this->input->post('id'));
    $whereconditon='userid='.$id;
    $data=$this->Dokumen_m->delete_data($whereconditon, "users");
}
function edit_pengguna(){
    $id=base64_decode($this->input->post('id'));
    $whereconditon='userid='.$id;
    $pa_id=(int)base64_decode($this->session->userdata('pa_id'));
    $pengguna=$this->Dokumen_m->get_data_where($whereconditon, "users");
    $data["userid"]=$pengguna[0]->userid;
    $data["pengadilan_id"]=$pengguna[0]->pengadilan_id;
    $data["fullname"]=$pengguna[0]->fullname;
    $data["mitra_id"]=$pengguna[0]->mitra_id;
    $data["username"]=$pengguna[0]->username;
    $data["password"]=base64_decode($pengguna[0]->password);
    $data["group"]=$pengguna[0]->group;
    $data["email"]=$pengguna[0]->email;
    $data["group"]=$pengguna[0]->group;
    $data["mitra"]=$this->Dokumen_m->get_all_data("master_mitra");
    $whereconditon2='pengadilan_id='.$pa_id;
    $data["mitra2"]=$this->Dokumen_m->get_data_where($whereconditon2, "master_mitra");

    $this->load->view('pengguna/pengguna_edit', $data); 
}
function tambah_pengguna(){
    $group=(int)base64_decode($this->session->userdata('group'));
    $pa_id=(int)base64_decode($this->session->userdata('pa_id'));
    $this->load->helper('string_helper');
    $data["mitra"]=$this->Dokumen_m->get_all_data("master_mitra");
    if($group==0){

    $data["pa_id"]=NULL;
    $whereconditon='pengadilan_id is NULL';
    $data["mitra2"]=$this->Dokumen_m->get_data_where($whereconditon, "master_mitra");
    }else{

    $data["pa_id"]=(int)base64_decode($this->session->userdata('pa_id'));
    $whereconditon='pengadilan_id='.$pa_id;
    $data["mitra2"]=$this->Dokumen_m->get_data_where($whereconditon, "master_mitra");

    }
		//$data["instansi"]=$this->Dokumen_m->get_all_data("master_group");
    $this->load->view('pengguna/pengguna_tambah', $data); 
}
function simpan_pengguna(){

    $userid=$this->input->post('id');
    $aksi=$this->input->post('aksi');
        /*if($mitra_id==""){
        	$mitra_id=NULL;
        }*/
        $pengadilan_id=$this->input->post('pa_id');
        $username=$this->input->post('username');
        //$where='username='.$username;
        $jml_username=$this->Dokumen_m->get_data_where2(array('username'=>$username),'users');
        //$jml_username=$this->Dokumen_m->get_data_where2($where, "users");
        $tot_user=$jml_username->num_rows();
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        //echo $tot_user;
    	//exit();


        if($aksi=='edit'){
           $insert=array(
               'username' =>$username
               ,'password' =>base64_encode($password)
               ,'email' =>$email
               ,"diedit_oleh"=>base64_decode($this->session->userdata('username'))
               ,"diedit_tanggal"=>date("Y-m-d h:i:s",time()),
           );
			//var_dump($insert);
           $where="userid=".$userid;
           $this->Dokumen_m->update_data($where, "users", $insert);
       }else{
           if($tot_user==1){
               $this->session->set_flashdata('msg','Username sudah ada, silahkan bikin yang lain.');
               redirect('Pengguna');
           }

           $mitra_id=$this->input->post('mitra_id');
           $whereconditon='mitra_id='.$mitra_id;
           $nama=$this->Dokumen_m->get_data_where2($whereconditon, "master_mitra")->row_array();
           $fullname=$nama['nama_satker'];
            $group=$nama['instansi_id']; 
           $insert=array(
               'fullname' =>$fullname
               ,'username' =>$username
               ,'password' =>base64_encode($password)
               ,'mitra_id' =>$mitra_id
               ,'pengadilan_id' =>$pengadilan_id
               ,'email' =>$email
               ,'group' =>$group
               ,"diinput_oleh"=>base64_decode($this->session->userdata('username'))
               ,"diinput_tanggal"=>date("Y-m-d h:i:s",time()),
           );
			//var_dump($insert);
           $this->Dokumen_m->insert_data("users",$insert);
       }
       redirect('pengguna');
   }


   function kua_list($userid){
		
           $whereconditon='userid='.$userid;
           $nama=$this->Dokumen_m->get_data_where2($whereconditon, "users")->row_array();
           $kua_id=$nama['mitra_id'];
    $pa_id=base64_decode($this->session->userdata('pa_id'));
    //$kua_id=base64_decode($kua_id);

    $data["key"]=$this->Dokumen_m->get_data_key_kua($kua_id);
    $data["kua_id"]=$kua_id;
        // print_r($data["key"]);
        // exit();
    $this->load->view('header', $data);
    $this->load->view('topbar', $data);
    $this->load->view('pengguna/kua_list', $data); 
    $this->load->view('footer');
}

function tambah_kua(){

    $data['kua_id']=$this->input->post('kua_id');
    $this->load->view('pengguna/tambah_kua', $data); 
}

function simpan_kua_key(){
    $no_array = 0;
    $inserted = 0;
    foreach($_POST['key'] as $k)
    {
        $key               = $_POST['key'][$no_array];
        $mitra_id           = $_POST['kua_id'][$no_array];
		

        $insert=array(
           'key' =>$key
           ,'mitra_id' =>$mitra_id
       );
        $insert = $this->Dokumen_m->insert_data("master_mitra_kua",$insert);
        if($insert){
            $inserted++;
        }
        $no_array++;
    }

    if($inserted > 0)
    {
        echo json_encode(array(
            'status' => 1,
            'pesan' => "<i class='fa fa-check' style='color:green;'></i> Data barang berhasil dismpan."
        ));
    }
    else
    {
        $this->query_error("Oops, terjadi kesalahan, coba lagi !");
    }
}

public function hapus_key_kua()
{
    $id = $this->uri->segment(3);
    $mitra_id = $this->uri->segment(4);
    $whereconditon='id='.$id;
    $data=$this->Dokumen_m->delete_data($whereconditon, "master_mitra_kua");

    redirect('Pengguna/kua_list/'.base64_encode($mitra_id));
}


}

