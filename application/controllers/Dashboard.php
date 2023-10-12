<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->load->model('Dashboard_model');
      $this->load->model('Api_m');
      $this->load->model('Pns_m');


      $this->basic->squrity();
       // $this->load->model('Basic');
  }

	// public function index(){
 //        $group=(int)base64_decode($this->session->userdata('group'));
 //        //echo $group;exit;
 //        if($group==0 OR $group==2){
 //            $this->dashboard_pta();
 //        }else{
 //            $this->dashboard_pa();
 //        }
 //    }

  public function index(){

   $infolog= infoLogin();
   $group_id= $infolog['group_id'];
   $instansi_id= 	$infolog['instansi_id'];
   $pengadilan_id= 	$infolog['pengadilan_id'];
   $id_user = $infolog['userid'];
   $menu = array (
    'menu' => 'Dashboard',
    'submenu' => '',
    );
    _unsetsesiMenu();	_setsesiMenu($menu);

    if($instansi_id==3  OR $id_user == 1523){
        redirect('pengamanan');
    }
    if($instansi_id==3  OR $id_user == 1524){
        redirect('pns');
    }
    if($instansi_id==5){
        redirect('bpn');
    }
    if($instansi_id==4){
        redirect('kpknl');
    }
    if($instansi_id==11 OR $instansi_id==8){
        redirect('data_perkara');
    }

    if($group_id==1 and $instansi_id==1){
        $this->dashboard_pta();   
    }elseif(($group_id==4 or $group_id ==3) and $instansi_id==6){
        $this->dashboard_dukcapil();
    }elseif($group_id==5 and $instansi_id==2){
                //$this->dashboard_kua();
        redirect('Kua');
    }elseif($group_id==4 and $instansi_id==2){
                //print_r(infoLogin());
                //close();
        $this->dashboard_kemenag();
    }elseif($group_id==3 and $instansi_id==2){
                //print_r(infoLogin());
                //close();
        $this->dashboard_kanwil_kemenag();
    }elseif($group_id==4 and $instansi_id==7){
        $this->dashboard_bkd();
    }else{
        $this->dashboard_pa();  
    }

}

