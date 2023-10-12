<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pks_m extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function get_pks_all(){
		$this->db->select('data_pks.*');
		$this->db->select('pengadilan_agama.nama AS nama_pa');
		$this->db->select('convert_tanggal_indonesia(tanggal_pks) AS tanggal_indo');
		$this->db->from('data_pks');
		$this->db->join('pengadilan_agama', 'pengadilan_agama.id = data_pks.pa_id', 'left');
		$this->db->order_by('pa_id', 'ASC');
		$this->db->order_by('tanggal_pks', 'ASC');
		return $this->db->get()->result();
	}
    function get_master_status(){
		$this->db->select('*');
		$this->db->from('master_status_pks');
		return $this->db->get()->result();
	}
    function get_pks_satker($pa_id){
		$this->db->select('*');
		$this->db->select('master_status_pks.status_pks');
		$this->db->select('convert_tanggal_indonesia(tanggal_pks) AS tanggal_indo');
		$this->db->from('data_pks');
		$this->db->where('pa_id', $pa_id );
		$this->db->join('master_status_pks', 'master_status_pks.status_pks_id = data_pks.status_pks_id', 'left');

		$this->db->order_by('tanggal_pks', 'desc');
		return $this->db->get()->result();
	}
    function get_pks_byid($id){
		$this->db->select('data_pks.*');
		$this->db->select('master_status_pks.status_pks');
		$this->db->select('convert_tanggal_indonesia(tanggal_pks) AS tanggal_indo');
		$this->db->from('data_pks');
		$this->db->where('id', $id );
		$this->db->join('master_status_pks', 'master_status_pks.status_pks_id = data_pks.status_pks_id', 'left');
		return $this->db->get()->result();
	}
	function save_pks($data){
		$this->db->insert('data_pks', $data);
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
	//////////////////////////////ngisor ora penting

}

