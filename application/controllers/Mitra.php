<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mitra extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mitra_model');
        $this->load->model('Dokumen_m');
        $this->load->library('form_validation');
        valMenu();
    }

    public function index()
    {

        $infolog= infoLogin();
		$group_id= $infolog['group_id'];
		$instansi_id= 	$infolog['instansi_id'];
		$pengadilan_id= 	$infolog['pengadilan_id'];
		$mitra_id= 	$infolog['mitra_id'];
		$user_id= $infolog['userid'];
		//print_r(infoLogin());
        $menu = array (
            'menu' => 'Pengguna',
            'submenu' => 'Manajemen Mitra',
            );
            _unsetsesiMenu();	_setsesiMenu($menu);


        $valGroup= valGroup($group_id,$instansi_id,$pengadilan_id,$mitra_id);
        $q = urldecode($this->input->get('q', TRUE));
        $pengadilan = urldecode($this->input->get('pengadilan', TRUE));
        $group = urldecode($this->input->get('group', TRUE));
        $instansi = urldecode($this->input->get('instansi', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '' or $pengadilan <>'' or $group <>'' or $instansi <> ''   ) {
            $config['base_url'] = base_url() . 'Mitra/index?pengadilan=' . urlencode($pengadilan).'&group=' . urlencode($group).'&instansi=' . urlencode($instansi).'&q=' . urlencode($q);
            $config['first_url'] = base_url() . 'Mitra/index?pengadilan=' . urlencode($pengadilan).'&group=' . urlencode($group).'&instansi=' . urlencode($instansi).'&q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'Mitra/';
            $config['first_url'] = base_url() . 'Mitra/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mitra_model->total_rows($q,$pengadilan,$group,$instansi,$group_id,$instansi_id,$pengadilan_id,$mitra_id);
        $master_mitra = $this->Mitra_model->get_limit_data($config['per_page'], $start, $q,$pengadilan,$group,$instansi,$group_id,$instansi_id,$pengadilan_id,$mitra_id);
        $totalmitra = $this->Mitra_model->gettotalwhere($pengadilan_id,$group_id,$instansi_id,$mitra_id,'1');
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pengadilan' => $pengadilan,
            'group' => $group,
            'instansi' => $instansi,
            'valGroup' => $valGroup,
            'master_mitra_data' => $master_mitra,
            'q' => $q,
            'pengadilan' => $pengadilan,
            'group' => $group,
            'instansi' => $instansi,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'totalmitra' => $totalmitra,
            'instansi_id' => $instansi_id,
            'group_id' => $group_id,
			'title'=> 'Manajemen Mitra',
        );

        $this->load->view('header', $data);
        $this->load->view('topbar', $data);
        $this->load->view('mitra/mitra_list', $data);
        $this->load->view('footer');
		
	
        
    }

    
    public function create() 
    {


	
		$infolog= infoLogin();
		$group_id= $infolog['group_id'];

		
		$instansi_id= 	$infolog['instansi_id'];
		$pengadilan_id= 	$infolog['pengadilan_id'];
		$mitra_id= 	$infolog['mitra_id'];
		if ($group_id > 4 and $instansi_id > 1) {
			toast('error','&nbsp; Anda tidak memiliki hak akses !');
			redirect(site_url('users'));
			

		}
			$valGroup= valGroup($group_id,$instansi_id,$pengadilan_id,$mitra_id);
		

        $data = array(
            'button' => 'Create',
            'action' => site_url('mitra/create_action'),

            'valGroup' => $valGroup,
            
	    'mitra_id' => set_value('mitra_id'),
	    'instansi_id' => set_value('instansi_id'),
	    'group_id' => set_value('group_id'),
	    'pengadilan_id' => set_value('pengadilan_id'),
	    'kode_satker' => set_value('kode_satker'),
	    'nama_satker' => set_value('nama_satker'),
	    'alamat_satker' => set_value('alamat_satker'),
	    'kota_kabupaten_satker' => set_value('kota_kabupaten_satker'),
	    'wilayah_kerja' => set_value('wilayah_kerja'),
	    'email_satker' => set_value('email_satker'),
	    'telepon_satker' => set_value('telepon_satker'),
	    'fax_satker' => set_value('fax_satker'),
	    'wa_satker' => set_value('wa_satker'),
	    'aktif' => set_value('aktif'),
	);

    $this->load->view('header', $data);
    $this->load->view('topbar', $data);
    $this->load->view('mitra/mitra_form', $data);
    $this->load->view('footer');

       
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
			toast('error','&nbsp; Pastikan diisi sesuai ketentuanA!');
            $this->create();
        } else {
            $data = array(
		'instansi_id' => $this->input->post('instansi_id',TRUE),
		'group_id' => $this->input->post('group_id',TRUE),
		'pengadilan_id' => $this->input->post('pengadilan_id',TRUE),
		'kode_satker' => $this->input->post('kode_satker',TRUE),
		'nama_satker' => $this->input->post('nama_satker',TRUE),
		'alamat_satker' => $this->input->post('alamat_satker',TRUE),
		'kota_kabupaten_satker' => $this->input->post('kota_kabupaten_satker',TRUE),
		'wilayah_kerja' => $this->input->post('wilayah_kerja',TRUE),
		'email_satker' => $this->input->post('email_satker',TRUE),
		'telepon_satker' => $this->input->post('telepon_satker',TRUE),
		'fax_satker' => $this->input->post('fax_satker',TRUE),
		'wa_satker' => $this->input->post('wa_satker',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->Mitra_model->insert($data);
          //  $this->session->set_flashdata('message', 'Create Record Success');
            toast('success','&nbsp; Create Record Success !');
			$infolog= infoLogin();
			$user_id= $infolog['userid'];
			$datastring=implode(",",$data);
			insertLog('Mitra/tambah',$user_id,$datastring);
            redirect(site_url('Mitra'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mitra_model->get_by_id($id);
        $infolog= infoLogin();
		$group_id= $infolog['group_id'];
		$instansi_id= 	$infolog['instansi_id'];
		$pengadilan_id= 	$infolog['pengadilan_id'];
		$mitra_id= 	$infolog['mitra_id'];
		
		if($group_id > ($row->group_id) ){
			
			redirect(site_url('mitra'));
		}
		$valGroup= valGroup($group_id,$instansi_id,$pengadilan_id,$mitra_id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mitra/update_action'),
                'valGroup' => $valGroup,
                'groupsesi'=>$group_id,
		'mitra_id' => set_value('mitra_id', encrypt_url($row->mitra_id)),
		'instansi_id' => set_value('instansi_id', $row->instansi_id),
		'group_id' => set_value('group_id', $row->group_id),
		'pengadilan_id' => set_value('pengadilan_id', $row->pengadilan_id),
		'kode_satker' => set_value('kode_satker', $row->kode_satker),
		'nama_satker' => set_value('nama_satker', $row->nama_satker),
		'alamat_satker' => set_value('alamat_satker', $row->alamat_satker),
		'kota_kabupaten_satker' => set_value('kota_kabupaten_satker', $row->kota_kabupaten_satker),
		'wilayah_kerja' => set_value('wilayah_kerja', $row->wilayah_kerja),
		'email_satker' => set_value('email_satker', $row->email_satker),
		'telepon_satker' => set_value('telepon_satker', $row->telepon_satker),
		'fax_satker' => set_value('fax_satker', $row->fax_satker),
		'wa_satker' => set_value('wa_satker', $row->wa_satker),
		
	    );
            
            $this->load->view('header', $data);
            $this->load->view('topbar', $data);
            $this->load->view('mitra/mitra_form', $data);
            $this->load->view('footer');
        } else {
           // $this->session->set_flashdata('message', 'Record Not Found');
             toast('error','&nbsp; Record Not Found !');
            redirect(site_url('Mitra'));
        }
    }
    
    public function update_action() 
    {

        $infolog= infoLogin();
		$user_id= $infolog['userid'];
		$group_id= $infolog['group_id'];
		
		if($group_id > ($this->input->post('group_id',TRUE)) ){
			toast('error','&nbsp; Pastikan diisi sesuai ketentuanA!');
			redirect(site_url('Mitra'));
		}
		
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            toast('error','&nbsp; Periksa Kembali !');
            $this->update($this->input->post('mitra_id', TRUE));
        } else {
            $data = array(
		'instansi_id' => $this->input->post('instansi_id',TRUE),
		'group_id' => $this->input->post('group_id',TRUE),
		'pengadilan_id' => $this->input->post('pengadilan_id',TRUE),
		'kode_satker' => $this->input->post('kode_satker',TRUE),
		'nama_satker' => $this->input->post('nama_satker',TRUE),
		'alamat_satker' => $this->input->post('alamat_satker',TRUE),
		'kota_kabupaten_satker' => $this->input->post('kota_kabupaten_satker',TRUE),
		'wilayah_kerja' => $this->input->post('wilayah_kerja',TRUE),
		'email_satker' => $this->input->post('email_satker',TRUE),
		'telepon_satker' => $this->input->post('telepon_satker',TRUE),
		'fax_satker' => $this->input->post('fax_satker',TRUE),
		'wa_satker' => $this->input->post('wa_satker',TRUE),
		
	    );

            $this->Mitra_model->update($this->input->post('mitra_id', TRUE), $data);
           
            toast('success','&nbsp; update Berhasil!');
			$infolog= infoLogin();
			$user_id= $infolog['userid'];
			$datastring=implode(",",$data);
			insertLog('Mitra/update',$user_id,$datastring);
            redirect(site_url('mitra'));
        }
    }
    
    public function aktif($mitra_id){
		
		$req = $this->uri->segment(4);
		$infolog= infoLogin();
		$group_id= $infolog['group_id'];
        $instansi_id= 	$infolog['instansi_id'];
		if ( ($instansi_id ==1 or $group_id==1) and $req=='block' ){
			
			//log
			$infolog= infoLogin();
			$user_id= $infolog['userid'];
			insertLog('Mitra/block',$user_id, decrypt_url($mitra_id));
			//log
			
			$this->Mitra_model->update($mitra_id, ['aktif' => 0]);
            toast('success','&nbsp; Berhasil dinonaktifkan !');
			
			
			
			
			redirect(site_url('Mitra/index'));
		}
		
		elseif ( ($instansi_id ==1 or $group_id==1)  and $req =='aktif' ){
			
			$infolog= infoLogin();
			$user_id= $infolog['userid'];
			//log
			insertLog('Mitra/aktif',$user_id, decrypt_url($mitra_id));
			$this->Mitra_model->update($mitra_id, ['aktif' => 1]);
			//log
			
            toast('success','&nbsp; Berhasil diaktifkan !');
	
            redirect(site_url('Mitra/index'));
		}
		else {
			
			toast('error','&nbsp; Anda tidak memiliki hak akses !');         
		 //  toast('danger','Perhatian! ','Gagal ubah ! ');
		   
		redirect(site_url('Mitra/index'));

		}
	}

    public function _rules() 
    {


        $infolog= infoLogin();
		$group_id= $infolog['group_id'];
		$instansi_id= 	$infolog['instansi_id'];
		$pengadilan_id= 	$infolog['pengadilan_id'];
		//$mitra_id= 	$infolog['mitra_id'];
		
		$idmitra = $this->input->post('mitra_id');
			$row = $this->Mitra_model->get_by_id($idmitra);
		
			$cekemail=$row->email_satker;
            $inputemail = $this->input->post('email_satker');
            $ceknamasatker=$row->nama_satker;
            $inputnamasatker = $this->input->post('nama_satker');
	
    $this->form_validation->set_rules('instansi_id', ' ', 'trim|required');
	$this->form_validation->set_rules('group_id', ' ', 'trim|required');
	$this->form_validation->set_rules('pengadilan_id', ' ', 'trim|required');
	$this->form_validation->set_rules('kode_satker', ' ', 'trim|required');
	$this->form_validation->set_rules('alamat_satker', ' ', 'trim|required');
	$this->form_validation->set_rules('kota_kabupaten_satker', ' ', 'trim|required');
	$this->form_validation->set_rules('wilayah_kerja', ' ', 'trim|required');

    
	$this->form_validation->set_rules('telepon_satker', ' ', 'trim|numeric|required');
	$this->form_validation->set_rules('fax_satker', ' ', 'trim|numeric|required');
	$this->form_validation->set_rules('wa_satker', ' ', 'trim|numeric|required');
	

    uniq('master_mitra','email_satker',$inputemail,$cekemail,'required|trim|required|valid_email|xss_clean');
    uniq('master_mitra','nama_satker',$inputnamasatker,$ceknamasatker,'required|trim|required|xss_clean');

	$this->form_validation->set_rules('mitra_id', 'mitra_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

 	public function kua_list($id) 
    {
         
        $row = $this->Mitra_model->get_by_id2($id);
        $infolog= infoLogin();
		$group_id= $infolog['group_id'];
		$instansi_id= 	$infolog['instansi_id'];
		$pengadilan_id= 	$infolog['pengadilan_id'];
		$mitra_id= 	$infolog['mitra_id'];
		//print_r(infoLogin());
		$id = ($row->mitra_id);

		
		$data["key"]=$this->Dokumen_m->get_data_key_kua($id);
		$data["mitra_id"]=$id;
		$data["pa"]=$pengadilan_id;
		
            
            $this->load->view('header', $data);
            $this->load->view('topbar', $data);
            $this->load->view('mitra/kua_list', $data);
            $this->load->view('footer');

    }

    public function tambah_kua(){

    $data['mitra_id']=$this->input->post('mitra_id');
    $data['pa']=$this->input->post('pa');
    //$data['mitra_id']=$mitra_id;
    $this->load->view('mitra/tambah_kua', $data); 
	}


	public function simpan_kua_key(){
    $no_array = 0;
    $inserted = 0;
    //foreach($_POST['key'] as $k)

    {
        $key               = $_POST['key'][$no_array];
        $mitra_id          = $_POST['mitra_id'][$no_array];
        $pa         = $_POST['pa'][$no_array];
		

        $insert=array(
           'key' =>$key
           ,'mitra_id' =>$mitra_id
           ,'pengadilan_id' =>$pa

       );
        //print_r($mitra_id);
        //close();
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
    } else {
        $this->query_error("Oops, terjadi kesalahan, coba lagi !");
   		}

	}

	public function hapus_key_kua()
	{

    $id = $this->uri->segment(3);
    $mitra_id = $this->uri->segment(4);
    $whereconditon='id='.$id;
    $data=$this->Dokumen_m->delete_data($whereconditon, "master_mitra_kua");

    redirect('Mitra/kua_list/'.base64_encode($mitra_id));
    //redirect('Mitra/kua_list/'.encrypt_url($mitra_id));
	}
    

}