public function dashboard_pta(){
    $data['title']          = 'Dashboard';
    $data['titlemenu']      = 'Admin';
    $data['count_satker']   = $this->getsatker();
    $data['count_perkara_eksekusi']   = $this->getperkara_eksekusi();
    $data['perkara_eksekusi_selesai']   = $this->Dashboard_model->get_perkara_eksekusi_where("status_eksekusi_text='Selesai' OR status_eksekusi_text='Pencabutan Permohonan Eksekusi'");
    $data['count_perkara_eksekusi_ht']   = $this->getperkara_eksekusi_ht();
    $data['perkara_eksekusi_ht_selesai']   = $this->Dashboard_model->get_perkara_eksekusi_ht_where("status_eksekusi_text='Selesai'  OR status_eksekusi_text='Pencabutan Permohonan Eksekusi'");
    $data['count_user']   = $this->getuser();

    $data['singkron_all']   = "singkron_all()";
    $data['singkron_eksekusi']   = "singkron_eksekusi()";
    $data['singkron_eksekusi_ht']   = "singkron_eksekusi_ht()";
    $data['singkron_pihak']   = "singkron_pihak()";

    $dtchart = $this->getchart();
    $yr = '';
    $val = '';
    foreach ($dtchart as $dt){
        if($yr == ''){
            $yr = '"'.$dt['yr'].'"';
            $val = $dt['jml'];
        }else{
            $yr .= ',"'.$dt['yr'].'"';
            $val .= ','.$dt['jml'];
        }
    }
    $data['tahun'] = $yr;
    $data['val'] = $val;

    $this->load->view('header', $data);
    $this->load->view('topbar', $data);
    $this->load->view('dashboard/dashboard', $data);
    $this->load->view('footer');
}
public function dashboard_pa(){

  $infolog= infoLogin();
  $group_id= $infolog['group_id'];
  $instansi_id= 	$infolog['instansi_id'];
  $pengadilan_id= 	$infolog['pengadilan_id'];
  $mitra_id= 	$infolog['mitra_id'];
  $user_id= $infolog['userid'];
  $pa_id=$pengadilan_id;
        //print_r(infoLogin());


        //echo $pa_id;
  $data['title']          = 'Dashboard';
  $data['titlemenu']      = 'Admin';
  $data['count_satker']   = $this->getsatker();
  $data['count_perkara_eksekusi']   = $this->Dashboard_model->get_perkara_eksekusi_where("pa_id=$pa_id");
  $data['perkara_eksekusi_selesai']   = $this->Dashboard_model->get_perkara_eksekusi_where("(status_eksekusi_text='Selesai' OR status_eksekusi_text='Pencabutan Permohonan Eksekusi') AND pa_id=$pa_id");
  $data['perkara_eksekusi_dalam_proses']   = $this->Dashboard_model->get_perkara_eksekusi_where("(status_eksekusi_text<> 'Selesai' OR status_eksekusi_text <>'Pencabutan Permohonan Eksekusi' OR status_eksekusi_text <>'Menggantung') AND pa_id=$pa_id");
  $data['count_perkara_eksekusi_ht']   = $this->Dashboard_model->get_perkara_eksekusi_ht_where("pa_id=$pa_id");
  $data['perkara_eksekusi_ht_selesai']   = $this->Dashboard_model->get_perkara_eksekusi_ht_where("(status_eksekusi_text='Selesai' OR status_eksekusi_text='Pencabutan Permohonan Eksekusi') AND pa_id=$pa_id");
  $data['perkara_eksekusi_ht_dalam_proses']   = $this->Dashboard_model->get_perkara_eksekusi_ht_where("(status_eksekusi_text<> 'Selesai' OR status_eksekusi_text <>'Pencabutan Permohonan Eksekusi' OR status_eksekusi_text <>'Menggantung') AND pa_id=$pa_id");

  $data['singkron_all']   = "singkron_all()";
  $data['singkron_eksekusi']   = "singkron_eksekusi()";
  $data['singkron_eksekusi_ht']   = "singkron_eksekusi_ht()";
  $data['singkron_pihak']   = "singkron_pihak()";
  $data['count_user']   = $this->getuser();
  $dtchart = $this->getchart();
  $yr = '';
  $val = '';
  foreach ($dtchart as $dt){
    if($yr == ''){
        $yr = '"'.$dt['yr'].'"';
        $val = $dt['jml'];
    }else{
        $yr .= ',"'.$dt['yr'].'"';
        $val .= ','.$dt['jml'];
    }
}
$data['tahun'] = $yr;
$data['val'] = $val;

$this->load->view('header', $data);
$this->load->view('topbar', $data);
$this->load->view('dashboard/dashboard', $data);
$this->load->view('footer');
}


/*-----------------Edited By Mas21------------------------*/    
public function dashboard_dukcapil(){

    $pa_id=(int)base64_decode($this->session->userdata('pa_id'));
    $mitra_id=(int)base64_decode($this->session->userdata('mitra_id'));
        //echo $pa_id;

         // $data['title']          = 'Dashboard';
         // $data['titlemenu']      = 'Admin';

         // $data['capil']= $this->Api_m->get_capil();
    $data['capil']= $this->Api_m->get_capil_ditangani($mitra_id);


    $this->load->view('header', $data);
    $this->load->view('topbar', $data);
    $this->load->view('dashboard/dash_dukcapil_ditangani2', $data);
       // $this->load->view('dashboard/dash_dukcapil', $data);
    $this->load->view('footer');
}

public function dashboard_dukcapil_cari(){
    $this->load->view('header', $data);
    $this->load->view('topbar', $data);
    $this->load->view('dashboard/dash_dukcapil_cari', $data);
    $this->load->view('footer');
}

public function dashboard_dukcapil_hasil(){


    $cari=$this->input->post('cari');


    $infolog= infoLogin();  
    $fullname= $infolog['fullname'];
    $data['titlemenu']      = $fullname;
    $user_id= $infolog['userid'];

    $data['capil']= $this->Api_m->get_capil_pihak($cari);

    $data['cari']=$cari;

    $datastring=implode(",",$data);
    insertLog('Disdukcapil/cari',$user_id,$datastring);

    $this->load->view('header', $data);
    $this->load->view('topbar', $data);
    $this->load->view('dashboard/dash_dukcapil_hasil', $data);
    $this->load->view('footer');
}

