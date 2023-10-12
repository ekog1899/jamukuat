<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Help_m extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function get_help_all(){
		$this->db->select('help.*');
		$this->db->select('master_group.nama_group');
		$this->db->select('master_kategori_instansi.nama_instansi');
		$this->db->from('help');
		$this->db->join('master_kategori_instansi', 'master_kategori_instansi.instansi_id = help.instansi_id', 'left');
		$this->db->join('master_group', 'master_group.group_id = help.group_id', 'left');
		$this->db->order_by('help.instansi_id', 'ASC');
		$this->db->order_by('help.group_id', 'ASC');
		$this->db->order_by('help.urutan', 'ASC');
		return $this->db->get()->result();
	}
    function get_instansi(){
		$this->db->select('*');
		$this->db->from('master_kategori_instansi');
		$this->db->where('aktif', 1);
		$this->db->order_by('instansi_id', 'ASC');
		return $this->db->get()->result();
	}
    function get_group(){
		$this->db->select('*');
		$this->db->from('master_group');
		$this->db->where('tampil', 1);
		return $this->db->get()->result();
	}
    function get_help_satker($user_id){
		$this->db->select('*');
		$this->db->select('convert_tanggal_indonesia(tanggal) AS tanggal_indo');
		$this->db->from('e_tiket');
		$this->db->where('user_id', $user_id );
		$this->db->order_by('id_e_tiket', 'desc');
		return $this->db->get()->result();
	}
    function get_help_byid($id){
		$this->db->select('*');
		$this->db->from('help');
		$this->db->where('id', $id );
		return $this->db->get()->result();
	}
    function get_panduan($instansi_id,$group_id){
		$this->db->select('*');
		$this->db->from('help');
		$this->db->where('instansi_id', $instansi_id );
		$this->db->where('group_id', $group_id );
		$this->db->order_by('urutan', 'asc');
		return $this->db->get()->result();
	}
	function save_help($data){
		$this->db->insert('help', $data);
		return true;
	}
	
	function insert_data($tableName,$data){
		$res=$this->db->insert($tableName,$data);
		return $res;
	}
	function update_data($whereconditon,$tableName,$data){
		$this->db->where($whereconditon);
		$res=$this->db->update($tableName, $data);
		return $res;
	}
	function delete_data($whereconditon,$tableName){
		$this->db->where($whereconditon);
		$res=$this->db->delete($tableName);
		return $res;
	}
	function get_data_where($whereconditon, $table){
		$this->db->where($whereconditon);
		$query = $this->db->get($table);
		return $query->result();
	}
}

