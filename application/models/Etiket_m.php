<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Etiket_m extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function get_etiket_all(){
		$this->db->select('*');
		$this->db->select('convert_tanggal_indonesia(tanggal) AS tanggal_indo');
		$this->db->from('e_tiket');
		$this->db->order_by('id_e_tiket', 'desc');
		return $this->db->get()->result();
	}
    function get_etiket_satker($user_id){
		$this->db->select('*');
		$this->db->select('convert_tanggal_indonesia(tanggal) AS tanggal_indo');
		$this->db->from('e_tiket');
		$this->db->where('user_id', $user_id );
		$this->db->order_by('id_e_tiket', 'desc');
		return $this->db->get()->result();
	}
    function get_etiket_byid($id_e_tiket){
		$this->db->select('*');
		$this->db->select('convert_tanggal_indonesia(tanggal) AS tanggal_indo');
		$this->db->from('e_tiket');
		$this->db->where('id_e_tiket', $id_e_tiket );
		return $this->db->get()->result();
	}
	function save_etiket($data){
		$this->db->insert('e_tiket', $data);
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

	function update_aanmaning($satker, $idPkr, $data){
		$this->db->where('pa_id', $satker);
		$this->db->where('perkara_id', $idPkr );
		return $this->db->update('perkara_eksekusi_aanmaning',$data);
	}
	
	function save_tunda_aanmaning($data){
		$this->db->insert('perkara_eksekusi_aanmaning_sidang', $data);
		return true;
	}
}