public function load_capil()
{   

    $q = $this->Api_m->capil_total();
    $no = $_POST['start'];
    $d = array();
    foreach($q->result_array() as $h){
        $aksi = '';
        $row = array();
        $jum=strlen($h['id']);
        $no++;
        $tanggal_putusan=tgl_indo($h['tanggal_putusan']);
        $tanggal_akta_cerai=tgl_indo($h['tanggal_akta_cerai']);
        $row[] = $no;
        $row[] = $h['nama'].'<br>'.$h['nik'];
        $row[] = $h['alamat'];
        $row[] = $h['nomor_perkara'].'<br>'.$tanggal_putusan;
        $row[] = $h['nomor_akta_cerai'].'<br>'.$tanggal_akta_cerai;
        if ($h['jenis_pihak']==1){
            $jenis_pihak='Penggugat/Pemohon';
        }elseif ($row['jenis_pihak']==2){
            $jenis_pihak='Tergugat/Termohon';
        }
        $row[] = $h['jenis_perkara_text'].'<br>'.$jenis_pihak;
                //$row[] = '';

                // $url=base_url('Akta_cerai/update/'.$h['id']);
                // $url2=base_url('Akta_cerai/hapus/'.$h['id']);
        $url1=$h['id'];
        $url2=$h['jenis_pihak'];
        $aksi = '<a href="#" data-toggle="modal" data-target="#Modal'.$url.'"><button class="btn btn-primary">Update</button></a>';
        $aksi2 = '<button class="btn btn-primary" onclick=update("'.$url1.'","'.$url2.'")>Update</button>';  
                // $aksi = '<a href="'.$url.'" ><i class="fa fa-pencil">Ubah</i></a><a href="'.$url2.'" onClick="return confirmDialog()"><i class="fa fa-trash">Hapus</i></a>';    

        $row[] = $aksi2;
                // $row[] = $h['file'];;
        $d[] = $row;
    }
    $f = $this->Api_m->capil_countfiltered();
    $g = $this->Api_m->capil_countall();
    $output= array( "draw" => $_POST['draw'], 
        "recordsTotal" => $f['total'],
        "recordsFiltered" => $g['total'],
        "data" => $d);
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    echo json_encode($output);

}


public function load_form_tanggal()
{   

    $id=$this->input->post('id');
    $jenis_pihak=$this->input->post('jenis_pihak');
    $data['jenis_pihak']=$jenis_pihak;
    $data['id']=$id;
        //print_r($data);
    $this->load->view('dashboard/popup_form_tgl', $data);
}

