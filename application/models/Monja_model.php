<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Monja_model extends CI_Model
{

    public $table = 'users';
    public $id = 'userid';
    public $order = 'ASC';

    function __construct()
    {
		 parent::__construct();
		
       
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
		$deID=decrypt_url($id);
        $this->db->where($this->id, $deID);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows$pengadilan,$group,$instansi,$group_id,$instansi_id,$pengadilan_id,$mitra_id
    function total_rows($q = NULL, $fpengadilan_id= NULL, $fgroup= NULL,$finstansi=null,$group_id,$instansi_id,$pengadilan_id,$mitra_id) {
	

	$this->db->select('userid,fullname,block, users.handphone, users.username,users.email, 
	pengadilan_agama.nama, master_kategori_instansi.nama_instansi, master_group.nama_group,master_mitra.nama_satker ');


		

	//tidak support php 7
	echo !empty($fpengadilan_id) ? $this->db->where('users.pengadilan_id', $fpengadilan_id) :''; 
	echo !empty($fgroup) ? $this->db->where('users.group_id', $fgroup) :''; 
	echo !empty($finstansi) ? $this->db->where('users.instansi_id', $finstansi) :''; 

	$this->db->group_start();
	$this->db->or_like('pengadilan_agama.nama', $q);
	$this->db->or_like('fullname', $q);
	$this->db->or_like('users.username', $q);
	$this->db->or_like('nip', $q);
	$this->db->or_like('email', $q);
	$this->db->group_end();

	$this->db->join('pengadilan_agama', 'pengadilan_agama.id = users.pengadilan_id', 'left');
	$this->db->join('master_mitra', 'master_mitra.mitra_id = users.mitra_id', 'left');
	$this->db->join('master_kategori_instansi', 'master_kategori_instansi.instansi_id = users.instansi_id', 'left');
	$this->db->join('master_group', 'master_group.group_id = users.group_id', 'left');

	
	
	
	if($group_id==1) {
		
	}
	elseif($group_id==2) {
		if(instansi_id==1){
		$this->db->where('users.group_id', $group_id);
		} 
		else{
			$this->db->where('users.group_id', $group_id);
			$this->db->where('users.instansi_id', $instansi_id);
			$this->db->where('users.pengadilan_id', $pengadilan_id);
			$this->db->where('users.mitra_id', $mitra_id);
		}
		
	}
	elseif($group_id==3){
		if($instansi_id == 1){
		$this->db->where('users.group_id >=', $group_id);
		$this->db->where('users.instansi_id >=', $instansi_id);
		}
		
	}
	elseif($group_id==4){
		if($instansi_id == 1){
		$this->db->where('users.group_id >=', $group_id);
		$this->db->where('users.instansi_id >=', $instansi_id);
		$this->db->where('users.pengadilan_id', $pengadilan_id);
	
		}
		else {
		$this->db->where('users.group_id >=', $group_id);
		$this->db->where('users.instansi_id =', $instansi_id);
		$this->db->where('users.pengadilan_id', $pengadilan_id);
		
		}
		
	}
	elseif($group_id==5){
	
		$this->db->where('users.group_id >=', $group_id);
		$this->db->where('users.instansi_id ', $instansi_id);
		$this->db->where('users.pengadilan_id', $pengadilan_id);
		$this->db->where('users.mitra_id', $mitra_id);
		
		
	}
	elseif($group_id==6){
		$this->db->where('users.group_id >=', $group_id);
		$this->db->where('users.instansi_id ', $instansi_id);
		$this->db->where('users.pengadilan_id', $pengadilan_id);
		$this->db->where('users.mitra_id', $mitra_id);
		
	}
	else{
		$this->db->where('users.group_id >=', $group_id);
		$this->db->where('users.instansi_id =', $instansi_id);
		$this->db->where('users.pengadilan_id', $pengadilan_id);
		
	}
	

	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL, $fpengadilan_id= NULL, $fgroup= NULL,$finstansi=null,$group_id,$instansi_id,$pengadilan_id,$mitra_id) {
        $this->db->order_by($this->id, $this->order);
		
	$this->db->order_by($this->id, $this->order);
	$this->db->select('userid,block, fullname, users.handphone, users.username,users.email, users.group_id as ggg,
	pengadilan_agama.nama, master_kategori_instansi.nama_instansi, master_group.nama_group,master_mitra.nama_satker,last_login ');

	echo !empty($fpengadilan_id) ? $this->db->where('users.pengadilan_id', $fpengadilan_id) :''; 
	echo !empty($fgroup) ? $this->db->where('users.group_id', $fgroup) :''; 
	echo !empty($finstansi) ? $this->db->where('users.instansi_id', $finstansi) :''; 

	$this->db->group_start();
	$this->db->or_like('pengadilan_agama.nama', $q);
	$this->db->or_like('fullname', $q);
	$this->db->or_like('users.username', $q);
	$this->db->or_like('nip', $q);
	$this->db->or_like('email', $q);
	$this->db->group_end();
	
	$this->db->join('pengadilan_agama', 'pengadilan_agama.id = users.pengadilan_id', 'left');
	$this->db->join('master_mitra', 'master_mitra.mitra_id = users.mitra_id', 'left');
	$this->db->join('master_kategori_instansi', 'master_kategori_instansi.instansi_id = users.instansi_id', 'left');
	$this->db->join('master_group', 'master_group.group_id = users.group_id', 'left');
	if($group_id==1) {
		
	}
	elseif($group_id==2) {
		if($instansi_id==1){
		$this->db->where('users.group_id', $group_id);
		} 
		else{
			$this->db->where('users.group_id', $group_id);
			$this->db->where('users.instansi_id', $instansi_id);
			$this->db->where('users.pengadilan_id', $pengadilan_id);
			$this->db->where('users.mitra_id', $mitra_id);
		}
		
	}
	elseif($group_id==3){
		if($instansi_id == 1){
		$this->db->where('users.group_id >=', $group_id);
		$this->db->where('users.instansi_id >=', $instansi_id);
		}
			elseif($instansi_id != 1){
		$this->db->where('users.group_id >=', $group_id);
		$this->db->where('users.instansi_id', $instansi_id);
		}
		
	}
	elseif($group_id==4){
		if($instansi_id == 1){
		$this->db->where('users.group_id >=', $group_id);
		$this->db->where('users.instansi_id >=', $instansi_id);
		$this->db->where('users.pengadilan_id', $pengadilan_id);
	
		}
		else {
		$this->db->where('users.group_id >=', $group_id);
		$this->db->where('users.instansi_id =', $instansi_id);
		$this->db->where('users.pengadilan_id', $pengadilan_id);
		
		}
		
	}
	elseif($group_id==5){
	
		$this->db->where('users.group_id >=', $group_id);
		$this->db->where('users.instansi_id ', $instansi_id);
		$this->db->where('users.pengadilan_id', $pengadilan_id);
		$this->db->where('users.mitra_id', $mitra_id);
		
		
	}
	elseif($group_id==6){
		$this->db->where('users.group_id >=', $group_id);
		$this->db->where('users.instansi_id ', $instansi_id);
		$this->db->where('users.pengadilan_id', $pengadilan_id);
		$this->db->where('users.mitra_id', $mitra_id);
		
	}
	else{
		$this->db->where('users.group_id >=', $group_id);
		$this->db->where('users.instansi_id =', $instansi_id);
		$this->db->where('users.pengadilan_id', $pengadilan_id);
		
	}
	
	
//echo $group_id >=5 ?  $this->db->where('users.mitra_id', $mitra_id):'';
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
		$infolog= infoLogin();
		$group_id= $infolog['group_id'];
		$usersesi =$infolog['userid'];
		$deID=decrypt_url($id);
        $this->db->where($this->id, $deID);
        $this->db->update($this->table, $data);
			
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
	
	    // get total user
    function gettotalwhere($pengadilan,$group,$instansi,$mitra,$block) {
	$this->db->select('userid');
	
	if($group==1){
		
	}
	elseif($group==2){ 
		$this->db->where('group_id >=', $group);
	}
	elseif($group==3){
		if($instansi==1){
		$this->db->where('group_id >=', $group);
		$this->db->where('instansi_id >=', $instansi);
		}
		else{
		$this->db->where('group_id >=', $group);
		$this->db->where('instansi_id ', $instansi);
		}
		
	}
	elseif($group==4){
		if($instansi==1){
		$this->db->where('group_id >=', $group);
		$this->db->where('instansi_id >=', $instansi);
		$this->db->where('pengadilan_id ', $pengadilan);
		}
		else{
		$this->db->where('group_id >=', $group);
		$this->db->where('instansi_id ', $instansi);
		$this->db->where('pengadilan_id ', $pengadilan);
		}
		
	}
	elseif($group==5){
		$this->db->where('group_id ', $group);
		$this->db->where('instansi_id ', $instansi);
		$this->db->where('pengadilan_id ', $pengadilan);
		$this->db->where('mitra_id ', $mitra);
		
		
	}
	else{
		
	
	}
	//echo !empty($pengadilan) ? $this->db->where('pengadilan_id', $pengadilan) :''; 
	//echo !empty($group) ? $this->db->where('group_id >=', $group) :''; 
	//echo !empty($instansi) ? $this->db->where('instansi_id >=', $instansi) :''; 
	
	$this->db->where('block', $block); 
	$this->db->from($this->table);
    return $this->db->count_all_results();
    }
	
	function datakontakkosong() {
	$this->db->select('userid');
	//$this->db->where('email', ''); 
	$this->db->not_like('email', '%_@_%._%'); 
	$this->db->group_by('userid'); 
	$this->db->from($this->table);
    return $this->db->count_all_results();
    }
	
	function userlain() {
	$this->db->select('userid');
	$this->db->where('block', 0); 
	$this->db->where('instansi_id !=',1); 
	$this->db->from($this->table);
    return $this->db->count_all_results();
    }
	

}

