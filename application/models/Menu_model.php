<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends CI_Model{
	
	 public $table = 'menu_pta';
    public $id = 'id';
    public $order = 'DESC';
	
    function __construct(){
        parent::__construct();
    }




function get_menunew($group_id,$instansi_id){
	//var_dump($instansi_id);
        $this->db->select('*');
        $this->db->from('menu_pta');
        $this->db->where('parent_id', 0);
        $this->db->where('is_active', 1);
        
      //  $this->db->like ('instansi_id',"'".$instansi_id."'");
	  if($group_id !=1){
		  $this->db->where("FIND_IN_SET(".$instansi_id.", instansi_id)");
		  $this->db->where("FIND_IN_SET(".$group_id.", group_id)");
		  
		 
		//  $this->db->like ('instansi_id',"'".$instansi_id."'");
		// $this->db->like ('group_id',"'".$group_id."'");
	  }
		//echo $group_id == 1 ? '' :$this->db->where_in('instansi_id', $instansi_id) ; 
     $this->db->order_by('urutan',ASC);
        $categories = $this->db->get()->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->sub = $this->get_sub_menunew($p_cat->id);
            $i++;
        }
		
        return $categories;
    }
function get_sub_menunew($id){
		$group_id=(int)base64_decode($this->session->userdata('group_id'));
        $instansi_id=(int)base64_decode($this->session->userdata('instansi_id'));
        $this->db->select('*');
        $this->db->from('menu_pta');
        $this->db->where('parent_id', $id);
        $this->db->where('is_active', 1);
		
       
		  if($group_id !=1){
		$this->db->where("FIND_IN_SET(".$instansi_id.", instansi_id)");
		  $this->db->where("FIND_IN_SET(".$group_id.", group_id)");
	  }
	  $this->db->order_by('urutan',ASC);
        $categories = $this->db->get()->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->sub = $this->get_sub_menunew($p_cat->id);
            $i++;
        }
        return $categories;
    }

 function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('parent_id', $q);
	$this->db->or_like('title', $q);
	$this->db->or_like('url', $q);
	$this->db->or_like('view', $q);
	$this->db->or_like('is_active', $q);
	$this->db->or_like('icon', $q);
	$this->db->or_like('group_id', $q);
	$this->db->or_like('instansi_id', $q);
	$this->db->or_like('urutan', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('parent_id', $q);
	$this->db->or_like('title', $q);
	$this->db->or_like('url', $q);
	$this->db->or_like('view', $q);
	$this->db->or_like('is_active', $q);
	$this->db->or_like('icon', $q);
	$this->db->or_like('group_id', $q);
	$this->db->or_like('instansi_id', $q);
	$this->db->or_like('urutan', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }


















}