<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
    public function __construct(){
		parent::__construct();
        $this->load->model('Menu_model');
		
	}

     public function index(){
		  valMenu();
		  
		  $menu = array (
		'menu' => 'Menu Management',
		'submenu' => '',
		);
		_unsetsesiMenu();	_setsesiMenu($menu);
		  
          $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'menu/l?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'menu/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'menu/';
            $config['first_url'] = base_url() . 'menu/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Menu_model->total_rows($q);
        $menuq = $this->Menu_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'menu_data' => $menuq,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
		 $this->load->view('header', $data);
        $this->load->view('topbar', $data);
          $this->load->view('menu/menu_list', $data);
        $this->load->view('footer');
		
		
    }

    public function fetch_menu($data){
		
		$sesimenu=$this->session->userdata('menu');
		$menu1 = "";
        foreach($data as $menu){
        	if($menu->url<>"#"){
				

        		$menu1 .= '<li class="nav-item '.($sesimenu == ($menu->title) ? 'active':'').' "><a class="nav-link collapsed"  href='.base_url().$menu->url.'  aria-expanded="false" aria-controls="collapseUtilities"><i class="'.$menu->icon.'"></i><span>'.$menu->title.'</span></a>';
        	}else{
            	$menu1 .= '<li class="nav-item '.($sesimenu == ($menu->title) ? 'active':'').' "><a class="nav-link collapsed 
				'.($sesimenu == ($menu->title) ? 'show':'').'
				
				" href='.$menu->url.' data-toggle="collapse" data-target="#menu_'.$menu->id.'" aria-expanded="false" aria-controls="collapseUtilities"><i class="'.$menu->icon.'"></i><span>'.$menu->title.'</span></a>';
        	}
            if(!empty($menu->sub)){
                $menu1 .= '<div id="menu_'.$menu->id.'" class="collapse '.($sesimenu == ($menu->title) ? 'show':'').'" data-parent="#accordionSidebar" style="">';
                $menu1 .= $this->fetch_sub_menu($menu->sub);
                $menu1 .= "</div>";
            }
            $menu1 .= '</li>';
        }
        return $menu1;
    }

    public function fetch_sub_menu($sub_menu){
		$sesisubmenu=$this->session->userdata('submenu');
		$sub = '<div class="bg-white py-2 collapse-inner rounded">';
		foreach($sub_menu as $submenu){
			$sub .= '<a class="collapse-item '
			.($submenu->title == $sesisubmenu  ? 'active':'').'" href="'.base_url().$submenu->url.'">'.$submenu->title.'</a>';	
			// if(!empty($menu->sub)){
			// 	$sub .= "<ul>";
			// 	$sub .= $this->fetch_sub_menu($menu->sub);
			// 	$sub .= "</ul>";
			// }		
			// $sub .= '</div>';
		}
        $sub .= '</div>';
		return $sub;
		//var_dump($submenu->title);
	}
 public function listmenu()
    {
		$group_id=(int)base64_decode($this->session->userdata('group_id'));
        $instansi_id=(int)base64_decode($this->session->userdata('instansi_id'));
        
        
		
		$menu_bkd = $this->Menu_model->get_menunew($group_id,$instansi_id);
		
        $data['menu'] = $this->fetch_menu($menu_bkd);
        $this->load->view('sidebar',$data);
		
		     
    
    }

    

    public function create() 
    {
		valMenu();
        $data = array(
            'button' => 'Create',
            'action' => site_url('menu/create_action'),
	    'id' => set_value('id'),
	    'parent_id' => set_value('parent_id'),
	    'title' => set_value('title'),
	    'url' => set_value('url'),
	    'view' => set_value('view'),
	    'is_active' => set_value('is_active'),
	    'icon' => set_value('icon'),
	    'group_id' => set_value('group_id[]'),
	    'instansi_id' => set_value('instansi_id'),
	    'urutan' => set_value('urutan'),
	);
	
	$this->load->view('header', $data);
        $this->load->view('topbar', $data);
       $this->load->view('menu/menu_form', $data);
        $this->load->view('footer');
      
    }
    
    public function create_action() 
    {
		
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
			toast('error','&nbsp; Periksa Kembali !');  
            $this->create();
        } else {
            $data = array(
		'parent_id' => $this->input->post('parent_id',TRUE),
		'title' => $this->input->post('title',TRUE),
		'url' => $this->input->post('url',TRUE),
		'view' => $this->input->post('view',TRUE),
		'is_active' => $this->input->post('is_active',TRUE),
		'icon' => $this->input->post('icon',TRUE),
		'group_id' =>   implode(",",$this->input->post('group_id',TRUE)),
		'instansi_id' => implode(",",$this->input->post('instansi_id',TRUE)),
		'urutan' => $this->input->post('urutan',TRUE),
	    );

            $this->Menu_model->insert($data);
           
			toast('success','&nbsp; Create Record Succes!');
            redirect(site_url('menu'));
        }
    }
    
    public function update($id) 
    {
		valMenu();
        $row = $this->Menu_model->get_by_id($id);
		$selected1= explode(',', $row->group_id);
		$selected2= explode(',', $row->instansi_id);
			
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('menu/update_action'),
		'id' => set_value('id', $row->id),
		'parent_id' => set_value('parent_id', $row->parent_id),
		'title' => set_value('title', $row->title),
		'url' => set_value('url', $row->url),
		'view' => set_value('view', $row->view),
		'is_active' => set_value('is_active', $row->is_active),
		'icon' => set_value('icon', $row->icon),
		'group_id' => set_value('group_id', $selected1),
		'instansi_id' => set_value('instansi_id', $selected2),
		'urutan' => set_value('urutan', $row->urutan),
	    );
           
			$this->load->view('header', $data);
        $this->load->view('topbar', $data);
      $this->load->view('menu/menu_form', $data);
        $this->load->view('footer');
		 
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
			toast('error','&nbsp; Periksa Kembali !'); 
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'parent_id' => $this->input->post('parent_id',TRUE),
		'title' => $this->input->post('title',TRUE),
		'url' => $this->input->post('url',TRUE),
		'view' => $this->input->post('view',TRUE),
		'is_active' => $this->input->post('is_active',TRUE),
		'icon' => $this->input->post('icon',TRUE),
		'group_id' =>   implode(",",$this->input->post('group_id',TRUE)),
		'instansi_id' => implode(",",$this->input->post('instansi_id',TRUE)),
		'urutan' => $this->input->post('urutan',TRUE),
	    );

            $this->Menu_model->update($this->input->post('id', TRUE), $data);
           toast('success','&nbsp; update Berhasil!');
            redirect(site_url('menu'));
        }
    }
    
    public function delete222($id) 
    {
        $row = $this->Menu_model->get_by_id($id);

        if ($row) {
            $this->Menu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('menu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function _rules() 
    {
	//$this->form_validation->set_rules('parent_id', 'parent id', 'trim|required');
	$this->form_validation->set_rules('title', 'title', 'trim|required');
	$this->form_validation->set_rules('url', 'url', 'trim|required');
	$this->form_validation->set_rules('view', 'view', 'trim|required');
	$this->form_validation->set_rules('is_active', 'is active', 'trim|required');
	$this->form_validation->set_rules('icon', 'icon', 'trim|required');
	$this->form_validation->set_rules('group_id[]', 'group id', 'trim|required');
	$this->form_validation->set_rules('instansi_id[]', 'instansi id', 'trim|required');
	$this->form_validation->set_rules('urutan', 'urutan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
	
	
	

}