public function simpan_tanggal()
{   

    $mitra_id=(int)base64_decode($this->session->userdata('mitra_id'));
    $id=$this->input->post('id');
    $jenis_pihak=$this->input->post('jenis_pihak');
    $aksi=$this->input->post('aksi').'_pihak'.$jenis_pihak;
    $tanggal=$this->input->post('tanggal');
    $capil='capil_pihak'.$jenis_pihak;

    $update_data=array(
       $aksi =>$tanggal
       ,$capil =>$mitra_id
   );
      // print_r($_POST);
      // exit();

    $where="id=".$id;
    $this->Dashboard_model->update_data($where, "perkara_akta_cerai", $update_data);

    $this->session->set_flashdata('message', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4>Berhasil!</h4>');

         //if($this->input->post('aksi')=='tanggal_permohonan'){

    redirect('Dashboard/dashboard_dukcapil');
        // }else{

        // redirect('Dashboard/capil_ditangani');
        // }
}

public function capil_ditangani(){

    $pa_id=(int)base64_decode($this->session->userdata('pengadilan_id'));
    $mitra_id=(int)base64_decode($this->session->userdata('mitra_id'));
        //echo $pa_id;

    $data['title']          = 'Dashboard';
    $data['titlemenu']      = 'Admin';

    $data['capil']= $this->Api_m->get_capil_ditangani($mitra_id);


    $this->load->view('header', $data);
    $this->load->view('topbar', $data);
    $this->load->view('dashboard/dash_dukcapil_ditangani', $data);
    $this->load->view('footer');
}

public function feedback_capil(){

        //echo $pa_id;

    $data['title']          = 'Feedback';
    $data['titlemenu']      = 'Disdukcapil';

    $infolog= infoLogin();
    $group_id= $infolog['group_id'];
    if($group_id==1){

        $data['capil']= $this->Api_m->get_feedback_capil2();
    }else{

        $pa_id=(int)base64_decode($this->session->userdata('pengadilan_id'));
        $data['capil']= $this->Api_m->get_feedback_capil($pa_id);
    }


    $this->load->view('header', $data);
    $this->load->view('topbar', $data);
    $this->load->view('dashboard/dash_feedback_capil', $data);
    $this->load->view('footer');
}

public function feedback_bkd(){
    $pa_id=(int)base64_decode($this->session->userdata('pengadilan_id'));
    $mitra_id=(int)base64_decode($this->session->userdata('mitra_id'));
        //print_r ($mitra_id);
    $data['title']          = 'Dashboard';
    $data['titlemenu']      = 'BKD';
    $whereconditon = $pa_id;
    $data['pns']= $this->Api_m->get_feedback_pns($whereconditon);
        //print_r ($data['pns']);
        //exit();
    $this->load->view('header', $data);
    $this->load->view('topbar', $data);
    $this->load->view('dashboard/dash_feedback_bkd', $data);
    $this->load->view('footer');
}

/* EDITED BY MAS21*/
public function dashboard_bkd(){
    $infolog= infoLogin();
    $namafull= $infolog['fullname'];
    $pa_id= $infolog['pengadilan_id'];
    $mitra_id = $infolog['mitra_id'];
        //print_r ($mitra_id);
    $data['title']          = $namafull;
    $data['titlemenu']      = '';
    $whereconditon = $mitra_id;
    $data['pns']= $this->Pns_m->get_pns_mitraid($whereconditon);
    //$data['pns']= $this->Dashboard_model->get_pns($whereconditon);
        //print_r ($infolog);
        //exit();
    $this->load->view('header', $data);
    $this->load->view('topbar', $data);
    $this->load->view('dashboard/dash_bkd', $data);
    $this->load->view('footer');
}

function pns_detail(){
    $id=base64_decode($this->input->post('id'));
    $data["pns"] = $this->Pns_m->get_pns_byid($id);
    $this->load->view('pns/detail_pns_bkpsdm', $data);
}

public function proses_pns($id)
{   
    $data['status_lapor']='1';
    $where = array('id' => $id );
    $res = $this->Dashboard_model->proses_pns($where,'perkara_pendaftaran_pns',$data);
            //print_r($where);
            //exit();
    redirect('dashboard');

}

public function bkd_putusan(){
    $infolog= infoLogin();
    $namafull= $infolog['fullname'];
    $pa_id= $infolog['pengadilan_id'];
    $mitra_id = $infolog['mitra_id'];

    $data['title']          = $namafull;
    $data['titlemenu']      = '';
    $whereconditon = $mitra_id;
    //$data['pns']= $this->Dashboard_model->get_pns_putusan($whereconditon);
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
    $this->load->view('pns/pns_putusan', $data);
    $this->load->view('footer');
}

/* END Edited By Mas21 */

    //  public function dashboard_kua(){
    //     $pa_id=(int)base64_decode($this->session->userdata('pengadilan_id'));
    //     $mitra_id=(int)base64_decode($this->session->userdata('mitra_id'));
    //     //print_r(infoLogin());
    //     //print_r($pa_id);

    //     $infolog= infoLogin();
    //     $fullname= $infolog['fullname'];
    //    if(!empty($_POST['tahun'])){
    //         $tahun=$_POST['tahun'];
    //    }else{
    //         $tahun=date('Y');
    //    }

    //    // echo $tahun;
    //    // exit();
    //     $data['title']          = 'Dashboard';
    //     $data['titlemenu']      = $fullname;

    //     //$data['kua']=$this->Api_m->get_kua($mitra_id,$pa_id);
    //     $data['kua']=$this->Api_m->get_rekap_kua($tahun,$mitra_id,$pa_id);

    //         // print_r($data['kua']);
    //         // exit();
    //         // foreach ($data['kua']->result_array() as $key) {
    //         //  echo $key['nama_pa'].'<br>';
    //         // }
    //         // exit();
    //     $data['tahun']=$tahun;

    //     $this->load->view('header', $data);
    //     $this->load->view('topbar', $data);
    //     //$this->load->view('kua/dash_kua_new', $data);
    //     $this->load->view('kua/dash_kua_rekap', $data);
    //     $this->load->view('footer');
    // }

public function dashboard_kemenag(){

    $infolog= infoLogin();
    $group_id= $infolog['group_id'];
    $instansi_id=   $infolog['instansi_id'];
    $pengadilan_id=     $infolog['pengadilan_id'];
    $mitra_id=  $infolog['mitra_id'];
    $user_id= $infolog['userid'];
        // print_r($infolog);
        // exit();

    $data['title']          = 'Dashboard';
    $data['titlemenu']      = 'Kemenag';

    $data['pengadilan_id']      = $pengadilan_id;
    $data['mitra_id']      = $mitra_id;
          //  $data['kua']=$this->Api_m->get_kemenag($mitra_id);


    $data['kua']=$this->Api_m->get_data_where(array('group_id'=>$group_id+1,'instansi_id'=>$instansi_id, 'pengadilan_id'=>$pengadilan_id),'master_mitra');
            // print_r($data['kua']);
            // exit();

    $infolog= infoLogin();
    $user_id= $infolog['userid'];
    $datastring=implode(",",$data);
    insertLog('Kemenag_kanwil/dashboard',$user_id,$datastring);


    $this->load->view('header', $data);
    $this->load->view('topbar', $data);
    $this->load->view('dashboard/dash_kemenag', $data);
    $this->load->view('footer');
}

public function dashboard_kemenag_kanwil(){



    $pengadilan_id = $this->uri->segment(3);

    $data['pengadilan_id']      = $pengadilan_id;

    $data['kua']=$this->Api_m->get_data_where(array('group_id'=>5,'instansi_id'=>2, 'pengadilan_id'=>$pengadilan_id),'master_mitra');


    $infolog= infoLogin();
    $user_id= $infolog['userid'];
    $datastring=implode(",",$data);
    insertLog('Kemenag_kabkota/detail',$user_id,$datastring);


    $this->load->view('header', $data);
    $this->load->view('topbar', $data);
    $this->load->view('dashboard/dash_kemenag', $data);
    $this->load->view('footer');
}


public function dashboard_kanwil_kemenag(){

    $infolog= infoLogin();
    $group_id= $infolog['group_id'];
    $instansi_id=   $infolog['instansi_id'];
    $pengadilan_id=     $infolog['pengadilan_id'];
    $mitra_id=  $infolog['mitra_id'];
    $user_id= $infolog['userid'];
        // print_r($infolog);
        // exit();

    $data['title']          = 'Dashboard';
    $data['titlemenu']      = 'Kemenag';

    $data['pengadilan_id']      = $pengadilan_id;
    $data['mitra_id']      = $mitra_id;
          //  $data['kua']=$this->Api_m->get_kemenag($mitra_id);


    $data['kemenag']=$this->Api_m->get_data_where(array('group_id'=>$group_id+1,'instansi_id'=>$instansi_id),'master_mitra');

         //   print_r($data['kemenag']);
            //exit();


    $infolog= infoLogin();
    $user_id= $infolog['userid'];
    $datastring=implode(",",$data);
    insertLog('Kemenag_kanwil/dashboard',$user_id,$datastring);


    $this->load->view('header', $data);
    $this->load->view('topbar', $data);
    $this->load->view('dashboard/dash_kemenag_kanwil', $data);
    $this->load->view('footer');
}


    //-----------------------------------

function getsatker(){
    $intcount = $this->Dashboard_model->get_satker();
    return $intcount->row()->jml;
}

function getperkara_eksekusi(){
    $intperkara_eksekusi = $this->Dashboard_model->get_perkara_eksekusi();
    return $intperkara_eksekusi->row()->jml;
}
function getperkara_eksekusi_ht(){
    $intperkara_eksekusi = $this->Dashboard_model->get_perkara_eksekusi_ht();
    return $intperkara_eksekusi->row()->jml;
}

function getuser(){
    $intcount_user = $this->Dashboard_model->get_user();
    return $intcount_user->row()->jml;
}

function getchart(){
    $data = $this->Dashboard_model->get_chart();
    return $data->result_array();
}

    // public function status()
    //     {

    //         $query=$this->db->query('select * from perkara_akta_cerai order by nik_pihak1 ASC');
    //         $perkara_id=0;
    //         foreach ($query->result_array() as $row) {
    //             if($row['perkara_id']==$perkara_id){
    //                 $this->db->query('UPDATE perkara_akta_cerai SET status=1 where perkara_id="'.$row['perkara_id'].'"');
    //             }
    //             $perkara_id=$row['perkara_id'];
    //         }
    //     }


    //     function bismillah(){
    //     try{
    //         //$list_satker = $this->basic->get_data('pengadilan_agama');

    //         $list_satker=$this->db->query('SELECT * FROM perkara_akta_cerai a JOIN pengadilan_agama b ON a.kd_satker=b.id
    //                                         WHERE a.keterangan11 is null and tanggal is null and status=1 ORDER BY a.id ASC ');

    //         foreach($list_satker->result_array() as $h){
    //             $query = "SELECT d.*, c.pihak_ke, b.`perkara_id` as ids FROM v_perkara a
    //                         JOIN perkara_akta_cerai b ON a.`perkara_id`=b.`perkara_id`
    //                         JOIN v_pihak_perkara c ON a.`perkara_id`=c.`perkara_id`
    //                         JOIN v_pihak d ON c.`pihak_id`=d.`id`
    //                         LEFT JOIN perkara_ikrar_talak e ON a.`perkara_id`=e.`perkara_id`
    //                         WHERE b.perkara_id='".$h['perkara_id']."'
    //                         AND c.`pihak_ke`=1
    //             ";
    //             // print($h['perkara_id']);
    //             // exit();
    //             $query = base64_encode($query);
    //             if(!empty($h['ip_satker'])){
    //                 $post = array("req" => $query);
    //                 $url = $h['ip_satker'].'/api_monitoring/get_data_api2';

    //                 $q = $this->post_kirim($url,$post);                     
    //                 //$sql = "DELETE FROM mediasi WHERE DATE(tanggal_penilaian) = '".date('Y-m-d')."' AND pengadilan_agama_id = '".$h['id']."'";
    //                 //$del=$this->db->query($sql);
    //                 if($q['error']){
    //                         // $total = ($q['nilai_putus']+$q['nilai_minutasi']+$q['nilai_upload_putusan'])/3;
    //                     $update = array(
    //                         'keterangan' => 'Gagal Menghubungi Server'
    //                     );


    //                     //$update['status_lapor']='1';

    //                     $where = array('perkara_id' => $q['perkara_id'], 
    //                                     'kd_satker' => $h['kd_satker'] );
    //                    //// print_r($update);
    //                     //print_r($where);
    //                     $this->basic->update_data($where,'perkara_akta_cerai',$update); 
    //                 }
    //                     // print_r($q);die;
    //                 else{
    //                     $update = array(
    //                         'nama_pihak1' => $q['nama'],
    //                     'nik_pihak1' => $q['nomor_indentitas'],
    //                     'alamat_pihak1' => $q['alamat'],
    //                     'pekerjaan_pihak1' => $q['pekerjaan'],
    //                     'tempatlahir_pihak1' => $q['tempat_lahir'],
    //                     'tanggallahir_pihak1' => $q['tanggal_lahir'],
    //                     'difabel_pihak1' => $q['difabel'],
    //                         'keterangan11' => 'Sukses'
    //                     );

    //                     $where = array('perkara_id' => $q['ids'], 
    //                                     'kd_satker' => $h['kd_satker'] );
    //                    // print_r($update);
    //                     //print_r($where);
    //                     $this->basic->update_data($where,'perkara_akta_cerai',$update); 

    //                 }
    //             }
    //         }
    //         return true;
    //     }
    //     catch (Exception $e){
    //         return false;
    //         log_message('error', $e);
    //     }
    // }

    // function bismillah2(){
    //     try{
    //         //$list_satker = $this->basic->get_data('pengadilan_agama');

    //         $list_satker=$this->db->query('SELECT * FROM perkara_akta_cerai a JOIN pengadilan_agama b ON a.kd_satker=b.id
    //                                         WHERE a.keterangan22 is null and tanggal is null and status=1 ORDER BY a.id ASC ');

    //             // print_r($list_satker);die;
    //         foreach($list_satker->result_array() as $h){
    //             $query = "SELECT d.*, c.pihak_ke, b.`perkara_id` as ids FROM v_perkara a
    //                         JOIN perkara_akta_cerai b ON a.`perkara_id`=b.`perkara_id`
    //                         JOIN v_pihak_perkara c ON a.`perkara_id`=c.`perkara_id`
    //                         JOIN v_pihak d ON c.`pihak_id`=d.`id`
    //                         LEFT JOIN perkara_ikrar_talak e ON a.`perkara_id`=e.`perkara_id`
    //                         WHERE b.perkara_id='".$h['perkara_id']."'
    //                         AND c.`pihak_ke`=2
    //             ";
    //             $query = base64_encode($query);
    //             if(!empty($h['ip_satker'])){
    //                 $post = array("req" => $query);
    //                 $url = $h['ip_satker'].'/api_monitoring/get_data_api2';
    //                 $q = $this->post_kirim($url,$post);                     
    //                 //$sql = "DELETE FROM mediasi WHERE DATE(tanggal_penilaian) = '".date('Y-m-d')."' AND pengadilan_agama_id = '".$h['id']."'";
    //                 //$del=$this->db->query($sql);
    //                 if($q['error']){
    //                         // $total = ($q['nilai_putus']+$q['nilai_minutasi']+$q['nilai_upload_putusan'])/3;
    //                     $update = array(
    //                         'keterangan2' => 'Gagal Menghubungi Server'
    //                     );


    //                     //$update['status_lapor']='1';

    //                     $where = array('perkara_id' => $q['perkara_id'], 
    //                                     'kd_satker' => $h['kd_satker'] );
    //                     //print_r($update);
    //                     //print_r($where);
    //                     $this->basic->update_data($where,'perkara_akta_cerai',$update); 
    //                 }
    //                     // print_r($q);die;
    //                 else{
    //                     $update = array(
    //                         'nama_pihak2' => $q['nama'],
    //                     'nik_pihak2' => $q['nomor_indentitas'],
    //                     'alamat_pihak2' => $q['alamat'],
    //                     'pekerjaan_pihak2' => $q['pekerjaan'],
    //                     'tempatlahir_pihak2' => $q['tempat_lahir'],
    //                     'tanggallahir_pihak2' => $q['tanggal_lahir'],
    //                     'difabel_pihak2' => $q['difabel'],
    //                         'keterangan22' => 'Sukses'
    //                     );

    //                     $where = array('perkara_id' => $q['ids'], 
    //                                     'kd_satker' => $h['kd_satker'] );
    //                     //print_r($update);
    //                     //print_r($where);
    //                     $this->basic->update_data($where,'perkara_akta_cerai',$update); 

    //                 }
    //             }
    //         }
    //         return true;
    //     }
    //     catch (Exception $e){
    //         return false;
    //         log_message('error', $e);
    //     }
    // }

function post_kirim($url, $data){
    $return = array('error'=>true,'text'=>'Gagal Menghubungi Server');
    $ch = curl_init($url);
    curl_setopt( $ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_POSTFIELDS,$data);
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
            // curl_setopt($ch, CURLOPT_HTTPHEADER, array('User-Agent: landipa.online','Authorization:db27d2927979db2a44116a02c680949c062b7d78'));
    curl_setopt( $ch, CURLOPT_HEADER, 0);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false);
    if($value = json_decode(curl_exec($ch)))
    {
        $value->error = false;
                // $value['error'] = false;
        return (array) $value;
    }
    else{
        return $return;
    }
}

function cek_wa(){
    $respon= _sendwa('085702222023', 'coba');

    $aaa= json_decode($respon,true);
    echo $aaa['status'];

}
}